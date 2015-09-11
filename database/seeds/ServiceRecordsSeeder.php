<?php

use Illuminate\Database\Seeder;
use League\FactoryMuffin\Facade as FactoryMuffin;

use Autio\Models\ServiceRecord;

class ServiceRecordsSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    factory(ServiceRecord::class, 100)->create();
  }
}
