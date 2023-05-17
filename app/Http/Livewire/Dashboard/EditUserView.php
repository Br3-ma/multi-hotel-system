<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Agent;
use App\Models\User;
use Livewire\Component;

class EditUserView extends Component
{
    public $user;
    public $country, $fname, $lname,$email, $phone_number, $gender, $occupation, $id_type, $id_number, $user_type;

    public function mount($id){
        $this->user = User::where('id', $id)->with('guests')->with('agents')->first();
    }

    public function render()
    {
        return view('livewire.dashboard.edit-user-view');
    }

    public function updateUser(){
        $check = User::where('id', $this->user->id)->first();
        $agent = Agent::where('user_id', $this->user->id)->first();
        if($check == null){
            try {
                $check->fname = $this->fname;
                $check->lname = $this->lname;
                $check->email = $this->email;
                $check->save();
                
                $agent->country = $this->country;
                $agent->occupation = $this->occupation;
                $agent->gender = $this->gender;
                $agent->id_type = $this->id_type;
                $agent->id_number = $this->id_number;
                $agent->phone_number = $this->phone_number;
                $agent->save();
                
                return true;
            } catch (\Throwable $th) {
                return false;
            }
        }else{
            return false;
        }
    }
}
