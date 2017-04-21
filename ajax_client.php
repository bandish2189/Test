<?php
/*
UserCake Version: 2.0.2
http://usercake.com
*/

require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}
$client = new Client();
$list = $client->listall($_GET['term']);
//mypr($list);
echo json_encode($list);
?>
