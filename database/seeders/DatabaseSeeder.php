<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Addresses;
use App\Models\Has_songs;
use App\Models\Songs;
use App\Models\Users;
use App\Models\Vinyls;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Users::factory(10)->create();

        Users::factory()->create([
             'name' => 'Test Users',
             'email' => 'test@example.com',
         ]);

        Addresses::factory(15)->create();
        Songs::factory(50)->create();
        Vinyls::factory(25)->create();

        foreach (Vinyls::all() as $vinyl) {
            Has_songs::create([
                'id_vinyl' => $vinyl->id,
                'id_song' => fake()->randomElement(Songs::all())['id']]);
        }

    }
}
