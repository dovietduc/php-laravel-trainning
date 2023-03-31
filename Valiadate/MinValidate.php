<?php

class MinValidate {

    private $min;

    public function __construct($min)
    {
        $this->min = $min;
    }

    public function passsedValidate($field, $value) 
    {
        if(strlen($value) >= $this->min) {
            return true;
        }
        return false;
    }

    public function getMessage($field)
    {
        return $field . ' must have ' . $this->min . ' character';
    }
}