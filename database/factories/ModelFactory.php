<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

    $factory->define('App\Activity', function (Faker\Generator $faker) {
        return [
            'name' => $faker->name,
            'startDate' => $faker->dateTime,
            'endDate' => $faker->dateTime,
            'category_id' => function() {
                return factory('App\Category')->create()->id;
            }
        ];
    });

    $factory->define('App\Category', function (Faker\Generator $faker) {
        return [
            'name' => $faker->word,
            'color' => '#000000'
        ];
    });
