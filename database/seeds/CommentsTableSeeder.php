<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        //$userIds = App\User::withTrashed()->all('id');
        $userIds = DB::table('users')->pluck('id');

        App\Article::withTrashed()->get()->each(function ($article) use ($faker, $userIds) {
            $article->comments()->createMany(
                factory(App\Comment::class, $faker->numberBetween(0, 20))->make()->each(function ($comment) use ($faker, $userIds) {
                    $comment->user_id = $faker->randomElement($userIds);
                })->toArray()
            );
        });

        
    }
}
