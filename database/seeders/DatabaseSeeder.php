<?php

namespace Database\Seeders;

use App\Models\Activity;
use App\Models\Structure;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Fulan',
            'email' => 'test@example.com',
        ]);

        Activity::create([
            'image_url' => 'img/bakar1.jpg',
            'title' => 'Babakaran gaes',
            'description' => 'lorem Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur, eum molestiae magni numquam sunt commodi provident magnam reiciendis qui repellendus ratione excepturi vel illo sequi quisquam vitae dignissimos deleniti aperiam?',
        ]);
        Activity::create([
            'image_url' => 'img/bakar2.jpg',
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
    }
}
