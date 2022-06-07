<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sessionable extends Model
{
    use HasFactory;

    public function Model(): BelongsTo
    {
        return $this->belongsTo($this->sessionable_type, 'sessionable_id');
    }


    
}
