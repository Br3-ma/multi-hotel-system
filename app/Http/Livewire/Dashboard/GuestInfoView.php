<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\User;
use App\Traits\BookTrait;
use App\Traits\RoomTrait;
use Livewire\Component;

class GuestInfoView extends Component
{
    use BookTrait, RoomTrait;
    public $user, $reservations, $inquiries, $hasCurrentBooking, $hasCurrentReservation, $lastReservation, $lastBooking;
    public $message, $optresp;
    public $inquiry_id = null;
    public $book_room_id;
    public $room;
    public $rooms;
    public $reservation;

    public function mount($id){
        $this->user = User::where('id', $id)->with('guests')->first();
        
        $this->hasCurrentBooking = $this->hasCurrentBooking($this->user->id);
        $this->hasCurrentReservation = $this->hasCurrentReservation($this->user->id);
        $this->lastBooking = $this->getLastBooking($this->user->id);
        // dd($this->lastBooking);
        $this->lastReservation = $this->getLastReservation($this->user->id);
        
    }

    public function render(){
        
        $bookings = $this->getCustomerBookings($this->user->id);
        $this->rooms = $this->getAvailableRooms();
        return view('livewire.dashboard.guest-info-view',[
            'bookings'=>$bookings
        ]);
    }
}
