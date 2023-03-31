<?php

class RequiredWith {

    private $fields;

    public function __construct(...$fields)
    {
        $this->fields = $fields;
    }

    public function passsedValidate($field, $value, $dataForm) 
    {
        if(!$value){
            foreach($this->fields as $field) {
                if(!empty($field)) {
                    return false;
                }
            }
        }
        return true;
    }

    public function getMessage($field)
    {
        return $field . ' required with ' . implode(",", $this->fields);
    }
}