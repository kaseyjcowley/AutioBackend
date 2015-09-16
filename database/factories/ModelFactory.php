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

$factory->define(App\User::class, function ($faker) {
  return [
    'name' => $faker->name,
    'email' => $faker->email,
    'password' => str_random(10),
    'remember_token' => str_random(10)
  ];
});

$factory->define(Autio\Models\Vehicle::class, function ($faker) {
  $model_ids = Autio\Models\Model::lists('id')->all();
  return [
    'year' => $faker->dateTimeBetween('-74 years'),
    'model_id' => $faker->randomElement($model_ids),
    'mileage' => $faker->numberBetween(100, 200000),
    'vin' => $faker->bothify('####??####??###??')
  ];
});

$factory->define(Autio\Models\ServiceRecord::class, function ($faker) {
  $vehicle_ids = Autio\Models\Vehicle::lists('id')->all();
  return [
    'vehicle_id' => $faker->randomElement($vehicle_ids),
    'type_id' => $faker->randomElement([1,2,3]),
    'other_description' => $faker->sentence(),
    'mileage_performed_at' => $faker->numberBetween(100, 200000),
    'performed_on' => $faker->dateTimeThisYear(),
    'notes' => $faker->paragraph()
  ];
});
