<?php

namespace Database\Seeders;

use App\Models\About;
use App\Models\User;
use App\Models\Activity;
use App\Models\Structure;
use App\Models\SelectedStudent;
use App\Models\Announcement;
use App\Models\AdditionalInformation;
use App\Models\Home;
use App\Models\Registration;
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

        Registration::create([
            'title' => 'Pendaftaran Santri Baru Gelombang 1',
            'description' => 'Pendaftaran Santri Baru Gelombang 1 - Tahun Akademik 2025/2026. Daftar sekarang untuk mendapatkan kesempatan belajar di PPM RJ dengan fasilitas lengkap dan pembimbingan terbaik.',
            'registration_link' => 'https://forms.google.com/gelombang1-2025'
        ]);

        Home::create([
            'header' => 'PPMRJ',
            'subheader' => 'Bandung Selatan',
            'description' => 'Pondok Pesantren Mahasiswa Roudhotul Jannah (PPMRJ) Bandung Selatan menyediakan lingkungan yang kondusif untuk belajar dan berkembang, menggabungkan pendidikan agama dengan studi akademis.',
            'guruCount' => 4,
            'studentCount' => 80,
            'alumniCount' => 200
        ]);

        About::create([
            'description' => 'PPMRJ adalah lembaga pendidikan yang menggabungkan pendidikan agama dengan studi akademis, menyediakan lingkungan yang kondusif untuk belajar dan berkembang.',
            'vision' => 'Menjadi lembaga pendidikan terkemuka yang mengintegrasikan ilmu agama dan umum.',
            'mission' => 'Menyediakan pendidikan berkualitas tinggi, membentuk karakter santri yang berakhlak mulia, dan mempersiapkan mereka untuk menjadi pemimpin masa depan.',
            'galleryTitle' => 'Galeri Kegiatan PPMRJ',
            'galleryDescription' => 'Beberapa kegiatan di PPMRJ',
        ]);

        Storage::disk('public')->deleteDirectory('');

        // Run roles and permissions seeder AFTER creating users
        $this->call([
            RolePermissionSeeder::class,
            SettingsSeeder::class,
        ]);
    }
}
