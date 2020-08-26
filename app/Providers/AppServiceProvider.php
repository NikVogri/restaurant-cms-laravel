<?php

namespace App\Providers;

use App\Alert;
use App\Order;
use App\Contact;
use App\Observers\OrderObserver;
use Illuminate\Support\Composer;
use App\Observers\ContactObserver;
use Illuminate\Support\Facades\View;
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
        Order::observe(OrderObserver::class);
        Contact::observe(ContactObserver::class);

        View::composer('*', function ($view) {
            $view->with('alertCount', Alert::count());
        });
    }
}