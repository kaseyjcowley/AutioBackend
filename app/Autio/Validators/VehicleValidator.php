<?php
namespace Autio\Validators;

class VehicleValidator extends Validator
{

	protected $resource = 'Vehicle';

	protected $rules = [
		'year'     => 'required|digits:4',
		'model_id' => 'required|numeric|exists:models,id',
		'mileage'  => 'required|numeric',
		'vin'      => 'required|alpha_num|size:17'
	];

	protected $customMessages = [
		'model_id.required' => 'A vehicle model is required.',
		'model_id.exists' => 'The vehicle model must be chosen from existing vehicle models.'
	];

}
