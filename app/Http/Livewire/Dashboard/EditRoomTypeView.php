<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use App\Traits\RoomTrait;

class EditRoomTypeView extends Component
{
    use RoomTrait;
    public $type;

    
    public function mount($id){
        $this->type = $this->getRoomType($id);
    }

    public function render()
    {
        return view('livewire.dashboard.edit-room-type-view');
    }
}
