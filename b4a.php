<?php

require "/opt/bitnami/apps/moodle/htdocs/config.php";
require_login();

$autoload = $_SERVER["PHP_SELF"] . '/parse-php-sdk/autoload.php';

require 'parse-php-sdk/autoload.php';

use Parse\ParseClient;

// Initializes with the <APPLICATION_ID>, <REST_KEY>, and <MASTER_KEY>
ParseClient::initialize( "6gUY2ACd17tsiDroxH6tmRTOx9P4S99LODf9P4lB", "qtLatc5USQoeYas8CUADRoUoJLWws0CP6a5inzmp", "nuKqVaJXBSsYJEg5p79KCY09pu2sU1pYzSvEEH8l" );
ParseClient::setServerURL('https://parseapi.back4app.com', '/');

use Parse\ParseQuery;
use Parse\ParseException;
use Parse\ParseObject;

if (!empty($USER->id)) {
$query = new ParseQuery("Activity");
$query->equalTo("cid", $_GET["cid"]);
$query->equalTo("aid", $_GET["aid"]);
//$query->equalTo("uid", $_GET["uid"]);
$query->equalTo("uid", $USER->id);
$results = $query->find();
echo 'Number of records found now = ' . count($results) . ' for UID = ' . $USER->id  . '<br>';
foreach($results as $result) {
echo 'Object found ' . $result->getObjectId() . '<br>';
echo 'Content = ' . $result->get("con") . '<br>';
$rcount = count($results);
// Call recordUpdate
//recordUpdate($rcount);
recordUpdate(1);
}
        
} else {  
    echo "No, CID not set.";
}


function recordUpdate(int $reccount) {

    echo '<br><br> Test value = ' . $reccount . '<br><br>';

switch (true) {

        case $reccount == 0:
        echo '<br><br> New record required.';

        $myCustomObject = new ParseObject("Activity");

        $myCustomObject->set("cid", "1");
        $myCustomObject->set("aid", "1");
        $myCustomObject->set("uid", $USER->id);
        $myCustomObject->set("con", $_GET["comment_data"]);

        try {
        $myCustomObject->save();
        echo 'New object created with objectId: ' . $myCustomObject->getObjectId();
        } catch (ParseException $ex) {
        // Execute any logic that should take place if the save fails.
        // error is a ParseException object with an error code and message.
        echo 'Failed to create new object, with error message: ' . $ex->getMessage();
        }

        break;
    
        case $reccount == 1:
        echo '<br><br> Record exists.';

        $targetObj = $results[0]->getObjectId();
        echo '<br><br> Target objectId = ' . $targetObj . '<br><br>';

        $query = new ParseQuery("Activity");
        try {
        $activityCon = $query->get($targetObj);
        // The object was retrieved successfully.
        echo 'Get rec success <br><b>';
        $activityCon->set("con", $_GET["comment_data"]);
        $activityCon->save();
        } catch (ParseException $ex) {
        // The object was not retrieved successfully.
        // error is a ParseException with an error code and message.
        echo 'Get rec fail <br><b>';
        }

        break;
    /*    
        case $reccount >= 2:
        echo '<br><br> Error! greater than 1 record.';

        break;
    */
}

}

?>