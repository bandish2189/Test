<?php
/*
UserCake Version: 2.0.2
http://usercake.com
*/

require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}
if(!isUserLoggedIn()) { header("Location: index.php"); die(); }
$order = new Order();
$client = new Client();
$driver = new Driver();
$truck = new Truck();
$party = new Party();
$truckowner = new TruckOwner();
$products = $order->getProducts();

if(isset($_POST['data'])){
	if(!empty($_GET['order'])){
		//	echo 'post get';
			$_POST['data']['Order']['id'] = $_GET['order'];
	//		mypr($_POST['data']['Order']);
	//		exit;
			$updated_order = $order->editUpdate($_POST['data']['Order']);
		//	echo strlen($_POST['data']['clients']['id']);
			header('Location: orders.add.php');
	//	header('Location: orders.php');
			exit;
		
			//echo $inserted_order;
			
			//mypr($_POST['data']);
		///	header('Location: orders.printlr.php?id='.$inserted_order);
		
			
		//	exit;
	} // if get
	} //if post
if(isset($_GET)){
//	echo 'get';
//	mypr($_GET);
//	echo strlen($_POST['data']['clients']['id']);
//	exit;
//		$date=date("Y/m/d");
//		$_POST['data']['clients']['date']= date_format($date,"Y-m-d");
	if(!empty($_GET['order'])){
//		echo $_GET['order'].'order no';
	
		$order_details = $order->editOrder($_GET['order']);
		$user = $_SESSION['userCakeUser'];
//		mypr($user->company);
		
		
		if($user->company['id'] == 1){
			$company_html = '<div class="head-left"><img src="img/hb.svg"/></div>
			            <div class="section1">
					<div class="row">
					<p class="guj logo" style="margin-bottom:0px;">hotaaq^a ba`aoksa-</p>
					</div>
				
            <div class="row">
               
                
                <div class="name-guj">
				<h2>૫૩/૧, પહેલા માળે, માર્કેટ યાર્ડ, કલોલ (ઉ . ગુ) ૩૮૨૭૨૧.</h2>
                <h4>૫૩/૧, પહેલા માળે, માર્કેટ યાર્ડ, કલોલ (ઉ . ગુ) ૩૮૨૭૨૧.</h4>
                </div>
    ';
		}elseif($user->company['id'] == 2){
			$company_html = '<div class="head-left"><img src="img/bb.svg"/></div>            
                <div class="section1">
					<div class="row">
					<p class="guj logo" style="margin-bottom:0px;">BaagyaoSa ba`aoksa-</p>
					</div>
				
            <div class="row">
               
                
                <div class="name-guj">
                <h4>૫૩/૧, પહેલા માળે, માર્કેટ યાર્ડ, કલોલ (ઉ . ગુ) ૩૮૨૭૨૧.</h4>
                </div>
    ';
		}elseif($user->company['id'] == 3){
			$company_html = '<div class="head-left"><img src="img/br_new.svg"/></div>
			            <div class="section1">
					<div class="row">
					<p class="guj logo" style="margin-bottom:0px;">maosasa- BaagyaoSakumaar rmaNalaala</p>
					</div>
				
            <div class="row">
               
                
                <div class="name-guj">
				<h2 style="margin-top:25px; font-size:30px;" class="guj">ba`aokr AonD kmaISana AoJnT</h2>
                <h2>૫૩/૧, પહેલા માળે, માર્કેટ યાર્ડ, કલોલ (ઉ . ગુ) ૩૮૨૭૨૧.</h2>
                </div>
    ';
		}
	//	mypr($order_details);
	//	header('Location: truck.php');
	
	    $content = "
<page>
    <h1>Exemple d'utilisation</h1>
    <br>
    Ceci est un <b>exemple d'utilisation</b>
    de <a href='http://html2pdf.fr/'>HTML2PDF</a>.<br>
</page>";
//echo dirname(__FILE__);
  //  require_once(dirname(__FILE__).'/html2pdf/html2pdf.class.php');
    //$html2pdf = new HTML2PDF('P','A4','fr');
    //$html2pdf->WriteHTML($content);
    //$html2pdf->Output('exemple.pdf');
//	exit;	
		
	}else{
		header('Location: truck.php');
		}}
//require_once("models/header.php");
require_once("models/header.php");
//include("top-nav.php");
$city = new City();
$city_list = $city->ListCity();
$city_list_htm = '';
foreach($city_list as $city_one){
	$city_list_htm.= '<option value="'.$city_one['CityId'].'">'.$city_one['CityName'].'</option>';
	}
	

?>
<body class="sidebar_hidden">
<div id="contentwrapper">
<style>
	li {
    list-style: outside none none;
}
.box li {
    border: 1px solid rgb(22, 49, 91);
    float: left;
    text-align: center;
    width: 24%;
}
.box h6 {
    font-size: 14px;
    margin: 0;
    padding: 6px 0;
}
ul {
    padding: 0;
}
	.detail h6 {
    font-size: 15px;
    line-height: 26px;
    margin: 0;
			}
.box {
    margin: 22px 0;
   
}
.detail-left {
    float: left;
    width: 70%;
}
.detail span {
    color: rgb(17, 53, 116);
    font-size: 14px;
}
.detail-right {
    float: right;
	margin-right: 60px;
}
	.row {
    margin: auto;
    width: 1080px;
}
.clr{
clear:both;
}
.head-left {
    float: left;
    width: 14%;
}
.section1 {
    float: left;
    margin-top: 5px;
	text-align:center;
	margin-left:50px;
}
.head-right {
    float: right;
    width: 20%;
	margin-right: 70px;
}
.head-right > h5 {
    font-size: 15px;
    line-height: 23px;
    margin: 0;
}
.section1 .row {
    margin: auto;
    width: auto;
}
.name-eng > h1 {
    color: rgb(17, 53, 116);
    font-size: 39px;
    margin-bottom: 13px;
    margin-top: 0;
    text-align: center;
    word-spacing: 22px;
}

.name-eng > h2 {
    color: rgb(17, 53, 116);
    font-size: 35px;
    margin-bottom: 10px;
    margin-top: 0;
    text-align: center;
    word-spacing: 22px;
}
.name-guj > h1 {
    margin-bottom: 0;
    margin-top: 10px;
    text-align: center;
}
.name-eng {
    border-bottom: 2px dotted rgb(154, 163, 181);
}
.splashy-printer{
 background-position: -122px -845px !important;
    background-size: 160px auto;
    height: 40px;
    position: absolute;
    right: 10%;
    width: 40px;
}
.name-guj h4 {
    margin-top: 13px;
    text-align: center;
}
.stamp {
    float: left;
    width:600px;
}
.stamp li {
    border: 1px solid rgb(17, 53, 116);
    float: left;
    height: 55px;
    width: 240px;
}
.stamp  ul{
margin:0;
}
.sign {
    float: right;
	margin-right:70px;
}
.stamp span {
    font-size: 23px;
    left: 7px;
    position: relative;
    top: 12px;
}
.guj {
    font-family: Saumil_guj2 !important;
    font-size: 24px;
}
.sign > h5 {
    font-size: 20px;
    position: relative;

}
td{ border:1px solid;}
.guj.logo{
	 font-size: 63px;
    margin-top: 12px;

	}
	.noborder{ border:0px !important}

img{ width:100%;}
td p {
	padding:4px;
	font-size:23px;
	
	
	}
	p.cent{
		text-align:center;
		}
	
/*	.title td{ background-color:#B6B6B6;}
	.title td p { color:#fff;}*/
u{ line-height:36px;}	
	.datagrid table { border-collapse: collapse; text-align: left; width: 100%; } .datagrid {font: normal 12px/150% Arial, Helvetica, sans-serif; background: #fff; overflow: hidden; border: 1px solid #8C8C8C; -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; }.datagrid table td, .datagrid table th { padding: 3px 10px; }.datagrid table thead th {background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #8C8C8C), color-stop(1, #7D7D7D) );background:-moz-linear-gradient( center top, #8C8C8C 5%, #7D7D7D 100% );filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#8C8C8C', endColorstr='#7D7D7D');background-color:#8C8C8C; color:#FFFFFF; font-size: 13px; font-weight: bold; border-left: 1px solid #A3A3A3; } .datagrid table thead th:first-child { border: none; }.datagrid table tbody td { color: #7D7D7D; border-left: 1px solid #DBDBDB;font-size: 12px;font-weight: normal; }.datagrid table tbody .alt td { background: #EBEBEB; color: #7D7D7D; }.datagrid table tbody td:first-child { border-left: none; }.datagrid table tbody tr:last-child td { border-bottom: none; }
	
	  @media print
   {
      .splashy-printer{ display:none;}
   }
	</style>
<div class="main_content" style="padding:0px !important;">
<form action="" method="post" id="defaultForm" class="form_validation_ttip" accept-charset="utf-8">
  <div style="display:none;">
    <input type="hidden" name="_method" value="POST"/>
  </div>
  
  <!--   row fluid complate -->
  <div class="row-fluid ">
    <div class="span12 well">
      <div class="header" style="background:#f0f1a6 !important; padding:20px 0px;">
        <div class="row"> <span style="margin-left:41%;"> SUBJECT TO KALOL JURISDICTION </span>
          <div class="head-right" style="  border: 1px solid;    border-radius: 20px;    font-size: 21px;    padding: 7px;    text-align: center;    width: 100px;">Seller</div>
        </div>
        <div class="row"> <?php echo $company_html ?> </div>
      </div>
      <div class="head-right"> <i class="splashy-printer" onClick="window.print();"></i>
        <h5 class="guj" style="font-size:18px;">³Aao´ ³klaaola´ : 02764–258255</h5>
        <h5 class="guj" style="margin-left:83px; font-size:20px;">: 258256</h5>
        <h5 class="guj" style="margin-left:83px; font-size:20px;">: 225935</h5>
        <h5>(ઘર) : <span class="guj" style="font-size:20px;">079–27523885</span></h5>
      </div>
      <div class="clr"></div>
    </div>
  </div>
  <div class="section2">
    <div class="row">
      <div class="box guj datagrid" style="margin-right:60px;">
        <table  class="" width="100%" cellspacing="0" cellpadding="0">
          <tr>
            <td  width="33%"><p class="guj" style="font-size: 34px;    font-weight: bolder;">kbaalaa naMbar : &nbsp;<?php echo $order_details['t_no']; ?></p></td>
            <td colspan="2" class="noborder" ><p>&nbsp;</p></td>
            <td width="177px;" ><p style="font-size: 22px; font-weight: bolder;  margin: 0px !important; padding: 0px !important; display: inherit;" class="guj">taarIKa : &nbsp;
                <?php $date=date_create($order_details['date']); echo date_format($date,"d–m–Y");?>
              </p></td>
          </tr>
          <tr>
            <td colspan="2" ><p class="guj"><strong> <u style="font-size:34px;">vaocanaarnaMu naama :</u><?php echo $order_details['seller_name']; ?> </strong> </p></td>
            <td colspan="3"  ><p class="guj"><strong><u style="font-size:34px;">vaocanaarnaMu  gaama :</u> <?php echo $order_details['seller_gaam']; ?> </strong></p></td>
          </tr>
          <tr>
            <td colspan="2" ><p class="guj"><strong> <u style="font-size:34px;">laonaarnaMu naama :</u> <?php echo $order_details['buyer_name']; ?> </strong> </p></td>
            <td  colspan="3"><p class="guj"><strong><u style="font-size:34px;">laonaarnaMu gaama :</u> <?php echo $order_details['buyer_gaam']; ?></strong> </p></td>
          </tr>
          <tr class="title">
            <td ><p align="center"><strong>માલ </strong><strong>ની </strong><strong>જાત</strong></p></td>
            <td ><p align="center"><strong>બોરી</strong></p></td>
            <td ><p align="center"><strong>ભાવ</strong></p></td>
            <td ><p align="center"><strong>ભરતી</strong></p></td>
          </tr>
          <tr>
            <td ><p class="guj cent">&nbsp; <?php echo $order_details['product_name']; ?></p></td>
            <td ><p class="guj cent">&nbsp; <?php echo $order_details['guni']; ?></p></td>
            <td ><p class="guj cent">&nbsp; <?php echo $order_details['price']; ?></p></td>
            <td ><p class="guj cent">&nbsp; <?php echo $order_details['bharti']; ?></p></td>
          </tr>
          <tr>
            <td class="noborder" valign="middle" colspan="4"><p class="guj">&nbsp;<strong> naaoMQa: </strong> <?php echo $order_details['note']; ?></p></td>
          </tr>
        </table>
      </div>
    </div>
  </div>
  <div class="section3">
    <div class="row">
      <div class="stamp">
        <ul>
          <li> <span>STAMPED</span> </li>
          <li> </li>
          <div class="clr"></div>
        </ul>
      </div>
      <div class="clr"></div>
    </div>
  </div>
  <div class="row ">
    <h5 class="note" style=" border: 1px solid;
    border-radius: 18px;
    font-size: 17px;
    margin-top: 6px;
    padding: 9px;
    width: 72%;">ઉપરનો સોદો લેનાર વેચનાર બંધનકર્તા છે અને જે પાર્ટી સોદાના કરારનો  ભંગ કરશે તે પાર્ટી સોદાના નફા નુકસાન માટે જવાબદાર છે.</h5>
    <div class="sign">
      <h5>દલાલ  ની  સહી </h5>
    </div>
  </div>
  </div>
  </div>
  <div class="clearfix"></div>
  
  <!--    -->
  
  <div class="row-fluid"></div>
</form>
<form action="" method="post" id="defaultForm" class="form_validation_ttip" accept-charset="utf-8">
  <div style="display:none;">
    <input type="hidden" name="_method" value="POST"/>
  </div>
  
  <!--   row fluid complate -->
  <div class="row-fluid ">
    <div class="span12 well">
      <div class="header" style="background:#f0f1a6 !important; padding:20px 0px;">
        <div class="row"> <span style="margin-left:41%;"> SUBJECT TO KALOL JURISDICTION </span>
          <div class="head-right" style="  border: 1px solid;    border-radius: 20px;    font-size: 21px;    padding: 7px;    text-align: center;    width: 100px;">BUYER</div>
        </div>
        <div class="row"> <?php echo $company_html ?> </div>
      </div>
      <div class="head-right"> <i class="splashy-printer" onClick="window.print();"></i>
        <h5 class="guj" style="font-size:18px;">³Aao´ ³klaaola´ : 02764–258255</h5>
        <h5 class="guj" style="margin-left:83px; font-size:20px;">: 258256</h5>
        <h5 class="guj" style="margin-left:83px; font-size:20px;">: 225935</h5>
        <h5>(ઘર) : <span class="guj" style="font-size:20px;">079–27523885</span></h5>
      </div>
      <div class="clr"></div>
    </div>
  </div>
  <div class="section2">
    <div class="row">
      <div class="box guj datagrid" style="margin-right:60px;">
        <table  class="" width="100%" cellspacing="0" cellpadding="0">
          <tr>
            <td  width="33%"><p class="guj" style="font-size: 34px;    font-weight: bolder;">kbaalaa naMbar : &nbsp;<?php echo $order_details['t_no']; ?></p></td>
            <td colspan="2" class="noborder" ><p>&nbsp;</p></td>
            <td width="177px;" ><p style="font-size: 22px; font-weight: bolder;  margin: 0px !important; padding: 0px !important; display: inherit;" class="guj">taarIKa : &nbsp;
                <?php $date=date_create($order_details['date']); echo date_format($date,"d–m–Y");?>
              </p></td>
          </tr>
          <tr>
            <td colspan="2" ><p class="guj"><strong> <u style="font-size:34px;">vaocanaarnaMu naama :</u><?php echo $order_details['seller_name']; ?> </strong> </p></td>
            <td colspan="3"  ><p class="guj"><strong><u style="font-size:34px;">vaocanaarnaMu  gaama :</u> <?php echo $order_details['seller_gaam']; ?> </strong></p></td>
          </tr>
          <tr>
            <td colspan="2" ><p class="guj"><strong> <u style="font-size:34px;">laonaarnaMu naama :</u> <?php echo $order_details['buyer_name']; ?> </strong> </p></td>
            <td  colspan="3"><p class="guj"><strong><u style="font-size:34px;">laonaarnaMu gaama :</u> <?php echo $order_details['buyer_gaam']; ?></strong> </p></td>
          </tr>
          <tr class="title">
            <td ><p align="center"><strong>માલ </strong><strong>ની </strong><strong>જાત</strong></p></td>
            <td ><p align="center"><strong>બોરી</strong></p></td>
            <td ><p align="center"><strong>ભાવ</strong></p></td>
            <td ><p align="center"><strong>ભરતી</strong></p></td>
          </tr>
          <tr>
            <td ><p class="guj cent">&nbsp; <?php echo $order_details['product_name']; ?></p></td>
            <td ><p class="guj cent">&nbsp; <?php echo $order_details['guni']; ?></p></td>
            <td ><p class="guj cent">&nbsp; <?php echo $order_details['price']; ?></p></td>
            <td ><p class="guj cent">&nbsp; <?php echo $order_details['bharti']; ?></p></td>
          </tr>
          <tr>
            <td class="noborder" valign="middle" colspan="4"><p class="guj">&nbsp;<strong> naaoMQa: </strong> <?php echo $order_details['note']; ?></p></td>
          </tr>
        </table>
      </div>
    </div>
  </div>
  <div class="section3">
    <div class="row">
      <div class="stamp">
        <ul>
          <li> <span>STAMPED</span> </li>
          <li> </li>
          <div class="clr"></div>
        </ul>
      </div>
      <div class="clr"></div>
    </div>
  </div>
  <div class="row ">
    <h5 class="note" style=" border: 1px solid;
    border-radius: 18px;
    font-size: 17px;
    margin-top: 6px;
    padding: 9px;
    width: 72%;">ઉપરનો સોદો લેનાર વેચનાર બંધનકર્તા છે અને જે પાર્ટી સોદાના કરારનો  ભંગ કરશે તે પાર્ટી સોદાના નફા નુકસાન માટે જવાબદાર છે.</h5>
    <div class="sign">
      <h5>દલાલ  ની  સહી </h5>
    </div>
  </div>
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
		
		gebo_mask_input.init();
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
					'data[Order][order_generation_date]': { required: true},
					'data[Order][pro_id]': { required: true},
					'data[Order][seller_name]': { required: true },
					'data[Order][seller_city]': { required: true},
					'data[Order][buyer_name]': { required: true},
					'data[Order][buyer_city]': { required: true},
					'data[Order][guni]': { required: true},
					'data[Order][price]': { required: true},
					'data[Order][bharti]': { required: true},
					'data[Order][note]': { required: true},
					
					
					
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