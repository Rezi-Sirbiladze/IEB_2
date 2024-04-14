<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FairActivity extends Model
{
    use HasFactory;

    protected $fillable = [
        'fair_id',
        'activity_id',
        'capacity',
        'start_time',
        'end_time',
    ];

    public function fair()
    {
        return $this->belongsTo(Fair::class);
    }

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function confirmedBookings()
    {
        return $this->hasMany(Booking::class)->where('status', 'confirmed');
    }


    public function capacityPercentage()
    {
        if ($this->capacity == 0) {
            return 0;
        }
        return $this->confirmedBookings->count() / $this->capacity * 100;
    }
}
