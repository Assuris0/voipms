<?
require_once("class.voipms.php");
$voipms = new VoIPms();

/* Get CDR */
$response = $voipms->getCDR('2010-11-10','2010-11-10',1,1,1,1,-5,'all','all','all');

/* Get Errors - no_cdr */
if($response[status]!='success'){
    echo $response[status];
    exit;
}

/* Get CDR Array */
$cdr = $response[cdr];

/* Calls */
$calls = count($cdr);

/* Duration / Total */
foreach($cdr as $call){
    $duration += $call[seconds];
    $total += $call[total];
}
$duration = secToTime($duration);

?>
<table cellspacing="0" cellpadding="6" style="border: 1px solid #336699">
    <tr style="border: 1px solid #336699">
        <td style="border: 1px solid #336699">
            Date
        </td>
        <td style="border: 1px solid #336699">
            CallerID
        </td>
        <td style="border: 1px solid #336699">
            Destination
        </td>
        <td style="border: 1px solid #336699">
            Description
        </td>
        <td style="border: 1px solid #336699">
            Duration
        </td>
        <td style="border: 1px solid #336699">
            Rate
        </td>
        <td style="border: 1px solid #336699">
            Total
        </td>
    
    </tr>
    <?
    foreach($cdr as $call){
        ?>
        <tr>
            <td>
                <? echo $call[date]; ?>
            </td>
            <td>
                <? echo $call[callerid]; ?>
            </td>
            <td>
                <? echo $call[destination]; ?>
            </td>
            <td>
                <? echo $call[description]; ?>
            </td>
            <td align="right">
                <? echo $call[duration]; ?>
            </td>
            <td align="right">
                <? echo $call[rate]; ?>
            </td>
            <td align="right">
                <? echo $call[total]; ?>
            </td>
        </tr>
        <?
    }
    ?>
    <tr>
        <td colspan="7" align="right">
            <? echo "Calls: {$calls} | Duration: {$duration} | Total: \${$total}"; ?>
        </td>
    </tr>
</table>

<?

/* Function to Calculate Time */
function secToTime($secs){
    if(!$secs){return 0;}
    
    $vals = array('h' => floor($secs / 3600), 
                  'm' => floor($secs % 3600 / 60), 
                  's' => $secs % 60); 

    $ret = array(); 

    $added = false; 
    foreach ($vals as $k => $v) { 
        if ($v > 0 || $added) { 
            $ret[] = ((strlen($v) == 1) && $added) ? "0$v" : $v; 
            $added = true;
        } 
    } 

    return join(':', $ret); 
}

?>