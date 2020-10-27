<?php

/** @var  \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Question;
use Faker\Generator as Faker;
use App\Models\QuestionOption;
use App\Models\Quiz;


$factory->define(Question::class, function (Faker $faker) {
    return [
        'question_text' => $faker->text,
        'quiz_id' => $faker->randomDigit,
        //question_options HasMany QuestionOption id
        //quiz BelongsTo Quiz quiz_id
    ];
});
