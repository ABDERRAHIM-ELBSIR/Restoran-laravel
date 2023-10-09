<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\imgTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;



class AuthController extends Controller
{
    use imgTrait;

    public function register()
    {
        return view('register');
    }

    public function update(Request $request)
    {
        $user_id=auth()->user()->id;
        // Check if a new file is provided
        if ($request->hasFile('file')) {

            $validate = Validator::make($request->all(), [
                'file' => 'file|mimes:jpeg,png,pdf|max:2048',
            ]);

            if ($validate->fails()) {
                return redirect()->back()->withErrors($validate)->withInput();
            }

            // Remove the old image if it exists
            $user = DB::table('users')->where('id', $user_id)->first();

            if ($user->profile_img) {
                // Remove the old image file, assuming your 'upload_img' function handles this
                $this->removeImage($user->profile_img);
            }

            $file = $request->file('file');
            $file_id = $this->upload_img($file, "profile_img", $user_id, 'profile_img');

            $newData = [
                'profile_img' => $file_id,
            ];

            DB::table('users')
                ->where('id', $user_id)
                ->update($newData);
        }

        // Update other fields
        $validate = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone' => 'required',
            'gender' => 'required',
            'address' => 'required|string',
            'age' => 'required|integer|min:0',
        ]);


        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }


        $Newdata = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'address' => $request->address,
            'password' => Hash::make($request->password),
            'age' => $request->age,
        ];


        $user = DB::table('users')
            ->where('id', $user_id)
            ->update($Newdata);


        return redirect()->back();
    }


    public function registerPost(Request $request)
    {
        $id = time();
        $file_id = null;
        if ($request->hasFile('file')) {

            $validate = Validator::make($request->all(), [
                'file' => 'file|mimes:jpeg,png,pdf|max:2048',
            ]);

            if ($validate->fails()) {
                return redirect()->back()->withErrors($validate)->withInput();
            }

            $file = $request->file('file');
            $file_id = $this->upload_img($file, "profile_img", $id, 'profile_img');
        }

        $validate = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users|max:255',
            'phone' => 'required',
            'gender' => 'required',
            'address' => 'required|string|max:255',
            'age' => 'required|integer|min:0',
            'password' => 'required|string|min:8',
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }

        $user = new User();

        if ($request->is_admin) {
            $user->is_admin = $request->is_admin;
        }

        if ($file_id) {
            $user->profile_img = $file_id;
        }

        $user->id = $id;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->gender = $request->gender;
        $user->address = $request->address;
        $user->age = $request->age;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();
        return redirect()->back();
    }

    public function login()
    {
        return view('login');
    }

    public function loginPost(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }

        $credetials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        // Attempt to authenticate the user
        if (Auth::attempt($credetials)) {
            return redirect('/dashboard');
            
        } else {
            return redirect()->back()->withErrors(['email' => 'Invalid credentials']);
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }


    public function get_info_users($user_id)
    {

        $user_info = DB::table('users')->find($user_id);

        return view('admin.user_info', [
            'user_info' => $user_info,
        ]);
    }

    public function new_user()
    {
        return view('admin.new_user');
    }



    public function delete_users($user_id)
    {


        $user = DB::table('users')->where('id', $user_id)->delete();
        if (!$user) {
            return response('hi');
        }

        return redirect('/dashboard-users');
    }

    public function profile()
    {
        $user_id = auth()->user()->id;

        $user = DB::table('users')->where('id', $user_id)->first();

        // foreach ($user as $item) {
        //     $item->profile_img = $this->get_file_path($item->profile_img);
        // }


        return view('profile.profile', [

            'data' => $user,

        ]);
    }
    public function make_admin(Request $request, $user_id)
    {
        
        $newData = [
            'is_admin' => $request->is_admin,
        ];
        DB::table('users')
            ->where('id', $user_id)
            ->update($newData);



        return redirect('/dashboard-users');
    }

    public function is_admin($user_id)
    {
        $user = Db::table('users')->where('id', $user_id)->first();
        return view('admin.make_admin', compact('user'));
    }
}
