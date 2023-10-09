<?php

namespace App\Http\Controllers;

use App\Traits\imgTrait;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    use imgTrait;

    public function index()
    {
        return view('admin.upload_images');
    }

    // public function store(Request $request)
    // {
    //     $id=time();

    // Validate the uploaded file
    //     $validate = Validator::make($request->all(), [
    //         'file' => 'required|file|mimes:jpeg,png,pdf|max:2048', // Example validation rules
    //     ]);


    //     if ($validate->fails()) {
    //         return response('hi');
    //     }


    //     $file = $request->file('file');
    //     $file_id = $this->upload_img($file, "food", $id, 'food');
    // }
    public function uploadImages(Request $request)
    {
        $id = time();

        $request->validate([
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {


                $this->upload_img($image, "website", $id, 'website');
                // You can save $path to the database or perform other actions as needed.
            }

            return redirect()->url('/dashboard-images')->with('success', 'Images uploaded successfully');
        }

        return back()->withErrors(['error' => 'No images selected']);
    }
}
