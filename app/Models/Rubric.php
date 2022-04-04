<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rubric extends Model
{
    use HasFactory;

    public $color = 'info';
    public $faIcon = 'fa fa-ruler';
    public $route = 'rubricLearner';
    
    protected $guarded = [];


    public function Workout($term_id, $sesison_id, $sessionable_id)
    {
        return $this->hasOne(Workout::class, 'activity_id', 'id')
            ->where('term_id', $term_id)
            ->where('sessionable_id',  $sessionable_id)
            ->where('session_id', $sesison_id);
    }
}
