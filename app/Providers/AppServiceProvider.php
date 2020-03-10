<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Admin;
use App\Banner;
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
        // $this->app->bind('path.public', function() {
        //     return base_path().'/{public_folder}';
        // });
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
                'donates'=> Donate::all(),
                'banners' => Banner::all()
            ]);

        } catch (\Throwable $t) {
            echo('[Warning] AppServiceProvider Error');
        }
    }
}
