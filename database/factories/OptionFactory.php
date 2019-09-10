<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Option;
use Faker\Generator as Faker;

$factory->define(Option::class, function (Faker $faker) {
    return [
        'group' => $faker->word,
        'key' => $faker->word,
        'value' => $faker->word
    ];
});
