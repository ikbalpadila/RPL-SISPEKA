<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BehaviorNoteNotification extends Notification
{
        use Queueable;

        public $behavior;

        public function __construct($behavior)
        {
            $this->behavior = $behavior;
        }

        public function via($notifiable)
        {
            return ['mail'];
        }

        public function toMail($notifiable)
        {
            return (new MailMessage)
                ->subject('Catatan Perilaku Siswa')
                ->greeting('Assalamu’alaikum')
                ->line('Terdapat catatan perilaku baru untuk anak Anda.')
                ->line('Nama Siswa: ' . $this->behavior->siswa->nama)
                ->line('Jenis: ' . ucfirst($this->behavior->jenis))
                ->line('Catatan:')
                ->line($this->behavior->catatan)
                ->line('Tanggal: ' . $this->behavior->tanggal)
                ->salutation('Hormat kami, SISPEKA');
        }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
