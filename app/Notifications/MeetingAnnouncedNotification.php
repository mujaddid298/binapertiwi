<?php

namespace App\Notifications;

use App\Models\Meeting; // Impor model Meeting
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MeetingAnnouncedNotification extends Notification
{
    use Queueable;

    public $meeting;

    public function __construct(Meeting $meeting)
    {
        $this->meeting = $meeting;
    }

    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('Jadwal meeting baru telah diumumkan.')
                    ->action('Lihat Jadwal', url('/meetings'))
                    ->line('Terima kasih telah menggunakan sistem kami!');
    }

    public function toDatabase($notifiable)
    {
        return [
            'title' => $this->meeting->title,
            'date' => $this->meeting->date,
            'description' => $this->meeting->description,
        ];
    }
}