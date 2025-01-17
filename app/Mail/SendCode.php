<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendCode extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $confirmation_code;


    public function __construct($name, $confirmation_code)
    {
        $this->name = $name;
        $this->confirmation_code = $confirmation_code;
    }


    public function build()
    {
        return $this->subject('Tasdiqlash Kodingiz')
                    ->view('emails.send_code')
                    ->with([
                        'name' => $this->name,
                        'confirmation_code' => $this->confirmation_code,
                    ]);
    }
}
