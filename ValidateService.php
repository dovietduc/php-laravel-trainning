<?php
require(__DIR__ . '/Valiadate/ReqiredValidate.php');
require(__DIR__ . '/Valiadate/EmailValidate.php');
require(__DIR__ . '/Valiadate/MinValidate.php');
require(__DIR__ . '/Valiadate/BetWeenValidate.php');
require(__DIR__ . '/Valiadate/RequiredWith.php');


class ValidateService {

    private $dataForm = [];

    private $rules = [];

    private $errors = [];

    private $rulesMap = [
        'reqired' => ReqiredValidate::class,
        'email' => EmailValidate::class,
        'min' => MinValidate::class,
        'between' => BetweenValidate::class,
        'required_with' => RequiredWith::class
    ];

    public function __construct($dataForm)
    {
        $this->dataForm = $dataForm;
    }

    public function setRules($rules) 
    {
        $this->rules = $rules;
    }


    public function validate() 
    {
        
        foreach($this->rules as $field => $rules) {
            // get field value
            $fieldValue = $this->dataForm[$field];

            // loop get item rule for item field
            foreach($rules as $rule) {

                $exploded = explode(":", $rule);
                $nameRule = $exploded[0];

                // pass paramater to contructor
                $optionals = explode(",", end($exploded));

                $className = $this->rulesMap[$nameRule];
                $instanceClass = new $className(...$optionals);

                // validate error -- this can use abstract class                
                if(!$instanceClass->passsedValidate($field, $fieldValue, $this->dataForm)) {
                    // push errors
                    $this->errors[$field][] = $instanceClass->getMessage($field);
                }

            }
            
        }

        return !$this->hasErrors();
        
    }

    public function getErrors() 
    {
        return $this->errors;
    }

    private function hasErrors() 
    {
        if(is_array($this->errors) && count($this->errors) > 0) {
            return true;
        }
        return false;
    }


   
}