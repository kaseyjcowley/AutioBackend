<?php
namespace Autio\Transformers;

use Autio\Helpers\Helpers;

class VehicleTransformer extends Transformer
{

    /**
     * @var MakeTransformer
     */
    protected $makeTransformer;

    /**
     * @var ModelTransformer
     */
    protected $modelTransformer;

    /**
     * @param MakeTransformer $makeTransformer
     * @param ModelTransformer $modelTransformer
     */
    function __construct(MakeTransformer $makeTransformer, ModelTransformer $modelTransformer)
    {
        $this->makeTransformer  = $makeTransformer;
        $this->modelTransformer = $modelTransformer;
    }

    /**
     * @param array $vehicle
     * @param boolean $showHref
     * @return array
     */
    public function transform($vehicle, $showHref = false)
    {
        $data = [
            'id'      => $vehicle->id,
            'year'    => $vehicle->year,
            'mileage' => $vehicle->mileage,
            'vin'     => $vehicle->vin,
            'links'   => [
                'make'  => $this->makeTransformer->transform($vehicle->model->make, true),
                'model' => $this->modelTransformer->transform($vehicle->model, true),
            ]
        ];

        if ($showHref)
            $data['href'] = route('vehicles.show', ['id' => $vehicle->id]);

        return $data;
    }

}
