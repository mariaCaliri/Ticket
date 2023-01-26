<?php

namespace App\Listeners;

use App\Events\PasswordReset;
use Illuminate\Support\Facades\Mail;

class SendPasswordResetEmail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\PasswordReset  $event
     * @return void
     */
    public function handle(PasswordReset $event)
    {
        $user = $event->user;
        Mail::to($user)->send(new PasswordResetEmail($user));
    }
}
