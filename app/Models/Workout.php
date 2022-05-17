<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function Sessionable():BelongsTo
    {
        return $this->belongsTo(Sessionable::class);
    }

    public function Session(): BelongsTo
    {
        return $this->belongsTo(Session::class);
    }

    public function WorkOutQuiz():HasMany
    {
        return $this->hasMany(WorkoutQuizLog::class);
    }

    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
