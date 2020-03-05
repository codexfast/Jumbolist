<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('AboutPageTableSeeder');
        // $this->call('CustomersTableSeeder');
        $this->call('DonateTableSeeder');
        $this->call('MetricsTableSeeder');
        $this->call('PlatformTableSeeder');
        // $this->call('UnitTableSeeder');
        $this->call('AdminTableSeeder');
    }
}
