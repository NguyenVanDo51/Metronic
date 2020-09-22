<?php

namespace App\Providers;

use App\Billing\PaymentGateway;
use App\Computer;
use App\Http\View\Composers\TestComposer;
use App\Monitor;
use App\MyClass;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Keyboard;

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
        $this->app->singleton('my-class', function () {
            return new MyClass(rand());
        });

        $this->app->bind('computer', function () {
            $monitor = new Monitor();
            $keyboard = new Keyboard();
            return new Computer($monitor, $keyboard);
        });

        $this->app->bind(PaymentGateway::class, function ($app) {
           return new PaymentGateway('usd');
        });

//        View::share('channels', ['channel 1', 'channel 2', 'channel 3']);
//        View::composer(['Test.channel', 'Test.channel2'], function ($view) {
//           $view->with('channels', ['channel 1', 'channel 2', 'channel 3']);
//        });

        View::composer(['Test.*'], TestComposer::class);
    }
}
