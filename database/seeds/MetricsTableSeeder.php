<?php

use Illuminate\Database\Seeder;
use App\Metrics;

class MetricsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Metrics::create([
            'views' => 0
        ]);
    }
}
