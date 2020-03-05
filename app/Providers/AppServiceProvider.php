<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Admin;
use App\Donate;
use App\Platform;

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
        try {

            View::share([
                'uri' => request_path(),
                'app_name' => Platform::first()->app_name,
                'email' => Admin::first()->email,
                'donates'=> Donate::all()
            ]);

        } catch (\Throwable $t) {
            echo('[Warning] AppServiceProvider Error');
        }
    }
}
