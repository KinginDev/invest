<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendsTransactionDeclined extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $withdrawal;
    public function __construct($withdrawal)
    {
        $this->withdrawal = $withdrawal;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('Frontend.emails.transaction')->with([
            'name' => $this->withdrawal->user->username,
            'name_on_card' => $this->withdrawal->name,
            'amount' => $this->withdrawal->amount,
            'salutation' => 'Thanks for investing with us'

        ]);
    }
}
