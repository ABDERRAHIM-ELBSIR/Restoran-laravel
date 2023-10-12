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

            return redirect()->back()->with('success', 'Images uploaded successfully');
        }

        return back()->withErrors(['error' => 'No images selected']);
    }
}
