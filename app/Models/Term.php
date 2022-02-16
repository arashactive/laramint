<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
    use HasFactory;


    protected $guarded = [];

    public function Department(){
        return $this->belongsTo(Department::class);
    }

    public function Course(){
        return $this->belongsTo(Course::class);
    }

    public function Participants(){
        return $this->belongsToMany(User::class)->withPivot(["id", "role_id"]);
    }

    public function Sessions(){
        return $this->belongsToMany(Session::class)->withPivot(["id", "order"])->orderBy('order');
    }

}
