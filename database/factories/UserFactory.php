<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    $genderIDs = \App\Gender::pluck('id')->toArray(); // [10, 20, 30]
    $index = array_rand($genderIDs); // 0:2

    $imageIDs = \App\Image::pluck('id')->toArray(); // [10, 20, 30]
    $index2 = array_rand($imageIDs); // 0:2

    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'username' => $faker->unique()->userName,
        'email' => $faker->unique()->safeEmail,
        'phone_number' => $faker->phoneNumber,
        'address' => $faker->address,
        'is_admin' => $faker->boolean(),
        'bio' => $faker->sentence(10),
        'gender_id' => $genderIDs[$index],
        'image_id' => $imageIDs[$index2],
        'password' => bcrypt('123456'),
    ];
});
