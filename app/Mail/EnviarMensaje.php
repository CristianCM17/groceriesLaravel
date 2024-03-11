<?php

namespace App\Mail;


use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EnviarMensaje extends Mailable
{
    use Queueable, SerializesModels;


    public $contact;
    /**
     * Create a new message instance.
     */
    public function __construct($contact)
    {
        $this->contact = $contact; // Asignación correcta, sin el signo $
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('20030562@itcelaya.edu.mx','Cristian Cardoso'),
            subject: 'Nuevo Contacto de Groceries',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.contact',
           // with: ['message' => $this->contact->message]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
