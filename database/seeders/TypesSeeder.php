<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;

class TypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $types = ['2D', '3D'];

        foreach($types as $type)
        {
            $typeModel = new Type;
            $typeModel->name = $type;
            $typeModel->save();
            
        }
    }
}
