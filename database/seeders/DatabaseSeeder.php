<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Activity;
use App\Models\Structure;
use App\Models\SelectedStudent;
use App\Models\Announcement;
use App\Models\AdditionalInformation;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Fulan',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'Admin PPM',
            'email' => 'admin@gmail.com',
            'password' => 'admin'
        ]);

        User::create([
            'name' => 'Kreatif PPM',
            'email' => 'kreatif@gmail.com',
            'password' => 'kreatif'
        ]);

        User::create([
            'name' => 'Panitia OM',
            'email' => 'panitia@gmail.com',
            'password' => 'panitia'
        ]);

        Activity::create([
            'title' => 'Babakaran gaes',
            'description' => 'lorem Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur, eum molestiae magni numquam sunt commodi provident magnam reiciendis qui repellendus ratione excepturi vel illo sequi quisquam vitae dignissimos deleniti aperiam?',
        ]);
        Activity::create([
            'title' => 'Barabakan',
            'description' => 'lorem Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur, eum molestiae magni numquam sunt commodi provident magnam reiciendis qui repellendus ratione excepturi vel illo sequi quisquam vitae dignissimos deleniti aperiam?',
        ]);


        Structure::create([
            'name' => 'Yayat Hernawan',
            'jobdesk' => 'Pembina PPM'
        ]);
        Structure::create([
            'name' => 'Muhammad Yusuf',
            'jobdesk' => 'Ketua PPM'
        ]);
        for ($i = 0; $i < 3; $i++) {
            Structure::create([
                'name' => fake()->name,
                'jobdesk' => 'Pinisepuh'
            ]);
        }
        for ($i = 0; $i < 4; $i++) {
            Structure::create([
                'name' => fake()->name,
                'jobdesk' => 'Dewan Guru'
            ]);
        }
        Structure::create([
            'name' => fake()->name,
            'jobdesk' => 'Ketua Mahasiswa'
        ]);
        Structure::create([
            'name' => fake()->name,
            'jobdesk' => 'Wakil 1'
        ]);
        Structure::create([
            'name' => fake()->name,
            'jobdesk' => 'Wakil 2'
        ]);
        Structure::create([
            'name' => fake()->name,
            'jobdesk' => 'Wakil 3'
        ]);
        Structure::create([
            'name' => fake()->name,
            'jobdesk' => 'Wakil 4'
        ]);

        Announcement::create([
            'title' => 'Seleksi Gelombang 1 sudah diumumkan!!',
            'publish_date' => '2025-07-01',
        ]);

        Announcement::create([
            'title' => 'Seleksi Gelombang 2 sudah diumumkan!!',
            'publish_date' => '2025-07-01',
        ]);

        for ($i = 0; $i < 5; $i++) {
            SelectedStudent::create([
                'announcement_id' => 1,
                'student_name' => fake()->name,
                'student_city' => fake()->city,
                'gelombang' => "gelombang1",
            ]);
        }

        for ($i = 0; $i < 5; $i++) {
            SelectedStudent::create([
                'announcement_id' => 2,
                'student_name' => fake()->name,
                'student_city' => fake()->city,
                'gelombang' => "gelombang2",
            ]);
        }

        AdditionalInformation::create([
            'announcement_id' => 1,
            'info' => 'Bagi Pendaftar yang dinyatakan lulus tahap seleksi wajib untuk mengikuti kegiatan Orientasi Santri (Informasi akan diberikan lebih lanjut).'
        ]);

        AdditionalInformation::create([
            'announcement_id' => 2,
            'info' => 'Wawancara akan dilaksanakan pada tanggal 25 Juli 2025'
        ]);

        Storage::disk('public')->deleteDirectory('');

        // Run roles and permissions seeder AFTER creating users
        $this->call([
            RolePermissionSeeder::class,
        ]);
    }
}
