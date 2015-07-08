<?php

use Autio\Models\Make;

use Illuminate\Database\Seeder;

class MakesTableSeeder extends Seeder
{

    public function run()
    {
      // TODO: Extract this to it's own file.
      $makes = [
        'Acura',
        'Audi',
        'BMW',
        'Honda',
        'Mazda',
        'Mercedes-Benz',
        'Kia',
        'Hyundai',
        'Fiat',
        'Infiniti',
        'Mitsubishi',
        'Lexus',
        'Jaguar',
        'Nissan',
        'Toyota',
        'Chrysler',
        'Dodge',
        'SRT',
        'Jeep',
        'Plymouth',
        'Ram',
        'Ford',
        'Lincoln',
        'Mercury',
        'General Motors',
        'Buick',
        'Cadillac',
        'Chevrolet',
        'Geo',
        'GMC',
        'Hummer',
        'Pontiac',
        'Oldsmobile',
        'Saturn',
        'Aston Martin',
        'Mini',
        'Subaru',
        'Suzuki',
        'Volkswagen',
        'Volvo'
      ];

      sort($makes);

      foreach ($makes as $make) {
          Make::create(['name' => $make]);
      }
    }

}
