<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Booking;
use App\Models\Reservation;
use App\Models\Room;
use App\Models\Team;
use App\Models\User;
use App\Traits\BookTrait;
use Livewire\Component;
use Laravel\Jetstream\Jetstream;

class IndexView extends Component
{
    use BookTrait;
    public $bookings;
    public $tt_rooms, $tt_lodges, $tt_booking, $tt_inquiries, $checkin, $checkout; 
    public $tt_rooms_available, $tt_rooms_booked, $tt_total_site_visitors;
    public $tt_in, $tt_out, $events, $team_id;

    public function render()
    {
        $this->tt_lodges = Team::count();
        $this->bookings = $this->getBookings();
        $this->events = $this->getCalendarBookings();
        $inquries = $this->getBookingInquiries();
        
        $this->tt_rooms = Room::where('team_id', auth()->user()->currentTeam->id)->count();
        $this->tt_in = Booking::where('booking_status', 1)
                                    ->where('team_id', auth()->user()->currentTeam->id)->count();
        $this->tt_out = Booking::where('booking_status', 0)
                                    ->where('team_id', auth()->user()->currentTeam->id)->count();
        $this->tt_booking = Room::where('is_available', 0)
                                ->where('team_id', auth()->user()->currentTeam->id)->count();

        $this->tt_inquiries = Reservation::where('team_id', auth()->user()->currentTeam->id)->count();

        $this->checkin = Room::where('is_available', 0)
                                ->where('team_id', auth()->user()->currentTeam->id)->count();

        $this->checkout =  Room::where('is_available', 1)
                                ->where('team_id', auth()->user()->currentTeam->id)->count();

        $this->tt_rooms_available =  Room::where('is_available', 1)
                                            ->where('team_id', auth()->user()->currentTeam->id)->count();

        $this->tt_rooms_booked =  Room::where('is_available', 1)
                                        ->where('team_id', auth()->user()->currentTeam->id)->count();

        $this->tt_total_site_visitors = User::count();

        return view('livewire.dashboard.index-view',[
            'inquries' => $inquries
        ]);
    }

    public function switchHotel($id){
        $team = Jetstream::newTeamModel()->findOrFail($id);
        
        if (! User::first()->switchTeam($team)) {
            abort(403);
        }

        return redirect()->route('dashboard');
    }
}
