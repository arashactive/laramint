<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Quiz extends Model
{
    use HasFactory;

    public string $color = 'warning';
    public string $faIcon = 'fa fa-question-circle';
    public string $route = 'quizLearner';

    protected $guarded = [];


    public function Questions(): BelongsToMany
    {
        return $this->belongsToMany(Question::class)
            ->withPivot('order', 'id', 'score')
            ->orderBy('order')
            ->withTimestamps();
    }


    public function Workout(int $term_id, int $sesison_id, int $sessionable_id): HasOne
    {
        return $this->hasOne(Workout::class, 'activity_id', 'id')
            ->where('term_id', $term_id)
            ->where('sessionable_id',  $sessionable_id)
            ->where('session_id', $sesison_id);
    }


    public function WorkoutForLearner(){
        return $this->hasOne(Workout::class, 'participant_id', 'id')
            ->where('user_id', $this->user_id);
    }

}
