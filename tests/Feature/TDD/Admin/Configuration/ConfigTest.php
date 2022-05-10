<?php

namespace Tests\Feature\TDD\Admin\Configuration;

use App\Http\Livewire\Admin\Configuration\NoReplyEmail;
use App\Http\Livewire\Admin\Configuration\SiteName;
use App\Models\Configuration;
use Livewire\Livewire;
use Tests\BaseTest;

class ConfigTest extends BaseTest
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

    /**
     * A basic feature test example for check configuration is show correctly.
     *
     * @return void
     */
    public function test_configuration_show_page()
    {
        $this->signIn(1);
        $response = $this->get(route('configuration.index'));
        $response->assertSee('Configuration');
        $response->assertStatus(200);
    }

    public function test_site_name_livewire_confiuration()
    {
        $this->signIn(1);

        $value = 'foo';
        Livewire::test(SiteName::class)
            ->set('config_value', $value)
            ->call('config_changed');

        $this->assertTrue(Configuration::where('config_value', json_encode($value))->exists());
    }


    public function test_no_reply_email_livewire_confiuration()
    {
        $this->signIn(1);

        $MAIL_MAILER = 'MAIL_MAILER';
        $MAIL_HOST = '127.0.0.1';
        $MAIL_PORT = '546';
        $MAIL_USERNAME = 'username';
        $MAIL_PASSWORD = 'password';
        $MAIL_ENCRYPTION = null;
        $MAIL_FROM_ADDRESS = 'from@address.com';
        $MAIL_FROM_NAME = 'from name';

        Livewire::test(NoReplyEmail::class)
            ->set('MAIL_MAILER', $MAIL_MAILER)
            ->set('MAIL_HOST', $MAIL_HOST)
            ->set('MAIL_PORT', $MAIL_PORT)
            ->set('MAIL_USERNAME', $MAIL_USERNAME)
            ->set('MAIL_PASSWORD', $MAIL_PASSWORD)
            ->set('MAIL_ENCRYPTION', $MAIL_ENCRYPTION)
            ->set('MAIL_FROM_ADDRESS', $MAIL_FROM_ADDRESS)
            ->set('MAIL_FROM_NAME', $MAIL_FROM_NAME)
            ->call('config_changed');

    

        $this->assertTrue(Configuration::where('config_value', 'LIKE', '%' . $MAIL_MAILER . '%')->exists());
    }
}
