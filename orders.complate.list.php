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
                                    <a href="/orders/index">
                                    	Orders                                    </a>
                                </li>
                                <li class="last">Complete Orders</li>
                            </ul></div></div>
                        </div>
                    </nav>
                    
					
					<script type="text/javascript" src="js/lib/datatables/jquery.dataTables.min.js"></script><script type="text/javascript" src="js/lib/datatables/jquery.dataTables.sorting.js"></script><script type="text/javascript" src="js/gebo_tables.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        var table = $('#smpl_tbl').dataTable({
            "sPaginationType": "bootstrap",     
        });
    }); 
</script>

<div class="row-fluid">
      <div class="span12">
        <h3 class="heading">Order List</h3>
        <table class="table table-bordered table-striped table_vam" id="smpl_tbl">
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
              <th>Complated Date</th>
              <th>Date</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php 
			$order_list = $order->listComplateOrder('100');
			//mypr($order_list);
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
              <td><?php echo $one['order_completion_date'];?></td>
              <td><?php echo $one['date'];?></td>
              <td class="actions"><a href="orders.view.php?id=<?php echo $one['id'];?>">View</a></td>
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
<script type="text/javascript" src="js/jquery.debouncedresize.min.js"></script><script type="text/javascript" src="js/jquery.actual.min.js"></script><script type="text/javascript" src="js/jquery.cookie.min.js"></script><script type="text/javascript" src="js/bootstrap/js/bootstrap.min.js"></script><script type="text/javascript" src="js/lib/qtip2/jquery.qtip.min.js"></script><script type="text/javascript" src="js/lib/jBreadcrumbs/js/jquery.jBreadCrumb.1.1.min.js"></script><script type="text/javascript" src="js/lib/sticky/sticky.min.js"></script><script type="text/javascript" src="js/ios-orientationchange-fix.js"></script><script type="text/javascript" src="js/lib/antiscroll/antiscroll.js"></script><script type="text/javascript" src="js/lib/antiscroll/jquery-mousewheel.js"></script><script type="text/javascript" src="js/lib/colorbox/jquery.colorbox.min.js"></script><script type="text/javascript" src="js/gebo_common.js"></script>    
			<script>
				$(document).ready(function() {
					//* show all elements & remove preloader
					setTimeout('$("html").removeClass("js")',1000);
				});
			</script>
</div>
</body></html>