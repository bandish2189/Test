<?php
/*
UserCake Version: 2.0.2
http://usercake.com
*/

require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}
require_once("models/header.php");
require_once("models/header.php");
include("top-nav.php");
$truck = new Truck();
$city = new City();

if(isset($_GET)){
//	echo 'post';
//	mypr($_GET);
//	echo strlen($_POST['data']['clients']['id']);
//	exit;
//		$date=date("Y/m/d");
//		$_POST['data']['clients']['date']= date_format($date,"Y-m-d");
	if(!empty($_GET['id'])){
	
		$truck_details = $truck->selectTruck($_GET['id']);
		$truck_commissions = $truck->TruckCommissionReportByTruck($_GET['id']);
	//	mypr($truck_details);
	//exit;	
		
	}else{
		header('Location: clients.php');
		}
	
}else{
	header('Location: clients.php');
	}
?>

<div id="contentwrapper">
  <div class="main_content">
                    
                    <nav>
                        <div id="jCrumbs" class="breadCrumb module">
                            <div style="overflow:hidden; position:relative; width: 1053px;"><div><ul style="width: 5000px;">
                                <li class="first">
                                    <a href="javascript:void(0)"><i class="icon-home"></i></a>
                                </li>
                                <li>
                                    <a href="truck.php">
                                    	Trucks                                    </a>
                                </li>
                                <li class="last">View</li>
                            </ul></div></div>
                        </div>
                    </nav>
                    
					
					<div class="row-fluid">
	<div class="span12">
		<h3 class="heading" client="" detail<="" h3="">
		<div class="row-fluid">
			<div class="span12">
				<div class="vcard">
					<ul>
						<li class="v-heading">
							Truck Details <a href="truck.edit.php?id=<?php echo $truck_details['id']; ?>" style="float:right;">Edit Details</a>
						</li>
						<li>
							<span class="item-key">Truck No.</span>
							<div class="vcard-item"><?php echo $truck_details['truck_number']; ?>&nbsp;</div>
						</li>
						<li>
							<span class="item-key">Chassis No.</span>
							<div class="vcard-item"><?php echo $truck_details['chassis_no']; ?>&nbsp;</div>
						</li>
						<li>
							<span class="item-key">Engine No.</span>
							<div class="vcard-item"><?php echo $truck_details['engine_no']; ?>&nbsp;</div>
						</li>
						<li>
							<span class="item-key">Owner Name</span>
							<div class="vcard-item"><a href="truckowner.view.php?id=<?php echo $truck_details['owner_id']; ?>"><?php echo $truck_details['owner_name']; ?> [<?php echo $truck_details['contact_no'];?>]</a>&nbsp;</div>
						</li>
						<li>
							<span class="item-key">Owner Place</span>
							<div class="vcard-item"><?php $pl = $city->selectCity($truck_details['city_id']); echo $pl['city_name'] ?>&nbsp;</div>
						</li>
                        <li>
							<span class="item-key">RC Book</span>
							<div class="vcard-item"><?php echo $truck_details['rcbook']; ?>&nbsp;&nbsp;</div>
						</li>
                        <li>
							<span class="item-key">Permit</span>
							<div class="vcard-item"><?php echo $truck_details['permit']; ?>&nbsp;&nbsp;</div>
						</li>
                        <li>
							<span class="item-key">Insurance</span>
							<div class="vcard-item"><?php echo $truck_details['insurance']; ?>&nbsp;&nbsp;</div>
						</li>
                    </ul>
 				</div>
 			</div>
 		</div>
        <div class="row-fluid">
	<div class="span12">
		<h3 class="heading">Commission Detail</h3>
		 <table class="table table-bordered table-striped dTableR" id="dt_order">
          <thead>
            <tr>
              <th>SrNo:</th>
              <th>LR NO:</th>
              <th>Commission</th>
              <th>Status</th>
              <th>Date</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php 
			//$truck_commissions = 
			//mypr($order_list);
			$sr = 1;
			foreach($truck_commissions as $one){
				
				//mypr($one);
			?>
            <tr>
              <td><?php echo str_pad($sr, 4, "0", STR_PAD_LEFT);?>&nbsp;</td>
              <td><a href="orders.view.php?id=<?php echo $one['id'];?>"><?php echo $one['lr_no'];?></a>&nbsp;</td>
              <td><?php echo $one['commission'];?>&nbsp;</td>
              <td><?php if($one['status']==0){echo'Unpaid';}else{echo 'Paid';}?></td>
              <td><?php 
			  		$date=date_create($one['created']);
					echo date_format($date,"d/m/Y ");
//			  echo $one['created'];
				?></td>
              <td class="actions"></td>
            </tr>
            <?php
				$sr ++;
				}
			?>
            
          </tbody>
        </table>	
	</div>
</div>
 	</h3></div>
 </div>
                     
                     
<div class="row-fluid" style="display:none;">
	<div class="span12">
		<h3 class="heading">Billing Detail</h3>
		<table class="table table-bordered table-striped" id="smpl_tbl">
			<thead>
				<tr>
					<th>Bill No</th>
					<th>Bill Date</th>
					<th>Total Order</th>
					<th>Total Amount</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>test01</td>
					<td>10-OCT-2015</td>
					<td>20</td>
					<td>20000</td>
					<td>Paid</td>
				</tr>
				<tr>
					<td>test02</td>
					<td>20-OCT-2015</td>
					<td>10</td>
					<td>22520</td>
					<td>Unpaid</td>
				</tr>
				<tr>
					<td>test3</td>
					<td>01-OCT-2015</td>
					<td>13</td>
					<td>18000</td>
					<td>Paid</td>
				</tr>
			</tbody>
		</table>		
	</div>
</div>
                    
<div class="row-fluid" style="display:none;">
    <div class="span12">
        <h3 class="heading">Order List</h3>
        <table class="table table-bordered table-striped" id="smpl_tbl">
            <thead>
                <tr>
                    <th>SrNo:</th>
              <th>LR NO:</th>
              <th>Order Type</th>
              <th>Client</th>
              <th>Party / Transport Freight</th>
              <th style="display:none;">From / TO</th>
              <th>Truck NO</th>
              <th>Commision</th>
              <th>Advance Payment</th>
              <th>Truck Fright</th>
              <th>Date</th>
              <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            
                            </tbody>
        </table>        
    </div>
</div>


<div class="clients view">
</div>

            
                    
<script type="text/javascript" src="js/jquery.debouncedresize.min.js"></script>
<script type="text/javascript" src="js/jquery.actual.min.js"></script>
<script type="text/javascript" src="js/jquery.cookie.min.js"></script>
<script type="text/javascript" src="js/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/lib/qtip2/jquery.qtip.min.js"></script>
<script type="text/javascript" src="js/lib/jBreadcrumbs/js/jquery.jBreadCrumb.1.1.min.js"></script>
<script type="text/javascript" src="js/lib/sticky/sticky.min.js"></script><script type="text/javascript" src="js/ios-orientationchange-fix.js"></script><script type="text/javascript" src="js/lib/antiscroll/antiscroll.js"></script><script type="text/javascript" src="js/lib/antiscroll/jquery-mousewheel.js"></script><script type="text/javascript" src="js/lib/colorbox/jquery.colorbox.min.js"></script><script type="text/javascript" src="js/gebo_common.js"></script> 
<script>
				$(document).ready(function() {
					//* show all elements & remove preloader
					setTimeout('$("html").removeClass("js")',1000);
				});
			</script>

                   	     

                   
                </div>
</div>
</body></html>