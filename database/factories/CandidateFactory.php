<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Candidate;
use Faker\Generator as Faker;

$factory->define(Candidate::class, function (Faker $faker) {
    return [
        'email' => $faker->unique()->safeEmail,
        'name' => $faker->name(),
        'address' => [
            'city' => $faker->city,
            'country' => $faker->country,
            'street' => $faker->streetName,
        ],
        'gender' => $faker->randomElement(array('male', 'female')),
        'apply_way' => $faker->randomElement(array('fb', 'itviec', 'topdev')),
        'cv' => $faker->imageUrl($width = 640, $height = 480),
        'phone' => $faker->phoneNumber,
        'worker_type' => $faker->randomElement(array('inter', 'fulltime'))
    ];
});
