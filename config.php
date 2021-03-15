<?php
/**
 * 
 * @package Login With Sngine
 * @author pvspike
 * @download https://github.com/pvspike/Login-With-Sngine
 */

session_start();
##### DB Configuration #####
$servername = "localhost";
$username = "demo";
$password = "demopass";
$db = "demodb";



##### Create connection #####
$conn = new mysqli($servername, $username, $password, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$SNGINE_NAME = 'Demo Sngine';

$SNGINE_URL = 'https://demo.sngine.com'; //Change with your sngine link
$SNGINE_APP_ID = 'api id'; //add your app_id 
$SNGINE_APP_KEY = 'api key'; //add your app secret from your_site/developers/apps


$ADS ='Your ADS';


?>