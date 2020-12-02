<?
require_once("class.voipms.php");
$voipms = new VoIPms();

$client = '500000';

?>
<pre>
Drop Down Lists for CDR
-----------------------
</pre>
<?
/* CallType */
$response = $voipms->getCallTypes();
if($response[status]!='success'){echo $response[status];exit;}
/* Get Array */
$calltypes = $response[call_types];
?>
<select>
    <?    
    foreach($calltypes as $calltype){
        ?>
        <option value="<? echo $calltype[value]; ?>"><? echo $calltype[description]; ?></option>
        <?
    }
    ?>
</select>


<?
/* CallBilling */
$response = $voipms->getCallBilling();
if($response[status]!='success'){echo $response[status];exit;}
/* Get Array */
$callbilling = $response[call_billing];
?>
<select>
    <?    
    foreach($callbilling as $callbill){
        ?>
        <option value="<? echo $callbill[value]; ?>"><? echo $callbill[description]; ?></option>
        <?
    }
    ?>
</select>


<?
/* CallAccounts */
$response = $voipms->getCallAccounts();
if($response[status]!='success'){echo $response[status];exit;}
/* Get Array */
$accounts = $response[accounts];
?>
<select>
    <?    
    foreach($accounts as $account){
        ?>
        <option value="<? echo $account[value]; ?>"><? echo $account[description]; ?></option>
        <?
    }
    ?>
</select>


<?
/* TimeZone */
?>
<select>
    <?    
    for($i= -12; $i<= 13; $i++){
        ?>
        <option value="<? echo $i; ?>" <? echo $i==5?"selected":""; ?> >
            <? 
                $display = $i<=0?$i:"+{$i}";
                $display = $display == 0?"":$display;
                echo "GMT {$display}" ; 
            ?>
        </option>
        <?
    }
    ?>
</select>







<br><br><br>
<pre>
Drop Down Lists for Reseller CDR
--------------------------------
</pre>
<?
/* CallType */
$response = $voipms->getCallTypes($client);
if($response[status]!='success'){echo $response[status];exit;}
/* Get Array */
$calltypes = $response[call_types];
?>
<select>
    <?    
    foreach($calltypes as $calltype){
        ?>
        <option value="<? echo $calltype[value]; ?>"><? echo $calltype[description]; ?></option>
        <?
    }
    ?>
</select>


<?
/* CallBilling */
$response = $voipms->getCallBilling();
if($response[status]!='success'){echo $response[status];exit;}
/* Get Array */
$callbilling = $response[call_billing];
?>
<select>
    <?    
    foreach($callbilling as $callbill){
        ?>
        <option value="<? echo $callbill[value]; ?>"><? echo $callbill[description]; ?></option>
        <?
    }
    ?>
</select>


<?
/* CallAccounts */
$response = $voipms->getCallAccounts($client);
if($response[status]!='success'){echo $response[status];exit;}
/* Get Array */
$accounts = $response[accounts];
?>
<select>
    <?    
    foreach($accounts as $account){
        ?>
        <option value="<? echo $account[value]; ?>"><? echo $account[description]; ?></option>
        <?
    }
    ?>
</select>


<?
/* TimeZone */
?>
<select>
    <?    
    for($i= -12; $i<= 13; $i++){
        ?>
        <option value="<? echo $i; ?>" <? echo $i==5?"selected":""; ?> >
            <? 
                $display = $i<=0?$i:"+{$i}";
                $display = $display == 0?"":$display;
                echo "GMT {$display}" ; 
            ?>
        </option>
        <?
    }
    ?>
</select>
