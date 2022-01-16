<?php

namespace Tests\Feature\TDD;

use Tests\BaseTest;

class RubricTest extends BaseTest
{
    private $route = 'rubric';
    protected function setUp(): void
    {
        parent::setUp();
        $this->seed();

        $this->setBaseRoute($this->route);
        $this->setBaseModel('App\Models\Rubric');
    }
}
