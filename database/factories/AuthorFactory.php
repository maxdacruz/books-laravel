<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Auth;
use App\Author;

$factory->define(Author::class, function (Faker $faker) {
    return [

        'name' => $faker->name,
        'date_of_birth' => $faker->dateTime()
    ];
});
