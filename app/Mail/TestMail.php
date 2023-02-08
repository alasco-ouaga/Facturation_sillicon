<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Session;

class TestMail extends Mailable
{
    use Queueable, SerializesModels;
    public $data = [];

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Array $data)
    {
        $this->data=$data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */

    
    public function build()
    {

        $email_structure = Session::get('email_structure');
        return $this->view('email.send-email')
                    ->subject('Reception de recepissé de paiement') 
                    ->from($email_structure)
                    ->with('data',$this->data);
    }
}
