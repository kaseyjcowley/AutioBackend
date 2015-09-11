<?php
namespace Autio\Transformers;

class ServiceRecordsTransformer extends Transformer
{

  protected $service_type;

  function __construct(ServiceTypeTransformer $service_type)
  {
    $this->service_type = $service_type;
  }

  /**
   * @param $service_record
   * @return array
   */
  public function transform($service_record, $showHref = false)
  {
    return [
      'id' => $service_record->id,
      'vehicle_id' => $service_record->vehicle_id,
      'type' => $this->service_type->transform($service_record->type),
      'other_description' => $service_record->other_description,
      'mileage_performed_at' => $service_record->mileage_performed_at,
      'performed_on' => $service_record->performed_on,
      'notes' => $service_record->notes
    ];
  }

}