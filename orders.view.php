<?php
/*
UserCake Version: 2.0.2
http://usercake.com
*/

require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}
$order = new Order();
$client = new Client();
$driver = new Driver();
$truck = new Truck();
$party = new Party();
$truckowner = new TruckOwner();
$city = new City();
$voucher = new Voucher();
$city_list = $city->ListCity();
$city_list_htm = '';
foreach($city_list as $city_one){
	$city_list_htm.= '<option value="'.$city_one['CityId'].'">'.$city_one['CityName'].'</option>';
	}
if(isset($_GET['id'])){
	echo $_GET['id'];
	$order_id = $_GET['id'];
	
	$order_details = $order->editOrder($order_id);
	$client_details =$client->getClient($order_details['client_id']);
	$transport_fright_details =$order->transport_fright($order_id);
//	mypr($transport_fright_details);
//	mypr($order_details);
	
	
//	exit;
	
	}
require_once("models/header.php");
require_once("models/header.php");
include("top-nav.php");
$order = new Order();


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
                                    <a href="orders.php">Orders</a>
                                </li>
                                <li class="last">View</li>
                            </ul></div></div>
                        </div>
                    </nav>
                    
					
					<div class="row-fluid">
	<div class="span12">
		<h3 class="heading" client="" detail<="" h3="">
		<div class="row-fluid">
			<div class="span6">
				<div class="vcard">
					<ul style="margin-left:0px;">
						<li class="v-heading">
							<?php if($order_details['order_type'] == '1'){echo 'Cash';}else{echo 'Debit';}?> Order Details :   </b>
						</li>
						<li>
							<span class="item-key">LrNo:</span>
							<div class="vcard-item"><?php echo $order_details['lr_no'] ?>&nbsp;</div>
						</li>
						<li>
							<span class="item-key">Date</span>
							<div class="vcard-item"><?php echo $order_details['order_generation_date'] ?>&nbsp;</div>
						</li>
						<li>
							<span class="item-key">From / To</span>
							<div class="vcard-item"><?php echo $city_list[$order_details['from_city']]['CityName']." / ".$city_list[$order_details['to_city']]['CityName'];  ?>&nbsp;</div>
						</li>
						<li>
							<span class="item-key">Pcs/Weight(Guarantee):</span>
							<div class="vcard-item"><?php echo $order_details['qty'] ?>&nbsp;</div>
						</li>
						<li>
							<span class="item-key">Meterial:</span>
							<div class="vcard-item"><?php echo $order_details['meterial'] ?>&nbsp;</div>
						</li>
                        <li>
							<span class="item-key">Truck Fright:</span>
							<div class="vcard-item"><?php echo $order_details['truck_fright'] ?>&nbsp;</div>
						</li>
                    </ul>
 				</div>
 			</div>
            <div class="span6">
				<div class="vcard">
					<ul style="margin-left:0px;">
						<li class="v-heading">
							Client Details
						</li>
						<li>
							<span class="item-key">Client Name</span>
							<div class="vcard-item"><?php echo $client_details['name']; ?>&nbsp;</div>
						</li>
						<li>
							<span class="item-key">Client Place</span>
							<div class="vcard-item"><?php echo $client_details['place'] ?>&nbsp;</div>
						</li>
						<li>
							<span class="item-key">Client Address</span>
							<div class="vcard-item"><?php echo $client_details['address'] ?>&nbsp;</div>
						</li>
						<li>
							<span class="item-key">Contact Person</span>
							<div class="vcard-item"><?php echo $client_details['contact_person'] ?>&nbsp;</div>
						</li>
                        <li>
							<span class="item-key">Contact No</span>
							<div class="vcard-item"><?php echo $client_details['contact_no'] ?>&nbsp;</div>
						</li>
                        <li>
							<span class="item-key">Email Address</span>
							<div class="vcard-item"> <?php echo $client_details['mail'] ?>&nbsp;</div>
						</li>
                    </ul>
 				</div>
 			</div>
 		</div>
 	</h3></div>
    
    
    
    
    
    <div class="span12" style="margin-left:0px !important;">
		<h3 class="heading" client="" detail<="" h3="">
		<div class="row-fluid">
			<div class="span6">
				<div class="vcard">
					<ul style="margin-left:0px;">
						<li class="v-heading">
							Party Details:   </b>
						</li>
                    </ul>
                    <table border="0" class="table table-bordered">
                      <tbody>
                        <tr>
                        <th scope="col">Sr.&nbsp;</th>
                          <th scope="col">Name&nbsp;</th>
                          <th scope="col">Place&nbsp;</th>
                          <th scope="col">Transport Fright&nbsp;</th>
                          <th scope="col">Weight&nbsp;</th>
                          <th scope="col">Actual weight&nbsp;</th>
                          <th scope="col">Note&nbsp;</th>
                        </tr>
                        <?php 
						//mypr($transport_fright_details); 
						$i = 1;
						if(is_array($transport_fright_details)){
						foreach($transport_fright_details as $tp){
							//mypr($tp);
							
						 ?>
                        <tr>
                          <th scope="row"><?php echo $i; ?>&nbsp;</th>
                          <td><?php echo $tp['party_name']; ?>&nbsp;</td>
                          <td><?php echo $tp['cityname']; ?>&nbsp;</td>
                          <td><?php echo $tp['transport_freight']; ?>&nbsp;</td>
                          <td><?php echo $tp['weight']; ?>&nbsp;</td>
                          <td><?php echo $tp['actual_weight']; ?>&nbsp;</td>
                          <td><?php echo $tp['note']; ?>&nbsp;</td>
                        </tr>
                        <?php $i++; }}else{ echo '<tr><td colspan="7" style="text-align:center;">No data</td></tr>';} ?>
                      </tbody>
                    </table>

 				</div>
	                <div class="vcard">
					<ul style="margin-left:0px;">
						<li class="v-heading">
							Truck / Driver Details:   </b>
						</li>
                    </ul>
                    <table border="0" class="table table-bordered">
                      <tbody>
                        <tr>
                          <th scope="col">Truck No:&nbsp;</th>
                          <th scope="col">Chessis / Engine No:&nbsp;</th>
                          <th scope="col">Owner Name (Place)&nbsp;</th>
                          <th scope="col">Mobile No.&nbsp;</th>
                          <th scope="col">Driver (Mobile)&nbsp;</th>
                        </tr>
                        <tr>
                          <td><?php echo $order_details['Truck']['truck_number']; ?>&nbsp;</td>
                          <td><?php echo $order_details['Truck']['engine_no'].' - '.$order_details['Truck']['chassis_no'];?>&nbsp;</td>
                          <td><?php echo $order_details['Truck']['owner_name'].'(';
						  if(isset($order_details['Truck']['city_id'])){
							  echo $city_list[$order_details['Truck']['city_id']]['CityName'];
						  }else{
							  echo '-';
							  }
							  echo ')';
							  ?>&nbsp;</td>
                          <td><?php echo $order_details['Truck']['contact_no']; ?>&nbsp;</td>
                          <td><?php echo $order_details['driver_details']['driver_name']."(".$order_details['driver_details']['mobileno'].")"; ?>&nbsp;</td>
                        </tr>
                      </tbody>
                    </table>

 				</div>
 			</div>
            <div class="span6">
				<div class="vcard">
					<ul style="margin-left:0px;">
						<li class="v-heading">
							Other Details
						</li>
						<li>
							<span class="item-key">Advance Payment </span>
							<div class="vcard-item"><?php echo $order_details['advance_pay']; ?>&nbsp;</div>
						</li>
						<li>
							<span class="item-key">Commission </span>
							<div class="vcard-item">Rs. <?php echo $order_details['commision'] ?>/-&nbsp;</div>
						</li>
						<li>
							<span class="item-key">Total Actual Weight </span>
							<div class="vcard-item"><?php if($order_details['actual_qty'] !== 'NULL'){echo $order_details['actual_qty'];} ?>&nbsp;</div>
						</li>
						
                    </ul>
 				</div>
                
                <div class="row-fluid">
                <div class="span12" >
									<div class="btn-group" style="float:right;">
                                        <a href="orders.edit.php?id=<?php echo $order_details['id']; ?>" class="btn btn-large btn-primary">Edit</a>
                                        <a href="orders.printlr.php?id=<?php echo $order_details['id']; ?>" class="btn btn-large">Print</a>
                                        <?php if($order_details['order_type'] == '1'){ ?>
                                        <a href="orders.update.php?id=<?php echo $order_details['id']; ?>" class="btn btn-large btn-success">Update</a>
                                        <?php }else{ ?>
                                        <a href="orders.complate.php?id=<?php echo $order_details['id']; ?>" class="btn btn-large btn-success">Complate</a>
                                        <?php } ?>
                                        
									</div>
								</div></div>
                
 			</div>
            
 		</div>
        
 	</h3></div>
 </div>
 
 
	
            
