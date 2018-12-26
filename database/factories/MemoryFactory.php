<?php

use Faker\Generator as Faker;

$factory->define(App\Memory::class, function (Faker $faker) {
    return [
        'group_id' => $faker->numberBetween($min = 1, $max = config('factories.group.number')),
        'period' => $faker->bothify('Period #?#?'),
        'date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'content' => $faker->sentence,
        'remarks' => $faker->word,
    ];
});
