<?php

use Illuminate\Database\Seeder;
use App\Unit;

class UnitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Unit::create([
            'initials' => 'SP',
            'city' => 'Santa Branca',
            'unit' => 'Unidade Qualquer',
            'list' => null,
            'pendent' => true
        ]);
    }
}
