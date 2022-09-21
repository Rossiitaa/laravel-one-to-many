<?php

use App\User;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $myUser = new User();
        $myUser->name = 'Rosariooo';
        $myUser->email = 'rosario.scuotto@outlook.it';
        $myUser->password = Hash::make('password');
        $myUser->save();

        for ($i=0; $i < 10; $i++) { 
            $newUser = new User();
            $newUser->name = $faker->userName();
            $newUser->email = $faker->unique()->email();
            $newUser->password = Hash::make('password');
            $newUser->save();
        }
    }
}
