<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Session extends Model
{
    use HasFactory;


    protected $guarded = [];



    public function related(): HasMany
    {
        return $this->hasMany(Sessionable::class, 'session_id')->orderBy('order');
    }

    public function Sessionable(): HasMany
    {
        return $this->hasMany(Sessionable::class);
    }

    public function documents(): MorphToMany
    {
        return $this->morphedByMany(Document::class, 'sessionable')->withTimestamps();
    }

    public function Files(): MorphToMany
    {
        return $this->morphedByMany(File::class, 'sessionable')->withTimestamps();
    }

    public function Quizes(): MorphToMany
    {
        return $this->morphedByMany(Quiz::class, 'sessionable')->withTimestamps();
    }

    public function Feedbacks(): MorphToMany
    {
        return $this->morphedByMany(Feedback::class, 'sessionable')->withTimestamps();
    }

    public function Rubrics(): MorphToMany
    {
        return $this->morphedByMany(Rubric::class, 'sessionable')->withTimestamps();
    }

    public function Terms(): BelongsToMany
    {
        return $this->belongsToMany(Term::class);
    }

    public function Workout(): HasMany
    {
        return $this->hasMany(Workout::class);
    }
}
