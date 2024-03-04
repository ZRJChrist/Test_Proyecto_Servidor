<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PaymentCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $message_email;
    public $pdfFileName;

    public function __construct($subject, string $message_email, $pdfFileName)
    {
        $this->subject = $subject;
        $this->message_email = $message_email;
        $this->pdfFileName = $pdfFileName;
    }

    public function build()
    {
        return $this->subject($this->subject)
            ->view('emails.payment_created')
            ->attach(storage_path('app/public/' . $this->pdfFileName));
    }
}
