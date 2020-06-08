<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    $userIDs = \App\User::pluck('id')->toArray(); // [10, 20, 30]
    $index = array_rand($userIDs); // 0:2
    return [
        'user_id' => $userIDs[$index],
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'phone_number' => $faker->phoneNumber,
        'address' => $faker->address,
        'discount' => $faker->randomFloat(2, 0, 100),
        'tax' => $faker->randomFloat(2, 0, 1000),
        'is_received' => $faker->boolean(),
        'is_checked_out' => true,
        'shipped_at' => $faker->dateTime(),

    ];
});
