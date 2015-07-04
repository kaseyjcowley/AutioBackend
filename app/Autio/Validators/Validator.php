<?php namespace Autio\Validators;

use Illuminate\Validation\Factory as IlluminateValidator;

use Autio\Exceptions\ValidationException;

abstract class Validator {
    
    /**
     * @var Validator
     */
    protected $validator;

    protected $validation;

    /**
     * @var $resource - The resource in question
     */
    protected $resource;

    /**
     * @param IlluminateValidator $validator [description]
     */
    function __construct(IlluminateValidator $validator)
    {
        $this->validator = $validator;
    }

    /**
     * Validates input from rules defined in child class
     * 
     * @param  array  $formData - The form data in question
     * @throws ValidationException
     * @return boolean
     */
    public function validate(array $formData)
    {
        $this->validation = $this->validator->make($formData, $this->getValidationRules(), $this->getCustomMessages());

        if ($this->validation->fails()) {
            throw new ValidationException("{$this->resource} validation failed", $this->getValidationErrors());
        }

        return true;
    }

    /**
     * Returns validation rules defined in child class
     * 
     * @return array
     */
    protected function getValidationRules() 
    {
        return $this->rules;
    }

    /**
     * Returns validation errors
     * 
     * @return array
     */
    protected function getValidationErrors()
    {
        return $this->validation->errors();
    }

    /**
     * Returns custom messages defined in child class
     * 
     * @return array
     */
    protected function getCustomMessages()
    {
        return $this->customMessages;
    }
}