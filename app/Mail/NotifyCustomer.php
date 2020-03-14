<?php

namespace App\Mail;

use App\Platform;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class NotifyCustomer extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */


    public $city;
    public $initials;
    public $url;

    public function __construct($city, $initials)
    {
        $this->city = $city;
        $this->initials = $initials;
        $this->url = secure_url('/buscar');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        return $this->from(Platform::first()->SMTP_FROM)->markdown('emails.notify', [
            'app_name' => Platform::first()->app_name,
        ]);
    }
}
