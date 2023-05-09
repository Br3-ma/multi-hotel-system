<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Booking;
use App\Traits\BookTrait;
use App\Traits\RoomTrait;
use App\Traits\UserTrait;
use Livewire\Component;

class BookingManageView extends Component
{
    use RoomTrait, UserTrait, BookTrait;
    public $bookings, $guests, $room_types;

    public function render()
    {
        // Get Booking with room information
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
        session()->flash('success', 'Room successfully booked.');
    }
}

