<?php

namespace Database\Seeders;

use App\Models\QuestionType as ModelsQuestionType;
use Illuminate\Database\Seeder;

class QuestionType extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ModelsQuestionType::create([
            'title' => 'TestQuestion',
            'icon' => '',
            'is_mentor' => false
        ]);

        ModelsQuestionType::create([
            'title' => 'TrueFalseQuestion',
            'icon' => '',
            'is_mentor' => false
        ]);

        ModelsQuestionType::create([
            'title' => 'MultipleQuestion',
            'icon' => '',
            'is_mentor' => false
        ]);

        ModelsQuestionType::create([
            'title' => 'EssayQuestion',
            'icon' => '',
            'is_mentor' => true
        ]);


        ModelsQuestionType::create([
            'title' => 'UploadFileQuestion',
            'icon' => '',
            'is_mentor' => true
        ]);

        ModelsQuestionType::create([
            'title' => 'ShortAnswerQuestion',
            'icon' => '',
            'is_mentor' => true
        ]);

        
        ModelsQuestionType::create([
            'title' => 'MatchingCaseQuestion',
            'icon' => '',
            'is_mentor' => false
        ]);


        ModelsQuestionType::create([
            'title' => 'VoiceRecordQuestion',
            'icon' => '',
            'is_mentor' => true
        ]);
    }
}
