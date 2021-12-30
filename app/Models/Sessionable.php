<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sessionable extends Model
{
    use HasFactory;


    public function model()
    {
        return $this->belongsTo($this->sessionable_type, 'sessionable_id');
    }
}
