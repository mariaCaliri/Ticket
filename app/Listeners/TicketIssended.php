<?php

namespace App\Listeners;

use App\Events\TicketSended;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class TicketIssended
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
     * @param  object  $event
     * @return void
     */
    public function handle( TicketSended $event)
    {
        User::where('id', $event->ticket['title']->id)->get()
           ->each(function ($user) use ($event){
               $user->notify(new  TicketIsSendedNotification($event->ticket));
            });
    }
}
