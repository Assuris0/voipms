<?
require_once("class.voipms.php");
$voipms = new VoIPms();

/* Mailbox Number */
$mailbox = "101";

/* Get Voicemail by Mailbox Number */
$response = $voipms->getVoicemails($mailbox);

/* You can also get all your Voicemails by passing no param */
//$response = $voipms->getVoicemails();

/* Get Errors - Invalid_Voicemail */
if($response[status]!='success'){
    echo $response[status];
    exit;
}

/* Get Voicemails Array */
$voicemails = $response[voicemails];

/* Display Voicemails */
foreach($voicemails as $voicemail){
    ?>
    <table style="border: 1px solid #336699; width:500px">
        <tr>
            <td>Mailbox:</td>
            <td>
                <? echo $voicemail[mailbox] ?>
            </td>
        <tr>
        
        <tr>
            <td>Name:</td>
            <td>
                <? echo $voicemail[name] ?>
            </td>
        <tr>
        
        
        <tr>
            <td>Password:</td>
            <td>
                <? echo $voicemail[password] ?>
            </td>
        <tr>
        
        <tr>
            <td>Skip Password:</td>
            <td>
                <? echo $voicemail[skip_password]?"Yes":"No" ?>
            </td>
        <tr>
        
        <tr>
            <td>e-mail:</td>
            <td>
                <? echo $voicemail[email] ?>
            </td>
        <tr>
        
        <tr>
            <td>Attach Message to e-mail:</td>
            <td>
                <? echo $voicemail[attach_message] ?>
            </td>
        <tr>
        
        <tr>
            <td>Delete Message after emailed:</td>
            <td>
                <? echo $voicemail[delete_message] ?>
            </td>
        <tr>
        
        <tr>
            <td>Say Time Envelope:</td>
            <td>
                <? echo $voicemail[say_time] ?>
            </td>
        <tr>
        
        
        <tr>
            <td>Time Zone:</td>
            <td>
                <? 
                    $response = $voipms->getTimeZones($voicemail[timezone]);
                    echo $response[timezones][0][description];
                ?>
            </td>
        <tr>
        
        <tr>
            <td>Say Caller ID:</td>
            <td>
                <? echo $voicemail[say_callerid] ?>
            </td>
        <tr>
        
        <tr>
            <td>Play Instructions before beep:</td>
            <td>
                <? 
                    $response = $voipms->getPlayInstructions($voicemail[play_instructions]);
                    echo $response[play_instructions][0][description];
                ?>
            </td>
        <tr>
        
        <tr>
            <td>Language:</td>
            <td>
                <? 
                    $response = $voipms->getLanguages($voicemail[language]);
                    echo $response[languages][0][description];
                ?>
            </td>
        <tr>
       
    </table>
    <br><br><br>
    <?
}



?>