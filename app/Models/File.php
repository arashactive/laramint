<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;


    public $color = 'danger';
    public $faIcon = 'fa fa-file';
    public $route = 'fileLearner';

    protected $guarded = [];


    public function Documents()
    {
        return $this->belongsToMany(Document::class);
    }
}
