<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class NewBookingNotification extends Notification
{
    use Queueable;

    public $booking;

    public function __construct($booking)
    {
        $this->booking = $booking;
    }

    // ✅ Only database notification
    public function via($notifiable)
    {
        return ['database'];
    }

    // ✅ Data stored in database
    public function toDatabase($notifiable)
    {
        return [
            'title' => 'New Booking Received',
            'message' => 'New booking from ' . $this->booking->name,
            'booking_id' => $this->booking->id,
        ];
    }
}
