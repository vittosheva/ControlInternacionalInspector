<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class TelegramInvitationMail extends Mailable /*implements ShouldQueue*/
{
    use Queueable, SerializesModels;

    public function __construct(public $company = '', public $personaName = '', public $personaEmail = '')
    {
        //
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: __('Telegram invitation company', ['company' => $this->company]),
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.telegram-invitation',
            with: ['personaName' => $this->personaName, 'personaEmail' => $this->personaEmail]
        );
    }

    /**
     * Get the attachments for the message.
     */
    public function attachments(): array
    {
        return [];
    }
}
