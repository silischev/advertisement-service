<?php

use Faker\Generator as Faker;

$factory->define(\App\Core\Category\Models\Category::class, function (Faker $faker) {
    return [
        'name' => 'test_' . $faker->name,
    ];
});
