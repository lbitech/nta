<?php
$autoload = $_SERVER["PHP_SELF"] . '/parse-php-sdk/autoload.php';

require 'parse-php-sdk/autoload.php';

use Parse\ParseClient;
use Parse\ParseException;

// Initializes with the <APPLICATION_ID>, <REST_KEY>, and <MASTER_KEY>
ParseClient::initialize( "6gUY2ACd17tsiDroxH6tmRTOx9P4S99LODf9P4lB", "qtLatc5USQoeYas8CUADRoUoJLWws0CP6a5inzmp", "nuKqVaJXBSsYJEg5p79KCY09pu2sU1pYzSvEEH8l" );
ParseClient::setServerURL('https://parseapi.back4app.com', '/');

use Parse\ParseQuery;

if (!empty($_GET["cid"])) {
$query = new ParseQuery("Activity");
$query->equalTo("cid", $_GET["cid"]);
$query->equalTo("aid", $_GET["aid"]);
$query->equalTo("uid", $_GET["uid"]);
$results = $query->find();
echo 'Number of records found now = ' . count($results) . '<br>';
foreach($results as $result) {
echo 'Object found ' . $result->getObjectId() . '<br>';
echo 'Content = ' . $result->get("con") . '<br>';
}
        
} else {  
    echo "No, CID not set.";
}

switch (true) {
    case count($results) <= 0:
        echo '<br><br> New record required.';
        break;

    case count($results) == 1:
        echo '<br><br> Record exists.';

        $query = new ParseQuery("UpdateCount");
        try {
        $myCustomObject = $query->get("AOICOD7sGK");
        // The object was retrieved successfully.

        // Update any data you want with the "set" method,
        // providing the attribute name and the new value
        $val = $myCustomObject->get("Updates");
        $val = $val + 1;
        $myCustomObject->set("Updates", $val);

        // And then save your changes
        $myCustomObject->save();
        } catch (ParseException $ex) {
        // The object was not retrieved successfully.
        // error is a ParseException with an error code and message.
        }

        break;

    case count($results) > 1:
        echo '<br><br> Error! greater than 1 record.';
        break;
}

?>