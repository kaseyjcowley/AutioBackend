<?php

use Autio\Models\Make;

use Illuminate\Database\Seeder;

class MakesTableSeeder extends Seeder
{

  public function run()
  {
    $makes = require('data/makes.php');
    sort($makes);
    
    foreach ($makes as $make)
      Make::create(['name' => $make]);
  }

}