<div class="row-fluid">
	<div class="span12">
		<h3 class="heading">Voucher Detail</h3>
		 <table class="table table-bordered table-striped table_vam" id="index">
          <thead>
            <tr>
              <th>Voucher NO.</th>
              <th>Voucher Type</th>
              <th>Received By</th>
              <th>Amount</th>
              <th>Status</th>
              <th>Date</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php 
			$voucher_list = $voucher->ListVoucherByOrder('90');
		//	mypr($voucher_list);
			$sr = 1;
			if(is_array($voucher_list))
			foreach($voucher_list as $one){
				
			//	mypr($one);
			?>
            <tr>
              <td><?php echo str_pad($one['id'], 4, "0", STR_PAD_LEFT);?>&nbsp;</td>
              <td><?php if($one['type']==0){echo'Advance';}else{echo 'Full';}?></td>
              <td><?php echo $one['received_by'];?>&nbsp;</td>
              <td><?php echo $one['amount'];?>&nbsp;</td>
              <td><?php if($one['status'] == 0){echo '<b style="color:#F90409">Unpaid</b>';}else{echo '<b style="color:blue">Paid</b>';}?>&nbsp;</td>
              <td><?php echo $one['created'];?>&nbsp;</td>
              <td class="actions"><a href="voucher.view.php?id=<?php echo $one['id'];?>">View</a> </td>
            </tr>
            <?php
				$sr ++;
				} else{ echo '<tr><td>No Voucher Generated</td></tr>';}
			?>
            
          </tbody>
        </table>	
	</div>
