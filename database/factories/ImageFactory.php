<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Image::class, function (Faker $faker) {
    return [
        'path' => $faker->imageUrl(),
        'size' => $faker->randomFloat(2, 1, 1000),
    ];
});
