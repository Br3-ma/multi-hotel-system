<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Traits\RoomTrait;
use Illuminate\Http\Request;

class RoomsController extends Controller
{
    use RoomTrait;

    public function createRoomType(Request $req){
        $data = $this->saveRoomType($req);
        if($data){
            return response()->json([
                'title' => 'New Room Type',
                'message' => 'Room type created successfully.',
                'code' => 'success'
            ]);
        }else{
            return response()->json([
                'title' => 'New Room Type',
                'message' => 'Failed to create room type, check your entries and try again.',
                'code' => 'success'
            ]);
        }
    }

    public function editRoomType(Request $req){
        $data = $this->updateRoomType($req);
        if($data){
            return response()->json([
                'title' => 'Update Room Type',
                'message' => 'Room type updated successfully.',
                'code' => 'success'
            ]);
        }else{
            return response()->json([
                'title' => 'Update Room Type',
                'message' => 'Failed to update room type, check your entries and try again.',
                'code' => 'success'
            ]);
        }
    }

    public function createRoom(Request $req){
        $data = $this->saveRoom($req);
        if($data){
            return response()->json([
                'title' => 'New Room',
                'message' => 'Room type created successfully.',
                'code' => 'success'
            ]);
        }else{
            return response()->json([
                'title' => 'New Room',
                'message' => 'Failed to create room type, check your entries and try again.',
                'code' => 'success'
            ]);
        }
    }

    public function deleteRoomType($id){
        $data = $this->removeRoomType($id);
        if($data){
            return redirect()->route('manage-room-types')->with('success', 'Room Type Removed!');
        }else{
            return redirect()->route('manage-room-types')->with('error', 'Can not remove room type!');
        }
    }
}
