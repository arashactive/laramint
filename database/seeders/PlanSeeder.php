<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Plan::factory()->create([
            'title' => '1 month',
            'validDaysForUse' => '31',
            'price' => '25',
            'discount' => '0'
        ]);

        \App\Models\Plan::factory()->create([
            'title' => '3 month',
            'validDaysForUse' => '90',
            'price' => '68',
            'discount' => '0'
        ]);

        \App\Models\Plan::factory()->create([
            'title' => '6 month',
            'validDaysForUse' => '180',
            'price' => '135',
            'discount' => '0'
        ]);


        \App\Models\Plan::factory()->create([
            'title' => '1 year',
            'validDaysForUse' => '360',
            'price' => '280',
            'discount' => '10'
        ]);
    }
}
