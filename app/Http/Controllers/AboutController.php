<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AboutController extends Controller
{
    public function index(){
        $chefs=DB::table('chefs')->count();

        return view('about',compact('chefs'));
    }
}
