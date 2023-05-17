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
        $this->fname = $this->user->fname; 
        $this->lname = $this->user->lname;
        $this->email = $this->user->email; 
        
        if ($this->user->guests === null){
            $this->country = $this->user->agents->country; 
            $this->phone_number = $this->user->agents->phone_number; 
            $this->gender = $this->user->agents->gender; 
            $this->occupation = $this->user->agents->occupation;
            $this->id_type = $this->user->agents->id_type; 
            $this->id_number = $this->user->agents->id_number;
            $this->id_number = $this->user->agents->id_number;
        }else{
            $this->country = $this->user->guests->country; 
            $this->phone_number = $this->user->guests->phone_number; 
            $this->gender = $this->user->guests->gender; 
            $this->occupation = $this->user->guests->occupation;
            $this->id_type = $this->user->guests->id_type; 
            $this->id_number = $this->user->guests->id_number;
            $this->id_number = $this->user->guests->id_number;
        }
    }

    public function render()
    {
        return view('livewire.dashboard.edit-user-view');
    }

    public function updateUser(){
        try {
            $check = User::where('id', $this->user->id)->first();
            $agent = Agent::where('user_id', $this->user->id)->first();
            if($check !== null){
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
                    session()->flash('success', 'User updated successfully.');
            }else{  
                session()->flash('error', 'User with this email already exists.');
            }
        } catch (\Throwable $th) {
            session()->flash('error', 'User with this email already exists.');
        }
    }
}
