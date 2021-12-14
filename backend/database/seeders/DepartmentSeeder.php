<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->insert([
            'name' => "Adult Department",
            'description' => "Adult Department is supported range 18 to dead.",
        ]);

        DB::table('departments')->insert([
            'name' => "Kids Department",
            'description' => "Kids Department is supported range below 12 years old.",
        ]);

        DB::table('departments')->insert([
            'name' => "Teenage Department",
            'description' => "Kids Department is supported range 12 to 18 years old.",
        ]);
    }
}
