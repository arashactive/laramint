<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MentorComment extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'activable_type', 'activable_id', 'mentor_id', 'body'];
}
