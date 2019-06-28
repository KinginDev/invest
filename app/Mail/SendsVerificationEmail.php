<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendsVerificationEmail extends Mailable
{
    use Queueable, SerializesModels;
    
    public $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //dd($this->user);
        return $this->markdown('Frontend.emails.activation')->subject('Thank You For Signing Up With Us Continue Your Account Verification ')->with([
            'name' => $this->user->username,
            'email_token' => $this->user->email_token,
            'level' => 'success',
            'greetings' => "Thanks for registering on our Cryptoinvestments",
            'actionText' => 'Verify Account',
            'salutation' => 'Click on the Link Above to Verify Your Account',
            'introLines' => ['Click on the button to verify accounts'],
        ]);
    }
}
