<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class LoginEmailNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $loginNotification, $name, $loginDate, $deviceInfo;

    /**
     * Create a new message instance.
     */
    public function __construct($loginNotification, $name, $loginDate, $deviceInfo)
    {
        $this->loginNotification = $loginNotification;
        $this->name = $name;
        $this->loginDate = $loginDate;
        $this->deviceInfo = $deviceInfo;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Login Notification',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mails.loginEmailNotification',
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
