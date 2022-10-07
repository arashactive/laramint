<?php

namespace App\Services\Units\Coins;

use App\Models\Configuration;
use App\Models\User;

class CoinsForRegisterNewUser extends UserCoins
{
    protected int $coins = 0;


    protected function setCoins()
    {
        $configuration = Configuration::where('config_type', 'CoinsForNewUserRegister')->first();
        if (isset($configuration) and $configuration->config_value > 0)
            $this->coins = $configuration->config_value;
        else $this->coins = 0;
    }

    public function executed(User $user): bool
    {
        $this->setCoins();

        if ($this->coins == 0)
            return false;

        $user->CoinsLogs()->create([
            'coins' => $this->coins,
            'description' => trans('message/description.user_register_got_coins', ['coins' => $this->coins]),
            'causable_type' => User::class,
            'causable_id' => $user->id,
            'is_manual' => 0
        ]);

        $this->userUpdateCoins($user, $this->coins);

        return true;
    }
}
