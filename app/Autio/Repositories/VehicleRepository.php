<?php
namespace Autio\Repositories;

use Autio\Interfaces\RepositoryInterface;
use Autio\Models\Vehicle;

use Illuminate\Database\Eloquent\ModelNotFoundException;

class VehicleRepository implements RepositoryInterface
{

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
    $vehicle = new Vehicle;

    $vehicle->year     = $data['year'];
    $vehicle->model_id = $data['model_id'];
    $vehicle->mileage  = $data['mileage'];
    $vehicle->vin      = $data['vin'];

    $vehicle->save();

    return $vehicle->id;
  }

}
