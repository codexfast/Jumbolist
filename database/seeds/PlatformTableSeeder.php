<?php

use Illuminate\Database\Seeder;
use App\Platform;

class PlatformTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Platform::create([
            'iframe_youtube' => 'https://www.youtube.com/embed/FWH0crWfUlk?controls=0',
            'app_name' => 'Jumbolist',

            'SMTP_SERVER' => null,
            'SMTP_USER_SERVER' => null,
            'SMTP_PASS_SERVER' => null,
            'SMTP_PORT_SERVER' => null,
            'SMTP_FROM' => null,
            'MAIL_ENCRYPTION' => null
        ]);
    }
}
