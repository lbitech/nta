<?php

$autoload = $_SERVER["PHP_SELF"] . '/parse-php-sdk/autoload.php';
echo $autoload;
echo 'diag 1';
require 'parse-php-sdk/autoload.php';
echo 'diag 2';
use Parse\ParseClient;
echo 'diag 3';
// Initializes with the <APPLICATION_ID>, <REST_KEY>, and <MASTER_KEY>
ParseClient::initialize( "6gUY2ACd17tsiDroxH6tmRTOx9P4S99LODf9P4lB", "qtLatc5USQoeYas8CUADRoUoJLWws0CP6a5inzmp", "nuKqVaJXBSsYJEg5p79KCY09pu2sU1pYzSvEEH8l" );
ParseClient::setServerURL('https://parseapi.back4app.com', '/');
echo 'diag 4';
use Parse\ParseQuery;
echo 'diag 5';
$query = new ParseQuery("Activity");
$results = $query->find();
foreach($results as $result) {
  echo 'Object found ' . $result->getObjectId() . '<br>';
}
echo 'diag 6';
?>