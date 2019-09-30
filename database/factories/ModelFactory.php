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

    use Carbon\Carbon;
    use Faker\Generator;

    $factory->define('App\Activity', function (Generator $faker) {
        return [
            'name' => $faker->unique()->name,
            'startDate' => Carbon::now()->format('Y-m-d H:i:s'),
            'endDate' => Carbon::now()->format('Y-m-d H:i:s'),
            'category_id' => function() {
                return factory('App\Category')->create()->id;
            },
            'timetable_id' => function() {
                return factory('App\Timetable')->create()->id;
            }
        ];
    });

    $factory->define('App\Category', function (Generator $faker) {
        return [
            'name' => $faker->unique()->word,
            'color' => '#000000'
        ];
    });

    $factory->define('App\Timetable', function(Generator $faker) {
        return [
            'name' => $faker->unique()->word,
            'color' => '#000000'
        ];
    });
