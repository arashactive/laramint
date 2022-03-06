<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SessionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        #1 Session Adult
        \App\Models\Session::factory()->create([
            'title' => 'adults | session #1',
        ]);

        #2 Session Adult
        \App\Models\Session::factory()->create([
            'title' => 'adults | session #2',
        ]);

        #3 Session Adult
        \App\Models\Session::factory()->create([
            'title' => 'adults | session #3',
        ]);

        #4 Session Adult
        \App\Models\Session::factory()->create([
            'title' => 'adults | session #4',
        ]);

         # Teenage
         #5 Session Teenage
         \App\Models\Session::factory()->create([
            'title' => 'Kids | session #1',
        ]);

        #6 Session Teenage
        \App\Models\Session::factory()->create([
            'title' => 'Kids | session #2',
        ]);

        #7 Session Teenage
        \App\Models\Session::factory()->create([
            'title' => 'Kids | session #3',
        ]);

        #8 Session Teenage
        \App\Models\Session::factory()->create([
            'title' => 'Kids | session #4',
        ]);

        # kids
        #9 Session Kids
        \App\Models\Session::factory()->create([
            'title' => 'Kids | session #1',
        ]);

        #10 Session Kids
        \App\Models\Session::factory()->create([
            'title' => 'Kids | session #2',
        ]);

        #11 Session Kids
        \App\Models\Session::factory()->create([
            'title' => 'Kids | session #3',
        ]);

        #12 Session Kids
        \App\Models\Session::factory()->create([
            'title' => 'Kids | session #4',
        ]);
    }
}
