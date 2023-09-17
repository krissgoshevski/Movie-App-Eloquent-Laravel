<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Director;


class DirectorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create();

        // фор бидејки за да креира повеќе записи во база односно 6
        for ($i = 0; $i < 6; $i++) 
        {
            $dir = new Director;
        
            $dir->name = $faker->firstName;
            $dir->surname = $faker->lastName;
            $dir->birth_day = $faker->date;
            $dir->save();
        }
        
    }
}