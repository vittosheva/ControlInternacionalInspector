<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Attachment;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Str;

class SendPdfXmlMail extends Mailable /*implements ShouldQueue*/
{
    use Queueable, SerializesModels;

    public function __construct(private $content, public ?string $pdfFile = null, public ?string $xmlFile = null)
    {
        //
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Envío de correo electrónico',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.empty',
            with: ['content' => $this->content],
            htmlString: $this->content,
        );
    }

    /**
     * Get the attachments for the message.
     */
    public function attachments(): array
    {
        $attachments = [];

        if (! empty($this->pdfFile)) {
            $attachments[] = Attachment::fromStorageDisk('pdfs', $this->pdfFile)
                ->as(Str::of($this->pdfFile)->explode('/')->last())
                ->withMime('application/pdf');
        }

        if (! empty($this->xmlFile)) {
            $attachments[] = Attachment::fromStorageDisk('xmls_autorizados', $this->xmlFile)
                ->as(Str::of($this->xmlFile)->explode('/')->last())
                ->withMime('application/xml');
        }

        return $attachments;
    }
}
