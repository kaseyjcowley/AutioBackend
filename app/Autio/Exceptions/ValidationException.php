<?php namespace Autio\Exceptions;

use Exception;

class ValidationException extends Exception {

	/**
	 * @var array
	 */
	protected $errors;

	/**
	 * @param string $message - The error message
	 * @param array $errors  - An array of errors
	 */
	function __construct($message, $errors = []) 
	{
		$this->errors = $errors;
		parent::__construct($message);	
	}

	/**
	 * Returns errors
	 * 
	 * @return array
	 */
	public function getErrors()
	{
		return $this->errors;
	}
}