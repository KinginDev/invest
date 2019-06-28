<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendsWithdrawalsEmails extends Mailable
{
    use Queueable, SerializesModels;
    protected $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($emailData)
    {
        $this->data = $emailData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('There has been an action in your account')->markdown('Frontend.emails.withdrawal')->with([
            'name' => $this->data['user_name'],
            'amount' => $this->data['amount'],
            'posted_at' => $this->data['posted_at'],
            'trans_ref' => $this->data['trans_ref'],
            'introLine' => 'Withdrawal Notification',
            'salutation' => 'Thanks for investing with Cryptoinvestments'
        ]);
    }
}
