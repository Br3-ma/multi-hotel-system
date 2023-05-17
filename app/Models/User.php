<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'fname', 
        'lname', 
        'team_id',
        'email', 
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public static function lastCheckInDate($id){
        $data = Booking::orderByDesc('created_at')
                        ->where('guests_id', $id)->first();
        return $data->checkin_date ?? 'None';
    }

    public static function lastCheckOutDate($id){
        $data = Booking::orderByDesc('created_at')
                        ->where('guests_id', $id)->first();
        return $data->checkout_date ?? 'None';
    }

    public static function fullNames($id){
        $data = User::where('id', $id)->first();
        return $data->fname.' '.$data->lname;
    }

    public static function myEmail($id){
        $data = User::where('id', $id)->first();
        return $data->email;
    }
    
    public function rooms(){
        return $this->hasMany(Room::class);
    }
    
    public function payments(){
        return $this->hasMany(Payment::class);
    }
    
    public function agents(){
        return $this->hasOne(Agent::class);
    }
    
    public function guests(){
        return $this->hasOne(Guest::class);
    }
    
    public function reservations(){
        return $this->hasMany(Reservation::class);
    }
    
    public function bookings(){
        return $this->hasMany(Booking::class);
    }
    
    public function room_types(){
        return $this->hasMany(RoomType::class);
    }
}
