<?php
/*
UserCake Version: 2.0.2
http://usercake.com
*/

require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}
$order = new order();

//mypr($_POST);
//$date_fine =  str_replace("–","-",$_POST['date']);
$date_done = DateTime::createFromFormat('d/m/Y', $_POST['date']);
//$data['order_generation_date'] = $date1;
$_POST['date'] = $date_done->format('Y-m-d');
		//mypr($date1);
//exit;
$changedDate = $order->change_date($_POST);
//mypr($changedDate);

echo	json_encode($changedDate);
	
//echo json_encode($list);
exit;
?>
