<?php

namespace App\Mail;


use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OpenBlockSubmitted extends Mailable
{
    use Queueable, SerializesModels;

    public $openblock;

    public function __construct($openblock)
    {
        $this->openblock = $openblock;
    }

    public function build()
    {
        return $this->subject('Pengajuan Open Block')
                    ->view('emails.openblock-submitted')
                    ->with(['openblock' => $this->openblock]);
    }
}
