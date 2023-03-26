<?php

class MinValidate {

    private $fieldValue;
    private $min;

    public function __construct($fieldValue, $min){
        $this->fieldValue = $fieldValue;
        $this->min = $min;
    }

    public function passsedValidate() {
        if(strlen($this->fieldValue) >= $this->min) {
            return true;
        }
        return false;
    }

    public function getMessage(){
        return ' must have ' . $this->min . ' character';
    }
}