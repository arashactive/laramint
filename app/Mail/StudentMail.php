<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class StudentMail extends Mailable
{
    use Queueable, SerializesModels;
    
    public $mailData;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mailData)
    {
        //
        $this->mailData = $mailData;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        $mail_subject = $this->mailData['subject'] ? $this->mailData['subject'] : 'Welcome to ICET, Agra';
        return new Envelope(
            subject: $mail_subject,
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'emails.Student.studentMail'
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
    
     public function build()
    {
        return $this->subject('Mail from ICET Agra')
                    ->view('emails.Student.registerMail');
    }
}
