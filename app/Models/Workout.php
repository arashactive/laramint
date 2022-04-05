<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workout extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function scopeCompleted()
    {
        return $this->update(['is_completed' => 1]);
    }


    public function WorkOutQuiz(){
        return $this->hasMany(WorkoutQuizLog::class);
    }
}
