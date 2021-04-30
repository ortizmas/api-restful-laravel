<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        $this->call(StateTableSeeder::class);
        $this->call(CityTableSeeder::class);
        \App\Models\User::factory(50)->create();
        \App\Models\Address::factory(50)->create();
    }
}
