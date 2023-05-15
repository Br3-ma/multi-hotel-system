<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Guest;
use Livewire\Component;
use Livewire\WithPagination;

class GuestView extends Component
{
    use WithPagination;

    public function render()
    {
        $users = Guest::where('team_id', auth()->user()->currentTeam->id)->orderByDesc('created_at')->with('user')->paginate(10);

        return view('livewire.dashboard.guest-view',[
            'users' => $users
        ]);
    }
}
