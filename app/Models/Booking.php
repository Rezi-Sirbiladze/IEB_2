<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'fair_activity_id',
        'presented',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function fairActivity()
    {
        return $this->belongsTo(FairActivity::class);
    }

    public function review()
    {
        return $this->hasOne(Review::class);
    }
}
