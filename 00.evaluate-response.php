<?
require_once("class.voipms.php");
$voipms = new VoIPms();

/* Use any function to see Raw Response */
$response = $voipms->getLanguages();

/* Display Raw Response */
?>
<pre>
    <? print_r($response); ?>
</pre>
