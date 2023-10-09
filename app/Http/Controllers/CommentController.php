<?php

namespace App\Http\Controllers;

use App\Traits\imgTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    use imgTrait;
    public function index()
    {

        $data = DB::select('select * from comments');
        foreach ($data as $item) {

            $user = DB::table('users')->where('email', $item->email)->first();

            $item->img = $this->get_file_path($user->profile_img);
        }

        return view('testimonial', compact('data'));
    }


    public function store(Request $request)
    {
        $id = time();

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ];

        $food = DB::table('comments')->insert($data);
        if (!$food) {
            return  'error';
        }
    }
    public function update(Request $request, $id)
    {
        $food = DB::table('comments')->select('id', $id);

        if (!$food) {
            return 'comment not founded';
        }

        $food->update($request->all());
        return view('testimonial');
    }

    public function delete($id)
    { //delete post
        $food = DB::table('comments')->select('id', $id);

        if (!$food) {
            return 'comment not founded';
        }
        $food->delete();

        return 'delete';
    }
}
