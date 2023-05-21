<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Booking;
use App\Models\Room;
use App\Models\RoomType;
use App\Traits\RoomTrait;
use Livewire\Component;

class RoomTypeManageView extends Component
{
    use RoomTrait;
    public $selectedRoomTypes = [];

    public function render()
    {
        
        $room_types = $this->getAllRoomTypes2(auth()->user()->currentTeam->id);
        return view('livewire.dashboard.room-type-manage-view',[
            'room_types' => $room_types
        ]);
    }


    public function deleteRooms()
    {
        foreach($this->selectedRoomTypes as $b){
            $room_type_id = RoomType::where('id', $b)->first()->id;
            $room = Room::where('room_types_id', $room_type_id)->get();
            foreach ($room as $r) {
                Booking::where('rooms_id', $r->id)->delete();
            }
        }
        Room::where('room_types_id', $this->selectedRoomTypes)->delete();
        RoomType::where('id', $this->selectedRoomTypes)->delete();

        // Clear the selection after deleting users
        $this->selectedRoomTypes = [];
        session()->flash('success', 'Rooms & Bookings deleted successfully.');
    }
}
