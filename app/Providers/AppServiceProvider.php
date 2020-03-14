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
        // Platform::first()->

        
        try {
            $p= Platform::first();
    
            config([
                'mail.host' => $p->SMTP_SERVER,
                'mail.port' => $p->SMTP_PORT_SERVER,
                'mail.username' => $p->SMTP_USER_SERVER,
                'mail.password' => $p->SMTP_PASS_SERVER,
                'mail.encryption' => $p->MAIL_ENCRYPTION,
                'mail.from.address' => $p->SMTP_FROM,
                'mail.from.name' => $p->app_name,
                'app.name' => $p->app_name
            ]);

            View::share([
                'uri' => request_path(),
                'app_name' => Platform::first()->app_name,
                'email' => Admin::first()->email,
                'donates'=> Donate::all(),
                'banners' => Banner::all()
            ]);

        } catch (\Throwable $t) {
            echo('[Warning] AppServiceProvider Error\r\n');
        }
    }
}
