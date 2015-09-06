<?php
namespace Autio\Repositories;

use Autio\Models\ServiceRecord;

class ServiceRecordsRepository
{

  /**
   * Finds {$number} service records by a vehicle id
   * @param integer $vehicle_id
   * @param integer $number - number of records to display
   * @return array
   */
  public function findForVehicle($vehicle_id, $number = 5)
  {
    // TODO: Perhaps pagination is useful here?
    return ServiceRecord::mostRecentFor($vehicle_id)
      ->take($number)
      ->get()
      ->toArray();
  }

}