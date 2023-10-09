<?php

namespace App\Http\Controllers;

use App\Traits\imgTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    use imgTrait;
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            // Retrieve the authenticated user
            $user = auth()->user();

            // Check if the user is an admin
            if ($user && $user->is_admin == 1) {
                // User is an admin, allow access to the controller
                return $next($request);
            }

            // User is not an admin, deny access or perform some other action
            // abort(403, 'Unauthorized');
            return redirect('/');
        });
    }

    public function index()
    {
        $user_count = DB::table('users')->count();
        $chefs_count = DB::table('chefs')->count();
        $menu_count = DB::table('food')->count();
        return view('admin.index', [
            'users' => $user_count,
            'menu' => $menu_count,
            'chefs' => $chefs_count,
        ]);
    }

    public function dashboard_password()
    {


        return view('admin.password');
    }

    public function dashboard_chefs()
    {
        $data=DB::select('select * from chefs ');

        foreach($data as $item){
            $item->profile_img=$this->get_file_path($item->profile_img);
        }

        $chefs_count = DB::table('chefs')->count();


        return view('admin.chefs' ,[
            'data'=>$data,
            'chefs_count'=>$chefs_count
        ]);
       
    }

    public function dashboard_menu()
    {
        $data=DB::select('select * from food ');

        foreach($data as $item){
            $item->img=$this->get_file_path($item->img);
        }

        $menu_count = DB::table('food')->count();


        return view('admin.menu' ,[
            'data'=>$data,
            'menu_count'=>$menu_count
        ]);
    }

    public function dashboard_users()
    {
        $user_count = DB::table('users')->count();
        $users = DB::select('select * from users ');

        foreach($users as $item){
            $item->profile_img=$this->get_file_path($item->profile_img);
        }


        return view('admin.users', [
            'user_count' => $user_count,
            'data' => $users,

        ]);
    }

    public function dashboard_booking()
    {
        $booking_count = DB::table('booking')->count();
        $booking = DB::select('select * from booking ');


        return view('admin.booking', [
            'booking_count' => $booking_count,
            'data' => $booking,

        ]);
    }
}
