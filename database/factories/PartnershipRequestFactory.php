<?php

/** @var  \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\PartnershipRequest;
use Faker\Generator as Faker;


$factory->define(PartnershipRequest::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'interest' => $faker->text,
        'tel' => $faker->text,
        'email' => $faker->safeEmail,
        'accepted' => $faker->boolean,
    ];
});
