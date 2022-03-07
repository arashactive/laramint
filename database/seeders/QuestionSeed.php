<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class QuestionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $question = \App\Models\Question::factory()->create([
            'title' => 'Question #1',
            'question_body' => 'Would you mind ______ the window?',
            'question_type_id' => '1',
            'answer' => json_encode([
                "answers" => [
                    "closing",
                    "close",
                    "to close",
                    "closed"
                ],
                "correctAnswer" => "1"
            ])
        ]);


        $question = \App\Models\Question::factory()->create([
            'title' => 'Question #2',
            'question_body' => 'I come ______ England',
            'question_type_id' => '1',
            'answer' => json_encode([
                "answers" => [
                    "from",
                    "at",
                    "to",
                    "beyond"
                ],
                "correctAnswer" => "0"
            ])
        ]);


        $question = \App\Models\Question::factory()->create([
            'title' => 'Question #3',
            'question_body' => 'Can you tell me when ______ ?',
            'question_type_id' => '1',
            'answer' => json_encode([
                "answers" => [
                    "the train leaves",
                    "does the train leave",
                    "leaves the train",
                    "does leave the train"
                ],
                "correctAnswer" => "1"
            ])
        ]);


        $question = \App\Models\Question::factory()->create([
            'title' => 'Question #4',
            'question_body' => 'When Simon ______ back tonight, he\'ll cook dinner',
            'question_type_id' => '1',
            'answer' => json_encode([
                "answers" => [
                    "comes",
                    "will come",
                    "come",
                    "shall come"
                ],
                "correctAnswer" => "1"
            ])
        ]);



        $question = \App\Models\Question::factory()->create([
            'title' => 'Question #5',
            'question_body' => 'We would never have had the accident if you ______ so fast.',
            'question_type_id' => '1',
            'answer' => json_encode([
                "answers" => [
                    "wouldn't been driving",
                    "hadn't been driving",
                    "had driven",
                    "wouldn't drive"
                ],
                "correctAnswer" => "1"
            ])
        ]);


        $question = \App\Models\Question::factory()->create([
            'title' => 'Question #6',
            'question_body' => '"Did you speak to Juliet?" "No, I\'ve ______ seen her."',
            'question_type_id' => '1',
            'answer' => json_encode([
                "answers" => [
                    "nearly",
                    "hardly",
                    "often",
                    "always"
                ],
                "correctAnswer" => "1"
            ])
        ]);


        $question = \App\Models\Question::factory()->create([
            'title' => 'Question #7',
            'question_body' => '"Did you speak to Juliet?" "No, I\'ve ______ seen her."',
            'question_type_id' => '1',
            'answer' => json_encode([
                "answers" => [
                    "needn't have done",
                    "couldn't have done",
                    "can't have done",
                    "wouldn't have done"
                ],
                "correctAnswer" => "0"
            ])
        ]);


        $question = \App\Models\Question::factory()->create([
            'title' => 'Question #8',
            'question_body' => 'If only I ______ richer.',
            'question_type_id' => '1',
            'answer' => json_encode([
                "answers" => [
                    "am",
                    "were",
                    "would be",
                    "will be"
                ],
                "correctAnswer" => "1"
            ])
        ]);



        $question = \App\Models\Question::factory()->create([
            'title' => 'Question #9',
            'question_body' => 'The tree ______ by lightning.',
            'question_type_id' => '1',
            'answer' => json_encode([
                "answers" => [
                    "was flashed",
                    "struck",
                    "was struck",
                    "flashed"
                ],
                "correctAnswer" => "2"
            ])
        ]);


        $question = \App\Models\Question::factory()->create([
            'title' => 'Question #10',
            'question_body' => 'A RIVER is bigger than a STREAM.',
            'question_type_id' => '2',
            'answer' => json_encode([
                "answers" => [
                    "true",
                    "false"
                ],
                "correctAnswer" => "0"
            ])
        ]);


        $question = \App\Models\Question::factory()->create([
            'title' => 'Question #11',
            'question_body' => 'There are one thousand years in a CENTURY.',
            'question_type_id' => '2',
            'answer' => json_encode([
                "answers" => [
                    "true",
                    "false"
                ],
                "correctAnswer" => "1"
            ])
        ]);



        $question = \App\Models\Question::factory()->create([
            'title' => 'Question #12',
            'question_body' => ' SCARLET is a brilliant red colour.',
            'question_type_id' => '2',
            'answer' => json_encode([
                "answers" => [
                    "true",
                    "false"
                ],
                "correctAnswer" => "0"
            ])
        ]);


        $question = \App\Models\Question::factory()->create([
            'title' => 'Question #13',
            'question_body' => 'Does Linda read books? ',
            'question_type_id' => '6',
            'answer' => json_encode([
                "answers" => [
                    "Yes, Linda does read books."
                ],
                "correctAnswer" => []
            ])
        ]);



        $question = \App\Models\Question::factory()->create([
            'title' => 'Question #14',
            'question_body' => 'Has she got a brother?',
            'question_type_id' => '6',
            'answer' => json_encode([
                "answers" => [
                    "No, she hasn't"
                ],
                "correctAnswer" => []
            ])
        ]);



        $question = \App\Models\Question::factory()->create([
            'title' => 'Question #15',
            'question_body' => 'Is this your pencil?',
            'question_type_id' => '6',
            'answer' => json_encode([
                "answers" => [
                    "Yes, it is"
                ],
                "correctAnswer" => []
            ])
        ]);
    }
}
