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

    public $unit;
    public $city;
    public $initials;
    public $url;

    public function __construct($unit, $city, $initials)
    {
        $this->unit = $unit;
        $this->city = $city;
        $this->initials = $initials;
        $this->url = url('/buscar');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        return $this->from('codexfast@gmail.com')->markdown('emails.notify', [
            'app_name' => Platform::first()->app_name,
        ]);
    }
}
