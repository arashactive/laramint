<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ConfigurationSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Configuration::factory()->create([
            'config_type' => 'SiteName',
            'config_value' => json_encode('ICET Agra'),
            'config_category' => 'global'
        ]);


        \App\Models\Configuration::factory()->create([
            'config_type' => 'ICETAgra',
            'config_value' => json_encode([
                'MAIL_MAILER' => 'smtp',
                'MAIL_HOST' => 'gmail.com',
                'MAIL_PORT' => '465',
                'MAIL_USERNAME' => 'arvindsutail@gmail.com',
                'MAIL_PASSWORD' => '*********',
                'MAIL_ENCRYPTION' => null,
                'MAIL_FROM_ADDRESS' => 'arvindsutail@gmail.com',
                'MAIL_FROM_NAME' => "ICET Agra",
            ]),
            'config_category' => 'global'
        ]);


        \App\Models\Configuration::factory()->create([
            'config_type' => 'AlertNotification',
            'config_value' => json_encode(1),
            'config_category' => 'global'
        ]);


        \App\Models\Configuration::factory()->create([
            'config_type' => 'CoinsForNewUserRegister',
            'config_value' => json_encode(50),
            'config_category' => 'global'
        ]);


        \App\Models\Configuration::factory()->create([
            'config_type' => 'ScoreToCoins',
            'config_value' => json_encode(10),
            'config_category' => 'global'
        ]);
    }
}
