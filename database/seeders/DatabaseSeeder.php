<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Address;
use App\Models\Has_songs;
use App\Models\Songs;
use App\Models\Users;
use App\Models\Vinyl;
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
             'email' => 'vinylsController@example.com',
         ]);

        Address::factory(15)->create();
        Songs::factory(50)->create();
        Vinyl::factory(25)->create();

        foreach (Vinyl::all() as $vinyl) {
            Has_songs::create([
                'id_vinyl' => $vinyl->id,
                'id_song' => fake()->randomElement(Songs::all())['id']]);
        }

    }
}
