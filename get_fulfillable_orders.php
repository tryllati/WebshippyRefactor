<?php

require_once __DIR__ . '/vendor/autoload.php';

use webshippy\Ordering;
use webshippy\Argument;
use webshippy\ArgumentValidation;
use webshippy\File\CsvFile;
use webshippy\FulfillableOrder; 


$Argument = new Argument($argv);
$ArgumentValidation = new ArgumentValidation($Argument);

if(!$ArgumentValidation->argumentIsJson(1)){
    $ArgumentValidation->printErrorMessage();
    exit(1);
}

$CsvFile = new CsvFile('orders.csv');
$CsvFile->setFilePath(__DIR__);
$CsvFile->readWithOriginal();

$FulfillableOrder = new FulfillableOrder();
$FulfillableOrder->setOrders($CsvFile->getRows());
$FulfillableOrder->settingFulFillablOrders();
//$FulfillableOrder->getOrders();



?>