<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Inquiry;
use App\Models\User;
use Livewire\Component;
use App\Traits\BookTrait;
use Laravel\Jetstream\Jetstream;

class BookingInquiringView extends Component
{
    use BookTrait;
    public $inquiries, $contact_info, $team_id;

    public function render()
    {
        $this->inquiries = Inquiry::get();
        return view('livewire.dashboard.booking-inquiring-view');
    }

    public function viewMessageDetails($id){
        $this->contact_info = $this->inquiries->where('id', $id)->first();
    }
    
    public function accept($id){
        try {
            $this->acceptInquiry($id);
        } catch (\Throwable $th) {
            dd($th);
        }
    }
    
    public function deny($id){
        try {
            $this->denyInquiry($id);
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function switchHotel($id){
        $team = Jetstream::newTeamModel()->findOrFail($id);
        
        if (! User::first()->switchTeam($team)) {
            abort(403);
        }

        return redirect()->route('dashboard');
    }
}
