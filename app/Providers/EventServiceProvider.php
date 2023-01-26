<?php

namespace App\Providers;

use App\Events\PasswordReset;
use App\Events\SendUserNotification;
use App\Events\TicketSended;
use App\Listeners\SendPasswordResetEmail;
use App\Listeners\SendUserCreatedTicket;
use App\Listeners\TicketIssended;
use App\Notifications\OperatorsNotification;
use App\Observers\TicketObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        'Illuminate\Auth\Events\Login' => [
            'App\Listeners\LogSuccessfulLogin',
            ],
        TicketSended::class =>[
            OperatorsNotification::class
        ],
        PasswordReset::class => [
            SendPasswordResetEmail::class,
        ]

    ];


    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
