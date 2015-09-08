<?php
namespace Autio\Transformers;

class ServiceRecordsTransformer extends Transformer
{

  /**
   * @param $service_record
   * @return array
   */
  public function transform($service_record, $showHref = false)
  {
    return [
      'id' => $service_record->id,
      'vehicle_id' => $service_record->vehicle_id,
      'other_description' => $service_record->other_description,
      'mileage_performed_at' => $service_record->mileage_performed_at,
      'performed_on' => $service_record->performed_on,
      'notes' => $service_record->notes
    ];
  }

}