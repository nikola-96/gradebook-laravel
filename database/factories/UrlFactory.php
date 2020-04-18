<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;

use App\Url;
use App\Professor;
use Faker\Generator as Faker;

$factory->define(Url::class, function (Faker $faker) {
    $professorIds = Professor::all()->pluck('id')->toArray();
    return [
        'professor_id' => $faker->randomElement($professorIds),
        'imageUrl' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTNK58g5qxzjYGS1tl6xztQN-FSmy0TUVplihFpuCoeFK1KwbS4&usqp=CAU',
    ];
});