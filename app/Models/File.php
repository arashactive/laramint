<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;


    public $color = 'danger';
    public $faIcon = 'fa fa-file';
    public $route = 'fileLearner';

    protected $guarded = [];


    public function Documents()
    {
        return $this->belongsToMany(Document::class);
    }

    public function Workout($term_id, $sesison_id, $sessionable_id)
    {
        return $this->hasOne(Workout::class, 'activity_id', 'id')
            ->where('term_id', $term_id)
            ->where('sessionable_id',  $sessionable_id)
            ->where('session_id', $sesison_id);
    }
}
