<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Professor;
use Faker\Generator as Faker;

$factory->define(Professor::class, function (Faker $faker) {
    $userIds = User::all()->pluck('id')->toArray();
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'user_id' => $faker->randomElement($userIds),
    ];
});
