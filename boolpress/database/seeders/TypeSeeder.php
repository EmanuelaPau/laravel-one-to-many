<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;


class TypeSeeder extends Seeder
{

    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $types = [
            'Personal',
            'Group',
            'Math',
            'Science',
            'DIY',
            'History',
            'Development',
            'Physics',
            'Mechanics',
            'Design'
        ];
        //
        foreach ($types as $type) {
            $newType = new Type();
            $newType->name = $type;
            $newType->color = $faker->hexColor();
            $newType->save();
        }
    }
}