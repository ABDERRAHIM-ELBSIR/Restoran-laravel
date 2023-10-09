<?php

namespace App\Http\Controllers;

use App\Traits\imgTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    use imgTrait;

    public function user_search(Request $request)
    {


        $user_count = DB::table('users')->count();

        $query = $request->search_input;
        $data = DB::table('users')->where('name', 'LIKE', "%$query%")
            ->orWhere('email', 'LIKE', "%$query%")
            ->get();

        return view('admin.users', [
            'data' => $data,
            'user_count' => $user_count
        ])->render();
    }

    public function menu_search(Request $request)
    {
        if (request()->has('select_input')) {
            $menu_count = DB::table('food')->count();


            $query = $request->select_input;
            $data = DB::table('food')->where('category', 'LIKE', "%$query%")
                ->get();
            foreach ($data as $item) {
                $item->img = $this->get_file_path($item->img);
            }

            return view('admin.menu', [
                'data' => $data,
                'menu_count' => $menu_count
            ])->render();
        }
    }
}
