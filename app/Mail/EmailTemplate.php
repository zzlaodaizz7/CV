<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailTemplate extends Mailable
{
    use Queueable, SerializesModels;
    public $info;
    public $name;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($info)
    {
        //
        $this->info = $info;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $phr = $this->info['title'];
        return $this->subject($this->info['title'])->view('email.emailtemplate');
    }
}
