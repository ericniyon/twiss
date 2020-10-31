<?php

/** @var  \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\QuestionOption;
use Faker\Generator as Faker;
use App\Models\Question;


$factory->define(QuestionOption::class, function (Faker $faker) {
    return [
        'question_id' => $faker->randomDigit,
        'option' => $faker->text,
        'correct' => $faker->boolean,
        //question BelongsTo Question question_id
    ];
});
