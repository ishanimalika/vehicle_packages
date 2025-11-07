<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = ['booking_id', 'message', 'is_read'];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
