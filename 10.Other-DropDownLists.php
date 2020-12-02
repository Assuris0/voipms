<?
require_once("class.voipms.php");
$voipms = new VoIPms();

$client = '500000';

?>
<pre>
General Drop Down Lists
-----------------------
</pre>
<?
/* Get Countries */
$response = $voipms->getCountries();
if($response[status]!='success'){echo $response[status];exit;}
/* Get Array */
$countries = $response[countries];
?>
<select>
<?    
    foreach($countries as $country){
        ?>
        <option value="<? echo $country[value]; ?>"><? echo $country[description]; ?></option>
        <?
    }
    ?>
</select>
<br>


<?
/* Get Languages */
$response = $voipms->getLanguages();
if($response[status]!='success'){echo $response[status];exit;}
/* Get Array */
$languages = $response[languages];
?>
<select>
<?    
    foreach($languages as $language){
        ?>
        <option value="<? echo $language[value]; ?>"><? echo $language[description]; ?></option>
        <?
    }
    ?>
</select>
<br>


<?
/* Get Servers Info */
$response = $voipms->getServersInfo();
if($response[status]!='success'){echo $response[status];exit;}
/* Get Array */
$servers = $response[servers];
?>
<select>
<?    
    foreach($servers as $server){
        ?>
        <option value="<? echo $server[server_pop]; ?>"><? echo $server[server_name]; ?></option>
        <?
    }
    ?>
</select>
<br><br><br>



<pre>
Drop Down Lists for Accounts Functions
--------------------------------------
</pre>

<?
/* Get Allowed Codecs */
$response = $voipms->getAllowedCodecs();
if($response[status]!='success'){echo $response[status];exit;}
/* Get Array */
$codecs = $response[allowed_codecs];
?>
<select>
    <?    
    foreach($codecs as $codec){
        ?>
        <option value="<? echo $codec[value]; ?>"><? echo $codec[description]; ?></option>
        <?
    }
    ?>
</select>
<br>


<?
/* Get Auth Types */
$response = $voipms->getAuthTypes();
if($response[status]!='success'){echo $response[status];exit;}
/* Get Array */
$types = $response[auth_types];
?>
<select>
<?    
    foreach($types as $type){
        ?>
        <option value="<? echo $type[value]; ?>"><? echo $type[description]; ?></option>
        <?
    }
    ?>
</select>
<br>


<?
/* Get Divice Types */
$response = $voipms->getDeviceTypes();
if($response[status]!='success'){echo $response[status];exit;}
/* Get Array */
$device_types = $response[device_types];
?>
<select>
    <?    
    foreach($device_types as $dtype){
        ?>
        <option value="<? echo $dtype[value]; ?>"><? echo $dtype[description]; ?></option>
        <?
    }
    ?>
</select>
<br>


<?
/* Get DTMF Modes */
$response = $voipms->getDTMFModes();
if($response[status]!='success'){echo $response[status];exit;}
/* Get Array */
$dtmf_modes = $response[dtmf_modes];
?>
<select>
    <?    
    foreach($dtmf_modes as $dtmf){
        ?>
        <option value="<? echo $dtmf[value]; ?>"><? echo $dtmf[description]; ?></option>
        <?
    }
    ?>
</select>
<br>


<?
/* Get Lock International */
$response = $voipms->getLockInternational();
if($response[status]!='success'){echo $response[status];exit;}
/* Get Array */
$lock_international = $response[lock_international];
?>
<select>
    <?    
    foreach($lock_international as $lock){
        ?>
        <option value="<? echo $lock[value]; ?>"><? echo $lock[description]; ?></option>
        <?
    }
    ?>
</select>
<br>


<?
/* Get Music on Hold */
$response = $voipms->getMusicOnHold();
if($response[status]!='success'){echo $response[status];exit;}
/* Get Array */
$music_on_hold = $response[music_on_hold];
?>
<select>
    <?    
    foreach($music_on_hold as $music){
        ?>
        <option value="<? echo $music[value]; ?>"><? echo $music[description]; ?></option>
        <?
    }
    ?>
</select>
<br>


<?
/* Get NAT */
$response = $voipms->getNAT();
if($response[status]!='success'){echo $response[status];exit;}
/* Get Array */
$nats = $response[nat];
?>
<select>
    <?    
    foreach($nats as $cur_nat){
        ?>
        <option value="<? echo $cur_nat[value]; ?>"><? echo $cur_nat[description]; ?></option>
        <?
    }
    ?>
</select>
<br>


<?
/* Get Protocols */
$response = $voipms->getProtocols();
if($response[status]!='success'){echo $response[status];exit;}
/* Get Array */
$protocols = $response[protocols];
?>
<select>
    <?    
    foreach($protocols as $protocol){
        ?>
        <option value="<? echo $protocol[value]; ?>"><? echo $protocol[description]; ?></option>
        <?
    }
    ?>
</select>
<br>


<?
/* Get Routes */
$response = $voipms->getRoutes();
if($response[status]!='success'){echo $response[status];exit;}
/* Get Array */
$routes = $response[routes];
?>
<select>
    <?    
    foreach($routes as $route){
        ?>
        <option value="<? echo $route[value]; ?>"><? echo $route[description]; ?></option>
        <?
    }
    ?>
</select>




