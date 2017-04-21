<?php
/*
UserCake Version: 2.0.2
http://usercake.com
*/

require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}
$truckowner = new TruckOwner();

//mypr($_POST);
$newTruckowner = $truckowner->ajaxInsert($_POST);
//mypr($newTruckowner);
echo $newTruckowner;

exit;
