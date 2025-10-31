<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Booking;

class NewBookingNotification extends Notification
{
    use Queueable;

    protected $booking;

    public function __construct(Booking $booking)
    {
        $this->booking = $booking;
    }

    public function via($notifiable)
    {
        return ['mail', 'database']; // sends email + saves to DB
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('New Booking Received')
                    ->greeting('Hello Admin!')
                    ->line('A new booking has been submitted.')
                    ->line('Name: ' . $this->booking->name)
                    ->line('Phone: ' . $this->booking->phone)
                    ->line('Pickup Date: ' . $this->booking->pickup_date)
                    ->action('View Booking', url('/admin/bookings'))
                    ->line('Thank you for using GAGANA Tours!');
    }

    public function toArray($notifiable)
    {
        return [
            'booking_id' => $this->booking->id,
            'name' => $this->booking->name,
            'phone' => $this->booking->phone,
            'pickup_date' => $this->booking->pickup_date,
        ];
    }
}
