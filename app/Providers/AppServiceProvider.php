<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Chat;
use App\Models\Operator;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       $tickets = Ticket::all();
      view()->share('tickets', $tickets);

        $categories = Category::all();
        view()->share('categories', $categories);

        $users = User::all();
        view()->share('users', $users);

        $operators =Operator::all();
        view()->share('operators', $operators);
    }

}
