<?php
namespace Autio\Transformers;

class MakeTransformer extends Transformer
{

  /**
   * @param $make
   * @return mixed
   */
  public function transform($make)
  {
    return [
      'id'   => $make->id,
      'name' => $make->name
    ];
  }

}
