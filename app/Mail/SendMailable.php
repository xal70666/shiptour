<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMailable extends Mailable
{
    use Queueable, SerializesModels;
    public $name;
    public $no_rek;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $no_rek)
    {
        $this->name = $name;
        $this->no_rek = $no_rek;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('payment');
    }
}
