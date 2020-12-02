<?
require_once("class.voipms.php");
$voipms = new VoIPms();

/* PackageNumber */
$package = "1001";

/* Get Package by Package Number */
//$response = $voipms->getPackages($package);

/* You can get all your Packages by passing no param */
$response = $voipms->getPackages();


/* Get Errors - Invalid_Package */
if($response[status]!='success'){
    echo $response[status];
    exit;
}

/* Get Packages Array */
$packages = $response[packages];

/* Display Packages */
foreach($packages as $package){
    ?>
    <table style="border: 1px solid #336699; width:500px">
        <tr>
            <td>Package:</td>
            <td>
                <? echo $package[package] ?>
            </td>
        <tr>
        
        <tr>
            <td>Name:</td>
            <td>
                <? echo $package[name] ?>
            </td>
        <tr>
        
        <tr>
            <td>Mark Up Fixed:</td>
            <td>
                <? echo $package[markup_fixed] ?>
            </td>
        <tr>
        
        <tr>
            <td>Mark Up Percentage:</td>
            <td>
                <? echo $package[markup_percentage] ?>
            </td>
        <tr>
        
        <tr>
            <td>Pulse:</td>
            <td>
                <? echo $package[pulse] ?>
            </td>
        <tr>
        
        <tr>
            <td>International Route:</td>
            <td>
                <? 
                    $response = $voipms->getRoutes($package[international_route]);
                    echo $response[routes][0][description];
                ?>
            </td>
        <tr>
        
        <tr>
            <td>Montly Fee:</td>
            <td>
                <? echo $package[monthly_fee] ?>
            </td>
        <tr>
        
        <tr>
            <td>Setup Fee:</td>
            <td>
                <? echo $package[setup_fee] ?>
            </td>
        <tr>
        
        <tr>
            <td>Free Minutes:</td>
            <td>
                <? echo $package[free_minutes] ?>
            </td>
        <tr>
       
    </table>
    <br><br><br>
    <?
}



?>