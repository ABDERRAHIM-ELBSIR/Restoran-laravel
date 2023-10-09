<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class BookingController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $user_id = auth()->user()->id;
            $data = DB::table('booking')->where('ref_to', $user_id)->get();

            return  view('booking', compact('data'));
        }
        return  view('booking');
    }

    public function store(Request $request)
    {

        $validate = Validator::make($request->all(), [
            'user_name' => 'required',
            'special_request' => 'required',
            'datetime' => 'required',
            'numbre_person' => 'required',
            'user_email' => 'required',
           
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }

        $user_id = auth()->user()->id;
        $data = [
            'user_name' => $request->user_name,
            'user_email' => $request->user_email,
            'ref_to' => $user_id,
            'numbre_person' => $request->numbre_person,
            'datetime' => $request->datetime,
            'special_request' => $request->special_request
        ];
        $booking = DB::table('booking')->insert($data);

        if (!$booking) {
            return  'error';
        }

        return back();
    }


    public function update_form($id)
    {
        $booking = DB::table('booking')->where('id',$id)->first();
        // return view('update_booking', compact('booking'));
        // return $booking;
        return view('update_booking', compact('booking'));
    }


    public function update(Request $request, $id)
    {
         $validate = Validator::make($request->all(), [
            'user_name' => 'required',
            'ref_to' => 'required',
            'special_request' => 'required',
            'datetime' => 'required',
            'numbre_person' => 'required',
            'user_email' => 'required|email',
           
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }

        $booking = DB::table('booking')->select('id', $id);

        if (!$booking) {
            return 'booking not founded';
        }

        $booking->update($request->all());
        return view('booking');

       

    }
    public function validate_booking(Request $request, $booking_id)
    {
         $validate = Validator::make($request->all(), [
            'is_validate' => 'required',
           
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }

        $newData = [
            'is_validate' => $request->is_validate
        ];

        DB::table('booking')
            ->where('id', $booking_id)
            ->update($newData);

        return redirect('/dashboard-booking');

       

    }
    public function validate_info($booking_id)
    {
       $data=DB::table('booking')->where('id',$booking_id)->first();
       return view('admin.validate_booking' ,compact('data'));
    }


    public function delete($booking_id)
    {
        // $id=$request->food_id;
        // No need to fetch the user in this case

        // Delete the food item using the correct $food_id from the route parameter
        $deleted = DB::table('booking')->where('id', $booking_id)->delete();

        if (!$deleted) {
            return response('Not found', 404);
        }

        return redirect()->back();
    }

    public function booking_info($booking_id){

        $data=DB::table('booking')->where('id',$booking_id)->first();
        return view('admin.booking_info' ,compact('data'));
     
    }
}
