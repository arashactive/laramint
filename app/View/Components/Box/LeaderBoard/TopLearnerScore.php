<?php

namespace App\View\Components\Box\LeaderBoard;

use App\Services\Units\LeaderBoard\TopUserCoins;
use Illuminate\Support\Facades\App;
use Illuminate\View\Component;

class TopLearnerScore extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $topUserInstance = App::make(TopUserCoins::class);
        $users = $topUserInstance->getUsers();

        return view('components.box.leader-board.top-learner-score', compact('users'));
    }
}
