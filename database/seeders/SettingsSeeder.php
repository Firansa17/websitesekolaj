<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    public function run()
    {
        Setting::create([
            'key' => 'site_logo',
            'value' => 'assets/images/logo/logo-smkn4.png'
        ]);
    }
} 