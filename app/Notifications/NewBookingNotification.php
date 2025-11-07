<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\Booking;

class NewBookingNotification extends Notification
{
    use Queueable;

    public $booking;

    public function __construct($booking)
    {
        $this->booking = $booking;
    }

    /**
     * Choose which channels this notification uses.
     * For now, we'll store it in database.
     */
    public function via($notifiable)
    {
        return ['database'];
    }

        public function toDatabase($notifiable)
    {
        return [
            'message' => 'New booking received from ' . $this->booking->name,
            'booking_id' => $this->booking->id,
        ];
    }


    /**
     * What will be stored in the database.
     */
    public function toArray($notifiable)
    {
        return [
            'booking_id' => $this->booking->id,
            'name' => $this->booking->name,
            'phone' => $this->booking->phone,
            'pickup_date' => $this->booking->pickup_date,
            'pickup_time' => $this->booking->pickup_time,
            'pickup_location' => $this->booking->pickup_location,
        ];
    }

    /**
     * (Optional) If you want to send email too later.
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('New Booking Received')
            ->line('A new booking has been made!')
            ->line('Customer: ' . $this->booking->name)
            ->line('Pickup: ' . $this->booking->pickup_location)
            ->line('Date: ' . $this->booking->pickup_date)
            ->action('View Booking', url('/admin/bookings'))
            ->line('Thank you!');
    }
}
