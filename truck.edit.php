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
//	mypr($_POST['data']);
//	echo strlen($_POST['data']['clients']['id']);
//	exit;
	if(isset($_POST['data']['Truck'])&& (strlen($_POST['data']['Truck']['truck_number'])> 0) ){
		$inserted_id = $truck->updateTruck($_POST['data']['Truck']);
	//	echo $inserted_id;
	//	echo 'truck no available';
		//exit;
		header('Location: truck.view.php?id='.$_GET['id']);
		}else{
	//		echo 'notruckno';
			header('Location: truck.add.php');
			exit;
			}



	
	exit;
	}
if(isset($_GET)){
//	echo 'post';
//	mypr($_GET);
//	echo strlen($_POST['data']['clients']['id']);
//	exit;
//		$date=date("Y/m/d");
//		$_POST['data']['clients']['date']= date_format($date,"Y-m-d");
	if(!empty($_GET['id'])){
	
		$truck_details = $truck->selectTruck($_GET['id']);
	//	mypr($truck_details);
	//	header('Location: truck.php');
	//exit;	
		
	}else{
		header('Location: truck.php');
		}
	
}else{
	header('Location: clients.php');
	}
//require_once("models/header.php");

$city = new City();
$city_list = $city->ListCity();
$city_list_htm = '';
foreach($city_list as $city_one){
	$city_list_htm.= '<option value="'.$city_one['CityId'].'">'.$city_one['CityName'].'</option>';
	}

	

?>
            <!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Gebo Admin Panel</title>
    
        <!-- Bootstrap framework -->
            <link rel="stylesheet" href="js/bootstrap/css/bootstrap.min.css" />
            <link rel="stylesheet" href="js/bootstrap/css/bootstrap-responsive.min.css" />
        <!-- gebo blue theme-->
            <link rel="stylesheet" href="css/blue.css" id="link_theme" />
        <!-- breadcrumbs-->
            <link rel="stylesheet" href="lib/jBreadcrumbs/css/BreadCrumb.css" />
        <!-- tooltips-->
            <link rel="stylesheet" href="lib/qtip2/jquery.qtip.min.css" />
        <!-- notifications -->
            <link rel="stylesheet" href="lib/sticky/sticky.css" />
        <!-- notifications -->
            <link rel="stylesheet" href="lib/sticky/sticky.css" />    
        <!-- splashy icons -->
            <link rel="stylesheet" href="img/splashy/splashy.css" />
		<!-- colorbox -->
            <link rel="stylesheet" href="lib/colorbox/colorbox.css" />	
		<!-- smoke_js -->
            <link rel="stylesheet" href="lib/smoke/themes/gebo.css" />

        <!-- main styles -->
            <link rel="stylesheet" href="css/style.css" />
			
            <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=PT+Sans" />
	
        <!-- Favicon -->
            <link rel="shortcut icon" href="favicon.ico" />
		
        <!--[if lte IE 8]>
            <link rel="stylesheet" href="css/ie.css" />
            <script src="js/ie/html5.js"></script>
			<script src="js/ie/respond.min.js"></script>
        <![endif]-->
		
		<script>
			//* hide all elements & show preloader
			document.documentElement.className += 'js';
		</script>
    <!-- Shared on MafiaShare.net  --><!-- Shared on MafiaShare.net  --></head>
    <?php 
   include("top-nav.php");
   ?>
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
                                    <a href="truck.php">
                                    	Truck                                    </a>
                                </li>
                                <li>Add</li>
                            </ul>
                        </div>
                    </nav>
