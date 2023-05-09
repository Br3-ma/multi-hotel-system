<?php

namespace App\Http\Livewire\Admin\Hotels;

use App\Models\User;
use Livewire\Component;
use Laravel\Jetstream\Jetstream;

class ManageHotelView extends Component
{
    public $team_id;
    public function render()
    {
        return view('livewire.admin.hotels.manage-hotel-view');
    }

    public function switchHotel($id){
        $team = Jetstream::newTeamModel()->findOrFail($id);
        
        if (! User::first()->switchTeam($team)) {
            abort(403);
        }

        return redirect()->route('dashboard');
    }
}
