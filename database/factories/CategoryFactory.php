<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    $imageIDs = \App\Image::pluck('id')->toArray(); // [10, 20, 30]
    $index2 = array_rand($imageIDs); // 0:2

    return [
        'name' => $faker->unique()->text(100),
        'description' => $faker->sentence(25),
        'image_id' => $imageIDs[$index2],
    ];
});
