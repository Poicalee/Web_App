<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_point',
        'end_point',
        'distance',
    ];
    protected $casts = [
        'departure_time' => 'datetime:H:i:s',
        'arrival_time' => 'datetime:H:i:s',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
