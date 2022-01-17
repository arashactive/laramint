<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    public $color = 'success';
    protected $guarded;

    public function Questions()
    {
        return $this->belongsToMany(Question::class)
            ->withPivot('order', 'id')
            ->orderBy('order')
            ->withTimestamps();
    }
}
