<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class sendmail extends Mailable
{
    use Queueable, SerializesModels;

    public $subjet = 'Added Contact';
    public $msg;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    

    public function __construct($msg)
    {
       $this->msg = $msg;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->html($this->msg)
                    ->subject($this->subjet);
    }
}
