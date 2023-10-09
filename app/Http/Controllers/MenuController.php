<?php

namespace App\Http\Controllers;

use App\Traits\imgTrait;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;




class MenuController extends Controller
{
    use imgTrait;

    public function index()
    {
        $data = DB::select('select * from food');
        foreach($data as $item){
            $item->img=$this->get_file_path($item->img);
        }

        return view('menu', compact('data'));
    }

    public function new_pla()
    {
        return view('admin.newPla');
    }




    public function store(Request $request)
    {
        $id =time();

        // Validate the uploaded file
        $validate = Validator::make($request->all(), [
            'file' => 'required|file|mimes:jpeg,png,pdf|max:2048', // Example validation rules
        ]);


        if ($validate->fails()) {
            return response('hi');
        }


        $file = $request->file('file');
        $file_id = $this->upload_img($file, "food", $id, 'food');

        $validate = Validator::make($request->all(), [
            'category' => 'required',
            'name' => 'required',
            'prix' => 'required',
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }

        $data = [
            'id' => $id,
            'name' => $request->name,
            'category' => $request->category,
            'prix' => $request->prix,
            'img' => $file_id,
        ];

        $food = DB::table('food')->insert($data);
        if (!$food) {
            return  redirect()->back();
        }
        return redirect('/dashboard-menu');
    }




    public function info_food($food_id)
    {

        $data = DB::table('food')->find($food_id);
        return view('admin.menu_info', compact('data'));
    }




    public function update(Request $request, $food_id)
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
            $food = DB::table('food')->where('id', $food_id)->first();
            if ($food->img) {
                // Remove the old image file, assuming your 'upload_img' function handles this
                $this->removeImage($food->img);
            }

            $file = $request->file('file');
            $file_id = $this->upload_img($file, "food", $food_id, 'food');

            $newData = [
                'img' => $file_id,
            ];

            DB::table('food')
                ->where('id', $food_id)
                ->update($newData);
        }

        // Update other fields
        $validate = Validator::make($request->all(), [
            'category' => 'required',
            'name' => 'required',
            'prix' => 'required',
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }

        $newData = [
            'name' => $request->name,
            'category' => $request->category,
            'prix' => $request->prix,
        ];

        DB::table('food')
            ->where('id', $food_id)
            ->update($newData);

        return redirect('/dashboard-menu');
    }


    public function delete($food_id)
    {
        // $id=$request->food_id;
        // No need to fetch the user in this case
    
        // Delete the food item using the correct $food_id from the route parameter
        $deleted = DB::table('food')->where('id', $food_id)->delete();
    
        if (!$deleted) {
            return response('Not found', 404);
        }
    
        return redirect('/dashboard-menu');



    }
    
}

