<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\Deposits::class, function (Faker $faker) {
    return [
        'user_id' => rand(1, 100),
        'status' => 'pending',
        'amount' => rand(500, 1000000)
    ];
});
