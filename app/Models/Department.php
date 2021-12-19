<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function Course(){
        return $this->hasMany(Course::class);
    }

    public function Term(){
        return $this->hasMany(Term::class);
    }
    
}
