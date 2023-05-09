<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\User;
use Livewire\Component;
use App\Traits\BookTrait;
use Laravel\Jetstream\Jetstream;

class BookingCalendarView extends Component
{
    use BookTrait;

    public $events, $events2, $team_id;

    public function render()
    {
        $this->events = $this->getCalendarBookings();
        
        return view('livewire.dashboard.booking-calendar-view');
    }

    public function switchHotel($id){
        $team = Jetstream::newTeamModel()->findOrFail($id);
        
        if (! User::first()->switchTeam($team)) {
            abort(403);
        }

        return redirect()->route('dashboard');
    }
}
