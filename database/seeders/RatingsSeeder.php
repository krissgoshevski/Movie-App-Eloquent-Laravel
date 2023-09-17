<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Rating;

class RatingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // for the ratings we have default values 
        $ratings = ["G", "PG", "PG-13", "R", "NC-17"];

        foreach($ratings as $rating) 
        {
            $r = new Rating;
            $r->name = $rating;
            $r->save();
        }
    }
}
