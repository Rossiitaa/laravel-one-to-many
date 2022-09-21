<?php

use App\User;
use Illuminate\Database\Seeder;
use App\Models\Post;
use Faker\Generator as Faker;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $users = User::all();
        
        for ($i=0; $i < 50; $i++) { 

            $newPost = new Post();
            $newPost->user_id = $faker->randomElement($users)->id;
            $newPost->user = $faker->userName();
            $newPost->title = $faker->sentence(3);
            $newPost->content = $faker->text(500);
            $newPost->date = $faker->dateTime();
            $newPost->image = $faker->imageUrl();

            $newPost->save();
        }
    }
}
