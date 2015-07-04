<?php

use Illuminate\Database\Seeder;
use Autio\Models\Make;

class MakesTableSeeder extends Seeder {

    public function run()
    {

        $makes = [
            'Acura', 'Audi', 'BMW', 'Honda', 'Mazda', 'Mercedes-Benz', 'Kia', 'Hyundai', 'Fiat', 'Infiniti',            'Mitsubishi', 'Lexus', 'Jaguar', 'Nissan', 'Toyota', 'Chrysler', 'Dodge', 'SRT', 'Jeep',                   'Plymouth', 'Ram', 'Ford', 'Lincoln', 'Mercury', 'General Motors', 'Buick', 'Cadillac',                    'Chevrolet', 'Geo', 'GMC', 'Hummer', 'Pontiac', 'Oldsmobile', 'Saturn', 'Aston Martin', 'Mini',            'Subaru', 'Suzuki', 'Volkswagen', 'Volvo'
        ];

        foreach ($makes as $make) {
            Make::create(['name' => $make]);
        }

    }

}
