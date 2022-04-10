<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
    use HasFactory;


    protected $guarded = [];

    // make difference get lists for super-admin and other roles.
    // this part helps us to get clear list of supervisior and teacher with 
    // correct access to each term
    public function scopeGetParticipants(Builder $builder)
    {

        if (!auth()->user()->hasRole(['Super-Admin'])) {
            return $builder->whereHas(
                'Participants',
                function ($q) {
                    $q->where('user_id',  auth()->user()->id);
                }
            );
        }
    }


    public function scopeMyCourse(Builder $builder, $studentRoleId = 4)
    {
        return $builder->whereHas(
            'Participants',
            function ($q) use ($studentRoleId) {
                $q->where('user_id',  auth()->user()->id);
                $q->where('role_id', $studentRoleId);
            }
        );
    }


    public function Department()
    {
        return $this->belongsTo(Department::class);
    }

    public function Course()
    {
        return $this->belongsTo(Course::class);
    }

    public function Participants()
    {
        return $this->belongsToMany(User::class)->withPivot(["id", "role_id"]);
    }

    public function Sessions()
    {
        return $this->belongsToMany(Session::class)->withPivot(["id", "order"])->orderBy('order');
    }

    public function getAllActivitiesAttribute()
    {
        $activities = [];
        $sessions = [$this->Sessions];
        if( !isset($sessions[0]) ) return;
        foreach ($sessions[0] as $session) {
            
            $activities = array_merge($activities, $session->Related->all());
        }
        return new Collection($activities);
    }

    public function Workout()
    {
        return $this->hasMany(Workout::class);
    }
}
