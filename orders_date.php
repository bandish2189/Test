<?php
/*
UserCake Version: 2.0.2
http://usercake.com
*/

require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}
require_once("models/header.php");
include("top-nav-10.php");
//mypr($_SESSION);
$order = new Order();
?>
<script type="text/javascript">
	var counter = 0;
  function ajax_party(obj,action,date){
//	  alert('ajax party');
	  
//	  var data = $("#row1527 > td:nth-child(2)").html();
	//  console.log(action +'   '+ date);
	  
	//  tstprompt();
	smoke.prompt('AaoD-r naMbar <b>'+ action +'</b> maaTo taarIKa sauQaarao  ',function(e){
									if (e){
										var myKeyVals = { order : action, date : e}
										var saveData = $.ajax({
												type: 'POST',
												url: "ajax.change.date.php",
												data: myKeyVals,
												dataType: "text",
												success: function(resultData) { 
										//		alert(resultData);
												result = JSON.parse(resultData);
										//		alert(result.date);
												smoke.alert('Save Complate');
												  //alert("Save Complete");
												//  $("#ajax_party").append(resultData); 
												var inde = '#row'+action+' > td:nth-child(2)';
												  $(inde).html(result.date); 
												  $(inde).css('color','green'); 
												  $(inde).css('border','1px solid green'); 
												  $(inde).css('border-radius','3px'); 
												}
										  });
										  
										  saveData.error(function() { 
											alert("Something went wrong"); 
										  }); 

									}else{
										smoke.alert('no');
									}
								},{	classname: "custom-class guj",id: 'make_customs',value:date});
								gebo_mask_input.init();
	  // #row1527 > td:nth-child(2)

/*
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
    }*/

  }
</script>

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
<style type="text/css">
#dt_order_filter > label > input[type="text"]{
	font-family: Saumil_guj2 !important;
    font-size: 24px;
	}
</style>
    <div class="row-fluid">
      <div class="span12">
        <h3 class="heading">Order List (<strong style="color:#3E78FF;"><?php echo $_SESSION['userCakeUser']->company['name']; ?></strong>)</h3>
        <table class="table table-bordered table-striped dTableR" id="">
          <thead>
            <tr>
              <th class="guj">naMbar:</th>
              <th class="guj" style="min-width:120px;">taarIKa</th>
              <th>Actions</th>
              <th class="guj">maala naI jata</th>
              <th class="guj">vaocanaarnau naama</th>
              <th class="guj">vaocanaarnau gaama</th>
              <th class="guj">laonaarnau naama</th>
              <th class="guj">laonaarnau gaama</th>
              <th class="guj">baaorI</th>
              <th class="guj">Baava</th>
              <th class="guj">BartaI</th>
              
            </tr>
            
          </thead>
          <tbody>
            <?php 
			$order_list = $order->listOrder('100');
			//mypr($order_list);
			$sr = 1;
			if(isset($order_list)){
			foreach($order_list as $one){
				
			//	mypr($one);
	//		//	$order->updateTransaction($one);
	//			exit;
	 		$date=date_create($one['date']);
			$this_date =  date_format($date,"d–m–Y");
			?>
            <tr class="guj" id="row<?php echo $one['id']; ?>">
              <td><?php echo str_pad($one['t_no'], 4, "0", STR_PAD_LEFT);?>&nbsp;</td>
              <td><?php echo $this_date;?>&nbsp;</td>
              <td><button class="guj btn btn-warning" onClick="javascript:ajax_party(this,'<?php echo $one['id']; ?>','<?php echo $this_date; ?>');" style="font-size:19px" >sauQaarao</button></td>
              <td><?php echo $one['product_name'];?>&nbsp;</td>
              <td><?php echo $one['seller_name'];?>&nbsp;</td>
              <td><?php echo $one['seller_gaam'];?>&nbsp;</td>
              <td><?php echo $one['buyer_name'];?>&nbsp;</td>
              <td><?php echo $one['buyer_gaam'];?>&nbsp;</td>
              <td><?php echo $one['guni'];?>&nbsp;</td>
              <td><?php echo $one['price'];?>&nbsp;</td>
              <td><?php echo $one['bharti'];?>&nbsp;</td>
              
              
            </tr>
            <?php
//			exit;
				$sr ++;
				}  }
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
<link rel="stylesheet" href="js/lib/smoke/themes/gebo.css" />
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
              <script type="text/javascript" src="js/lib/smoke/smoke.js"></script>
            <script src="js/gebo_notifications.js"></script>
            	<script type="text/javascript" src="js/forms/jquery.inputmask.min.js"></script>


            
			<script>
			
				$(document).ready(function() {
					//* show all elements & remove preloader
					setTimeout('$("html").removeClass("js")',1000);
					gebo_mask_input.init();
				});
				 gebo_mask_input = {
		init: function() {
//			#dialog-input-1482089874462\.6274
//    
			$(".dialog-prompt > input:nth-child(1)").inputmask("99/99/9999",{placeholder:"dd/mm/yyyy"});
	/*		$("#mask_phone").inputmask("(999) 999-9999");
			$("#mask_ssn").inputmask("999-99-9999");
			$("#mask_product").inputmask("AA-999-A999");
	*/	}
	};
				gebo_notifications = {
						smoke_js: function() {
							$('#smoke_prompt').click(function(e){
								tstprompt();
								e.preventDefault();
							});
							
							function tstprompt(){
								alert('smoke tst');
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
</body></html>