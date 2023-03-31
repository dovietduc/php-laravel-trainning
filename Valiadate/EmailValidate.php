<?php

class EmailValidate {

    private $optional;

    public function __construct($optional)
    {
        $this->optional = $optional;
    }

    public function passsedValidate($field, $value) 
    {
        if($this->optional === 'null') {
            return true;
        }
        if (filter_var($value, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
       
    }

    public function getMessage($field)
    {
        return $field . ' not format email';
    }
}