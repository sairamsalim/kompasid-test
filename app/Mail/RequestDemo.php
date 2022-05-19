<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class RequestDemo extends Mailable
{
    use Queueable, SerializesModels;
    public $name;
    public $email;
    public $phone;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email, $name, $phone)
    {
        $this->email = $email;
        $this->name = $name;
        $this->phone = $phone;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(){
        return $this->from('info@ahlee.id', 'Ahlee.id')
            ->subject('Institution Request Demo')
            ->markdown('Email.request-demo')->with([
                'email' => $this->email,
                'name' => $this->name,
                'phone' => $this->phone,
            ]);
    }
}
