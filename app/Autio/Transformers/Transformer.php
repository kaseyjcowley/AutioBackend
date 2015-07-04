<?php namespace Autio\Transformers;

use Illuminate\Database\Eloquent\Collection;

abstract class Transformer {

	/**
	 * @param $items
	 * @return array
	 */
	public function transformCollection(Collection $items, $showHref = false)
	{
		$data = $items->map(function ($item) use($showHref) {
			return $this->transform($item, $showHref);
		})->toArray();

		return $data;
	}

	/**
	 * @param $item
	 * @return mixed
	 */
	public abstract function transform($item, $showHref = false);

}
