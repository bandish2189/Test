<?php
/*
UserCake Version: 2.0.2
http://usercake.com
*/

require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}
//require_once("models/header.php");
//require_once("models/header.php");
//include("top-nav.php");
$city = new City();

if(isset($_GET['id'])&&(strlen($_GET['id']>0))){
	echo 'postavailable';
	$id = $_GET['id'];
	
	echo $id;
	$del = $city->deleteCity($id);
	if($del){
		header('Location: city.php');
		}else{
			echo 'error';
			//header('Location: truck.php');
			}
	exit;
	}else{
	
		header("Location:city.php");
		}

?>

