<?php

namespace App\Http\Controllers;

use App\Traits\imgTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ChefsController extends Controller
{
    use imgTrait;

    public function index()
    {

        $data = DB::select('select * from chefs');
        foreach($data as $item){
            $item->profile_img=$this->get_file_path($item->profile_img);
        }

        return view('teame', compact('data'));
    }

    public function new_chefs()
    {
        return view('admin.newChefs');
    }

    public function info_chefs($chefs_id)
    {

        $chefs_info = DB::table('chefs')->find($chefs_id);

        return view('admin.chefs_info', compact('chefs_info'));
    }

    public function store(Request $request)
    {
        $id = time();

        // Validate the uploaded file
        $validate = Validator::make($request->all(), [
            'file' => 'required|file|mimes:jpeg,png|max:2048', // Example validation rules
        ]);


        if ($validate->fails()) {
            return response('hi');
        }


        $file = $request->file('file');
        $file_id = $this->upload_img($file, "chefs", $id, 'chefs');


        $validate = Validator::make($request->all(), [
            'discription' => 'required',
            'name' => 'required',
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }

        $data = [
            'id' => $id,
            'name' => $request->name,
            'discription' => $request->discription,
            'facebook_url' => $request->facebook_url,
            'twiter_url' => $request->twiter_url,
            'instagram_url' => $request->instagram_url,
            'profile_img' => $file_id,
        ];

        $chefs = DB::table('chefs')->insert($data);
        if (!$chefs) {
            return  'error';
        }
        return redirect('/dashboard-chefs');
    }
    public function update(Request $request, $chefs_id)
    {
        // Check if a new file is provided
        if ($request->hasFile('file')) {

            $validate = Validator::make($request->all(), [
                'file' => 'file|mimes:jpeg,png,pdf|max:2048',
            ]);

            if ($validate->fails()) {
                return redirect()->back()->withErrors($validate)->withInput();
            }

            // Remove the old image if it exists
            $chefs = DB::table('chefs')->where('id', $chefs_id)->first();
            if ($chefs->img) {
                // Remove the old image file, assuming your 'upload_img' function handles this
                $this->removeImage($chefs->profile_img);
            }

            $file = $request->file('file');
            $file_id = $this->upload_img($file, "chefs", $chefs_id, 'chefs');

            $newData = [
                'profile_img' => $file_id,
            ];

            DB::table('chefs')
                ->where('id', $chefs_id)
                ->update($newData);
        }


        $validate = Validator::make($request->all(), [
            'discription' => 'required',
            'name' => 'required',
        ]);


        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }


        $Newdata = [
            'name' => $request->name,
            'discription' => $request->discription,
            'facebook_url' => $request->facebook_url,
            'twiter_url' => $request->twiter_url,
            'instagram_url' => $request->instagram_url,
        ];


        $chefs = DB::table('chefs')
            ->where('id', $chefs_id)
            ->update($Newdata);

        if (!$chefs) {
            return  'error cccc';
        }

        return redirect('/dashboard-chefs');
       
    }

    public function delete($chef_id)
    {
        $deleted = DB::table('chefs')->where('id', $chef_id)->delete();

        if (!$deleted) {
            return response('Not found', 404);
        }

        return redirect('/dashboard-chefs');
    }
}
