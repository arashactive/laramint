<?php

namespace Database\Seeders;

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
        $this->call([
            PermissionsSeeder::class,

            DepartmentSeed::class,
            CourseSeed::class,
            TermSeed::class,
            SessionSeed::class,

            DocumentSeed::class,
            RubricSeed::class,

            QuestionType::class,

            QuizSeed::class,
            QuestionSeed::class,
            
            // EducationSeeder::class,
            ParticipantSeeder::class,
            PlanSeeder::class,
            ConfigurationSeed::class,
            BadgeSeeder::class,
        ]);
    }
}
