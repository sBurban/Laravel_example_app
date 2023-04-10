<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class VideogameMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Videogame Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {

        $nombre = "ContentTest";

        return new Content(
            // view: 'view.name',
            view: 'mails.videogame',
            // text:'mails.videogame_raw', //We can set a different template for plain-text
            with: [
                'nombre' => $nombre,
                // 'orderName' => $this->order->name,
                // 'orderPrice' => $this->order->price,
            ],
        );
    }

    /**
     * METODO DEL TUTORIAL
     * Build the message
     *
     * @return $this
     */
    // public function build(){
    //     $nombre = "El rincon de isma";
    //     return $this->view('mails.videogame',['nombre'=>$nombre]);
    // }

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
