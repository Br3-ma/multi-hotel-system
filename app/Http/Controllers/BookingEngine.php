<?php

namespace App\Http\Controllers;

use App\Traits\BookTrait;
use Illuminate\Http\Request;

class BookingEngine extends Controller
{
    use BookTrait;
    /**
     * Display a listing of the resource.
     */
    public function checkRoomAvailability(Request $request)
    {
        $data = $this->checkAvailability($request);
        if(!empty($data->toArray())){
            return response()->json([
                'data' => $data->toArray()
            ]);
        }else{
            return response()->json([
                'data' => 'No Rooms Founds. Please check other types of rooms.'
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function saveReservation(Request $request)
    {
        try {
            $data = $this->makeReservation($request);
            if($data){
                return response()->json([
                    'title' => 'Booking Inquiry',
                    'message' => 'Your booking inquiry has been sent.',
                    'code' => 'success'
                ]);
            }else{
                return response()->json([
                    'title' => 'Booking Inquiry',
                    'message' => 'Unable to Send Booking Inquiry.',
                    'code' => 'warning'
                ]);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'title' => 'Booking Inquiry',
                'message' => 'Oops, Something went wrong. Check your email or internet connection and try again',
                'code' => 'error'
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function saveBooking(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
