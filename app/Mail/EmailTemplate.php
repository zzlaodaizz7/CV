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
        $needrpl = array(':name:',':email:',':birthday:',':job:',':birthday:',':phone:',':exp:',':description:',':salary:',':source:');
        $rpl = array($this->info['name'],$this->info['email'],$this->info['birthday'],$this->info['job'],$this->info['birthday'],$this->info['phone'],$this->info['exp'],$this->info['description'],$this->info['salary'],$this->info['source']);
        $result = str_replace($needrpl,$rpl,$phr);
        return $this->subject($result)->view('email.emailtemplate');
    }
}
