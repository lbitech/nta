<head>
<link rel="stylesheet" href="https://unpkg.com/purecss@2.0.3/build/pure-min.css" integrity="sha384-cg6SkqEOCV1NbJoCu11+bm0NvBRc8IYLRGXkmNrqUBfTjmMYwNKPWBTIKyw9mHNJ" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="fade.css" >
</head>
<body>


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

$query = new ParseQuery("Activity");
$query->equalTo("cid", $_GET["cid"]);
$query->equalTo("aid", $_GET["aid"]);
$query->equalTo("uid", $USER->id);
$results = $query->find();
echo 'Number of records found now = ' . count($results) . ' for UID = ' . $USER->id  . '<br>';
foreach($results as $result) {

$rcount = count($results);
echo 'Rcount = ' . $rcount . '.<br><br>';
echo 'con= ' . $result->get('con') . '<br>';ß

}

?>


    <img src="clear-nta-logo.png" alt="Northern Training Academy" width="130" height="86" style="padding-left: 20px; padding-top: 20px; padding-bottom: 60px;">
    
    <form action="b4a.php" method="GET" class="pure-form pure-form-stacked" style="padding-left: 20px;" target="content">
        <fieldset>
            <legend> Learning Mentor Level 3 - Activity 1 </legend><br><br><br>
            
            <div class="pure-g" style="padding-bottom: 10px;">
                <div class="pure-u-1 pure-u-md-1-3">
                    <label for="multi-first-name">This is an example question</label><br>
                    <textarea rows="5" cols="80" name="comment_data" id="multi-first-name" class="pure-u-23-24"/><?php echo $_GET["comment_data"]; ?></textarea><br><br> 
                    <input type="hidden" name="cid" value="1">
                    <input type="hidden" name="aid" value="1">
                </div>
            <br><br>
            <button type="submit" class="pure-button pure-button-primary" style="padding-right: 20px;">Save</button>
            <img src="blank_space.png" width="30" height="30" style="padding-left: 5px; padding-right: 5px;">
            <button type="button" class="pure-button pure-button-primary" style="padding-left: 20px;" onclick="window.open('', '_self', ''); window.close();">Exit</button>
            
       </fieldset>
    </form>
    <iframe name="content" src="b4a.php" border:0 scrolling="no" frameBorder="0" style="padding-left: 15px;">
    </iframe>
</body>
<footer>
</footer>