<form action="" class="form_validation_reg" id="TruckAddForm" method="post" accept-charset="utf-8" novalidate><div style="display:none;"><input type="hidden" name="_method" value="POST"></div>

	<div class="formSep">
		<div class="row-fluid">
			<div class="span3">
				<label>Truck Number <span class="f_req">*</span></label>
                <input type="hidden" name="data[Truck][id]" value="<?php if(isset($truck_details['id'])){ echo $truck_details['id'];} ?>">
				<input name="data[Truck][truck_number]" class="span12" maxlength="255" type="text" id="TruckTruckNumber" value="<?php if(isset($truck_details['truck_number'])){ echo $truck_details['truck_number'];} ?>">				<span class="help-block">Note: Truck number should be unique</span>
			</div>
            <div class="span3">
				<label>Truck Owner <span class="f_req">*</span></label>
				<select name="data[Truck][truck_owner_id]" class="span12" id="TruckTruckOwnerId">
                <option value="">--- Select Truck Owner ---</option>
                <?php 
				$owner_list = $truckowner->listTruckOwner();
				mypr($owner_list);
				foreach($owner_list as $ol){
					if(isset($truck_details['truck_owner_id']) && ($truck_details['truck_owner_id']==$ol['id'])){
					echo  '<option selected="selected" value="'.$ol['id'].'">'.$ol['owner_name'].'-'.$ol['contact_no'],'</option>';
					}else{
						echo  '<option value="'.$ol['id'].'">'.$ol['owner_name'].'-'.$ol['contact_no'],'</option>';
						}
					}
				?>


</select>			</div>
<div class="span2"><label>Add Truck Owner<span class="f_req">*</span></label>
<a href="javascript:void(0)" class="btn" id="smoke_prompt">Prompt</a>
<a href="#myModal" role="button" class="btn" data-toggle="modal">Add</a>
</div>

		
		</div>
        
        
	</div>

	<div class="formSep">
		<div class="row-fluid">
			
	</div>

	<div class="formSep">
		<div class="row-fluid">
        <div class="span3">
				<label>Chassis No <span class="f_req">*</span></label>
				<input name="data[Truck][chassis_no]" value="<?php if(isset($truck_details['chassis_no'])){ echo $truck_details['chassis_no'];} ?>" class="span12" maxlength="255" type="text" id="TruckChassisNo">			</div>
			<div class="span3">
				<label>Engine No <span class="f_req">*</span></label>
				<input name="data[Truck][engine_no]" class="span12" value="<?php if(isset($truck_details['engine_no'])){ echo $truck_details['engine_no'];} ?>" maxlength="255" type="text" id="TruckEngineNo">			</div>
                <div class="span3">
				<label>Address</label>
				<textarea name="data[Truck][permit]" class="span12" rows="4" cols="8" id="TruckPermit"><?php if(isset($truck_details['insurance'])){ echo $truck_details['insurance'];} ?></textarea>			</div>
                
		</div>
	</div>

	<div class="formSep">
		<div class="row-fluid">
        <div class="span3">
				<label>RC Book</label>
				<textarea name="data[Truck][rcbook]" class="span12" rows="4" cols="8" id="TruckRcbook"><?php if(isset($truck_details['rcbook'])){ echo $truck_details['rcbook'];} ?></textarea>			</div>
                <div class="span3">
				<label>Insurance</label>
				<textarea name="data[Truck][insurance]" class="span12" rows="4" cols="8" id="TruckInsurance"><?php if(isset($truck_details['permit'])){ echo $truck_details['permit'];} ?></textarea>			</div>
			<div class="span3">
				<label>Note</label>
				<textarea name="data[Truck][note]" class="span12" rows="4" cols="8" id="TruckNote"><?php if(isset($truck_details['note'])){ echo $truck_details['note'];} ?></textarea>			</div>
		</div>
	</div>

	

	<div class="form-actions">
		<button class="btn btn-inverse" type="submit">Save changes</button>
		<a href="/trucks" class="btn">Cancel</a>	</div>

