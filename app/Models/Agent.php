<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'team_id',
        'added_by',
        'phone_number',
        'level',
        'gender',
        'id_type',
        'id_number',
        'address',
        'city',
        'state',
        'country',
        'postal_code',
        'age_group',
        'occupation',
        'ethinicity',
        'gender',
        'comments'
    ];
    // protected $appends = [
    //     'full_name'
    // ];

    // public function getFullNameAttribute(){
    //     $data = User::where('id', $this->added_by)->first();
    //     return $data->fname.' '.$data->lname;
    // }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function added_by(){
        return $this->belongsTo(User::class, 'added_by');
    }

    public function bookings(){
        return $this->hasMany(Booking::class);
    }
}
