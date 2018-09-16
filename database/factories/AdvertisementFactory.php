<?php

use App\Core\Advertisement\Models\Advertisement;
use Faker\Generator as Faker;

$existCategories = [111632, 111634, 104976, 105082, 106, 100167, 100768, 105047, 105046, 111621, 106401, 110048];
$existUsers = \App\Core\User\Models\User::all()->pluck('id')->toArray();

$factory->define(Advertisement::class, function (Faker $faker) use ($existCategories, $existUsers) {    return [
        'title' => $faker->title,
        'description' => $faker->text(150),
        'price' => $faker->biasedNumberBetween(10, 5000),
        'category_id' => $faker->randomElement($existCategories),
        'user_id' => $faker->randomElement($existUsers),
        'address' => $faker->address,
        'phone' => $faker->phoneNumber,
    ];
});
