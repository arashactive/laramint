<?php

namespace App\Services\Coins;

use App\Models\Badge;
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


    /**
     * getUserBadge
     *
     * @param  User $user
     * @return Badge
     */
    public function getUserBadge(User $user): Badge
    {
        
        $badge = Badge::where('min_coins', '>=', $user->coins)
            ->where('max_coins', '<', $user->coins)
            ->first();

        if (empty($badge))
            return Badge::orderby('max_coins', 'desc')->first();

        return $badge;
    }
}
