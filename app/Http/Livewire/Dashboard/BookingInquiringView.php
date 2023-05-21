<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Inquiry;
use App\Models\User;
use Livewire\Component;
use App\Traits\BookTrait;
use Laravel\Jetstream\Jetstream;
use Livewire\WithPagination;

class BookingInquiringView extends Component
{
    use BookTrait, WithPagination;
    public $contact_info, $team_id;
    public $selectedItems = [];

    public function render()
    {
        $inquiries = Inquiry::where('team_id', auth()->user()->currentTeam->id)->paginate(10);
        return view('livewire.dashboard.booking-inquiring-view',[
            'inquiries' => $inquiries
        ]);
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

    public function deleteInquiries()
    {
        Inquiry::where('id', $this->selectedItems)->delete();

        // Clear the selection after deleting users
        $this->selectedItems = [];
        session()->flash('success', 'Inquiries deleted successfully.');
    }
}
