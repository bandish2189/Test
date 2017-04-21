<?php

require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}
$order = new Order();
$client = new Client();
$driver = new Driver();
$truck = new Truck();
$party = new Party();
$truckowner = new TruckOwner();

$copy[1]['title']='DRIVER COPY';
$copy[1]['class']='driver';
$copy[2]['title']='CONSIGNER COPY';
$copy[2]['class']='consigner';
$copy[3]['title']='CONSIGNEE COPY';
$copy[3]['class']='consignee';


if(!isset($_GET['id']) or (strlen($_GET['id']<1))){
//	echo 'noid';
	header('Location: orders.php');
	}else{
		$check_data = $order->selectOrder($_GET['id']);
	//	mypr($check_data);
		$max_char = 60;
		$tp_count = count($check_data['transport_fright']);
			if($tp_count>1){
				$party_details = '';
				foreach($check_data['transport_fright'] as $in => $tp){
					
						$st1 = '<b>'.strtoupper ($tp['party_name']).'</b> ['.$tp['cityname'].'] - ';
						$cut_len =  $max_char-strlen($st1);
						$st2 = $tp['address'].'laksjdljas ldjlasdljalsdjlajsdkl asjdl alsdjlasd alsdlasjdjasl';
						$final_party_detail = $st1.substr($st2,0,$cut_len-5);
						$party_details .= $final_party_detail;
		//				 echo 'party len '.strlen($final_party_detail);
//						echo $tp_count-1 ."====".$in;
						if(!($in == ($tp_count-1))){ $party_details .= '</br>';}					
					}
				
			}else{
				$party_details = '<b>'.strtoupper ($check_data['transport_fright'][0]['party_name']).'</b> ['.$check_data['transport_fright'][0]['cityname'].'] - '.$check_data['transport_fright'][0]['address'];
			}
		$lr = $check_data['lr_no'];
		$client_details = '<b>'.strtoupper ($check_data['client_name']).'</b> - '.$check_data['client_address']; 
		$date=date_create($check_data['date']);
		$order_date = date_format($date,"d/m/Y");
//		$OTF = $order->
//		exit;
//		echo 'print lr';
	} // echeck if data availablein GET.
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
	
	<title>Editable Invoice</title>
	
	<link rel='stylesheet' type='text/css' href='css/printstyle.css' />
	<link rel='stylesheet' type='text/css' href='css/print.css' media="print" />
	<script type='text/javascript' src='js/jquery-1.3.2.min.js'></script>
	<script type='text/javascript' src='js/dexample.js'></script>

</head>

<body >
<div class="header">
	<div class="part"><input type="checkbox" checked="checked" value="driver" onchange="change(this)" />DRIVER COPY</div>
    <div class="part"><input type="checkbox" checked="checked" value="consigner" onchange="change(this)" />CONSIGNER COPY</div>
    <div class="part"><input type="checkbox" checked="checked"  value="consignee" onchange="change(this)" />CONSIGNEE COPY</div>
    <div class="part"><button value="Print" class="btnn" onClick="window.print()">Print</button></div>
    <div class="part"><a href="orders.php" class="btn">Next</a></div>
</div>
<?php 
for($i=1;$i<=3;$i++){
//echo $i;
//exit;	



?>

	<div id="page-wrap" class="<?php echo $copy[$i]['class']; ?>" style="background-image:url(img/print_lr.png); background-repeat: no-repeat;">

		<p id="header" style="display:none;">INVOICE</p>
		
		<div id="identity" style="height:110px;">
		  <div id="logo">

            <div id="logoctr">
                <a href="javascript:;" id="change-logo" title="Change logo">Change Logo</a>
                <a href="javascript:;" id="save-logo" title="Save changes">Save</a>
                |
                <a href="javascript:;" id="delete-logo" title="Delete logo">Delete Logo</a>
                <a href="javascript:;" id="cancel-logo" title="Cancel changes">Cancel</a>
              </div>

              <div id="logohelp">
                <input id="imageloc" type="text" size="50" value="" /><br />
                (max width: 540px, max height: 100px)
              </div>
		  </div>
		
		</div>
		
		<div style="clear:both"></div>
		
		<div id="customer">

            <p  style="padding-left:240px; max-width:300px; float:left; line-height:30px;"><?php echo $lr ;?></p>
            <p  style="padding-left:70px; max-width:300px; float:left; font-weight:bold; line-height:30px;"><?php echo $copy[$i]['title']; ?></p>

                    <p style="float:right;"><?php echo $order_date ;?></p>
		
		</div>
        <div id="customer" style="min-height:91px;">

            <p  style="padding-left:50px; max-width:300px; float:left; line-height:30px;"><?php echo $client_details; ?></p>
<p id="meta"><?php echo $party_details;  ?></p>

		
		</div>
		<div style="clear:both"></div>
		<table id="items">
		
		  <tr id="noborder">
          	<td colspan="4" width="78%"></td>
            <td style="padding-left:25px"><?php echo $check_data['truck_number'];?></td>
          </tr >
           <tr id="noborder">
          	<td sty colspan="4"></td>
            <td style="padding-left:40px"><?php echo $check_data['truck_fright'];?></td>
          </tr>
		  
		  <tr class="item-row" style="">
		      <td class="item-name"><div class="delete-wpr"></td>
		      <td class="description"></td>
		      <td><p class="cost"></p></td>
		      <td><p class="qty"></p></td>
		      <td><span class="price"></span></td>
		  </tr>
		  
		  
		
		</table>
		<div id="terms" style="display:none;">
		  <h5>Terms</h5>
		  <textarea>NET 30 Days. Finance Charge of 1.5% will be made on unpaid balances after 30 days.</textarea>
		</div>
	
		
	
	</div>
    <?php }
	?>
    <script>
	
	$(window).scroll(function() {
		if ($(this).scrollTop() > 1){  
			$('.header').addClass("sticky");
		  }
		  else{
			$('.header').removeClass("sticky");
		  }
		});
		function change(v) {
			//alert(v.value);
			var x = document.getElementsByClassName(v.value);
			if(v.checked == true){ 
			//alert('chacked');
				var i;
				for (i = 0; i < x.length; i++) {
					x[i].style.display = "block";
				}
			}else{ 
				var i;
				for (i = 0; i < x.length; i++) {
					x[i].style.display = "none";
				}
			 }
	//	var x = document.getElementById("mySelect").value;
	//	document.getElementById("demo").innerHTML = "You selected: " + x;
	}
    </script>
	
</body>

</html>