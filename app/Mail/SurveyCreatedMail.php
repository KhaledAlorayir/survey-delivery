<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SurveyCreatedMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        protected string $surveyUrl,
        protected string $domainName,
    )
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Survey Delivery',
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.survey-created',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
