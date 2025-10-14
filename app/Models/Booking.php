<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'pickup_location',
        'dropoff_location',
        'pickup_date',
        'pickup_time',
        'vehicle_id',
        'package_id',
        'notes',
        'status',
    ];

    // Relations
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
