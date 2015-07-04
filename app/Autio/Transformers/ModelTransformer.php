<?php namespace Autio\Transformers;

use App\Helpers\Helpers;

class ModelTransformer extends Transformer
{

  /**
   * @param $model
   * @param $showHref
   * @return mixed
   */
  public function transform($model, $showHref = false)
  {
    $data = [
      'id'   => $model->id,
      'name' => $model->name
    ];

    if ($showHref)
    $data['href'] = Helpers::get_resource_href('App\Http\Controllers\ModelsController', $model->id);

    return $data;
  }
  
}
