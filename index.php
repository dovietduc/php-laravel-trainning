<?php

// libarari validate

$dataForm = [
    'name' => '',
    'email' => '',
    'first_name' => 'duc',
    'email2' => ''
];


$rules = [
    'name' => [
        'reqired'
    ],
    'email' => [
        'reqired',
        'email',
        'min:3',
        'between:1,10',
        'required_with:name,first_name'
    ],
    'email2' => [
        'email:null'
    ]
];

require(__DIR__ . '/ValidateService.php');
// init data
$validate = new ValidateService($dataForm);
$validate->setRules($rules);

// validation
$validate->validate();

echo "<pre>";
print_r($validate->getErrors());




