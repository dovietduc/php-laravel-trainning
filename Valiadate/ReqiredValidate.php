<?php

class ReqiredValidate {

    private $fieldValue;
    public function __construct($fieldValue){
        $this->fieldValue = $fieldValue;
    }

    public function passsedValidate() {
        if($this->fieldValue) {
            return true;
        }
        return false;
    }

    public function getMessage(){
        return ' not empty';
    }
}