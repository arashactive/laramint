<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    public $color = 'warning';
    public $faIcon = 'fa fa-question-circle';
    public $route = 'quizLearner';

    protected $guarded=[];


    public function Questions()
    {
        return $this->belongsToMany(Question::class)
            ->withPivot('order', 'id' , 'score')
            ->orderBy('order')
            ->withTimestamps();
    }


    public function Workout($term_id, $sesison_id, $sessionable_id)
    {
        return $this->hasOne(Workout::class, 'activity_id', 'id')
            ->where('term_id', $term_id)
            ->where('sessionable_id',  $sessionable_id)
            ->where('session_id', $sesison_id);
    }
}
