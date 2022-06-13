<?php

namespace App\Services\Coins;

use App\Models\User;

class UserCoins
{

    protected function userUpdateCoins(User $user, int $coins): bool
    {
        if ($coins == 0)
            return false;

        $user->coins = $user->coins + ($coins);
        $user->save();

        return true;
    }
}
