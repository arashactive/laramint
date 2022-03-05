<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Department;
use App\Models\Document;
use App\Models\Feedback;
use App\Models\File;
use App\Models\Question;
use App\Models\QuestionType;
use App\Models\Quiz;
use App\Models\Rubric;
use App\Models\Session;
use App\Models\Term;
use App\Models\User;
use Illuminate\Database\Seeder;
use phpDocumentor\Reflection\DocBlock\Tags\Uses;

class EducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Department::factory()->count(1)->create();
        // Course::factory()->count(1)->create();
        
        //Term::factory()->count(2)->create();

        // make factory for documents and files
        Document::factory()->count(5)->create();
        File::factory()->count(5)->create();

        Question::factory()->count(10)->create();

        //attach some files to some documents
        $this->attachManyToMany(Document::all(), File::all(), 'Files');

        // add rubrics to seed
        Rubric::factory()->count(5)->create();

        // add some feedback to seed
        Feedback::factory()->count(5)->create();
        $this->attachManyToMany(Feedback::all(), Question::all(), 'Questions');

        // make factory for quizes
        Quiz::factory()->count(50)->create();
        $this->attachManyToMany(Quiz::all(), Question::all(), 'Questions');

        // make session factory

        Session::factory()->count(50)->create();
        $this->attachManyToMany(Session::all(), Quiz::inRandomOrder()->limit(2)->get(), 'Quizes');
        $this->attachManyToMany(Session::all(), Document::inRandomOrder()->limit(3)->get(), 'documents');
        $this->attachManyToMany(Session::all(), Feedback::inRandomOrder()->limit(1)->get(), 'Feedbacks');
        $this->attachManyToMany(Session::all(), Rubric::inRandomOrder()->limit(1)->get(), 'Rubrics');


        $this->attachManyToMany(Term::all(), Session::inRandomOrder()->limit(12)->get(), 'Sessions');


        

    }



    public function attachManyToMany($parents, $childs, $relations = '')
    {
        if (empty($parents) || empty($childs))
            return null;

        $parents->each(function ($parent) use ($childs, $relations) {

            foreach ($childs as $child)
                $parent->{$relations}()->attach(
                    $child,
                    ['order' => $parent->{$relations}()->max('order') + 1]
                );
        });
    }
}
