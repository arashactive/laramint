<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class MentorComment extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'activable_type', 'activable_id', 'mentor_id', 'body'];

    public function Mentor(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'mentor_id');
    }
}
