<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'guests_id',
        'bookings_id',
        'team_id',
        'recorded_by',
        'payment_date',
        'payment_amount',
        'payment_method',
        'payment_status',
        'refund_amount',
        'refund_date',
        'comments'
    ];

    public function guests(){
        return $this->belongsTo(Guest::class, 'guests_id');
    }

    public function bookings(){
        return $this->belongsTo(Booking::class, 'bookings_id');
    }

    public function staff(){
        return $this->belongsTo(User::class, 'recorded_by');
    }
}
