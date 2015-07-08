<?php
namespace Autio\Transformers;

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
      $data['href'] = route('models.show', ['id' => $model->id]);

    return $data;
  }

}
