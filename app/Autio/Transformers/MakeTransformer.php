<?php
namespace Autio\Transformers;

class MakeTransformer extends Transformer
{

  /**
   * @param $make
   * @param $showHref
   * @return mixed
   */
  public function transform($make, $showHref = false)
  {
      $data = [
        'id'   => $make->id,
        'name' => $make->name
      ];

      if ($showHref)
        $data['href'] = route('makes.show', ['id' => $make->id]);

      return $data;
  }

}
