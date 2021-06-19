<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Foundation\Auth\User;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserRegistered extends Mailable
{
    use Queueable, SerializesModels;

    public $signee;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $signee)
    {
        $this->signee = $signee;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.users.user_registered')
            ->subject('Welcome to Taskapp!');
    }
}
