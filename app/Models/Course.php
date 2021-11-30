<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Course extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function Department(){
        return $this->belongsTo(Department::class);
    }
}
