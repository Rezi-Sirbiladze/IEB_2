<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
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
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function pendingBookings()
    {
        return $this->bookings()->select('bookings.*')
            ->where('status', 'pending')
            ->join('fair_activities', 'bookings.fair_activity_id', '=', 'fair_activities.id')
            ->orderBy('fair_activities.start_time', 'ASC');
    }

    public function confirmedBookings()
    {
        return $this->bookings()->select('bookings.*')
            ->where('status', 'confirmed')
            ->join('fair_activities', 'bookings.fair_activity_id', '=', 'fair_activities.id')
            ->orderBy('fair_activities.start_time', 'ASC');
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function getFirstname()
    {
        return explode(' ', $this->name)[0];
    }

    public function mediaVideo()
    {
        return MediaLinks::where('media_type', 'indexVideo')->first();
    }

    public function mediaMap()
    {
        return MediaLinks::where('media_type', 'map')->first();
    }

    public function mediaMapLeg()
    {
        return MediaLinks::where('media_type', 'mapLeg')->first();
    }
}
