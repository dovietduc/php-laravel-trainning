<?php

class EmailValidate {
    private $fieldValue;
    public function __construct($fieldValue){
        $this->fieldValue = $fieldValue;
    }

    public function passsedValidate() {
       
        if(filter_var($this->fieldValue, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }

    public function getMessage(){
        return ' not format email';
    }
}