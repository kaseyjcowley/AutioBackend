<?php

use Autio\Models\Model;
use Autio\Models\Make;
use Illuminate\Database\Seeder;

class ModelsTableSeeder extends Seeder
{

  public function run()
  {
    $makes = Make::lists('id', 'name');
    $models = require('data/models.php');

    foreach ($models as $make => $models) {
      foreach ($models as $model) {
        Model::create([
          'make_id' => $makes[$make],
          'name' => $model
          ]);
      }
    }
  }
  
}
