<?php

namespace Database\Seeders;

use App\Models\Admin\Post;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class PostSeeder extends Seeder
{
    public function run(Faker $faker): void
    {
        $typeIds = Type::all()->pluck('id');


        //
        for ($i = 0; $i < 100; $i++) {
            $newPost = new Post();
            $newPost->title = ucfirst($faker->unique()->sentence());
            $newPost->type_id = $faker->randomElements($typeIds);
            $newPost->content = $faker->paragraph(8, true);
            $newPost->slug = $faker->slug();
            $newPost->image = $faker->imageUrl(640, 480, 'Post', true);
            $newPost->author = $faker->name();
            $newPost->save();
        }
    }
}