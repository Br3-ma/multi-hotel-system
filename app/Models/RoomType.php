<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'added_by',
        'team_id',
        'description',
        'size',
        'price', 
        'bed_type',
        'num_beds',
        'per',
        'cover',
        'comments'
    ];

    public function users(){
        return $this->belongsTo(User::class, 'added_by');
    }

    public function rooms(){
        return $this->hasMany(Room::class);
    }
}
