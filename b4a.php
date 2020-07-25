<?php
$autoload = $_SERVER["PHP_SELF"] . '/parse-php-sdk/autoload.php';

require 'parse-php-sdk/autoload.php';

use Parse\ParseClient;

// Initializes with the <APPLICATION_ID>, <REST_KEY>, and <MASTER_KEY>
ParseClient::initialize( "6gUY2ACd17tsiDroxH6tmRTOx9P4S99LODf9P4lB", "qtLatc5USQoeYas8CUADRoUoJLWws0CP6a5inzmp", "nuKqVaJXBSsYJEg5p79KCY09pu2sU1pYzSvEEH8l" );
ParseClient::setServerURL('https://parseapi.back4app.com', '/');

use Parse\ParseQuery;

if (!empty($_GET["mail"])) {
$query = new ParseQuery("Activity");
$query->equalTo("cid", "1");
$query->equalTo("aid", "1");
$query->equalTo("uid", "7452957");
$results = $query->find();
foreach($results as $result) {
echo 'Object found ' . $result->getObjectId() . '<br>';
echo 'Content = ' . $result->get("con") . '<br>';
}
        
} else {  
    echo "No, mail is not set";
}

echo 'Stuff';

?>