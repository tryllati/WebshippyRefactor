<?php

require_once __DIR__ . '/vendor/autoload.php';

use webshippy\Argument;
use webshippy\ArgumentValidation;
use webshippy\File\CsvFile;


$Argument = new Argument($argv);
$ArgumentValidation = new ArgumentValidation($Argument);

if(!$ArgumentValidation->argumentIsJson(1)){
    $ArgumentValidation->printErrorMessage();
    exit(1);
}

$CsvFile = new CsvFile('orders.csv');
$CsvFile->setFilePath(__DIR__);
//$CsvFile->readAndSplitHeader();
$CsvFile->readWithOriginal();


?>