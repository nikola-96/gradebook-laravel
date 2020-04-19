<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Gradebook;
use App\Professor;
use Faker\Generator as Faker;

$factory->define(Gradebook::class, function (Faker $faker) {
    $professorIds = Professor::all()->pluck('id')->toArray();

    return [
        'name' => $faker->catchPhrase,
        'professor_id' => $faker->randomElement($professorIds),
    ];
});
