<?php

use Illuminate\Database\Seeder;
//use Faker\Generator as Faker;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        App\User::withTrashed()->get()->each(function ($user) use ($faker) {
            //$user->articles()->save(factory(App\Article::class)->make());
            $user->articles()->createMany(
                factory(App\Article::class, $faker->randomDigit)->make()->toArray()
            );
        });
    }
}
