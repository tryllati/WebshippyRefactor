<?php
require_once __DIR__ . '/vendor/autoload.php';

//var_dump($argv);

use webshippy\Argument;
use webshippy\ArgumentValidation;

$Argument = new Argument($argv);
$ArgumentValidation = new ArgumentValidation($Argument);

if(!$ArgumentValidation->argumentIsJson(1)){
    $ArgumentValidation->printErrorMessage();
    exit(1);
}






/*
if ($argc != 2) {
    echo 'Ambiguous number of parameters!';
    exit(1);
}

if (($stock = json_decode($argv[1])) == null) {
    echo 'Invalid json!';
    exit(1);
}*/
?>