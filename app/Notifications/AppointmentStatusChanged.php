<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AppointmentStatusChanged extends Notification
{
    use Queueable;

    protected $appointment;

    public function __construct($appointment)
    {
        $this->appointment = $appointment;
    }

    public function via($notifiable)
    {
        return ['database']; // guardarla en BD
    }

    public function toDatabase($notifiable)
    {
        return [
            'message' => 'El estado de tu cita cambió a: ' . $this->appointment->status,
            'appointment_id' => $this->appointment->id,
        ];
    }
}
