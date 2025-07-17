<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = [
            [
                'key' => 'show_notification',
                'value' => 'true',
                'display_name' => 'Pengumuman',
                'description' => 'Tampilkan banner notifikasi di halaman utama'
            ],
            [
                'key' => 'enable_registration_page',
                'value' => 'true',
                'display_name' => 'Page Registrasi',
                'description' => 'Aktifkan halaman pendaftaran'
            ],
            [
                'key' => 'enable_announcement_page',
                'value' => 'true',
                'display_name' => 'Page Pengumuman',
                'description' => 'Aktifkan halaman pengumuman'
            ],
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(['key' => $setting['key']], $setting);
        }
    }
}
