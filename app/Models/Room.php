<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $fillable = [
        'room_number',
        'room_types_id',
        'team_id',
        'modified_by',
        'num_adult',
        'num_children',
        'bed_type',
        'occupancy',
        'floor',
        'special_offers',
        'num_beds',
        'is_available',
        'image_path',
        'price'
    ];

    public function staff(){
        return $this->belongsTo(RoomType::class, 'modified_by');
    }

    public function room_types(){
        return $this->belongsTo(RoomType::class, 'room_types_id');
    }

    public function bookings(){
        return $this->hasMany(Booking::class);
    }

    // public function reservation(){
    //     return $this->hasMany(Reservation::class);
    // }

    public function reservation(){
        return $this->hasMany(ReservationList::class);
    }
}
