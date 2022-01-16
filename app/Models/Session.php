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

    public function documents()
    {
        return $this->morphedByMany(Document::class, 'sessionable')->withTimestamps();
    }

    public function Quizes()
    {
        return $this->morphedByMany(Quiz::class, 'sessionable')->withTimestamps();
    }

}
