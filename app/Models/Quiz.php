<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    public $color = 'warning';
    public $faIcon = 'fa fa-question-circle';
    protected $guarded=[];


    public function Questions()
    {
        return $this->belongsToMany(Question::class)
            ->withPivot('order', 'id' , 'score')
            ->orderBy('order')
            ->withTimestamps();
    }
}
