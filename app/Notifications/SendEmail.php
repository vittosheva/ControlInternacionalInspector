<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendEmail extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public ?string $xml = null, public ?string $pdf = null)
    {
        //$this->onConnection('emails');
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $message = (new MailMessage)
            ->greeting('Hello!')
            ->line('The introduction to the notification.')
            ->line('Thank you for using our application!');

        if (! empty($this->xml)) {
            $message->attach($this->xml, [
                'as' => 'filename.xml',
                'mime' => 'application/xml',
            ]);
        }

        if (! empty($this->pdf)) {
            $message->attach($this->pdf, [
                'as' => 'filename.pdf',
                'mime' => 'application/pdf',
            ]);
        }

        return $message;
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
