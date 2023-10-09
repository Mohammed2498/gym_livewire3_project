<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('settings')->insert([
            'body_building_male_price' => '20.00',
            'fitness_male_price' => '20.00',
            'body_building_female_price' => '30.00',
            'fitness_female_price' => '30.00'
        ]);
    }
}