</form>                    
            
 
<!-- Modal -->
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Add Truck Owner</h3>
    
  </div>
  <div class="modal-body">
    <div class="row-fluid">
        <div class="span3">
				<label>Owner Name:</label>
				<input  type="text"  value="lll" class="span12" rows="4" cols="8" id="NewOwnerName"></div>
                <div class="span3">
				<label>Mobile: </label>
				<input  type="text" class="span12" rows="4" cols="8" id="NewOwnerMobile"></div>
			<div class="span3">
				<label>Place:</label>
				<input  type="text" class="span12" rows="4" cols="8" id="NewOwnerPlace">			</div>
                <div class="span3">
                <button type="button" onClick="javascript:ajax_party(this,'new')">Save</button>
				</div>
		</div>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    
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
            <script>
			 function ajax_party(obj,action){
				// alert(action);
				 
				 var x = document.getElementById("NewOwnerName").value;   // Get the element with id="demo"
				 var y = document.getElementById("NewOwnerMobile").value;   // Get the element with id="demo"
				 var z = document.getElementById("NewOwnerPlace").value;   // Get the element with id="demo"
				//		alert(x+y+z);
				 

    if(x.length > 0)
    {
//		alert('if');
      var myKeyVals = { owner_name : x, contact_no : y,city_id : z}
   	  
	  var saveData = $.ajax({	
            type: 'POST',
            url: "ajax.add.turck.owner.php",
            data: myKeyVals,
            dataType: "text",
            success: function(resultData) { 
//              alert("Save Complete");
              $("#TruckTruckOwnerId").append(resultData); 
	//		  alert(resultData);
			  $('#myModalLabel').modal('hide');
              //$("#ajax_party").html(resultData); 
            }
      });
      
      saveData.error(function() { 
        alert("Something went wrong"); 
      }); 
    }

  }
            </script>
          
			<script>
				$(document).ready(function() {
					//* show all elements & remove preloader
					setTimeout('$("html").removeClass("js")',1000);
				});
				$(document).ready(function() {
		gebo_notifications.smoke_js();
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
												  $("#TruckTruckOwnerId").html(resultData); 
												
												}
										  });
										  
										  saveData.error(function() { 
											alert("Something went wrong"); 
										  }); 

									}else{
										smoke.alert('no');
									}
								},{value:"owner name"},{value1:"owner name1"});
							}		
							
						}
					};
					 $( function() {
    var dialog, form,
 
      // From http://www.whatwg.org/specs/web-apps/current-work/multipage/states-of-the-type-attribute.html#e-mail-state-%28type=email%29
      emailRegex = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/,
      name = $( "#name" ),
      email = $( "#email" ),
      password = $( "#password" ),
      allFields = $( [] ).add( name ).add( email ).add( password ),
      tips = $( ".validateTips" );
 
    function updateTips( t ) {
      tips
        .text( t )
        .addClass( "ui-state-highlight" );
      setTimeout(function() {
        tips.removeClass( "ui-state-highlight", 1500 );
      }, 500 );
    }
 
    function checkLength( o, n, min, max ) {
      if ( o.val().length > max || o.val().length < min ) {
        o.addClass( "ui-state-error" );
        updateTips( "Length of " + n + " must be between " +
          min + " and " + max + "." );
        return false;
      } else {
        return true;
      }
    }
 
    function checkRegexp( o, regexp, n ) {
      if ( !( regexp.test( o.val() ) ) ) {
        o.addClass( "ui-state-error" );
        updateTips( n );
        return false;
      } else {
        return true;
      }
    }
 
    function addUser() {
      var valid = true;
      allFields.removeClass( "ui-state-error" );
 
      valid = valid && checkLength( name, "username", 3, 16 );
      valid = valid && checkLength( email, "email", 6, 80 );
      valid = valid && checkLength( password, "password", 5, 16 );
 
      valid = valid && checkRegexp( name, /^[a-z]([0-9a-z_\s])+$/i, "Username may consist of a-z, 0-9, underscores, spaces and must begin with a letter." );
      valid = valid && checkRegexp( email, emailRegex, "eg. ui@jquery.com" );
      valid = valid && checkRegexp( password, /^([0-9a-zA-Z])+$/, "Password field only allow : a-z 0-9" );
 
      if ( valid ) {
        $( "#users tbody" ).append( "<tr>" +
          "<td>" + name.val() + "</td>" +
          "<td>" + email.val() + "</td>" +
          "<td>" + password.val() + "</td>" +
        "</tr>" );
        dialog.dialog( "close" );
      }
      return valid;
    }
 
    dialog = $( "#dialog-form" ).dialog({
      autoOpen: false,
      height: 400,
      width: 350,
      modal: true,
      buttons: {
        "Create an account": addUser,
        Cancel: function() {
          dialog.dialog( "close" );
        }
      },
      close: function() {
        form[ 0 ].reset();
        allFields.removeClass( "ui-state-error" );
      }
    });
 
    form = dialog.find( "form" ).on( "submit", function( event ) {
      event.preventDefault();
      addUser();
    });
 
    $( "#create-user" ).button().on( "click", function() {
      dialog.dialog( "open" );
    });
  } );
			</script>
		
		</div>
	</body>
</html>