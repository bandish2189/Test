<?php 
require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}
$order = new Order();
$client = new Client();
$party = new Party();



$company = $order->listCompany();

mypr($company);
exit;

if(isset($_POST['data'])){
//	echo 'post';
//	mypr($_POST['data']);
//	echo strlen($_POST['data']['clients']['id']);
//	exit;
	if(isset($_POST['data']['clients'])&& (strlen($_POST['data']['clients']['id'])<= 0) ){
		$_POST['data']['clients']['city'] = $_POST['data']['Order']['order_city'];
		$_POST['data']['clients']['id'] = $client->insert($_POST['data']['clients']);
	//	echo 'client not available null';
		}
	if(isset($_POST['data']['TruckOwner'])&& (strlen($_POST['data']['TruckOwner']['id'])<= 0) ){
		$_POST['data']['TruckOwner']['id'] = $truckowner->insert($_POST['data']['TruckOwner']);
	//	echo 'TruckOwner not available null';
		}
	if(isset($_POST['data']['Truck'])&& (strlen($_POST['data']['Truck']['id'])<= 0) ){
		$_POST['data']['Truck']['TruckOwner'] = $_POST['data']['TruckOwner']['id'];
		$_POST['data']['Truck']['id'] = $truck->insert($_POST['data']['Truck']);
	//	echo 'truck not available null';
		}
	if(isset($_POST['data']['DriverRegister'])&& (strlen($_POST['data']['DriverRegister']['id'])<= 0) ){
		$_POST['data']['DriverRegister']['id'] = $driver->insert($_POST['data']['DriverRegister']);
	//	echo 'driver not available null';
		}
	if(isset($_POST['data']['OrderTransportFreight'])){
		foreach($_POST['data']['OrderTransportFreight'] as $key => $value){
			if(strlen($key)>=3){
				$NewpartyId = $party->insert($value);
				$_POST['data']['OrderTransportFreight'][$key]['party_id'] = $NewpartyId;
				}
			}
	//		mypr($_POST['data']['OrderTransportFreight']);
//	exit;
		}
		$date=date_create($_POST['data']['Order']['order_generation_date']);
		$_POST['data']['Order']['order_generation_date']= date_format($date,"Y-m-d");

if($_POST['data']['Order']['order_type']==0){

	$inserted_order = $order->insertDebitOrder($_POST['data']);
//	echo $inserted_order;
//	exit;
	//mypr($_POST['data']);
	header('Location: orders.printlr.php?id='.$inserted_order);
}elseif($_POST['data']['Order']['order_type']==1){
//	echo 'credit order';
	$inserted_order = $order->insertCreditOrder($_POST['data']);
//	mypr($_POST['data']);
//	exit;
	header('Location: orders.printlr.php?id='.$inserted_order);
//	echo $inserted_order;
//	exit;
//	insertCreditOrder
	}

	
	exit;
	}
?>