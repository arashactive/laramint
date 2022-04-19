<?php

namespace Database\Seeders;

use App\Models\Quiz;
use App\Models\Session;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuizSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for ($counter = 1; $counter <= 7; $counter++) {
            \App\Models\Quiz::factory()->create([
                'title' => 'Quiz #' . $counter,
                'attempt' => 3,
                'duration' => 0,
                'is_mentor' => 0,
                'is_shuffle' => 1,
                'min_pass_score' => 80,
                'show_question' => 'StepByStep',
                'random_question' => 0
            ]);
        }



        $sessions = Session::all();
        $number = 1;
        $totalQuiz = Quiz::count();
        foreach ($sessions as $session) {
            for ($counter = 1; $counter <= 3; $counter++) {
                $session->Quizes()->attach(
                    Quiz::findorfail($number),
                    ['order' => $session->Sessionable()->max('order') + 1]
                );
                $number++;

                if ($number > $totalQuiz)
                    $number = 1;
            }
        }
    }
}
