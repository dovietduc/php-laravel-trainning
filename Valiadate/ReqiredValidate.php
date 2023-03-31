<?php

class ReqiredValidate {

    
    public function passsedValidate($field, $value) 
    {
        if($value) {
            return true;
        }
        return false;        
    }

    public function getMessage($field)
    {
        return $field . ' not empty';
    }
}