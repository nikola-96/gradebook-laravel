<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Student;
use App\Gradebook;
use App\Professor;
use Faker\Generator as Faker;

$factory->define(Student::class, function (Faker $faker) {
    $gradebook_id = Gradebook::all()->pluck('id')->toArray();
    $professor_id = Professor::all()->pluck('id')->toArray();
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'imageUrl' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSvruNBHn656TgWzMNuFQaTqPzo5SBLO6c-Dsvt3qaqFYWF3G66&usqp=CAU',
        'professor_id' => $faker->randomElement($professor_id),
        'gradebook_id' => function (array $gradebook) {
            return App\Gradebook::find($gradebook['professor_id'])->id;
        },

    ];
});