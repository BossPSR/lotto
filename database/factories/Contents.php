<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Models\Contents::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'description' => $faker->text,
    ];
});
