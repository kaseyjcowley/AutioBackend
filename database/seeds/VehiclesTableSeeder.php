<?php

use Autio\Models\Vehicle;
use Autio\Models\Model;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class VehiclesTableSeeder extends Seeder
{

  public function run()
  {
    $faker = Faker::create();

    $modelIds = Model::lists('id');

    for ($i = 0; $i < 20; $i++) {
      Vehicle::create([
        'year'     => $faker->year(),
        'model_id' => $faker->randomElement($modelIds->toArray()),
        'mileage' => $faker->numberBetween(0, 200000),
        'vin' => $faker->bothify('##?#???##?##???#??#')
      ]);
    }
  }

}
