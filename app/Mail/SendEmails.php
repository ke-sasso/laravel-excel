<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEmails extends Mailable
{
    use Queueable, SerializesModels;
    public $parametros;
    public $subject;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($parametros, $subject)
    {
   
        $this->view = 'emails.sendemails';
        $this->parametros = $parametros;
        $this->subject = $subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $parametros = $this->parametros;
        return $this->markdown($this->view ,compact('parametros'))->subject($this->subject);
    }
}
