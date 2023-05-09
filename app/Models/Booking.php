<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = [
        'guests_id',
        'rooms_id',
        'team_id',
        'reservations_id',
        'user_id',
        'booking_code',
        'checkin_date',
        'checkout_date',
        'num_adults',
        'num_children',
        'booking_date',
        'total_price',
        'payment_status',
        'booking_status'
    ];

    public function users(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function reservations(){
        return $this->belongsTo(Reservation::class, 'reservations_id');
    }

    public function guests(){
        return $this->belongsTo(Guest::class, 'guests_id');
    }

    public function room(){
        return $this->belongsTo(Room::class, 'rooms_id');
    }

    public function payments(){
        return $this->hasMany(Payment::class);
    }
}
