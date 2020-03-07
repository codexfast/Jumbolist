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

            'SMTP_SERVER' => 'smtp.gmail.com',
            'SMTP_USER_SERVER' => 'email@gmail.com',
            'SMTP_PASS_SERVER' => '1234',
            'SMTP_PORT_SERVER' => '587',
            'SMTP_FROM' => 'email@gmail.com',
            'MAIL_ENCRYPTION' => 'tls'
        ]);
    }
}
