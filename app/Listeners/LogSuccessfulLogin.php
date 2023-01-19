<?php

namespace App\Listeners;

use App\Models\LogActivity;
use Carbon\Carbon;
use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;

class LogSuccessfulLogin
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
     * @param  \Illuminate\Auth\Events\Login  $event
     * @return void
     */
    public function handle(Login $event)
    {

        LogActivity::create([
           'name' => $event->user->name,
            'email'=> $event->user->email,
            'user_id' =>$event->user->id,
        ]);



    }
}
