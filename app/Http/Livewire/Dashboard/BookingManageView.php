<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Booking;
use App\Models\Guest;
use App\Models\Room;
use App\Models\User;
use App\Traits\BookTrait;
use App\Traits\RoomTrait;
use App\Traits\UserTrait;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class BookingManageView extends Component
{
    use RoomTrait, UserTrait, BookTrait;
    public $bookings, $guests, $room_types, $rooms;
    public $country, $fname, $checkin_date, $checkout_date, $num_adults, $num_children;
    public $lname, $email, $message, $user, $book_room_id, $room, $reservation;

    public function render()
    {
        // Get Booking with room information
        $this->rooms = $this->getAvailableRooms2(auth()->user()->currentTeam->id);
        $this->bookings = $this->getBookings();
        $this->guests = $this->getGuests();
        $this->room_types = $this->getAllRoomTypes2(auth()->user()->currentTeam->id);
        return view('livewire.dashboard.booking-manage-view');
    }

    public function toggleStatus($id){
        try {
            $this->toggleRoomStatus($id);
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function checkOut($id){
        $booking = Booking::where('id', $id)->first();
        $booking->booking_status = 0;
        $booking->save();

        $this->toggleRoomStatus($booking->rooms_id);
        session()->flash('success', 'Room checked out.');
    }

    

    public function makeBooking(){
        try {
            
            $user = $this->registerGustUser();
            $room = Room::where('id', $this->book_room_id)
                        ->where('team_id', auth()->user()->currentTeam->id)
                        ->where('is_available', 1)->with('room_types')->first();
            // dd($room !== null);
            if($room !== null){
                $room->is_available = 0;
                $room->save();
    
                $data = [
                    'guest_id' => $user->id,
                    'room_id' => $this->book_room_id,
                    'reserve_id' => 'None',
                    'in' => $this->checkin_date,
                    'out' =>  $this->checkout_date,
                    'adults' =>  $this->num_adults,
                    'children' =>  $this->num_children,
                    'price' =>  $room->room_types->price,
                    'hotel_id' =>  auth()->user()->currentTeam->id
                ];
                $this->saveBooking($data);
                session()->flash('success', 'Room successfully booked.');
            }else{
                session()->flash('error', 'Room already booked, check the calendar for available dates.');
            }
        } catch (\Throwable $th) {
            dd($th);
            session()->flash('error', 'Connection failure, email failed to send.');
        }
    }

    public function registerGustUser(){
        $password = 'asmara4Gud';
        $check = User::where('email', $this->email)->first();
        if($check == null){
            try {
                $user = User::create([
                    'fname' => $this->fname,
                    'lname' => $this->lname,
                    'email' => $this->email,
                    "current_team_id" =>  auth()->user()->currentTeam->id,
                    'password' => Hash::make($password),
                    'terms' => 'accepted'
                ]);
                
                Guest::create([
                    'user_id' => $user->id,
                    'team_id' => auth()->user()->currentTeam->id,
                    'country' => $this->country
                ]);
                return $user;
            } catch (\Throwable $th) {
                return [];
            }
        }else{
            return $check;
        }
        
    }
}

