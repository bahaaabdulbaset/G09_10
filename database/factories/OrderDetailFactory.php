<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\OrderDetail;
use Faker\Generator as Faker;

$factory->define(OrderDetail::class, function (Faker $faker) {
    $productIDs = \App\Product::pluck('id')->toArray(); // [10, 20, 30]
    $orderIDs = \App\Order::pluck('id')->toArray(); // [10, 20, 30]
    $index = array_rand($orderIDs); // 0:2
    $index2 = array_rand($productIDs); // 0:2
    return [
        'order_id' => $orderIDs[$index],
        'product_id' => $productIDs[$index2],
        'amount' => $faker->randomNumber(),
        'price' => $faker->randomFloat(2, 20, 1000),
        'discount' => $faker->randomFloat(2, 0, 100),
    ];
});
