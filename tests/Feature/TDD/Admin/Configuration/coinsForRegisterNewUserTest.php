<?php

namespace Tests\Feature\TDD\Admin\Configuration;

use App\Http\Livewire\Admin\Configuration\Coins\RegisterNewUser;
use App\Models\Configuration;
use Livewire\Livewire;
use Tests\BaseTest;

class coinsForRegisterNewUserTest extends BaseTest
{


    protected function setUp(): void
    {
        parent::setUp();
        $this->seed();

        $this->setBaseRoute('configuration');
        $this->setBaseModel('App\Models\Configuration');
    }

    /**
     * A basic test to check access level controller with without access to page
     *
     * @return void
     */
    public function test_acl()
    {
        $this->withOutPermissionUser();
        $this->withOutAccessLevel();
    }

    public function test_coins_for_register_new_user_livewire_confiuration()
    {
        $this->signIn(1);

        $value = 80;
        Livewire::test(RegisterNewUser::class)
            ->set('config_value', $value)
            ->call('config_changed');

        $this->assertTrue(Configuration::where('config_value', $value)->exists());
    }
}
