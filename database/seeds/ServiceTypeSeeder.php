<?php

use Illuminate\Database\Seeder;

use Autio\Models\ServiceType;

class ServiceTypeSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    ServiceType::create(['type' => 'Oil Change']);
    ServiceType::create(['type' => 'Transmission Flush']);
    ServiceType::create(['type' => 'Brake Service']);
  }
}
