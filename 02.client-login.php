<?
require_once("class.voipms.php");
$voipms = new VoIPms();

/* Client Email and Password */
$client = "500000";
$email = "jane.doe@mydomain.com";
$password = "janespassword";

/* Get Client by Email */
$response = $voipms->getClients($email);

/* You can also get clients by ClientNumber */
//$response = $voipms->getClients($client);

/* Get Errors - Invalid_Client */
if($response[status]!='success'){
    echo $response[status];
    exit;
}

/* See if Password is Correct */
$client = $response[clients][0];
if($password!=$client[password]){
    echo "invalid_password";
    exit;
}

/* Client Exists and Password OK */
echo "{$client[client]} - {$client[firstname]} {$client[lastname]}"

?>