<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Document extends Model
{
    use HasFactory;

    public string $color = 'primary';
    public string $faIcon = 'fa fa-file';
    public string $route = 'documentLearner';

    protected $guarded = [];


    public function Files(): BelongsToMany
    {
        return $this->belongsToMany(File::class)
            ->withPivot('order', 'id')
            ->orderBy('order')
            ->withTimestamps();
    }

    /**
     * Sessions is pholymorph relationship
     *
     * @return MorphTo
     */
    public function Sessions(): MorphTo
    {        
        return $this->morphTo(Session::class);
    }


    public function Workout(int $term_id, int $sesison_id, int $sessionable_id): HasOne
    {
        return $this->hasOne(Workout::class, 'activity_id', 'id')
            ->where('term_id', $term_id)
            ->where('sessionable_id',  $sessionable_id)
            ->where('session_id', $sesison_id);
    }
}
