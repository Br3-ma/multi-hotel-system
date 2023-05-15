<?php

namespace App\Http\Livewire\Dashboard;

use App\Traits\RoomTrait;
use Livewire\Component;

class RoomManageView extends Component
{
    use RoomTrait;
    public $rooms, $room_types;

    public function render()
    {
        $rooms = $this->getAllRooms(auth()->user()->currentTeam->id);
        $this->room_types = $this->getAllRoomTypes2(auth()->user()->currentTeam->id);
        return view('livewire.dashboard.room-manage-view',[
            'rooms'=> $rooms
        ]);
    }

    public function toggleStatus($id){
        try {
            $this->toggleRoomStatus($id);
        } catch (\Throwable $th) {
            dd($th);
        }
    }
}
