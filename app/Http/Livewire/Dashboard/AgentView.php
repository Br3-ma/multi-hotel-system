<?php
namespace App\Http\Livewire\Dashboard;

use App\Models\Agent;
use App\Models\Guest;
use App\Models\User;
use App\Traits\BookTrait;
use App\Traits\RoomTrait;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithPagination;

class AgentView extends Component
{
    use RoomTrait, BookTrait, WithPagination;
    public $rooms;
    public $country, $fname, $lname,$email, $phone_number, $gender, $occupation, $id_type, $id_number, $user_type;

    public function render()
    {
        // Get Booking with room information
        $this->rooms = $this->getAvailableRooms2(auth()->user()->currentTeam->id);
        $users = Agent::where('team_id', auth()->user()->currentTeam->id)->orderByDesc('created_at')->with('user')->paginate(10);

        return view('livewire.dashboard.agent-view',[
            'users' => $users
        ]);
    }

    public function addGuest(){
        $data = $this->registerGuestUser();
        if($data){
            session()->flash('success', 'Guest created successfully.');
        }else{
            session()->flash('error', 'Guest with this email already exists.');
        }

    }

    public function registerGuestUser(){
        $password = 'asmara4Gud';
        $check = User::where('email', $this->email)->first();
        if($check == null){
            try {
                $user = User::create([
                    'fname' => $this->fname,
                    'lname' => $this->lname,
                    'email' => $this->email,
                    "current_team_id" =>  auth()->user()->currentTeam->id,
                    'password' => Hash::make($password),
                    'terms' => 'accepted'
                ]);
                
                Agent::create([
                    'user_id' => $user->id,
                    'team_id' => auth()->user()->currentTeam->id,
                    'country' => $this->country,
                    'occupation' => $this->occupation,
                    'gender' => $this->gender,
                    'id_type' => $this->id_type,
                    'id_number' => $this->id_number,
                    'phone_number' => $this->phone_number
                ]);

                return true;
            } catch (\Throwable $th) {
                return false;
            }
        }else{
            return false;
        }
        
    }

    public function remove($id){
        Agent::where('id', $id)->first()->delete();
    }
}

