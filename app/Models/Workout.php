<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workout extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function scopeCompleted()
    {
        return $this->update([
            'is_completed' => 1,
            'score' => 100,
            'date_get_score' => Carbon::now()->format("Y-m-d")
        ]);
    }


    public function WorkOutQuiz()
    {
        return $this->hasMany(WorkoutQuizLog::class);
    }
}
