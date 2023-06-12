<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MyTestMail extends Mailable
{
    use Queueable, SerializesModels;

    public $details;
    /**
     * Create a new message instance.
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Obtenga el sobre del mensaje.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            // from: 'adrian.coronel@tecsup.edu.pe',
            // to:'adrianonel78@gmail.com',
            subject: 'My Test Mail',
            
        );
    }

    /**
     * Obtenga la definición del contenido del mensaje.
     */
    // public function content(): Content
    // {
    //     return new Content(
    //         view: 'emails.my-test-mail',
    //     );
    // }


    public function build()
    {
        #esta vista se construirá en el cuerpo del correo electrónico
        return $this -> view('emails.my-test-mail');
    }

    /**
     * Obtenga los archivos adjuntos para el mensaje.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
