<?php
error_reporting(E_ALL); ini_set('display_errors', 'On'); 

require_once("twilio-php/src/Twilio/autoload.php");


$sid = "ACb9d9ec88dfd38551405a05c21af4bd05"; // Your Account SID from www.twilio.com/console
$token = "96545104c8dd47fb3bdfb4f1e41a7148"; // Your Auth Token from www.twilio.com/console

$client = new Twilio\Rest\Client($sid, $token);


echo "Yes!!";

?>
