<?php

namespace App\Traits;

use App\Models\Booking;
use App\Models\Reservation;
use App\Models\Room;
use App\Models\RoomType;
use App\Models\User;
use App\Notifications\BookingInquiryNotification;
use App\Notifications\GuestInquiryNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;
use Livewire\WithPagination;



trait BookTrait {
    use UserTrait, RoomTrait, DateTrait, WithPagination;

    // Get all Booking inquiries
    public function getBookingInquiries(){
        return Reservation::where('team_id', auth()->user()->currentTeam->id)
        ->orderByDesc('created_at')->paginate(5);
        // return Reservation::get()->paginate(10);
    }

    // Returns all booked rooms with booking information dates
    public function getBookings(){
        return Booking::where('booking_status', 1)
        ->where('team_id', auth()->user()->currentTeam->id)
        ->orderByDesc('created_at')
        ->with('room.room_types')->with('guests.user')->get();
    }    
    // public function getBookings(){
    //     return Booking::where('booking_status', 1)
    //     ->where('team_id', auth()->user()->currentTeam->id)
    //     ->with('room.room_types')->with('guests.users')->get();
    // }

    // Get all Booking inquiries
    public function hasCurrentBooking($guest_id){
        return Booking::orderByDesc('created_at')->where('guests_id', $guest_id)->exists();
        // return Reservation::get()->paginate(10);
    }

    public function hasCurrentReservation($guest_id){
        return Reservation::orderByDesc('created_at')->where('guests_id', $guest_id)->exists();
    }

    public function getLastBooking($guest_id){
        return Booking::orderByDesc('created_at')->with('room.room_types')->where('guests_id', $guest_id)->first();
    }

    public function getLastReservation($guest_id){
        return Reservation::orderByDesc('created_at')->where('guests_id', $guest_id)->first();
    }
    
    // Get all Booking inquiries    
    public function getCustomerBookings($guest_id){
        return Booking::orderByDesc('created_at')->where('guests_id', $guest_id)->get();
    }

    // Returns all booked rooms with booking information dates
    public function getCalendarBookings(){
        $events = [];
        $unbooked = [];
        $bookings = Booking::where('team_id', auth()->user()->currentTeam->id)->get()->toArray();
        $total_rooms = $this->getTotalRooms();
        // Merge booked rooms
        foreach($bookings as $b){
            $bookedarr = [
                'title' => count($bookings).' Booked Rooms',
                'url' => '/calendar-and-bookings',
                'start' => $this->convertNormal($b['checkin_date']),
                'end' => $this->convertNormal($b['checkout_date']),
                'className' => 'bg-danger'
            ];
            array_push($events, $bookedarr);

            $unbookedarr = [
                'title' => $total_rooms - count($bookings).' Rooms Available',
                'url' => '/calendar-and-bookings',
                'start' => $this->convertNormal($b['checkin_date']),
                'end' => $this->convertNormal($b['checkout_date']),
                'className' => 'bg-info'
            ];
            array_push($events, $unbookedarr);
            if(count($bookings) < 0 ){
                $freeSpots = [
                    'title' => $total_rooms - count($bookings).' Rooms Available',
                    'url' => '/calendar-and-bookings',
                    'start' => '2023-01-01',
                    'end' => '2028-12-30',
                    'className' => 'bg-success'
                ];
                array_push($events, $freeSpots);
            }else{
                $freeSpots = [
                    'title' => '',
                    'url' => '#',
                    'start' => $this->convertNormal($b['checkin_date']),
                    'end' => $this->convertNormal($b['checkout_date']),
                    'className' => 'bg-default'
                ];
                array_push($events, $freeSpots);
            }
            
            
        }
        return $events;
        

        // // Merge available rooms
        // foreach ($bookings as $a) {
        //    $x = $this->getFreeRoomOnDate($a['checkin_date'], $a['checkout_date']);
        //     //   dd($x);
        // }
    }

    // Returns all available rooms on a specific date range
    public function getFreeRoomOnDate($from, $to){

    }


