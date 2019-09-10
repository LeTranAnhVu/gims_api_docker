<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => 'admin',
        'email' => 'a@a.com',
        'gender' => $faker->randomElement(array('male', 'female')),
        'address' => [
            'city' => $faker->city,
            'country' => $faker->country,
            'street' => $faker->streetName,
        ],
        'contact' => [
            'personal' => $faker->phoneNumber,
            'relatives' => $faker->phoneNumber,
        ],
        'finance' => [
            'accountName' => $faker->name,
            'accountNumber' => $faker->bankAccountNumber,
        ],
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
    ];
});
