<?php 
namespace Autio\Transformers;

use Illuminate\Database\Eloquent\Collection;

abstract class Transformer {

	/**
	 * @param $items
	 * @return array
	 */
	public function transformCollection(Collection $items)
	{
		$data = $items->map(function ($item) {
			return $this->transform($item);
		})->toArray();

		return $data;
	}

	/**
	 * @param $item
	 * @return mixed
	 */
	public abstract function transform($item);

}