<br><br><br>
<pre>
Drop Down Lists for Client Functions
------------------------------------
</pre>
<?
/* Get Balance Management */
$response = $voipms->getBalanceManagement();
if($response[status]!='success'){echo $response[status];exit;}
/* Get Array */
$balance_management = $response[balance_management];
?>
<select>
    <?    
    foreach($balance_management as $balance){
        ?>
        <option value="<? echo $balance[value]; ?>"><? echo $balance[description]; ?></option>
        <?
    }
    ?>
</select>
<br>


<?
/* Get Client Packages */
$response = $voipms->getClientPackages($client);
if($response[status]!='success'){echo $response[status];exit;}
/* Get Array */
$packages = $response[packages];
?>
<select>
    <?    
    foreach($packages as $package){
        ?>
        <option value="<? echo $package[value]; ?>"><? echo $package[description]; ?></option>
        <?
    }
    ?>
</select>
<br>



<?
/* Get Clients */
$response = $voipms->getClients();
if($response[status]!='success'){echo $response[status];exit;}
/* Get Array */
$clients = $response[clients];
?>
<select>
<?    
    foreach($clients as $client){
        ?>
        <option value="<? echo $client[client]; ?>"><? echo $client[firstname]."&nbsp;".$client[lastname]; ?></option>
        <?
    }
    ?>
</select>
<br>



<?
/* Get Packages */
$response = $voipms->getPackages();
if($response[status]!='success'){echo $response[status];exit;}
/* Get Array */
$packages = $response[packages];
?>
<select>
<?    
    foreach($packages as $package){
        ?>
        <option value="<? echo $package[package]; ?>"><? echo $package[name]; ?></option>
        <?
    }
    ?>
</select>



<br><br><br>
<pre>
Drop Down Lists for DID Functions
---------------------------------
</pre>
<?
/* Get Dids Info */
$response = $voipms->getDIDsInfo();
if($response[status]!='success'){echo $response[status];exit;}
/* Get Array */
$dids = $response[dids];
?>
<select>
    <?    
    foreach($dids as $did){
        ?>
        <option value="<? echo $did[did]; ?>"><? echo $did[did].",".$did[description]; ?></option>
        <?
    }
    ?>
</select>
<br>


<?
/* Get Forwardings */
$response = $voipms->getForwardings();
if($response[status]!='success'){echo $response[status];exit;}
/* Get Array */
$forwardings = $response[forwardings];
?>
<select>
    <?    
    foreach($forwardings as $forward){
        ?>
        <option value="<? echo $forward[forwarding]; ?>"><? echo $forward[phone_number]; ?></option>
        <?
    }
    ?>
</select>
<br>
<?
/* Get Provinces */
$response = $voipms->getProvinces();
if($response[status]!='success'){echo $response[status];exit;}
/* Get Array */
$provinces = $response[provinces];
?>
<select>
    <?    
    foreach($provinces as $province){
        ?>
        <option value="<? echo $province[province]; ?>"><? echo $province[description]; ?></option>
        <?
    }
    ?>
</select>
<br>

<?
/* Get Rate Centers CANADA */
$response = $voipms->getRateCentersCAN("QC");
if($response[status]!='success'){echo $response[status];exit;}
/* Get Array */
$ratecenters = $response[ratecenters];
?>
<select>
    <?    
    foreach($ratecenters as $rate){
        ?>
        <option value="<? echo $rate[ratecenter]; ?>"><? echo $rate[ratecenter]; ?></option>
        <?
    }
    ?>
</select>
<br>

<?
/* Get Rate Centers USA */
$response = $voipms->getRateCentersUSA("FL");
if($response[status]!='success'){echo $response[status];exit;}
/* Get Array */
$ratecenters = $response[ratecenters];
?>
<select>
    <?    
    foreach($ratecenters as $rate){
        ?>
        <option value="<? echo $rate[ratecenter]; ?>"><? echo $rate[ratecenter]; ?></option>
        <?
    }
    ?>
</select>
<br>
<?
/* Get States */
$response = $voipms->getStates();
if($response[status]!='success'){echo $response[status];exit;}
/* Get Array */
$states = $response[states];
?>
<select>
    <?    
    foreach($states as $state){
        ?>
        <option value="<? echo $state[state]; ?>"><? echo $state[description]; ?></option>
        <?
    }
    ?>
</select>


<br><br><br>
<pre>
Voicemail Functions
---------------------------------
</pre>
<?
/* Get Play Instructions */
$response = $voipms->getPlayInstructions();
if($response[status]!='success'){echo $response[status];exit;}
/* Get Array */
$play_instructions = $response[play_instructions];
?>
<select>
    <?    
    foreach($play_instructions as $instruction){
        ?>
        <option value="<? echo $instruction[value]; ?>"><? echo $instruction[description]; ?></option>
        <?
    }
    ?>
</select>
<br>


<?
/* Get Time Zones */
$response = $voipms->getTimezones();
if($response[status]!='success'){echo $response[status];exit;}
/* Get Array */
$timezones = $response[timezones];
?>
<select>
    <?    
    foreach($timezones as $zone){
        ?>
        <option value="<? echo $zone[value]; ?>"><? echo $zone[description]; ?></option>
        <?
    }
    ?>
</select>
<br>


<?
/* Get Voice Mails */
$response = $voipms->getVoicemails();
if($response[status]!='success'){echo $response[status];exit;}
/* Get Array */
$voicemails = $response[voicemails];
?>
<select>
    <?    
    foreach($voicemails as $vmail){
        ?>
        <option value="<? echo $vmail[mailbox]; ?>"><? echo $vmail[name]; ?></option>
        <?
    }
    ?>
</select>