    public function checkAvailability($request){
        $data = $request->toArray();

        return Room::with('room_types')
        ->where('room_types_id', $data['room_type'])
        ->where('num_adult', '>=' , $data['adult_num'])
        ->where('num_children', '>=', $data['children_num'])
        ->where('team_id', $data['hotel_id'])
        ->where('is_available', 1)
        ->get()->toArray();
    }

    // -trait: get all available spots unbooked
    public function checkNextAvailability($request){
        $data = $request->toArray();
        $booked = Booking::get();

        return Room::with('room_types')
        ->where('room_types_id', $data['room_type'])
        ->where('team_id', $data['hotel_id'])
        ->get();
    }

    public function makeReservation($request){
        $admin = User::where('id', 1)->first();
        // dd($request->input('hotel_id'));
        $r = RoomType::where('team_id', $request->input('hotel_id'))
                ->orWhere('name', $request->input('room_type'))
                ->orWhere('id', $request->input('room_type'))->first();
                
        // Enter User Information
        $user = $this->registerUser($request);
        $in = $this->convertNormal($request->input('check_in_date'));
        $out = $this->convertNormal($request->input('check_out_date'));
        $nights = $this->numOfDays($in, $out);
        $total_bill = $nights * $r->price ?? 0;
     
        $data = Reservation::create([
            'guests_id' => $user->id,
            'reservation_date' => now(),
            'reservation_code' => Str::orderedUuid(4),
            'checkin_date' => $this->readDate($in),
            'checkout_date' =>  $this->readDate($out),
            'num_adults' => $request->input('adult_num'),
            'num_children' => $request->input('children_num'),
            'special_requests' => $request->input('special_requests'),
            'is_confirmed' => 0,
            'is_cancelled' => 0
        ]);

        $note = [
            'name' => Reservation::fullName($user->id),
            'msg' => "You have received a new booking inquiry. Date of Arival ".$this->readDate($in)." and Date of Departure ".$this->readDate($out).". Total billing of K".$total_bill,
            'type' => 'inquiry',
            'special_req' => $request->input('special_requests') ?? 'None',
            'in' => $request->input('check_in_date'),
            'out' => $request->input('check_out_date'),
            'room_type' => $request->input('room_type'),
            'bill' => 'K'.$total_bill,
            'duration' => $nights,
            'user_id' => $user->id,
            'data_id' => $data->id
        ];
        Notification::send($admin, new BookingInquiryNotification($note));
        Notification::send($user, new GuestInquiryNotification($note));
        if(!empty($data->toArray())){
            return true;
        }else{
            return false;
        }
        return true;
    }


    public function saveBooking($data){
        $admin = User::first();
        $user = User::where('id', $data['guest_id'])->first();
        // Enter reservation information
        try {
            $data = Booking::create([
                'guests_id' => $data['guest_id'],
                'team_id' => $data['team_id'] ?? $data['hotel_id'] ,
                'rooms_id' => $data['room_id'],
                // 'reservations_id' => $data['reserve_id'] ?? '',
                // 'user_id' => auth()->user()->id ?? '',
                'booking_code' => Str::orderedUuid(4),
                'checkin_date' => $data['in'],
                'checkout_date' => $data['out'],
                'num_adults' => $data['adults'],
                'num_children' => $data['children'],
                'booking_date' => now(),
                'total_price' => $data['price'],
                'payment_status' => 1,
                'booking_status' => 1
            ]);

            $note = [
                'msg' => "Booked Room. Date checked in ".$data['in']." and Date of Check-out ".$data['out'],
                'type' => 'booking'
            ];

            Notification::send($admin, new BookingInquiryNotification($note));
            Notification::send($user, new GuestInquiryNotification($note));
        } catch (\Throwable $th) {
            return false;
        }
        if(!empty($data->toArray())){
            return $data;
        }else{
            return false;
        }
    }

    public function acceptInquiry($id){
        // $inq = Reservation::where('id', $id)->first();
        $inq = Reservation::where('id', $id)->first();
        $inq->is_confirmed = 1;
        $inq->is_cancelled = 0;
        $inq->save();
    }

    public function denyInquiry($id){
        // $inq = Reservation::where('id', $id)->first();
        $inq = Reservation::where('id', $id)->first();
        $inq->is_confirmed = 1;
        $inq->is_cancelled = 1;
        $inq->save();
    }
}