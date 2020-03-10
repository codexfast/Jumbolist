<?php

use Illuminate\Database\Seeder;
use App\Customers;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customers::create([
            'email' => 'customer@email.com',
            'city' => 'São Paulo',
            'state' => 'São Paulo',
            'phone' => '+551211332211'
        ]);
    }
}
