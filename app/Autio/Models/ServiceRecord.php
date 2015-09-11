<?php
namespace Autio\Models;

use Illuminate\Database\Eloquent\Model as BaseModel;

class ServiceRecord extends BaseModel
{

  protected $fillable = [
    'type_id',
    'other_description',
    'mileage_performed_at',
    'performed_on',
    'notes'
  ];

  /**
   * Query scope for getting the most recent records by vehicle id
   * @param $query
   * @param $vehicle_id
   * @return QueryBuilder
   */
  public function scopeMostRecentFor($query, $vehicle_id)
  {
    return $query->where('vehicle_id', '=', $vehicle_id)
      ->orderBy('performed_on', 'desc');
  }

  /**
   * Returns the service record type
   * @return Illuminate\Database\Eloquent\Relations\belongsTo
   */
  public function type()
  {
    return $this->belongsTo(ServiceType::class);
  }

}