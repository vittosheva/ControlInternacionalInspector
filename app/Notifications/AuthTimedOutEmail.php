<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AuthTimedOutEmail extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct()
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
        $company = config('app.name');
        $time = config('auth-timeout.timeout');

        return (new MailMessage)
            ->subject($company.': Sesión caducada')
            ->line('Su sesión en '.$company.' ha caducado debido a una inactividad de '.$time.' minutos.')
            ->line('Por razones de seguridad, las sesiones se cierran después ese tiempo.')
            ->line('Si deseas seguir utilizando '.$company.', usa este link:')
            ->action('Iniciar sesión', filament()->getCurrentPanel()->getLoginUrl())
            ->line('Recuerda cerrar sesión cuando hayas terminado, especialmente en dispositivos compartidos.');
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
