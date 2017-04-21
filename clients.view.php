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
$client = new Client();
$order = new Order();

if(isset($_GET)){
//	echo 'post';
//	mypr($_GET);
//	echo strlen($_POST['data']['clients']['id']);
//	exit;
//		$date=date("Y/m/d");
//		$_POST['data']['clients']['date']= date_format($date,"Y-m-d");
	if(!empty($_GET['id'])){
	
		$client_details = $client->getClient($_GET['id']);
		
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
                                    <a href="/clients/index">
                                    	Clients                                    </a>
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
							Client Details
						</li>
						<li>
							<span class="item-key">Client Name</span>
							<div class="vcard-item"><?php echo $client_details['name']; ?>&nbsp;</div>
						</li>
						<li>
							<span class="item-key">Client Place</span>
							<div class="vcard-item"><?php echo $client_details['place']; ?>&nbsp;</div>
						</li>
						<li>
							<span class="item-key">Client Address</span>
							<div class="vcard-item"><?php echo $client_details['address']; ?>&nbsp;</div>
						</li>
						<li>
							<span class="item-key">Email Address</span>
							<div class="vcard-item"><?php echo $client_details['mail']; ?>&nbsp;</div>
						</li>
						<li>
							<span class="item-key">Contact Person</span>
							<div class="vcard-item"><?php echo $client_details['contact_person']; ?>&nbsp;</div>
						</li>
                        <li>
							<span class="item-key">Contact No</span>
							<div class="vcard-item"><?php echo $client_details['contact_no']; ?>&nbsp;</div>
						</li>
                    </ul>
 				</div>
 			</div>
 		</div>
 	</h3></div>
 </div>
                     
                     
<div class="row-fluid">
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
                    
<div class="row-fluid">
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
            
            <?php 
			$order_list = $order->listClientOrder('100',$client_details['id']);
			//mypr($order_list);
			if(isset($order_list)){
			$sr = 1;
			foreach($order_list as $one){
				
			//	mypr($one);
			?>
            <tr>
              <td><?php echo str_pad($sr, 4, "0", STR_PAD_LEFT);?>&nbsp;</td>
              <td><?php echo $one['lr_no'];?>&nbsp;</td>
              <td><?php if($one['order_type']==0){echo'Debit';}else{echo 'Credit';}?></td>
              <td><a href="clients.view.php?id=<?php echo $one['client_id'];?>"><?php echo $one['client_name'];?></a> (KADI) </td>
              <td><ul>
              <?php  
			  $tran_fright = $order->transport_fright($one['id']);
			  if(isset($tran_fright)){
			  foreach($tran_fright as $trn){
			//	  mypr($trn);
				echo '<li>'.$trn['party_name']."/".$trn['transport_freight']."</li>";  
			  }}
			  
			  ?>
                  
                </ul></td>
              <td style="display:none;">KADI / JAGUDAN &nbsp;</td>
              <td><a href="/trucks/view/20"><?php echo $one['truck_number'];?></a></td>
              <td><?php echo $one['commision'];?>&nbsp;</td>
              <td><?php echo $one['advance_pay'];?>&nbsp;</td>
              <td><?php echo $one['truck_fright'];?></td>
              <td><?php echo $one['date'];?></td>
              <td class="actions"><a href="orders.view.php?id=<?php echo $one['id'];?>">View</a> <a href="/orders/complete/7">Complete</a> <a href="orders.printlr.php?id=<?php echo $one['id'];?>">Print-LR</a></td>
            </tr>
            <?php
				$sr ++;
				}
				}
			?>
                            </tbody>
        </table>        
    </div>
</div>

<div class="row-fluid">
	<div class="span12">
		<h3 class="heading">Payment Details</h3>
	
		<table class="table table-bordered table-striped" id="smpl_tbl">
			<thead>
				<tr>
					<th>Date</th>
					<th>Cheque No</th>
					<th>Bank</th>
					<th>Branch</th>
					<th>Cheque Date</th>
                    <th>Cheque Amount</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>10-OCT-2015</td>
					<td>ABC12345</td>
					<td>Bank of Baroda</td>
					<td>Memnagar</td>
					<td>10-OCT-2015</td>
                    <td>13000</td>
				</tr>
				<tr>
					<td>1-OCT-2015</td>
					<td>ZAS25252</td>
					<td>SBI</td>
					<td>Nehrunagar</td>
					<td>13-OCT-2015</td>
                    <td>17000</td>
				</tr>
			</tbody>
		</table>
		
	</div>
</div>

<div class="clients view">
</div>

<div class="actions">
	<h3>Actions</h3>
	<ul>
		<li><a href="/clients/edit/3">Edit Client</a> </li>
		<li><form action="/clients/delete/3" name="post_577f57276a3d9045861539" id="post_577f57276a3d9045861539" style="display:none;" method="post"><input type="hidden" name="_method" value="POST"></form><a href="#" onclick="if (confirm(&quot;Are you sure you want to delete # 3?&quot;)) { document.post_577f57276a3d9045861539.submit(); } event.returnValue = false; return false;">Delete Client</a> </li>
		<li><a href="/clients">List Clients</a> </li>
		<li><a href="/clients/add">New Client</a> </li>
	</ul>
</div>
            
                    
                   	     

                   <script type="text/javascript" src="js/jquery.debouncedresize.min.js"></script><script type="text/javascript" src="js/jquery.actual.min.js"></script><script type="text/javascript" src="js/jquery.cookie.min.js"></script><script type="text/javascript" src="js/bootstrap/js/bootstrap.min.js"></script><script type="text/javascript" src="js/lib/qtip2/jquery.qtip.min.js"></script><script type="text/javascript" src="js/lib/jBreadcrumbs/js/jquery.jBreadCrumb.1.1.min.js"></script><script type="text/javascript" src="js/lib/sticky/sticky.min.js"></script><script type="text/javascript" src="js/ios-orientationchange-fix.js"></script><script type="text/javascript" src="js/lib/antiscroll/antiscroll.js"></script><script type="text/javascript" src="js/lib/antiscroll/jquery-mousewheel.js"></script><script type="text/javascript" src="js/lib/colorbox/jquery.colorbox.min.js"></script><script type="text/javascript" src="js/gebo_common.js"></script> 

                </div>
</div>
</body></html>