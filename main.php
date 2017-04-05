<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
ini_set("soap.wsdl_cache_enabled", "0");

include 'DataBase.php';
include 'Soap.php';

//$soap = new Soap();
$dateTime = new DateTime('NOW');
$params = array(
    EQUAL => 0,
    TIME => 4,
    REQUEST_DATE => $dateTime->format( 'Ymd H:i' ),
    RESPONSE_DATE => $dateTime->format( 'Ymd H:i' ),
    RESPONSE_BODY => 'object(stdClass)#2 (1) {
                        ["GetTaxiInfosResult"]=>
                        object(stdClass)#3 (0) {
                        }
                      }',
);


$db = new DataBase();
if ($db->connect()) {
    $res = $db->insert($params);
} else {
    echo '<pre>';
    var_dump($db->exception);
    echo '</pre>';
}
//if($soap->connect()){
//    $request = $soap->request();
//} else {
//    
//}