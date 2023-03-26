<?php

// libarari validate

$dataForm = [
    'name' => '',
    'email' => '',
    'first_name' => ''
];

$rules = [
    'name' => 'reqired',
    'email' => 'reqired|email',
    'first_name' => 'reqired|min:3'
];

require(__DIR__ . '/ValidateService.php');
// init data
$validate = new ValidateService($dataForm);
$validate->setRules($rules);


// validate
$validate->validate();
// get errors

echo "<pre>";
print_r($validate->getErrors());


// $valueRule = $this->dataForm[$field];

// // check rule have |
// if(strpos($rule, "|")) {

//     // apply validate for string have | example: reqired|email
//     $ruleArray = explode("|", $rule);
//     foreach($ruleArray as $ruleItem) {

//         if(strpos($ruleItem, ":")) { 

//             $ruleOptional = explode(":", $ruleItem);
//             $functionValidate = $ruleOptional[0] . 'Validate';
//             $this->$functionValidate($valueRule, $field, $ruleOptional[1]);
//         } else {
//             $functionValidate = $ruleItem . 'Validate';
//             // function call validate dynamic
//             $this->$functionValidate($valueRule, $field);
//         }
       
//     }