</div>
      
   



<div class="clients view">
</div>


            
                    
                   	     

                   
                </div>

<!-- sidebar --> 
<a href="javascript:void(0)" class="sidebar_switch on_switch ttip_r" title="Hide Sidebar">Sidebar switch</a>
<div class="sidebar">
  <div class="antiScroll">
    <div class="antiscroll-inner">
      <div class="antiscroll-content">
        <div class="sidebar_inner"> 
          
          <!--<form action="index.php?uid=1&amp;page=search_page" class="input-append" method="post" >
					<input autocomplete="off" name="query" class="search_query input-medium" size="16" type="text" placeholder="Search..." /><button type="submit" class="btn"><i class="icon-search"></i></button>
				</form>-->
          
          <div id="side_accordion" class="accordion"> 
            
            <!--<div class="accordion-group">
						<div class="accordion-heading">
							<a href="#collapseOne" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
								<i class="icon-folder-close"></i> Content
							</a>
						</div>
						<div class="accordion-body collapse" id="collapseOne">
							<div class="accordion-inner">
								<ul class="nav nav-list">
									<li><a href="javascript:void(0)">Articles</a></li>
									<li><a href="javascript:void(0)">News</a></li>
									<li><a href="javascript:void(0)">Newsletters</a></li>
									<li><a href="javascript:void(0)">Comments</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="accordion-group">
						<div class="accordion-heading">
							<a href="#collapseTwo" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
								<i class="icon-th"></i> Modules
							</a>
						</div>
						<div class="accordion-body collapse" id="collapseTwo">
							<div class="accordion-inner">
								<ul class="nav nav-list">
									<li><a href="javascript:void(0)">Content blocks</a></li>
									<li><a href="javascript:void(0)">Tags</a></li>
									<li><a href="javascript:void(0)">Blog</a></li>
									<li><a href="javascript:void(0)">FAQ</a></li>
									<li><a href="javascript:void(0)">Formbuilder</a></li>
									<li><a href="javascript:void(0)">Location</a></li>
									<li><a href="javascript:void(0)">Profiles</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="accordion-group">
						<div class="accordion-heading">
							<a href="#collapseThree" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
								<i class="icon-user"></i> Account manager
							</a>
						</div>
						<div class="accordion-body collapse" id="collapseThree">
							<div class="accordion-inner">
								<ul class="nav nav-list">
									<li><a href="javascript:void(0)">Members</a></li>
									<li><a href="javascript:void(0)">Members groups</a></li>
									<li><a href="javascript:void(0)">Users</a></li>
									<li><a href="javascript:void(0)">Users groups</a></li>
								</ul>
								
							</div>
						</div>
					</div>
					<div class="accordion-group">
						<div class="accordion-heading">
							<a href="#collapseFour" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
								<i class="icon-cog"></i> Configuration
							</a>
						</div>
						<div class="accordion-body collapse" id="collapseFour">
							<div class="accordion-inner">
								<ul class="nav nav-list">
									<li class="nav-header">People</li>
									<li class="active"><a href="javascript:void(0)">Account Settings</a></li>
									<li><a href="javascript:void(0)">IP Adress Blocking</a></li>
									<li class="nav-header">System</li>
									<li><a href="javascript:void(0)">Site information</a></li>
									<li><a href="javascript:void(0)">Actions</a></li>
									<li><a href="javascript:void(0)">Cron</a></li>
									<li class="divider"></li>
									<li><a href="javascript:void(0)">Help</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="accordion-group">
						<div class="accordion-heading">
							<a href="#collapseLong" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
								<i class="icon-leaf"></i> Long content (scrollbar)
							</a>
						</div>
						<div class="accordion-body collapse" id="collapseLong">
							<div class="accordion-inner">
								Some text to show sidebar scroll bar<br>
								Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus rhoncus, orci ac fermentum imperdiet, purus sapien pharetra diam, at varius nibh tellus tristique sem. Nulla congue odio ut augue volutpat congue. Nullam id nisl ut augue posuere ullamcorper vitae eget nunc. Quisque justo turpis, tristique non fermentum ac, feugiat quis lorem. Ut pellentesque, turpis quis auctor laoreet, nibh erat volutpat est, id mattis mi elit non massa. Suspendisse diam dui, fringilla id pretium non, dapibus eget enim. Duis fermentum quam a leo luctus tincidunt euismod sit amet arcu. Duis bibendum ultricies libero sed feugiat. Duis ut sapien risus. Morbi non nulla sit amet eros fringilla blandit id vel augue. Nam placerat ligula lacinia tellus molestie molestie vestibulum leo tincidunt.
								Duis auctor varius risus vitae commodo. Fusce nec odio massa, ut dapibus justo. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur dapibus, mauris sit amet feugiat tempor, nulla diam gravida magna, in facilisis sapien tellus non ligula. Mauris sapien turpis, sodales ac lacinia sit amet, porttitor in lacus. Pellentesque tincidunt malesuada magna, in egestas augue sodales vel. Praesent iaculis sapien at ante sodales facilisis.
							</div>
						</div>
					</div>-->
            <div class="accordion-group">
              <div class="accordion-heading"> <a href="#collapse7" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle"> <i class="icon-th"></i> Calculator </a> </div>
              <div class="accordion-body collapse in" id="collapse7">
                <div class="accordion-inner">
                  <form name="Calc" id="calc">
                    <div class="formSep control-group input-append">
                      <input type="text" style="width:142px" name="Input" />
                      <button type="button" class="btn" name="clear" value="c" onclick="Calc.Input.value = ''"><i class="icon-remove"></i></button>
                    </div>
                    <div class="control-group">
                      <input type="button" class="btn btn-large" name="seven" value="7" onclick="Calc.Input.value += '7'" />
                      <input type="button" class="btn btn-large" name="eight" value="8" onclick="Calc.Input.value += '8'" />
                      <input type="button" class="btn btn-large" name="nine" value="9" onclick="Calc.Input.value += '9'" />
                      <input type="button" class="btn btn-large" name="div" value="/" onclick="Calc.Input.value += ' / '">
                    </div>
                    <div class="control-group">
                      <input type="button" class="btn btn-large" name="four" value="4" onclick="Calc.Input.value += '4'" />
                      <input type="button" class="btn btn-large" name="five" value="5" onclick="Calc.Input.value += '5'" />
                      <input type="button" class="btn btn-large" name="six" value="6" onclick="Calc.Input.value += '6'" />
                      <input type="button" class="btn btn-large" name="times" value="x" onclick="Calc.Input.value += ' * '" />
                    </div>
                    <div class="control-group">
                      <input type="button" class="btn btn-large" name="one" value="1" onclick="Calc.Input.value += '1'" />
                      <input type="button" class="btn btn-large" name="two" value="2" onclick="Calc.Input.value += '2'" />
                      <input type="button" class="btn btn-large" name="three" value="3" onclick="Calc.Input.value += '3'" />
                      <input type="button" class="btn btn-large" name="minus" value="-" onclick="Calc.Input.value += ' - '" />
                    </div>
                    <div class="formSep control-group">
                      <input type="button" class="btn btn-large" name="dot" value="." onclick="Calc.Input.value += '.'" />
                      <input type="button" class="btn btn-large" name="zero" value="0" onclick="Calc.Input.value += '0'" />
                      <input type="button" class="btn btn-large" name="DoIt" value="=" onclick="Calc.Input.value = Math.round( eval(Calc.Input.value) * 1000)/1000" />
                      <input type="button" class="btn btn-large" name="plus" value="+" onclick="Calc.Input.value += ' + '" />
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="push"></div>
        </div>
        
        <!--<div class="sidebar_info">
				<ul class="unstyled">
					<li>
						<span class="act act-warning">65</span>
						<strong>New comments</strong>
					</li>
					<li>
						<span class="act act-success">10</span>
						<strong>New articles</strong>
					</li>
					<li>
						<span class="act act-danger">85</span>
						<strong>New registrations</strong>
					</li>
				</ul>
			</div>--> 
        
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="js/jquery.debouncedresize.min.js"></script><script type="text/javascript" src="js/jquery.actual.min.js"></script><script type="text/javascript" src="js/jquery.cookie.min.js"></script><script type="text/javascript" src="js/bootstrap/js/bootstrap.min.js"></script><script type="text/javascript" src="js/lib/qtip2/jquery.qtip.min.js"></script><script type="text/javascript" src="js/lib/jBreadcrumbs/js/jquery.jBreadCrumb.1.1.min.js"></script><script type="text/javascript" src="js/lib/sticky/sticky.min.js"></script><script type="text/javascript" src="js/ios-orientationchange-fix.js"></script><script type="text/javascript" src="js/lib/antiscroll/antiscroll.js"></script><script type="text/javascript" src="js/lib/antiscroll/jquery-mousewheel.js"></script><script type="text/javascript" src="js/lib/colorbox/jquery.colorbox.min.js"></script><script type="text/javascript" src="js/gebo_common.js"></script> 
<script>
				$(document).ready(function() {
					//* show all elements & remove preloader
					setTimeout('$("html").removeClass("js")',1000);
				});
			</script>
</div>
</body></html>