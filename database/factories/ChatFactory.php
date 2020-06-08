<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Chat::class, function (Faker $faker) {
    $userIDs = \App\User::pluck('id')->toArray(); // [10, 20, 30]
    $firstIndex = array_rand($userIDs); // 0:2
    $secondIndex = array_rand($userIDs); // 0:2

    return [
        'first_user_id' => $userIDs[$firstIndex],
        'second_user_id' => $userIDs[$secondIndex],
        'message' => $faker->sentence(20),
        'is_seen' => $faker->boolean(),
        'is_forward' => $faker->boolean(),
    ];
});
