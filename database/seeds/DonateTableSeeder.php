<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

use App\Donate;

class DonateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Donate::insert([
            'link' => "https://www.mercadopago.com.br/checkout/v1/redirect?pref_id=226082136-f48d5809-6170-4944-9c4a-5fafba9e3a03",
            'amount' => "10.00",
            'created_at' =>Carbon:: now()-> format('Y-m-d H:i:s'),
            'updated_at' =>Carbon:: now()-> format('Y-m-d H:i:s'),
        ]);
    }
}
