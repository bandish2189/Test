<?php
/*
UserCake Version: 2.0.2
http://usercake.com
*/

require_once("models/config.php");
$truckowner = new TruckOwner();
$city = new City();
$truck = new Truck();
if (!securePage($_SERVER['PHP_SELF'])){die();}
if(isset($_GET)){
//	echo 'post';
//	mypr($_GET);
//	echo strlen($_POST['data']['clients']['id']);
//	exit;
//		$date=date("Y/m/d");
//		$_POST['data']['clients']['date']= date_format($date,"Y-m-d");
	if(!empty($_GET['id'])){
	
		$truckowner_details = $truckowner->selectTruckOwner($_GET['id']);
		$truck_commissions = $truck->TruckCommissionReportByTruckOwner($_GET['id']);
	//	mypr($truckowner_details);
		//exit;	
		
	}else{
		header('Location: clients.php');
		}
	
}else{
	header('Location: clients.php');
	}
require_once("models/header.php");
require_once("models/header.php");
include("top-nav.php");



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
							Truck Owner Details <a href="truckowner.edit.php?id=<?php  echo $truckowner_details['id']; ?>" style="float:right;">Edit Details</a>
						</li>
						<li>
							<span class="item-key">Truck Owner Name :  &nbsp; </span>
							<div class="vcard-item">  <?php echo $truckowner_details['owner_name']; ?>&nbsp;</div>
						</li>
						<li>
							<span class="item-key">Contact No.</span>
							<div class="vcard-item"><?php echo $truckowner_details['contact_no']; ?>&nbsp;</div>
						</li>
						<li>
							<span class="item-key">City</span>
							<div class="vcard-item"><?php echo $truckowner_details['cityname']; ?>&nbsp;</div>
						</li>
						<li>
							<span class="item-key">Address</span>
							<div class="vcard-item"><?php echo $truckowner_details['address']; ?>&nbsp;</div>
						</li>
                    </ul>
 				</div>
 			</div>
 		</div>
 	</h3></div>
 </div>
                     
                     
<div class="row-fluid">
      <div class="span6">
        <h3 class="heading">Owner Truck List</h3>
        <table class="table table-bordered table-striped table_vam" id="index">
          <thead>
            <tr>
                <th>Sr.</th>
                <th>Truck No.</th>
                <th>Chassis No</th>
                <th>Owner Name</th>
                <th>Contact No.</th>
                <th>City</th>
                <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php 
			$truck_list = $truck->ListTruckByTruckOwner($truckowner_details['id']);
			//mypr($client_list);
			$sr = 1;
			if(count($truck_list)>0){
			foreach($truck_list as $one){
				
				$truck_city = $city->selectCity($one['city_id']);
			//	mypr($one);
			?>
            <tr>
              <td><?php echo str_pad($sr, 4, "0", STR_PAD_LEFT);?>&nbsp;</td>
              <td><a href="truck.view.php?id=<?php echo $one['id']; ?>"><?php echo $one['truck_number'];?></a>&nbsp;</td>
              <td><?php echo $one['chassis_no'];?></td>
              <td><?php echo $one['owner_name'];?></td>
              <td><?php echo $one['contact_no'];?></td>
              <td><?php echo $truck_city['city_name'];?>&nbsp;</td>
              <td class="actions ">
                
               <!-- <a href="truck.delete.php?id=<?php echo $one['id'];?>" onclick="if (confirm(&quot;Are you sure you want to delete Truck # <?php echo $one['truck_number'];?> ?&quot;)) { document.post_5780779d45e6f682073240.submit(); } event.returnValue = false; return false;">Delete</a>	-->	
               <a href="truck.view.php?id=<?php echo $one['id'];?>">View/Edit</a></td>
            </tr>
            <?php
				$sr ++;
				}
			}else{
				echo '<tr><td colspan="8">No Truck Available</td></tr>';
			}
			?>
            
          </tbody>
        </table>
      </div>
      <div class="span6">
        <h3 class="heading">Commission Report</h3>
        <table class="table table-bordered table-striped dTableR" id="dt_order">
          <thead>
            <tr>
              <th>LR NO:</th>
              <th>Truck No:</th>
              <th>Commission</th>
              <th>Status</th>
              <th>Date</th>
            </tr>
          </thead>
          <tbody>
            <?php 
			
			//mypr($order_list);
			$sr = 1;
			foreach($truck_commissions as $one){
				
				//mypr($one);
			?>
            <tr>
              <td><a href="orders.view.php?id=<?php echo $one['id'];?>"><?php echo $one['lr_no'];?></a>&nbsp;</td>
              <td><a href="truck.view.php?id=<?php echo $one['truck_id'];?>"><?php echo $one['truck_number'];?></a></td>
              <td><?php echo $one['commission'];?>&nbsp;</td>
              <td><?php if($one['status'] == 0){echo '<b style="color:#F90409">Unpaid</b>';}else{echo '<b style="color:blue">Paid</b>';}?>&nbsp;</td>
              <td><?php 
			  		$date=date_create($one['created']);
					echo date_format($date,"d/m/Y ");
//			  echo $one['created'];
				?></td>
            </tr>
            <?php
				$sr ++;
				}
			?>
            
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