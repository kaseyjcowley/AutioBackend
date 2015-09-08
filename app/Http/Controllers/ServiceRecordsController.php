<?php
namespace App\Http\Controllers;

use Autio\Repositories\ServiceRecordsRepository;
use Autio\Transformers\ServiceRecordsTransformer;

use Illuminate\Http\Request;

class ServiceRecordsController extends BaseApiController
{

  /** @var ServiceRecordsRepository */
  protected $repo;

  /** @var ServiceRecordsTransformer */
  protected $transformer;

  /**
   * @param ServiceRecordsRepository $repo
   */
  function __construct(
    ServiceRecordsRepository $repo,
    ServiceRecordsTransformer $transformer
  ) {
    $this->repo = $repo;
    $this->transformer = $transformer;
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

    $service_records = $this->repo->findForVehicle($vehicle_id);

    return $this->respondOk([
      "service_records" => $this->transformer->transformCollection($service_records)
    ]);
  }

}