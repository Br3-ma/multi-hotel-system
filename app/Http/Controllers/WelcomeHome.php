<?php

namespace App\Http\Controllers;

use App\Models\RoomType;
use Illuminate\Http\Request;

class WelcomeHome extends Controller
{
    
    public function index(){
        $room_types = RoomType::get();
        
        return view('welcome',[
            'room_types' => $room_types
        ]);
    }
}
