<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            "web_name" => "DevLog",
            "phone_number" => +123456789,
            "web_email" => "web@test.com",
            "address" => "Cairo",
            "about_us" => "About Us",
        ]);

    }
}
