<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder 
{

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$seeders = [
			'MakesTableSeeder',
			'ModelsTableSeeder',
			'VehiclesTableSeeder',
			'ServiceTypeSeeder',
			'ServiceRecordsSeeder'
		];

		Model::unguard();

		foreach ($seeders as $seeder)
			$this->call($seeder);
	}

}
