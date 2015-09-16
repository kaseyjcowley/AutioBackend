<?php
namespace Autio\Transformers;

use Autio\Helpers\Helpers;

class VehicleTransformer extends Transformer
{

    /**
     * @param array $vehicle
     * @return array
     */
    public function transform($vehicle)
    {
      return [
        'id'      => $vehicle->id,
        'year'    => $vehicle->year,
        'mileage' => $vehicle->mileage,
        'vin'     => $vehicle->vin,
        'make'  => (new MakeTransformer)->transform($vehicle->model->make),
        'model' => (new ModelTransformer)->transform($vehicle->model),
      ];
    }

  }
