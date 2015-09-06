<?php
namespace App\Http\Controllers;

use Autio\Repositories\ServiceRecordsRepository;

use Illuminate\Http\Request;

class ServiceRecordsController extends BaseApiController
{

  /** @var ServiceRecordsRepository */
  protected $repo;

  /**
   * @param ServiceRecordsRepository $repo
   */
  function __construct(ServiceRecordsRepository $repo)
  {
    $this->repo = $repo;
  } 

  /**
   * Return all service records for a vehicle
   * @param  integer $vehicle_id 
   * @return JSON
   */
  public function index($vehicle_id) 
  {
    if (!$vehicle_id)
      return $this->respondBadRequest('Invalid data', [
        "Invalid vehicle_id parameter: {$vehicle_id}. Please provide us with a valid vehicle id."
      ]);

    return $this->respondOk(
      $this->repo->findForVehicle($vehicle_id)
    );
  }

}