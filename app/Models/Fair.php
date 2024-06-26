<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fair extends Model
{
    use HasFactory;

    protected $fillable = [
        'active',
        'name',
        'description',
        'date',
        'image_path',
    ];

    public function fairActivities()
    {
        return $this->hasMany(FairActivity::class);
    }

    public function confirmedBookings()
    {
        return $this->hasManyThrough(Booking::class, FairActivity::class)->where('status', 'confirmed');
    }
}
