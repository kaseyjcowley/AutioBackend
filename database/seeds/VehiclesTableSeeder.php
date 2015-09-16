<?php

use Autio\Models\Vehicle;
use Autio\Models\Model;
use Illuminate\Database\Seeder;

class VehiclesTableSeeder extends Seeder
{

  public function run()
  {
    factory(Vehicle::class, 20)->create();
  }

}
