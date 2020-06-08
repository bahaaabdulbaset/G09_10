<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    $catIDs = \App\Category::pluck('id')->toArray(); // [10, 20, 30]
    $index = array_rand($catIDs); // 0:2

    $imageIDs = \App\Image::pluck('id')->toArray(); // [10, 20, 30]
    $index2 = array_rand($imageIDs); // 0:2

    return [
        'name' => $faker->unique()->text(100),
        'selling_price' => $faker->randomFloat(2, 0, 9999),
        'buying_price' => $faker->randomFloat(2, 0, 9999),
        'discount' => $faker->randomFloat(2, 0, 100),
        'is_available' => $faker->boolean(),
        'is_new' => $faker->boolean(),
        'is_upcoming' => $faker->boolean(),
        'category_id' => $catIDs[$index],
        'image_id' => $imageIDs[$index2],
        'amount' => $faker->randomNumber(4),
        'description' => $faker->sentence(30),
    ];
});
