<?
require_once("class.voipms.php");
$voipms = new VoIPms();

/* ClientNumber / Password */
$client = "500000";
$email = "jane.doe@mydomain.com";

/* Get Client by Email */
//$response = $voipms->getClients($email);

/* You can also get clients by ClientNumber */
//$response = $voipms->getClients($client);

/* You can get all your clients by passing no param */
$response = $voipms->getClients();


/* Get Errors - Invalid_Client */
if($response[status]!='success'){
    echo $response[status];
    exit;
}

/* Get Clients Array */
$clients = $response[clients];

/* Display Clients */
foreach($clients as $client){
    ?>
    <table style="border: 1px solid #336699; width:500px">
        <tr>
            <td>Client:</td>
            <td>
                <? echo $client[client] ?>
            </td>
        <tr>
        
        <tr>
            <td>Email:</td>
            <td>
                <? echo $client[email] ?>
            </td>
        <tr>
        
        <tr>
            <td>Password:</td>
            <td>
                <? echo $client[password] ?>
            </td>
        <tr>
        
        <tr>
            <td>Company:</td>
            <td>
                <? echo $client[company] ?>
            </td>
        <tr>
        
        <tr>
            <td>Firstname:</td>
            <td>
                <? echo $client[firstname] ?>
            </td>
        <tr>
        
        <tr>
            <td>Lastname:</td>
            <td>
                <? echo $client[lastname] ?>
            </td>
        <tr>
        
        <tr>
            <td>Address:</td>
            <td>
                <? echo $client[address] ?>
            </td>
        <tr>
        
        <tr>
            <td>City:</td>
            <td>
                <? echo $client[city] ?>
            </td>
        <tr>
        
        <tr>
            <td>State:</td>
            <td>
                <? echo $client[state] ?>
            </td>
        <tr>
        
        <tr>
            <td>Country:</td>
            <td>
                <? echo $client[country] ?>
            </td>
        <tr>
        
        <tr>
            <td>Zip:</td>
            <td>
                <? echo $client[zip] ?>
            </td>
        <tr>
        
        <tr>
            <td>Phone Number:</td>
            <td>
                <? echo $client[phone_number] ?>
            </td>
        <tr>
        
        <tr>
            <td>Balance Management:</td>
            <td>
                <? 
                    $response = $voipms->getBalanceManagement($client[balance_management]);
                    echo $response[balance_management][0][description];
                ?>
            </td>
        <tr>
       
    </table>
    <br><br><br>
    <?
}



?>