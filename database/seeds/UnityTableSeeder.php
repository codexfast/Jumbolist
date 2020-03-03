<?php

use Illuminate\Database\Seeder;
use App\Unity;

class UnityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Unity::create([
            'initials' => 'SP',
            'city' => 'Santa Branca',
            'unity' => 'Unidade Qualquer',
            'list' => null,
        ]);
    }
}
