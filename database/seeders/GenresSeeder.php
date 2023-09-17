<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $genres = ["Horror", "Drama", "Thriller", "Action", "Romance", "Comedy"];

        $modelg = new Genre;
        foreach($genres as $genre)
        {
            $modelg->name = $genre;
            $modelg->save();
        }
       
    }
}
