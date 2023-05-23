<?php

namespace App\Services\Back;

abstract class Services
{
    // make instance of repository for child class
    protected $repository;

    // set path of view if is blade.
    protected $path;
      
}
