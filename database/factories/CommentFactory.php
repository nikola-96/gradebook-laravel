<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use App\User;
use App\Gradebook;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    $userIds = User::all()->pluck('id')->toArray();
    $gradebookIds = Gradebook::all()->pluck('id')->toArray();
    return [
        'body' => $faker->realText(200, 1),
        'user_id' => $faker->randomElement($userIds),
        'gradebook_id' => $faker->randomElement($gradebookIds),
    ];
});
