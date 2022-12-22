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
            'config_value' => json_encode('Laramint LMS'),
            'config_category' => 'global'
        ]);


        \App\Models\Configuration::factory()->create([
            'config_type' => 'NoReplyEmail',
            'config_value' => json_encode([
                'MAIL_MAILER' => 'smtp',
                'MAIL_HOST' => 'laramint.com',
                'MAIL_PORT' => '465',
                'MAIL_USERNAME' => 'no-reply@laramint.com',
                'MAIL_PASSWORD' => '*********',
                'MAIL_ENCRYPTION' => null,
                'MAIL_FROM_ADDRESS' => 'no-reply@laramint.com',
                'MAIL_FROM_NAME' => "No-Reply: LMS Gamification",
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
