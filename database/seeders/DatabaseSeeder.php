<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\ActorsSeeder;
use Database\Seeders\DirectorsSeeder;
use Database\Seeders\GenresSeeder;
use Database\Seeders\RatingsSeeder;
use Database\Seeders\TypesSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);



        // za da ne gi povikuvame site seederi racno ovde odednas ke se povikat site 
        $this->call([
            ActorsSeeder::class,
            DirectorsSeeder::class,
            GenresSeeder::class,
            RatingsSeeder::class,
            TypesSeeder::class
        ]);
    }
}
