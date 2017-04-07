<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
ini_set("soap.wsdl_cache_enabled", "0");

include  '../Model/DataBase.php';
include 'Soap.php';
include 'ReferenceResponse.php';
include 'Date.php';

$soap = new Soap();
$db = new DataBase();
$date = new Date();
$xml = new ReferenceResponse(REFERENCE);

if (!$db->connect()) {
    echo $db->exception;
    die;
}

$date->start();
if($soap->connect()){
    $request = $soap->request(TAXI_NUM);
    $date->end();
    $date->difference();
    $compare = $xml->compare($request);
} else {
    echo $soap->exception;
    die;
}
$db->fillParams($compare, $date->requestDate, $date->responseDate, $date->interval, serialize($request));
$db->insert();