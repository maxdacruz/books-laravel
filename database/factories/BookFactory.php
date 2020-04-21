<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Author;
use App\Book;

$factory->define(Book::class, function (Faker $faker) {

    $authors = Author::all()->pluck('id')->toArray();


    return [
        'title' => $faker->text(100),
        'price' => $faker->randomFloat(2, 1, 50),
        'author_id' => $faker->randomElement($authors)
    ];
});
