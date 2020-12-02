<?
require_once("class.voipms.php");
$voipms = new VoIPms();

/* ClientNumber / Username / Account */
$client = "500000";
$account = "100000_VoIP";

/* Get Accounts by Client Number */
$response = $voipms->getSubAccounts($client);

/* You can also get Accounts by Account */
//$response = $voipms->getSubAccounts($account);

/* You can get all your Accounts by passing no param */
//$response = $voipms->getSubAccounts();

/* Get Errors - Invalid_Account */
if($response[status]!='success'){
    echo $response[status];
    exit;
}

/* Get Accounts Array */
$accounts = $response[accounts];

/* Display Accounts */
foreach($accounts as $account){
    ?>
    <table style="border: 1px solid #336699; width:500px">
        <tr>
            <td>Account:</td>
            <td>
                <? echo $account[account] ?>
            </td>
        <tr>
        
        <tr>
            <td>Username:</td>
            <td>
                <? echo $account[username] ?>
            </td>
        <tr>
        
        <tr>
            <td>Description:</td>
            <td>
                <? echo $account[description] ?>
            </td>
        <tr>
        
        <tr>
            <td>Protocol:</td>
            <td>
                <? 
                    $response = $voipms->getProtocols($account[protocol]);
                    echo $response[protocols][0][description];
                ?>
            </td>
        <tr>
        
        <tr>
            <td>Authorizacion Type:</td>
            <td>
                <? 
                    $response = $voipms->getAuthTypes($account[auth_type]);
                    echo $response[auth_types][0][description];
                ?>
            </td>
        <tr>
        
        <tr>
            <td>Password:</td>
            <td>
                <? echo $account[password] ?>
            </td>
        <tr>
        
        <tr>
            <td>IP:</td>
            <td>
                <? echo $account[ip] ?>
            </td>
        <tr>
        
        <tr>
            <td>Device Type:</td>
            <td>
                <? 
                    $response = $voipms->getDeviceTypes($account[device_type]);
                    echo $response[device_types][0][description];
                ?>
            </td>
        <tr>
        
        <tr>
            <td>CallerID Number:</td>
            <td>
                <? echo $account[callerid_number] ?>
            </td>
        <tr>
        
        <tr>
            <td>Allow International Calls:</td>
            <td>
                <? 
                    $response = $voipms->getLockInternational($account[lock_international]);
                    echo $response[lock_international][0][description];
                ?>
            </td>
        <tr>
        
        <tr>
            <td>International Route:</td>
            <td>
                <? 
                    $response = $voipms->getRoutes($account[international_route]);
                    echo $response[routes][0][description];
                ?>
            </td>
        <tr>
        
        <tr>
            <td>Music on Hold:</td>
            <td>
                <? 
                    $response = $voipms->getMusicOnHold($account[music_on_hold]);
                    echo $response[music_on_hold][0][description];
                ?>
            </td>
        <tr>
        
        <tr>
            <td>Allowed Codecs:</td>
            <td>
                <? 
                    $display = "";
                    $codecs = explode(";",$account[allowed_codecs]);
                    foreach($codecs as $codec){
                        $response = $voipms->getAllowedCodecs($codec);
                        if($display){$display .= ", ";}
                        $display .= $response[allowed_codecs][0][description];
                    }
                    echo $display;
                    
                ?>
            </td>
        <tr>
        
        <tr>
            <td>DTMF Mode:</td>
            <td>
                <? 
                    $response = $voipms->getDTMFModes($account[dtmf_mode]);
                    echo $response[dtmf_modes][0][description];
                ?>
            </td>
        <tr>
        
        <tr>
            <td>NAT:</td>
            <td>
                <? 
                    $response = $voipms->getNAT($account[nat]);
                    echo $response[nat][0][description];
                ?>
            </td>
        <tr>
        
        <tr>
            <td>Internal Extension:</td>
            <td>
                <? echo $account[internal_extension]; ?>
            </td>
        <tr>
        
        <tr>
            <td>Internal Voicemail:</td>
            <td>
                <? 
                    $response = $voipms->getVoicemails($account[internal_voicemail]);
                    echo "{$response[voicemails][0][mailbox]} - {$response[voicemails][0][name]}";
                ?>
            </td>
        <tr>
        
        <tr>
            <td>Internal Dialtime:</td>
            <td>
                <? echo $account[internal_dialtime]; ?>
            </td>
        <tr>
        
        <tr>
            <td>Reseller Client:</td>
            <td>
                <? 
                    $response = $voipms->getClients($account[reseller_client]);
                    echo "{$response[clients][0][client]} - {$response[clients][0][email]}";
                ?>
            </td>
        <tr>
        
        <tr>
            <td>Reseller Package:</td>
            <td>
                <? 
                    $response = $voipms->getPackages($account[reseller_package]);
                    echo "{$response[packages][0][package]} - {$response[packages][0][name]}";
                ?>
            </td>
        <tr>
        
        <tr>
            <td>Reseller Next Billing Date:</td>
            <td>
                <? echo $account[reseller_nextbilling]; ?>
            </td>
        <tr>
        
    </table>
    <br><br><br>
    <?
}



?>