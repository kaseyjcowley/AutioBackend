<?php namespace Autio\Repositories;

use Autio\Interfaces\RepositoryInterface as RepositoryInterface;

use Illuminate\Database\Eloquent\ModelNotFoundException;

use Autio\Models\Vehicle;

class VehicleRepository implements RepositoryInterface {

	/**
	 * @var Vehicle
	 */
	protected $vehicleModel;

	/**
	 * @param Vehicle $vehicleModel
	 */
	function __construct()
	{
		$this->vehicleModel = new Vehicle;
	}

	/**
	 * Gets all vehicles
	 */
	public function getAll()
	{
		return Vehicle::all();
	}

	/**
	 * Gets a vehicle by id
	 *
	 * @param $id
	 * @throws ModelNotFoundException
	 * @return Vehicle
	 */
	public function get($id)
	{
		return Vehicle::findOrFail($id);
	}

	/**
	 * Creates a vehicle
	 *
	 * @param  array  $data - Input data
	 * @return int - New vehicle id
	 */
	public function create(array $data)
	{
		$this->vehicleModel->year     = $data['year'];
		$this->vehicleModel->model_id = $data['model_id'];
		$this->vehicleModel->mileage  = $data['mileage'];
		$this->vehicleModel->vin      = $data['vin'];

		$this->vehicleModel->save();

		return $this->vehicleModel->id;
	}

}
