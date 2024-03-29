<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        //'body' => $faker->text($maxNbChars=1024),
        'body' => $faker->realText($maxNbChars=300),
    ];
});
