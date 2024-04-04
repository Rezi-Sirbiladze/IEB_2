<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FairActivity extends Model
{
    use HasFactory;

    protected $fillable = [
        'fair',
        'activity',
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
}
