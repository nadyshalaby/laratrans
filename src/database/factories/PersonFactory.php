<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Person;
use Faker\Factory;
use Faker\Generator as Faker;

$factory->define(Person::class, function (Faker $faker) {
    return [
        'age' => $faker->randomNumber(2),
        'hight' => $faker->randomFloat(2, 150, 190),
        'weight' => $faker->randomFloat(2, 50, 90),
    ];
});

$fakerAr = Factory::create('ar_SA');

$factory->afterCreating(Person::class, function (Person $person, Faker $faker) use ($fakerAr) {
    $person->details()->create([
        'name' => $faker->name,
        'bio' => $faker->paragraph,
        'locale_id' => 1 //for english,
    ]);

    $person->details()->create([
        'name' => $fakerAr->name,
        'bio' => $fakerAr->realText(200),
        'locale_id' => 2 //for arabic,
    ]);
});
