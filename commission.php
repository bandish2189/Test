<?php

////  Truck Commission Report
require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}
require_once("models/header.php");
include("top-nav-10.php");
$order = new Order();
$client = new Client();
$driver = new Driver();
$truck = new Truck();
$party = new Party();
$truckowner = new TruckOwner();
$city = new City();
$city_list = $city->ListCity();
$city_list_htm = '';
foreach($city_list as $city_one){
	$city_list_htm.= '<option value="'.$city_one['CityId'].'">'.$city_one['CityName'].'</option>';
	}
if(isset($_GET['id'])){
//	echo $_GET['id'];
	$order_id = $_GET['id'];
	
	$order_details = $order->editOrder($order_id);
	
//	mypr($order_details);
	
//	exit;
	
	}
	


?>

<div id="contentwrapper">
  <div class="main_content">
    <nav>
      <div id="jCrumbs" class="breadCrumb module">
        <ul>
          <li> <a href="javascript:void(0)"><i class="icon-home"></i></a> </li>
          <li> <a href="/orders/index"> Orders </a> </li>
          <li>Index</li>
        </ul>
      </div>
    </nav>
    <script type="text/javascript" src="js/lib/datatables/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="js/lib/datatables/jquery.dataTables.sorting.js"></script>
	<script type="text/javascript" src="js/gebo_tables.js"></script> 
    <script type="text/javascript">
    $(document).ready(function(){
        var table = $('#index').dataTable({
            "sPaginationType": "bootstrap",     
        });
    }); 
</script>
    <div class="row-fluid">
      <div class="span12">
        <h3 class="heading">Commission Report</h3>
        <table class="table table-bordered table-striped dTableR" id="dt_order">
          <thead>
            <tr>
              <th>SrNo:</th>
              <th>LR NO:</th>
              <th>Truck No:</th>
              <th>Truck Owner(No.):</th>
              <th>Commission</th>
              <th>Status</th>
              <th>Date</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php 
			$truck_commissions = $truck->TruckCommissionReport('100');
			//mypr($order_list);
			$sr = 1;
			foreach($truck_commissions as $one){
				
				//mypr($one);
			?>
            <tr>
              <td><?php echo str_pad($sr, 4, "0", STR_PAD_LEFT);?>&nbsp;</td>
              <td><a href="orders.view.php?id=<?php echo $one['id'];?>"><?php echo $one['lr_no'];?></a>&nbsp;</td>
              <td><a href="truck.view.php?id=<?php echo $one['truck_id'];?>"><?php echo $one['truck_number'];?></a></td>
              <td><?php if($one['truck_owner_id']!=null){ /*echo 'not null';*/ ?><a href="truckowner.view.php?id=<?php echo $one['truck_owner_id'];?>"><?php echo $one['owner_name'];?>(<?php echo $one['contact_no'];?>)</a><?php }else{ echo 'NULL';}?></td>
              <td><?php echo $one['commission'];?>&nbsp;</td>

              <td><?php if($one['status'] == 0){echo '<b style="color:#F90409">Unpaid</b>';}else{echo '<b style="color:blue">Paid</b>';}?>&nbsp;</td>
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
			<script src="js/bootstrap/js/bootstrap.min.js"></script>
			<!-- tooltips -->
			<script src="js/lib/qtip2/jquery.qtip.min.js"></script>
			<!-- jBreadcrumbs -->
			<script src="js/lib/jBreadcrumbs/js/jquery.jBreadCrumb.1.1.min.js"></script>
			<!-- sticky messages -->
            <script src="js/lib/sticky/sticky.min.js"></script>
			<!-- fix for ios orientation change -->
			<script src="js/ios-orientationchange-fix.js"></script>
			<!-- scrollbar -->
			<script src="js/lib/antiscroll/antiscroll.js"></script>
			<script src="js/lib/antiscroll/jquery-mousewheel.js"></script>
			<!-- lightbox -->
            <script src="lib/colorbox/jquery.colorbox.min.js"></script>
            <!-- common functions -->
			<script src="js/gebo_common.js"></script>
            
            <!-- datatable -->
            <script src="lib/datatables/jquery.dataTables.min.js"></script>
            <script src="lib/datatables/extras/Scroller/media/js/Scroller.min.js"></script>
            <!-- datatable functions -->
            <script src="js/gebo_datatables.js"></script>
            
			<script>
				$(document).ready(function() {
					//* show all elements & remove preloader
					setTimeout('$("html").removeClass("js")',1000);
				});
			</script>
</div>
</body></html>