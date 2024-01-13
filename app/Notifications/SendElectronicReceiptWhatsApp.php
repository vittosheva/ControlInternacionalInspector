<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use NotificationChannels\WhatsApp\Component;
use NotificationChannels\WhatsApp\WhatsAppChannel;
use NotificationChannels\WhatsApp\WhatsAppTemplate;

class SendElectronicReceiptWhatsApp extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(
        public string $name,
        public string $document_number,
        public string $pdf,
    ) {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return [WhatsAppChannel::class];
    }

    public function toWhatsapp(object $notifiable)
    {
        /*return WhatsAppTemplate::create()
            ->name('hello_world')
            ->language('en_US')
            ->to($notifiable->telephone);*/

        return WhatsAppTemplate::create()
            ->name('envio_comprobantes_electronicos')
            ->language('es')
            ->header(Component::document($this->pdf))
            ->body(Component::text($this->name))
            ->body(Component::text($this->document_number))
            ->to($notifiable->telephone);
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
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
