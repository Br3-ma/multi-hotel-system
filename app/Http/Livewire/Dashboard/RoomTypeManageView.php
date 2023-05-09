<?php

namespace App\Http\Livewire\Dashboard;

use App\Traits\RoomTrait;
use Livewire\Component;

class RoomTypeManageView extends Component
{
    use RoomTrait;

    public function render()
    {
        
        $room_types = $this->getAllRoomTypes2(auth()->user()->currentTeam->id);
        return view('livewire.dashboard.room-type-manage-view',[
            'room_types' => $room_types
        ]);
    }
}
