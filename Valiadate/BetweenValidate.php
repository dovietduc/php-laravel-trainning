<?php

class BetweenValidate {

    private $min;

    private $max;

    public function __construct($min, $max)
    {
        $this->min = $min;
        $this->max = $max;
    }

    public function passsedValidate($field, $value) 
    {
        if(strlen($value) < $this->min){
            return false;
        }
        if(strlen($value) > $this->max){
            return false;
        }
        return true;
      
    }

    public function getMessage($field)
    {
        return $field . ' between ' . $this->min . ' and ' . $this->max . ' character';
    }
}