<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Department extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function Course(): HasMany
    {
        return $this->hasMany(Course::class);
    }

    public function Term(): HasMany
    {
        return $this->hasMany(Term::class);
    }
}
