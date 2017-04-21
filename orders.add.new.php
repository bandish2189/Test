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
	echo 'post';
	mypr($_POST['data']);
//	echo strlen($_POST['data']['clients']['id']);
//	exit;
	$inserted_order = $order->insertOrder($_POST['data']['Order']);
	//echo $inserted_order;
	
	//mypr($_POST['data']);
///	header('Location: orders.printlr.php?id='.$inserted_order);

	
//	exit;
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
                   
<form action="" method="post" id="defaultForm" class="form_validation_ttip" accept-charset="utf-8"><div style="display:none;"><input type="hidden" name="_method" value="POST"/></div>

  <div class="row-fluid">
    <div class="span12">
      <?php 
	$info['company_id']=$_SESSION['userCakeUser']->company['id'];
	$info['year_id']=$_SESSION['userCakeUser']->year;
	$row = $order->getNewBillNo($info);
	$products = $order->getProducts();
	$newBill = $row['row']+1;
	echo $newBill;
//	exit;
	?>
      <h3 class="heading">New Bill No:
       <input name="data[Order][t_no]" readonly maxlength="50" type="text"  value="<?php echo $newBill; ?>" id="OrderLrNo"/>        
       Date : 
        <input name="data[Order][order_generation_date]" id="dp1" value="" type="text"/>        
        Mal nu naam : 
        <select name="data[Order][pro_id]" class="guj" >
        <option></option>
        <?php if(isset($products)){
			mypr($products);
			foreach($products as $pro){
				echo '<option value="'.$pro['id'].'">'.$pro['name'].'</option>';
				}
			
			}?>
        </select>
        <!--<label  style="margin-left:50px;" class="radio inline">
          <input type="radio" value="Cash" checked name="Order">
          Cash Order 
        </label>
        <label class="radio inline">
          <input type="radio" value="debit" name="Order">
          Debit Order 
        </label>-->

      </h3>
    </div>
  </div>
  <div class="row-fluid ">
    <div class="span6 well">
      <div class="row-fluid ">
  <div class="span5">
          <label class="guj">vaocanaarnau naama<span class="f_req">*</span></label>
          <div id="txtHint">
          <input type="hidden" name="data[Order][seller_id]" id="sellerId"/> 
           <input name="data[Order][seller_name]" class="span10 guj" type="text" id="clientsName"/> 
          	           </div>

        </div>

        <div class="span5">
          <label class="guj">gaama<span class="f_req">*</span></label>
          <select name="data[Order][seller_city]" class="span10 guj" id="OrderOrderCity" onchange="javascript:ajax_party(this,&quot;sell&quot;)" >
          
<option value="">saIlaokT krao </option>
        <?php  

	echo $city_list_htm ;
?>

</select>	
        </div>
        
<div class="span2"><a href="javascript:void(0)" class="btn" id="smoke_prompt">Add City</a></div>      </div>
<div class="row-fluid ">
  <div class="span5">
          <label class="guj">laonaarnau naama<span class="f_req">*</span></label>
          <div id="txtHint">
          <input type="hidden" name="data[Order][buyer_id]" id="buyerId"/> 
           <input name="data[Order][buyer_name]" class="span10 guj" type="text" id="buyerName"/> 
          	           </div>

        </div>

        <div class="span5">
          <label class="guj">gaama<span class="f_req">*</span></label>
          <select name="data[Order][buyer_city]" class="span10 guj" id="buyerCity" onchange="javascript:ajax_party(this,&quot;buy&quot;)" >
          
<option value="">saIlaokT krao </option>
        <?php  

	echo $city_list_htm ;
?>

</select>	
        </div>
      
</div>
      <div class="row-fluid ">
        <div class="span4">
        <label class="guj">baaorI<span class="f_req">*</span></label>
        <input class="span12" name="data[Order][guni]">
        </div>
        <div class="span4">
        <label class="guj">Baava<span class="f_req">*</span></label>
        <input class="span12" name="data[Order][price]">
        </div>
        <div class="span4">
        <label class="guj">BartaI<span class="f_req">*</span></label>
        <input class="span12" name="data[Order][bharti]">
        </div>
      </div>
      <div class="row-fluid ">
      	<div class="span12">
        <label class="guj">naaoMV<span class="f_req">*</span></label>
        <textarea class="span12 guj" name="data[Order][note]"></textarea>
        </div>
      </div>
      <div class="row-fluid ">
      	<div class="span10">
        </div>
       	<div class="span2">
        <input type="submit" value="Add Bill" class="btn btn-primary">
        </div>


      </div>
    </div>

    <div class="span6 well">

      Blcak Right Panel

      
      
    </div>

  </div>
  <div class="clearfix"></div>
  
  <!--    -->
  
  <div class="row-fluid"></div>
  
</form>

                    
                   	     

                   
                </div>
                
            </div>
            
			<!-- sidebar -->
             <a href="javascript:void(0)" class="sidebar_switch off_switch ttip_r" title="Hide Sidebar">Sidebar switch</a>

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
            
            
            
             <script type="text/javascript" src="js/jquery.min.js"></script>	
					
					<script type="text/javascript" src="js/forms/jquery.inputmask.min.js"></script>
					<script type="text/javascript" src="js/lib/validation/jquery.validate.min.js"></script>
<!--Jquery UI Auto Suggestion-->
<link rel="stylesheet" type="text/css" href="css/lib/jquery-ui/css/Aristo/Aristo.css"/>
<script type="text/javascript" src="js/lib/jquery-ui/jquery-ui-1.8.20.custom.min-autosuggest.js"></script>
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
        $("#sellerId").val(ui.item.ClientId);
        $("#OrderOrderCity").val(ui.item.ClientPlace);
//		$("#OrderFromCity").val(ui.item.ClientPlace);
		$("#OrderOrderCity").focus();
        //$("#CashVoucherReceivedBy").val(ui.item.driver_name);
        //$("#DriverRegisterMobileno").val(ui.item.mobileno);
        //$("#DriverRegisterLicenseno").val(ui.item.licenseno);
      }
    });
	$( "#buyerName" ).autocomplete({
		search: function(event, ui) {
                    $("#clientsId").val('');
                },
      source: "ajax_client.php",
      type: "POST",
      minLength: 2,
      select: function( event, ui ) {
        console.log( ui.item);
        $("#buyerId").val(ui.item.ClientId);
        $("#buyerCity").val(ui.item.ClientPlace);
//		$("#OrderFromCity").val(ui.item.ClientPlace);
		$("#buyerCity").focus();
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
