<?php
namespace Autio\Transformers;

class ModelTransformer extends Transformer
{

  /**
   * @param $model
   * @return mixed
   */
  public function transform($model)
  {
    return [
      'id'   => $model->id,
      'name' => $model->name
    ];
  }

}
