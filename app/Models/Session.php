<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;


    protected $guarded = [];
    
 

    public function related()
    {
        return $this->hasMany(Sessionable::class, 'session_id')->orderBy('order');
    }

    public function Sessionable(){
        return $this->hasMany(Sessionable::class);
    }

    public function documents()
    {
        return $this->morphedByMany(Document::class, 'sessionable')->withTimestamps();
    }

    public function Quizes()
    {
        return $this->morphedByMany(Quiz::class, 'sessionable')->withTimestamps();
    }
    
    public function Feedbacks()
    {
        return $this->morphedByMany(Feedback::class, 'sessionable')->withTimestamps();
    }
    
    public function Rubrics()
    {
        return $this->morphedByMany(Rubric::class, 'sessionable')->withTimestamps();
    }

    public function Terms()
    {
        return $this->belongsToMany(Term::class);
    }

}
