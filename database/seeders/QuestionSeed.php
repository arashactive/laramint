<?php

namespace Database\Seeders;

use App\Models\Question;
use App\Models\Quiz;
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

        $question1 = \App\Models\Question::factory()->create([
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


        $question2 = \App\Models\Question::factory()->create([
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


        $question3 = \App\Models\Question::factory()->create([
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


        $question4 = \App\Models\Question::factory()->create([
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



        $question5 = \App\Models\Question::factory()->create([
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


        $question6 = \App\Models\Question::factory()->create([
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


        $question7 = \App\Models\Question::factory()->create([
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


        $question8 = \App\Models\Question::factory()->create([
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



        $question9 = \App\Models\Question::factory()->create([
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


        $question10 = \App\Models\Question::factory()->create([
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


        $question11 = \App\Models\Question::factory()->create([
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



        $question12 = \App\Models\Question::factory()->create([
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


        $question13 = \App\Models\Question::factory()->create([
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



        $question14 = \App\Models\Question::factory()->create([
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



        $question15 = \App\Models\Question::factory()->create([
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

        $question16 = \App\Models\Question::factory()->create([
            'title' => 'Question #16',
            'question_body' => 'Multiple Question #16',
            'question_type_id' => '3',
            'answer' => json_encode(
                [
                    "answers" => [
                        "Answer #1",
                        "Answer #2",
                        "Answer #3",
                        "Answer #4"
                    ],
                    "correctAnswer" => [
                        "answer-0",
                        "answer-1",
                        "answer-2",
                        ""
                    ]
                ]
            )
        ]);

        $question17 = \App\Models\Question::factory()->create([
            'title' => '#17 Essay Of Your Writing',
            'question_body' => 'Essay Of Your Writing',
            'question_type_id' => '4',
            'answer' => json_encode(
                [
                    "answers" => [
                        "min" => 0,
                        "max" => 500
                    ],
                    "correctAnswer" => []
                ]
            )
        ]);


        $question18 = \App\Models\Question::factory()->create([
            'title' => '#18 Upload Your writing',
            'question_body' => 'please make a file with intridouce about yourself then upload here.',
            'question_type_id' => '5',
            'answer' => json_encode(
                [
                    "answers" => [
                        "max_size" => 1024,
                        "min_size" => 128,
                        "file_type" => "word"
                    ],
                    "correctAnswer" => []
                ]
            )
        ]);

        $question19 = \App\Models\Question::factory()->create([
            'title' => '#19 Please match correct.',
            'question_body' => 'please find and match correct answer to prompts.',
            'question_type_id' => '7',
            'answer' => json_encode(
                [
                    "answers" => [
                        [
                            "left" => "prompts 1",
                            "right" => "answer 1"
                        ],
                        [
                            "left" => "prompts 2",
                            "right" => "answer 2"
                        ],
                        [
                            "left" => "prompts 3",
                            "right" => "answer 3"
                        ],
                        [
                            "left" => "prompts 4",
                            "right" => "answer 4"
                        ]
                    ],
                    "correctAnswer" => []
                ]
            )
        ]);


        $question20 = \App\Models\Question::factory()->create([
            'title' => '#20 please record',
            'question_body' => 'please record your speaking and send for us.',
            'question_type_id' => '8',
            'answer' => json_encode(
                [
                    "answers" => [
                        "min_second" => "30",
                        "max_second" => "120"
                    ],
                    "correctAnswer" => []
                ]
            )
        ]);

        $quizess = Quiz::all();
        $number = 1;
        $totalQuestion = Question::count();
        foreach ($quizess as $quiz) {
            for ($counter = 1; $counter <= 3; $counter++) {
                $quiz->Questions()->attach(
                    ${'question' . $number},
                    ['order' => $quiz->Questions()->max('order') + 1]
                );
                $number++;
                if ($number > $totalQuestion) {
                    $number = 1;
                }
            }
        }
    }
}
