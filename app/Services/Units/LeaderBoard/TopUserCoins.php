<?php

namespace App\Services\Units\LeaderBoard;

use App\Models\User;
use Illuminate\Support\Collection;

class TopUserCoins
{
    public function getUsers(): Collection
    {
        return User::orderby('coins', 'desc')->limit(4)->get();
    }
}
