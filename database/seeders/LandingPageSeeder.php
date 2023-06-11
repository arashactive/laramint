<?php

namespace Database\Seeders;

use App\Models\LandingPages;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LandingPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\LandingPages::factory()->create([
            'landing_page_for' => 'Free 0 Level Program 2023-24',
            'landing_page_title' => 'Free 0 Level Program 2023-24',
            'landing_page_url' => 'free-o-level-2023-24',
            'landing_page_start_date' => now(),
            'landing_page_end_date' => date('2023-06-25 23:59:59'),
            'status' => 1
        ]);
    }
}
