<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Device;
use Faker\Generator as Faker;

$factory->define(Device::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement(array('mouse', 'keyboard', 'monitor', 'laptop', 'tablet', 'phone')),
        'machine_code' => $faker->ean8,
        'price' => $faker->numberBetween($min = 1000, $max = 9000),
        'status' => $faker->boolean(),
        'brand' => $faker->randomElement(array ('apple','asus','hp'))
    ];
});
