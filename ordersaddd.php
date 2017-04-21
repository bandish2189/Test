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
<div id="contentwrapper">
                <div class="main_content">
                    
                    <nav>
                        <div id="jCrumbs" class="breadCrumb module">
                            <ul>
                                <li>
                                    <a href="#"><i class="icon-home"></i></a>
                                </li>
                                <li>
                                    <a href="#">Sports & Toys</a>
                                </li>
                                <li>
                                    <a href="#">Toys & Hobbies</a>
                                </li>
                                <li>
                                    <a href="#">Learning & Educational</a>
                                </li>
                                <li>
                                    <a href="#">Astronomy & Telescopes</a>
                                </li>
                                <li>
                                    Telescope 3735SX 
                                </li>
                            </ul>
                        </div>
                    </nav>
                    
                    <div class="row-fluid">
                        <div class="span12">
							<h3 class="heading">Sticky notifications</h3>
							<div class="row-fluid">
								<div class="span2"><a href="javascript:void(0)" class="btn" id="sticky_a">Error</a></div>
								<div class="span2"><a href="javascript:void(0)" class="btn" id="sticky_b">Success</a></div>
								<div class="span2"><a href="javascript:void(0)" class="btn" id="sticky_c">Info</a></div>
								<div class="span2"><a href="javascript:void(0)" class="btn" id="sticky_d">Standard</a></div>
								<div class="span2"><a href="javascript:void(0)" class="btn" id="sticky_d_st">Sticky</a></div>
							</div>
							<div class="row-fluid">
								<div class="span2"><a href="javascript:void(0)" class="btn" id="sticky_e">Top Right</a></div>
								<div class="span2"><a href="javascript:void(0)" class="btn" id="sticky_f">Top Center</a></div>
								<div class="span2"><a href="javascript:void(0)" class="btn" id="sticky_g">Top Left</a></div>
								<div class="span2"><a href="javascript:void(0)" class="btn" id="sticky_h">Bottom Right</a></div>
								<div class="span2"><a href="javascript:void(0)" class="btn" id="sticky_i">Bottom Left</a></div>
							</div>
                        </div>
                    </div>
					<div class="row-fluid">
						<div class="span12">
							<h3 class="heading"><a href="http://ssssnakes.com/smoke/">Smoke.js</a> notifications</h3>
							<div class="row-fluid">
								<div class="span2"><a href="javascript:void(0)" class="btn" id="smoke_signal">Signal</a></div>
								<div class="span2"><a href="javascript:void(0)" class="btn" id="smoke_alert">Alert</a></div>
								<div class="span2"><a href="javascript:void(0)" class="btn" id="smoke_confirm">Confirm</a></div>
								<div class="span2"><a href="javascript:void(0)" class="btn" id="smoke_prompt">Prompt</a></div>
							</div>
						</div>
					</div>
                    <div class="row-fluid">
                        <div class="span12">
							<h3 class="heading">Bootstrap modals</h3>
							<div class="row-fluid">
								<div class="span2"><a data-toggle="modal" data-backdrop="static" href="#myModal1" class="btn">Regular</a></div>
								<div class="span10">
									<p>trigger <code>&lt;a data-toggle="modal" data-backdrop="static" href="#myModal1">&hellip;&lt;/a&gt;</code></p>
									modal <code>&lt;div class="modal hide" id="myModal1"&gt;&hellip;&lt;/div&gt;</code>
								</div>
							</div>
							<div class="row-fluid">
								<div class="span2"><a data-toggle="modal" data-backdrop="static" href="#myModal2" class="btn">Animated</a></div>
								<div class="span10">
									<p>trigger <code>&lt;a data-toggle="modal" data-backdrop="static" href="#myModal2">&hellip;&lt;/a&gt;</code></p>
									modal <code>&lt;div class="modal hide fade" id="myModal2"&gt;&hellip;&lt;/div&gt;</code>
								</div>
							</div>
							
							<div class="modal hide" id="myModal1">
								<div class="modal-header">
									<button class="close" data-dismiss="modal">×</button>
									<h3>Modal header</h3>
								</div>
								<div class="modal-body">
									Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque non elit tellus, eleifend varius erat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In bibendum laoreet ante sodales elementum. Nullam varius interdum est, at ornare quam aliquam eu. Nulla ultricies commodo leo sit amet vulputate.
								</div>
								<div class="modal-footer">
									<a href="#" class="btn" data-dismiss="modal">Close</a>
								</div>
							</div>
							<div class="modal hide fade" id="myModal2">
								<div class="modal-header">
									<button class="close" data-dismiss="modal">×</button>
									<h3>Modal header</h3>
								</div>
								<div class="modal-body">
									Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque non elit tellus, eleifend varius erat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In bibendum laoreet ante sodales elementum. Nullam varius interdum est, at ornare quam aliquam eu. Nulla ultricies commodo leo sit amet vulputate.
								</div>
								<div class="modal-footer">
									<a href="#" class="btn" data-dismiss="modal">Close</a>
								</div>
							</div>
                        </div>
                    </div>
                        
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
  <script src="js/jquery.min.js"></script>
			<!-- smart resize event -->
			<script src="js/jquery.debouncedresize.min.js"></script>
			<!-- hidden elements width/height -->
			<script src="js/jquery.actual.min.js"></script>
			<!-- js cookie plugin -->
			<script src="js/jquery.cookie.min.js"></script>
			<!-- main bootstrap js -->
			<script src="bootstrap/js/bootstrap.min.js"></script>
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
            
			<!-- smoke_js -->
			<script src="lib/smoke/smoke.js"></script>
            <!-- notifications functions -->
            <script src="js/gebo_notifications.js"></script>
    
			<script>
				$(document).ready(function() {
					//* show all elements & remove preloader
					setTimeout('$("html").removeClass("js")',1000);
				});
			</script>
</div>
</body></html>