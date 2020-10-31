<?php

/** @var  \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Partner;
use Faker\Generator as Faker;


$factory->define(Partner::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'logo' => $faker->text,
        'contract' => $faker->text,
        'tel' => $faker->text,
        'email' => $faker->safeEmail,
        'web_link' => $faker->text,
    ];
});
