<?php namespace Autio\Transformers;

use App\Helpers\Helpers;

class MakeTransformer extends Transformer {

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
            $data['href'] = Helpers::get_resource_href('App\Http\Controllers\MakesController', $make->id);

        return $data;
    }

}
