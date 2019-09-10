<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\Role::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->randomElement(['admin', 'user']),
        'guard_name' => 'api'
    ];
});
