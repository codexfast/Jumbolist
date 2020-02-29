<?php

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Admin;

class AdminSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::insert([
            'name' => 'Admin',
            'email' => 'admin@email.com',
            'password' => Hash::make('1234'),
        ]);
    }
}
