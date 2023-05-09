<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Traits\BookTrait;
use App\Traits\RoomTrait;
use App\Traits\UserTrait;
use Illuminate\Http\Request;

class MyApiController extends Controller
{
    use RoomTrait, BookTrait, UserTrait;

    public function getRoomTypes($hotel_id){
        $data = $this->getAllRoomTypes2($hotel_id);
        return response()->json([
            'data' => $data,
        ]);
    }

    public function calculatePrice(Request $req){
        // dd(json_decode($req->toArray()['charges']));
        
        // $billables = [
        //     '100','200','400', '600'
        // ];
        $basic = $this->getRoomType($req->toArray()['hotel_id'])->price;
        $sum = 0;
        
        // foreach ($additionals as $key => $value) {
        //     dd($value);
        // }
        return response()->json([
            'total' => $sum + $basic
        ]);
    }

    public function checkRoomAvailability(Request $req){

        $data = $this->checkAvailability($req);
        $user = $this->registerUser($req);
        if(!empty($data)){
            return response()->json([
                'data' => $data,
                'user' => $user
            ]);
        }else{
            // Return dates where this room type is available
            $next = $this->checkNextAvailability($req);
            return response()->json([
                'data' => $next,
                'user' => $user
            ]);
        }
    }

    public function makeBooking(Request $request){
        $req = $request->toArray();

        try {
            $user = $this->registerUser($request);
            $room = Room::where('room_number', $req['room_id'])
                    ->where('team_id', $req['hotel_id'])
                    ->with('room_types')->first();
            $room->is_available = 0;
            $room->save();

            $data = [
                'hotel_id' => $req['hotel_id'],
                'room_id' => $req['room_id'],
                'guest_id' => $req['user_id'],
                'reserve_id' => $req['inquiry_id'] ?? '',
                'in' =>  $req['checkin_date'],
                'out' =>   $req['checkout_date'],
                'adults' =>  $req['num_adults'],
                'children' =>  $req['num_children'],
                'price' =>  $room->room_types->price,
            ];
            $res = $this->saveBooking($data);
            
            return response()->json([
                'message' =>'Room successfully booked',
                'user' => $user,
                'data' => $res,
                'code' => 200
            ]);
        } catch (\Throwable $th) {
            
            return response()->json([
                'message' =>'Room booking failed. Room not found',
                'user' => $user,
                'code' => 500
            ]);
        }
    }

    public function makePayments(Request $req){
        
    }

    public function getBillables(){

    }

}
