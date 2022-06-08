<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class File extends Model
{
    use HasFactory;


    public string $color = 'danger';
    public string $faIcon = 'fa fa-file';
    public string $route = 'fileLearner';

    protected $guarded = [];


    public function Documents(): BelongsToMany
    {
        return $this->belongsToMany(Document::class);
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
