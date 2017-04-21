<?php 
require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}
$order = new Order();
$client = new Client();
$driver = new Driver();
$truck = new Truck();
$party = new Party();
$truckowner = new TruckOwner();

if(isset($_POST['data'])){
//	echo 'post';
	mypr($_POST['data']);
//	echo strlen($_POST['data']['clients']['id']);
	exit;
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
	//echo $inserted_order;
	
	//mypr($_POST['data']);
	header('Location: orders.printlr.php?id='.$inserted_order);
}elseif($_POST['data']['Order']['order_type']==1){
	echo 'credit order';
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
require_once("models/header.php");
//require_once("models/header.php");
include("top-nav.php");
$city = new City();
$city_list = $city->ListCity();
$city_list_htm = '';
foreach($city_list as $city_one){
	$city_list_htm.= '<option value="'.$city_one['CityId'].'">'.$city_one['CityName'].'</option>';
	}
	
?>

    <body>
		
		<div class="style_switcher">
			<div class="sepH_c">
				<p>Colors:</p>
				<div class="clearfix">
					<a href="javascript:void(0)" class="style_item jQclr blue_theme style_active" title="blue">blue</a>
					<a href="javascript:void(0)" class="style_item jQclr dark_theme" title="dark">dark</a>
					<a href="javascript:void(0)" class="style_item jQclr green_theme" title="green">green</a>
					<a href="javascript:void(0)" class="style_item jQclr brown_theme" title="brown">brown</a>
					<a href="javascript:void(0)" class="style_item jQclr eastern_blue_theme" title="eastern_blue">eastern blue</a>
					<a href="javascript:void(0)" class="style_item jQclr tamarillo_theme" title="tamarillo">tamarillo</a>
				</div>
			</div>
			<div class="sepH_c">
				<p>Backgrounds:</p>
				<div class="clearfix">
					<span class="style_item jQptrn style_active ptrn_def" title=""></span>
					<span class="ssw_ptrn_a style_item jQptrn" title="ptrn_a"></span>
					<span class="ssw_ptrn_b style_item jQptrn" title="ptrn_b"></span>
					<span class="ssw_ptrn_c style_item jQptrn" title="ptrn_c"></span>
					<span class="ssw_ptrn_d style_item jQptrn" title="ptrn_d"></span>
					<span class="ssw_ptrn_e style_item jQptrn" title="ptrn_e"></span>
				</div>
			</div>
			<div class="sepH_c">
				<p>Layout:</p>
				<div class="clearfix">
					<label class="radio inline"><input type="radio" name="ssw_layout" id="ssw_layout_fluid" value="" checked /> Fluid</label>
					<label class="radio inline"><input type="radio" name="ssw_layout" id="ssw_layout_fixed" value="gebo-fixed" /> Fixed</label>
				</div>
			</div>
			<div class="sepH_c">
				<p>Sidebar position:</p>
				<div class="clearfix">
					<label class="radio inline"><input type="radio" name="ssw_sidebar" id="ssw_sidebar_left" value="" checked /> Left</label>
					<label class="radio inline"><input type="radio" name="ssw_sidebar" id="ssw_sidebar_right" value="sidebar_right" /> Right</label>
				</div>
			</div>
			<div class="sepH_c">
				<p>Show top menu on:</p>
				<div class="clearfix">
					<label class="radio inline"><input type="radio" name="ssw_menu" id="ssw_menu_click" value="" checked /> Click</label>
					<label class="radio inline"><input type="radio" name="ssw_menu" id="ssw_menu_hover" value="menu_hover" /> Hover</label>
				</div>
			</div>
			
			<div class="gh_button-group">
				<a href="#" id="showCss" class="btn btn-primary btn-mini">Show CSS</a>
				<a href="#" id="resetDefault" class="btn btn-mini">Reset</a>
			</div>
			<div class="hide">
				<ul id="ssw_styles">
					<li class="small ssw_mbColor sepH_a" style="display:none">body {<span class="ssw_mColor sepH_a" style="display:none"> color: #<span></span>;</span> <span class="ssw_bColor" style="display:none">background-color: #<span></span> </span>}</li>
					<li class="small ssw_lColor sepH_a" style="display:none">a { color: #<span></span> }</li>
				</ul>
			</div>
		</div>
		
		<div id="maincontainer" class="clearfix">
			<!-- header -->
            <header>
                <div class="navbar navbar-fixed-top">
                    <div class="navbar-inner">
                        <div class="container-fluid">
                            <a class="brand" href="dashboard.html"><i class="icon-home icon-white"></i> Gebo Admin</a>
                            <ul class="nav user_menu pull-right">
                                <li class="hidden-phone hidden-tablet">
                                    <div class="nb_boxes clearfix">
                                        <a data-toggle="modal" data-backdrop="static" href="#myMail" class="label ttip_b" title="New messages">25 <i class="splashy-mail_light"></i></a>
                                        <a data-toggle="modal" data-backdrop="static" href="#myTasks" class="label ttip_b" title="New tasks">10 <i class="splashy-calendar_week"></i></a>
                                    </div>
                                </li>
                                <li class="divider-vertical hidden-phone hidden-tablet"></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Johny Smith <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                    <li><a href="user_profile.html">My Profile</a></li>
                                    <li><a href="javascrip:void(0)">Another action</a></li>
                                    <li class="divider"></li>
                                    <li><a href="login.html">Log Out</a></li>
                                    </ul>
                                </li>
                            </ul>
							<a data-target=".nav-collapse" data-toggle="collapse" class="btn_menu">
								<span class="icon-align-justify icon-white"></span>
							</a>
                            <nav>
                                <div class="nav-collapse">
                                    <ul class="nav">
                                        <li class="dropdown">
                                            <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-list-alt icon-white"></i> Forms <b class="caret"></b></a>
                                            <ul class="dropdown-menu">
                                                <li><a href="form_elements.html">Form elements</a></li>
                                                <li><a href="form_extended.html">Extended form elements</a></li>
                                                <li><a href="form_validation.html">Form Validation</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown">
                                            <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-th icon-white"></i> Components <b class="caret"></b></a>
                                            <ul class="dropdown-menu">
                                                <li><a href="alerts_btns.html">Alerts & Buttons</a></li>
                                                <li><a href="icons.html">Icons</a></li>
                                                <li><a href="notifications.html">Notifications</a></li>
                                                <li><a href="tables.html">Tables</a></li>
												<li><a href="tables_more.html">Tables (more examples)</a></li>
                                                <li><a href="tabs_accordion.html">Tabs & Accordion</a></li>
                                                <li><a href="tooltips.html">Tooltips, Popovers</a></li>
                                                <li><a href="typography.html">Typography</a></li>
												<li><a href="widgets.html">Widget boxes</a></li>
												<li class="dropdown">
													<a href="#">Sub menu <b class="caret-right"></b></a>
													<ul class="dropdown-menu">
														<li><a href="#">Sub menu 1.1</a></li>
														<li><a href="#">Sub menu 1.2</a></li>
														<li><a href="#">Sub menu 1.3</a></li>
														<li>
															<a href="#">Sub menu 1.4 <b class="caret-right"></b></a>
															<ul class="dropdown-menu">
																<li><a href="#">Sub menu 1.4.1</a></li>
																<li><a href="#">Sub menu 1.4.2</a></li>
																<li><a href="#">Sub menu 1.4.3</a></li>
															</ul>
														</li>
													</ul>
												</li>
                                            </ul>
                                        </li>
                                        <li class="dropdown">
                                            <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-wrench icon-white"></i> Plugins <b class="caret"></b></a>
                                            <ul class="dropdown-menu">
                                                <li><a href="charts.html">Charts</a></li>
                                                <li><a href="calendar.html">Calendar</a></li>
                                                <li><a href="datatable.html">Datatable</a></li>
                                                <li><a href="file_manager.html">File Manager</a></li>
                                                <li><a href="floating_header.html">Floating List Header</a></li>
                                                <li><a href="google_maps.html">Google Maps</a></li>
                                                <li><a href="gallery.html">Gallery Grid</a></li>
                                                <li><a href="wizard.html">Wizard</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown">
                                            <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-file icon-white"></i> Pages <b class="caret"></b></a>
                                            <ul class="dropdown-menu">
                                                <li><a href="chat.html">Chat</a></li>
                                                <li><a href="error_404.html">Error 404</a></li>
												<li><a href="mailbox.html">Mailbox</a></li>
                                                <li><a href="search_page.html">Search page</a></li>
                                                <li><a href="user_profile.html">User profile</a></li>
												<li><a href="user_static.html">User profile (static)</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                        </li>
                                        <li>
                                            <a href="documentation.html"><i class="icon-book icon-white"></i> Help</a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="modal hide fade" id="myMail">
                    <div class="modal-header">
                        <button class="close" data-dismiss="modal">×</button>
                        <h3>New messages</h3>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-info">In this table jquery plugin turns a table row into a clickable link.</div>
                        <table class="table table-condensed table-striped" data-rowlink="a">
                            <thead>
                                <tr>
                                    <th>Sender</th>
                                    <th>Subject</th>
                                    <th>Date</th>
                                    <th>Size</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Declan Pamphlett</td>
                                    <td><a href="javascript:void(0)">Lorem ipsum dolor sit amet</a></td>
                                    <td>23/05/2012</td>
                                    <td>25KB</td>
                                </tr>
                                <tr>
                                    <td>Erin Church</td>
                                    <td><a href="javascript:void(0)">Lorem ipsum dolor sit amet</a></td>
                                    <td>24/05/2012</td>
                                    <td>15KB</td>
                                </tr>
                                <tr>
                                    <td>Koby Auld</td>
                                    <td><a href="javascript:void(0)">Lorem ipsum dolor sit amet</a></td>
                                    <td>25/05/2012</td>
                                    <td>28KB</td>
                                </tr>
                                <tr>
                                    <td>Anthony Pound</td>
                                    <td><a href="javascript:void(0)">Lorem ipsum dolor sit amet</a></td>
                                    <td>25/05/2012</td>
                                    <td>33KB</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <a href="javascript:void(0)" class="btn">Go to mailbox</a>
                    </div>
                </div>
                <div class="modal hide fade" id="myTasks">
                    <div class="modal-header">
                        <button class="close" data-dismiss="modal">×</button>
                        <h3>New Tasks</h3>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-info">In this table jquery plugin turns a table row into a clickable link.</div>
                        <table class="table table-condensed table-striped" data-rowlink="a">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Summary</th>
                                    <th>Updated</th>
                                    <th>Priority</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>P-23</td>
                                    <td><a href="javascript:void(0)">Admin should not break if URL&hellip;</a></td>
                                    <td>23/05/2012</td>
                                    <td class="tac"><span class="label label-important">High</span></td>
                                    <td>Open</td>
                                </tr>
                                <tr>
                                    <td>P-18</td>
                                    <td><a href="javascript:void(0)">Displaying submenus in custom&hellip;</a></td>
                                    <td>22/05/2012</td>
                                    <td class="tac"><span class="label label-warning">Medium</span></td>
                                    <td>Reopen</td>
                                </tr>
                                <tr>
                                    <td>P-25</td>
                                    <td><a href="javascript:void(0)">Featured image on post types&hellip;</a></td>
                                    <td>22/05/2012</td>
                                    <td class="tac"><span class="label label-success">Low</span></td>
                                    <td>Updated</td>
                                </tr>
                                <tr>
                                    <td>P-10</td>
                                    <td><a href="javascript:void(0)">Multiple feed fixes and&hellip;</a></td>
                                    <td>17/05/2012</td>
                                    <td class="tac"><span class="label label-warning">Medium</span></td>
                                    <td>Open</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <a href="javascript:void(0)" class="btn">Go to task manager</a>
                    </div>
                </div>
            </header>
            
            <!-- main content -->
            
<div id="contentwrapper">
                <div class="main_content">
                    
                    <nav>
                        <div id="jCrumbs" class="breadCrumb module">
                            <ul>
                                <li>
                                    <a href="javascript:void(0)"><i class="icon-home"></i></a>
                                </li>
                                <li>
                                    <a href="/orders/index">
                                    	Orders                                    </a>
                                </li>
                                <li>Add</li>
                            </ul>
                        </div>
                    </nav>
                   
<form action="orders.add.php" method="post" id="defaultForm" class="form_validation_ttip" accept-charset="utf-8"><div style="display:none;"><input type="hidden" name="_method" value="POST"/></div>

  <div class="row-fluid">
    <div class="span12">
      <h3 class="heading">New Order
        
        LR NO : <input name="data[Order][lr_no]" maxlength="50" type="text" id="OrderLrNo"/>        
        <input name="data[Order][order_generation_date]" id="dp1" value="" type="text"/>        
        <!--<label  style="margin-left:50px;" class="radio inline">
          <input type="radio" value="Cash" checked name="Order">
          Cash Order 
        </label>
        <label class="radio inline">
          <input type="radio" value="debit" name="Order">
          Debit Order 
        </label>-->

        <input type="hidden" name="data[Order][order_type]" id="OrderOrderType_" value=""/><input type="radio" name="data[Order][order_type]" id="OrderOrderType1" value="1" checked="checked" />Cash Order<input type="radio" name="data[Order][order_type]" id="OrderOrderType0" value="0" checked="checked" />Debit Order
      </h3>
    </div>
  </div>
  <div class="row-fluid ">
    <div class="span6 well">
      <div class="row-fluid ">
        <div class="span5">
          <label>Client Name<span class="f_req">*</span></label>
          <div id="txtHint">
          <input type="hidden" name="data[clients][id]" id="clientsId"/> 
           <input name="data[clients][name]" class="span10" type="text" id="clientsName"/> 
          	           </div>

        </div>

        <div class="span5">
          <label>Place:<span class="f_req">*</span></label>
          <select name="data[Order][order_city]" class="span10" id="OrderOrderCity">
          
<option value="">--- Select Order City ---</option>
        <?php  

	echo $city_list_htm ;
?>

</select>	
        </div>
<div class="span2"><a href="javascript:void(0)" class="btn" id="smoke_prompt">Add City</a></div>
      </div>
      <div class="row-fluid ">
        <div class="span5">
          <label>From:<span class="f_req">*</span></label>
          <select name="data[Order][from_city]" class="span10" id="OrderFromCity">
<option value="">--- Select From City ---</option>
<?php echo $city_list_htm;?></select>	
        </div>
        <div class="span5">
          <label>To:<span class="f_req">*</span></label>
          <select name="data[Order][to_city]" class="span10" id="OrderToCity">
<option value="">--- Select To City ---</option>
     <?php  

	echo $city_list_htm ;
?>
</select>        </div>
      </div>
      <div class="row-fluid ">
        <div class="span5">
          <label>Payment By:<span class="f_req">*</span></label>
          <input type="hidden" name="data[Order][payment_by]" id="OrderPaymentBy_" value=""/><input type="radio" name="data[Order][payment_by]" id="OrderPaymentBy1" value="1" checked="checked" />Party<input type="radio" name="data[Order][payment_by]" id="OrderPaymentBy0" value="0" checked="checked" />Client        </div>
      </div>
    </div>

    <div class="span6 well">

      <p class="f_legend"><span class="span6">Party Details</span>
        <select name="data[Order][payment_by]" class="chzn_a span10" onchange="javascript:ajax_party(this,&quot;old&quot;)" id="OrderPaymentBy">
<option value="">--- Select Party ---</option>
<option value="1">Party1</option>
<option value="2">Party2</option>
<option value="3"></option>
</select>        
      <span class="f_req btn" onclick="javascript:ajax_party(this,'new')"><i class="splashy-add"></i></span></p>

      <div class="formParty">
        
        <div id="ajax_party">
          <!-- Ajax Party details comes here -->
        </div>

      </div>
      
    </div>

  </div>
  <div class="clearfix"></div>
  <div class="row-fluid ">
    <div class="span6 well">
      <p class="f_legend">Truck Details</p>
      <div class="row-fluid">
        <div class="span4">
          <label>Pcs/Weight:<span class="f_req">*</span>(Guarantee)</label>
          <input name="data[Order][qty]" class="span10" maxlength="255" type="text" id="OrderQty"/> 
        </div>
        <div class="span4">
          <label>Meterial:<span class="f_req">*</span></label>
          <input name="data[Order][meterial]" class="span10" maxlength="255" type="text" id="OrderMeterial"/> 
        </div>
        <div class="span4">
          <label>Truck Fright:<span class="f_req">*</span></label>
          <input name="data[Order][truck_fright]" class="span10" maxlength="255" type="text" id="OrderTruckFright"/>        </div>
      </div>
      <div class="row-fluid">

        <div class="span4">
          <label>Truck Number:<span class="f_req">*</span></label>
					<input type="hidden" name="data[Truck][id]" id="TruckId"/>			
          <input name="data[Truck][truck_number]" class="span10 col-md-12 form-control" placeholder="Search Truck No" autocomplete="off" maxlength="255" type="text" id="TruckTruckNumber"/> 
        </div>
        <div class="span4">
          <label>Chessis Number:<span class="f_req">*</span></label>
          <input name="data[Truck][chassis_no]" class="span10" maxlength="255" type="text" id="TruckChassisNo"/>        </div>
        <div class="span4">
          <label>Engine Number:<span class="f_req">*</span></label>
          <input name="data[Truck][engine_no]" class="span10" maxlength="255" type="text" id="TruckEngineNo"/>        </div>
      </div>
      <div class="row-fluid">
        <div class="span4">
          <label>Owner Name:<span class="f_req">*</span></label>
          <input type="hidden" name="data[TruckOwner][id]" id="TruckOwnerId"/> 
          <input name="data[TruckOwner][owner_name]" class="span10" maxlength="255" type="text" id="TruckOwnerOwnerName"/> 
        </div>
        <div class="span4">
          <label>Owner Place:<span class="f_req">*</span></label>
          <select name="data[TruckOwner][city_id]" class="span10" id="TruckOwnerCityId">
<option value="">--- Select Owner Place ---</option>
 <?php  

	echo $city_list_htm ;
?>
</select> 
        </div>
        <div class="span4">
          <label>Owner Mobile No:<span class="f_req">*</span></label>
          <input name="data[TruckOwner][contact_no]" class="span10" maxlength="50" type="text" id="TruckOwnerContactNo"/> 
        </div>
      </div>
    </div>
    <div class="span6 well">
      <p class="f_legend">Driver Details</p>
      <div class="formSep">
        <div class="row-fluid">
          <div class="span4">
            <label>Driver Name:<span class="f_req">*</span></label>
            <input type="hidden" name="data[DriverRegister][id]" id="DriverRegisterId"/>            <input name="data[DriverRegister][driver_name]" class="span10" placeholder="Search Driver Name" autocomplete="off" maxlength="255" type="text" id="DriverRegisterDriverName"/>          </div>
          <div class="span4">
            <label>Driver Mobile No:<span class="f_req">*</span></label>
            <input name="data[DriverRegister][mobileno]" class="span10" maxlength="255" type="text" id="DriverRegisterMobileno"/>          </div>
          <div class="span4">
            <label>Licence Number:<span class="f_req">*</span></label>
            <input name="data[DriverRegister][licenseno]" class="span10" maxlength="255" type="text" id="DriverRegisterLicenseno"/>          </div>
        </div>
        <div class="row-fluid">
          <div class="span4">
            <label>Advance Payment:<span class="f_req">*</span></label>
            <input name="data[Order][advance_pay]" class="span10" maxlength="255" type="text" id="OrderAdvancePay"/>          </div>
          <div class="span4">
            <label>Received By:<span class="f_req">*</span></label>
            <input name="data[CashVoucher][received_by]" class="span10" maxlength="255" type="text" id="CashVoucherReceivedBy"/>          </div>
          <div class="span4">
            <label>Commission:<span class="f_req">*</span></label>
            <input name="data[Order][commision]" class="span10" maxlength="255" type="text" id="OrderCommision"/>          </div>
          <div class="span4">
            <label>&nbsp;</label>
            <input type="submit" name="submit" value="Submit" >
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--    -->
  
  <div class="row-fluid"></div>
  
</form>

                    
                   	     

                   
                </div>
                
            </div>
            
            
			<!-- sidebar -->
            <a href="javascript:void(0)" class="sidebar_switch on_switch ttip_r" title="Hide Sidebar">Sidebar switch</a>
            <div class="sidebar">
				
				<div class="antiScroll">
					<div class="antiscroll-inner">
						<div class="antiscroll-content">
					
							<div class="sidebar_inner">
								<form action="index.php?uid=1&amp;page=search_page" class="input-append" method="post" >
									<input autocomplete="off" name="query" class="search_query input-medium" size="16" type="text" placeholder="Search..." /><button type="submit" class="btn"><i class="icon-search"></i></button>
								</form>
								<div id="side_accordion" class="accordion">
									
									<div class="accordion-group">
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
									</div>
									<div class="accordion-group">
										<div class="accordion-heading">
											<a href="#collapse7" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
											   <i class="icon-th"></i> Calculator
											</a>
										</div>
										<div class="accordion-body collapse in" id="collapse7">
											<div class="accordion-inner">
												<form name="Calc" id="calc">
													<div class="formSep control-group input-append">
														<input type="text" style="width:142px" name="Input" /><button type="button" class="btn" name="clear" value="c" onclick="Calc.Input.value = ''"><i class="icon-remove"></i></button>
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
													Contributed by <a href="http://themeforest.net/user/maumao">maumao</a>
												</form>
											</div>
										 </div>
									</div>
								</div>
								
								<div class="push"></div>
							</div>
							   
							<div class="sidebar_info">
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
							</div> 
						
						</div>
					</div>
				</div>
			
			</div>
            
            
             <script type="text/javascript" src="js/jquery.min.js"></script>	
					
					<script type="text/javascript" src="js/forms/jquery.inputmask.min.js"></script>
					<script type="text/javascript" src="js/lib/validation/jquery.validate.min.js"></script>
<!--Jquery UI Auto Suggestion-->
<link rel="stylesheet" type="text/css" href="css/lib/jquery-ui/css/Aristo/Aristo.css"/>
<script type="text/javascript" src="js/lib/jquery-ui/jquery-ui-1.8.20.custom.min.js"></script>
<link rel="stylesheet" href="js/lib/smoke/themes/gebo.css" />




            <script type="text/javascript" src="js/jquery.debouncedresize.min.js"></script>
			<script type="text/javascript" src="js/jquery.actual.min.js"></script>
			<script type="text/javascript" src="js/jquery.cookie.min.js"></script>
			<script type="text/javascript" src="js/bootstrap/js/bootstrap.min.js"></script>
			<script type="text/javascript" src="js/lib/qtip2/jquery.qtip.min.js"></script>
			<script type="text/javascript" src="js/lib/jBreadcrumbs/js/jquery.jBreadCrumb.1.1.min.js"></script>
			<script type="text/javascript" src="js/lib/sticky/sticky.min.js"></script>
			<script type="text/javascript" src="js/ios-orientationchange-fix.js"></script>
			<script type="text/javascript" src="js/lib/antiscroll/antiscroll.js"></script>
			<script type="text/javascript" src="js/lib/antiscroll/jquery-mousewheel.js"></script>
			<script type="text/javascript" src="js/lib/colorbox/jquery.colorbox.min.js"></script>
			<script type="text/javascript" src="js/gebo_common.js"></script>    
            <script type="text/javascript" src="js/lib/smoke/smoke.js"></script>
            <script src="js/gebo_notifications.js"></script>




            <script src="js/jquery.min.js"></script>
			<!-- smart resize event -->
			<script src="js/jquery.debouncedresize.min.js"></script>
			<!-- hidden elements width/height -->
			<script src="js/jquery.actual.min.js"></script>
			<!-- js cookie plugin -->
			<script src="js/jquery.cookie.min.js"></script>
			<!-- main bootstrap js -->
			<!-- tooltips -->
			<script src="lib/qtip2/jquery.qtip.min.js"></script>
			<!-- jBreadcrumbs -->
			<script src="lib/jBreadcrumbs/js/jquery.jBreadCrumb.1.1.min.js"></script>
			<!-- sticky messages -->
            <script src="lib/sticky/sticky.min.js"></script>
			<!-- fix for ios orientation change -->
			<script src="js/ios-orientationchange-fix.js"></script>
			<!-- scrollbar -->
			<script src="lib/antiscroll/antiscroll.js"></script>
			<script src="lib/antiscroll/jquery-mousewheel.js"></script>
			<!-- lightbox -->
            <script src="lib/colorbox/jquery.colorbox.min.js"></script>
            <!-- common functions -->
			<script src="js/gebo_common.js"></script>
	
            <!-- validation -->
            <script src="lib/validation/jquery.validate.min.js"></script>
            <!-- validation functions -->
            <script src="js/gebo_validation.js"></script>
    
<script type="text/javascript">

	var counter = 0;
  function ajax_party(obj,action){

    if(action == 'old'){
      var party_id = parseInt(obj.value);  
    } else {
      var party_id = 0;  
    }
    
    if($(".row-fluid").hasClass('party_'+party_id)){
      return false;
    }

    if(party_id >= 0)
    {
    	counter++;
      var myKeyVals = { party_id : party_id, counter : counter}
   	  
	  var saveData = $.ajax({
            type: 'POST',
            url: "ajax.party.php",
            data: myKeyVals,
            dataType: "text",
            success: function(resultData) { 
              //alert("Save Complete");
              $("#ajax_party").append(resultData); 
              //$("#ajax_party").html(resultData); 
            }
      });
      
      saveData.error(function() { 
        alert("Something went wrong"); 
      }); 
    }

  }

  $(document).ready(function() {
	  //* regular validation
		gebo_validation.reg();	
	//	gebo_mask_input.init();
		$('#dp1').datepicker();
		
  });
  
  gebo_datepicker = {
		init: function() {
			$('#dp1').datepicker();
			$('#dp2').datepicker();
			
			$('#dp_start').datepicker({format: "mm/dd/yyyy"}).on('changeDate', function(ev){
				var dateText = $(this).data('date');
				
				var endDateTextBox = $('#dp_end input');
				if (endDateTextBox.val() != '') {
					var testStartDate = new Date(dateText);
					var testEndDate = new Date(endDateTextBox.val());
					if (testStartDate > testEndDate) {
						endDateTextBox.val(dateText);
					}
				}
				else {
					endDateTextBox.val(dateText);
				};
				$('#dp_end').datepicker('setStartDate', dateText);
				$('#dp_start').datepicker('hide');
			});
			$('#dp_end').datepicker({format: "mm/dd/yyyy"}).on('changeDate', function(ev){
				var dateText = $(this).data('date');
				var startDateTextBox = $('#dp_start input');
				if (startDateTextBox.val() != '') {
					var testStartDate = new Date(startDateTextBox.val());
					var testEndDate = new Date(dateText);
					if (testStartDate > testEndDate) {
						startDateTextBox.val(dateText);
					}
				}
				else {
					startDateTextBox.val(dateText);
				};
				$('#dp_start').datepicker('setEndDate', dateText);
				$('#dp_end').datepicker('hide');
			});
			$('#dp_modal').datepicker();
		}
	};
  gebo_mask_input = {
		init: function() {
			$("#mask_date").inputmask("99/99/9999",{placeholder:"dd/mm/yyyy"});
	/*		$("#mask_phone").inputmask("(999) 999-9999");
			$("#mask_ssn").inputmask("999-99-9999");
			$("#mask_product").inputmask("AA-999-A999");
	*/	}
	};
	
 
  gebo_validation = {

		reg: function() {

        reg_validator = $('.form_validation_ttip').validate({
				onkeyup: false,
				errorClass: 'error',
				validClass: 'valid',
				highlight: function(element) {
					$(element).closest('div').addClass("f_error");
				},
				unhighlight: function(element) {
					$(element).closest('div').removeClass("f_error");
				},
        errorPlacement: function(error, element) {
            $(element).closest('div').append(error);
        },
        rules: {			
	//				'data[Order][client_id]': { required: true },
					'data[Order][lr_no]': { required: true },
					'data[Order][order_type]': { required: true},
					'data[Order][order_city]': { required: true},
					'data[Order][from_city]': { required: true},
					'data[Order][to_city]': { required: true},
					'data[Order][truck_fright]': { required: true},
					'data[Truck][truck_number]': { required: true},
					'data[OrderTransportFreight][%': { required: true},
        //  'data[DriverRegister][driver_name]': { required: true},
			//		'data[CashVoucher][received_by]': { required: true},
	//				'data[DriverRegister][mobileno]': { required: true},
					'data[Order][commision]': { required: true},
				},
        invalidHandler: function(form, validator) {
          $.sticky("There are some errors. Please corect them and submit again.", {autoclose : 5000, position: "top-right", type: "st-error" });
        }
      })
    }
  };

	$("input[id=OrderTransportFreightTransportFreight]").each(function() {
    $(this).rules("add", {
        number: true,
		    required: true,
        messages: {
            number: "Please enter a Transport fright Hours"
        }
    });
  });
</script>


<script>
  $(function() {
    $( "#TruckTruckNumber" ).autocomplete({
		search: function(event, ui) {
			$("#TruckId").val('');
        
        $("#TruckChassisNo").val('');
        $("#TruckEngineNo").val('');
        $("#TruckOwnerId").val('');
        $("#TruckOwnerOwnerName").val('');
        $("#TruckOwnerCityId").val('');
        $("#TruckOwnerContactNo").val('');
		},

      source: "ajax.truck.php",
      type: "POST",
      minLength: 2,
      select: function( event, ui ) {
        //console.log( ui.item);
        $("#TruckId").val(ui.item.TruckId);
        $("#TruckTruckNumber").val(ui.item.truck_number);
        $("#TruckChassisNo").val(ui.item.chassis_no);
        $("#TruckEngineNo").val(ui.item.engine_no);
        $("#TruckOwnerId").val(ui.item.TruckOwnerId);
        $("#TruckOwnerOwnerName").val(ui.item.owner_name);
        $("#TruckOwnerCityId").val(ui.item.city_id);
        $("#TruckOwnerContactNo").val(ui.item.contact_no);
      }
    });
  });

  $(function() {
    $( "#DriverRegisterDriverName" ).autocomplete({
      source: "ajax.driver.php",
      type: "POST",
      minLength: 2,
      select: function( event, ui ) {
        //console.log( ui.item);
        $("#DriverRegisterId").val(ui.item.DriverId);
        $("#DriverRegisterDriverName").val(ui.item.driver_name);
        $("#CashVoucherReceivedBy").val(ui.item.driver_name);
        $("#DriverRegisterMobileno").val(ui.item.mobileno);
        $("#DriverRegisterLicenseno").val(ui.item.licenseno);
      }
    });
  });
  $(function() {
    $( "#clientsName" ).autocomplete({
		search: function(event, ui) {
                    $("#clientsId").val('');
                },
      source: "ajax_client.php",
      type: "POST",
      minLength: 2,
      select: function( event, ui ) {
        console.log( ui.item);
        $("#clientsId").val(ui.item.ClientId);
        $("#OrderOrderCity").val(ui.item.ClientPlace);
		$("#OrderFromCity").val(ui.item.ClientPlace);
		$("#OrderOrderCity").focus();
        //$("#CashVoucherReceivedBy").val(ui.item.driver_name);
        //$("#DriverRegisterMobileno").val(ui.item.mobileno);
        //$("#DriverRegisterLicenseno").val(ui.item.licenseno);
      }
    });
  });
  
  
  /////   approx total weight calculation ////
  
/*   $(function() {
    $( "#OrderTransportFreightWeight" ).blur(function() {
		alert('hi');


/*      var actual_qty = parseFloat($("#OrderActualQty").val()).toFixed(2);
      var truck_fright = parseFloat($("#OrderTruckFright").val()).toFixed(2);
      var advance_pay = parseFloat($("#OrderAdvancePay").val()).toFixed(2);
      var commision = parseFloat($("#OrderCommision").val()).toFixed(2);

      var total_amount = parseFloat(actual_qty * truck_fright).toFixed(2);
      var payable_amount = parseFloat(total_amount - advance_pay - commision).toFixed(2);
      
      $("#DriverTransactionTotalAmount").val(total_amount);
      $("#DriverTransactionPayableAmount").val(payable_amount);
    });
  });*/
   var totalPoints = 0;
   $('#OrderTransportFreightWeight').live('blur', function() {
	   //alert('OrderTransportFreightWeight');
	   console.log('oder');
	   console.log(totalPoints);
	   
/*	   $('.section').each(function(){
		  var totalPoints = 0;
		  $(this).find('input').each(function(){
			totalPoints += parseInt($(this).val()); //<==== a catch  in here !! read below
		  });
		  alert(totalPoints);
		});
*/		

	 /*  console.log('Total weoght = ' + total_weight );
	   console.log($( this ).val());
	   total_weight += +$( this ).val();*/
//	   total_weight = );
	  // console.log('Now Total Weight = ' + total_weight );
	   $( "#OrderTransportFreightWeight" ).each(function( index ) {
		  
		  console.log( index + ": " + $( this ).val() );
		  console.log('/');
		});
    //all elements that exist now and elements added later
    //with this class have this click event attached
	});


  
</script>
            
            
            
            
			<script>
				$(document).ready(function() {
					//* show all elements & remove preloader
					setTimeout('$("html").removeClass("js")',1000);
				});
				gebo_notifications = {
						smoke_js: function() {
							$('#smoke_prompt').click(function(e){
								tstprompt();
								e.preventDefault();
							});
							
							function tstprompt(){
								smoke.prompt('Add New City',function(e){
									if (e){
										var myKeyVals = { cityname : e, counter : '1'}
										var saveData = $.ajax({
												type: 'POST',
												url: "ajax.add.city.php",
												data: myKeyVals,
												dataType: "text",
												success: function(resultData) { 
												//alert(resultData);
												smoke.alert('Save Complate');
												  //alert("Save Complete");
												//  $("#ajax_party").append(resultData); 
												  $("#OrderOrderCity").html(resultData); 
												  $("#OrderFromCity").html(resultData); 
												  $("#OrderToCity").html(resultData); 
												}
										  });
										  
										  saveData.error(function() { 
											alert("Something went wrong"); 
										  }); 

									}else{
										smoke.alert('no');
									}
								},{value:"your name"});
							}		
							
						}
					};
			</script>		
		</div>
	</body>
</html>