<?php

namespace Database\Seeders;

use App\Models\Session;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RubricSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $body = [
            [
                "item_title" => "Vocabulary",
                "cells" => [
                    [
                        "title" => "Uses only few words and expressions or inadequate vocabulary.",
                        "score" => 0,
                        "pass_score" => false
                    ],
                    [
                        "title" => "Uses only basic, simple vocabulary and expressions. Sometimes uses inadequate vocabulary, which hinders the student from responding properly.",
                        "score" => 1,
                        "pass_score" => false
                    ],
                    [
                        "title" => "Uses limited vocabulary and expressions and makes frequent errors in word choice. Does not try to use new words learned in class or expand vocabulary and expressions.",
                        "score" => 2,
                        "pass_score" => false
                    ],
                    [
                        "title" => "Uses varied vocabulary and expressions learned in class, and makes only a few errors in word choice.",
                        "score" => "3",
                        "pass_score" => false
                    ],
                    [
                        "title" => "Uses appropriate expressions and a wide range of vocabulary learned in and out class",
                        "score" => "4",
                        "pass_score" => false
                    ]
                ]
            ],
            [
                "item_title" => "Grammar",
                "cells" => [
                    [
                        "title" => "Can't use appropriate sentence structures. Can't put words in proper word order",
                        "score" => 0,
                        "pass_score" => false
                    ],
                    [
                        "title" => "Uses only basic structures and makes frequent errors",
                        "score" => 1,
                        "pass_score" => false
                    ],
                    [
                        "title" => "Uses a variety of structures with frequent errors, or uses basic structures with only a few errors.",
                        "score" => 2,
                        "pass_score" => false
                    ],
                    [
                        "title" => "Uses a variety of sentence structures but makes some errors",
                        "score" => "3",
                        "pass_score" => false
                    ],
                    [
                        "title" => "",
                        "score" => "4",
                        "pass_score" => false
                    ]
                ]
            ],
            [
                "item_title" => "Pronunciation",
                "cells" => [
                    [
                        "title" => "Can't understand what the student says.",
                        "score" => 0,
                        "pass_score" => false
                    ],
                    [
                        "title" => "Frequent problems with pronunciation and intonation. Voice is too quiet to hear. Hard to understand",
                        "score" => 1,
                        "pass_score" => false
                    ],
                    [
                        "title" => "Pronunciation, rhythm and intonation errors sometimes make it difficult to understand the student",
                        "score" => 2,
                        "pass_score" => false
                    ],
                    [
                        "title" => "Pronunciation, rhythm and intonation are almost clear and accurate, but only occasionally difficult to understand.",
                        "score" => "3",
                        "pass_score" => false
                    ],
                    [
                        "title" => "Pronunciation, rhythm and intonation are almost always clear and accurate",
                        "score" => "4",
                        "pass_score" => false
                    ]
                ]
            ],
            [
                "item_title" => "Overall Fluency",
                "cells" => [
                    [
                        "title" => "Speaks very little or doesn't speak at all",
                        "score" => 0,
                        "pass_score" => false
                    ],
                    [
                        "title" => "Speaks with much hesitation, which often interferes with communication",
                        "score" => 1,
                        "pass_score" => false
                    ],
                    [
                        "title" => "Speaks with some hesitation, which sometimes interferes with communication",
                        "score" => 2,
                        "pass_score" => false
                    ],
                    [
                        "title" => "Speaks with some hesitation, but it doesn't usually interrupt the flow of conversation.",
                        "score" => "3",
                        "pass_score" => false
                    ],
                    [
                        "title" => "Speaks smoothly with little hesitation and doesn't interrupt the flow of conversation. Speaks with confidence",
                        "score" => "4",
                        "pass_score" => false
                    ]
                ]
            ],
            [
                "item_title" => "Interaction",
                "cells" => [
                    [
                        "title" => "Can hardly communicate; always misses questions from the teacher and can't respond",
                        "score" => 0,
                        "pass_score" => false
                    ],
                    [
                        "title" => "Ideas and purpose is not clear; usually does not respond appropriately or clearly and as the result, needs a lot of help communicating",
                        "score" => 1,
                        "pass_score" => false
                    ],
                    [
                        "title" => "Tries to communicate, but sometimes doesn't respond appropriately. Sometimes ideas are not clear and hard to understand",
                        "score" => 2,
                        "pass_score" => false
                    ],
                    [
                        "title" => "Focus on the conversation most of the time and communicate effectively; generally responds appropriately and tries to develop the interaction",
                        "score" => "3",
                        "pass_score" => false
                    ],
                    [
                        "title" => "Gives clear ideas. Communicates effectively; almost always responds appropriately. Keeps the conversation going by asking follow-up questions.",
                        "score" => "4",
                        "pass_score" => false
                    ]
                ]
            ]
        ];

        #1
        $rubric = \App\Models\Rubric::factory()->create([
            'title' => 'Speaking Fluency Assessment Rubric',
            'description' => '0-Not able to perform, 1-Inadequate, 2-Needs improvement, 3-Meets expectation, 4-Exceeds expectation',
            'body' => json_encode($body)
        ]);


        $session_ids = [1, 5, 9];

        foreach($session_ids as $session_id){
            $this->addRubricToSession(Session::find($session_id), $rubric);
        }

    
    }


    private function addRubricToSession(Session $session, $rubric){
        $session->Rubrics()->attach(
            $rubric,
            ['order' => $session->Sessionable()->max('order') + 1]
        );

    }
}
