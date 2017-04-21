
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
//	echo 'post';/
//	mypr($_POST['data']);
	$data['party']=$_POST['data']['party_id'];
	$data['gaam']=$_POST['data']['gam'];
	$data['from']=$_POST['data']['from'];
	$data['to']=$_POST['data']['to'];
//	echo strlen($_POST['data']['clients']['id']);
//	exit;
	$party_details = $party->getParty($_POST['data']['party_id']);
//	mypr($party_details);
	//exit;
	$reportBuySell = $order->reportSellBuy($data);
//	echo 'reportdone';
//	mypr($reportBuySell);
	
//	exit;
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
          <li> <a href="javascript:void(0)"><i class="icon-home"></i></a> </li>
          <li> <a href="/orders/index"> Party </a> </li>
          <li>Index</li>
        </ul>
      </div>
    </nav>
    <script type="text/javascript" src="js/lib/datatables/jquery.dataTables.min.js"></script><script type="text/javascript" src="js/lib/datatables/jquery.dataTables.sorting.js"></script><script type="text/javascript" src="js/gebo_tables.js"></script> 
    <script type="text/javascript">
    $(document).ready(function(){
        var table = $('#index').dataTable({
            "sPaginationType": "bootstrap",     
        });
    }); 
</script>
   <div class="row-fluid">
    <div class="span12">
        <div class="alert alert-block alert-info fade in party_head guj">
                    <?php $user = $_SESSION['userCakeUser'];
//		mypr($user);
		
		
		if($user->company['id'] == 1){
			echo '<img class="hb" src="img/hb.svg"/>';
		}elseif($user->company['id'] == 2){
			echo '<img class="bb" src="img/bb.svg"/>';
			}elseif($user->company['id'] == 3){
			echo '<img style="width:135px" class="br" src="img/br_new.svg"/>';
			}
			?>
            <i class="splashy-printer" onclick="window.print();" style="float:right; cursor:pointer;"></i>

            <h4 class="alert-heading party_heading" style="min-height:95px;"><?php // echo $party_details['PartyName']; ?></h4>
           <ul>
                <li><?php //echo $party_details['address']; ?></li>
                <li><?php 
	//			$date_from = date_create($_POST['data']['from']);
	//			$date_to = date_create($_POST['data']['to']);
	//			echo '³'.date_format($date_from,"d–m–Y");
	//			echo ' qaI '.date_format($date_to,"d–m–Y").'´'; ?></li>
            </ul>
            <p></p>
            
        </div>
    </div>
</div>
  <style type="text/css"> 
  .party_heading { font-size:+48px; width:100%; text-align:center; line-height:40px; color:#000;}
  .party_head img{ width:320px; float:left; position:absolute;}
  .party_head ul{ text-align:center;}
  .party_head li{ list-style:none; color:#000;}
  </style>
  <style tyle="text/css">
   <!--
   @media print
   {
      p.bodyText {font-family:georgia, times, serif;}
	  .form_validation_ttip{display:none;}
	  #contentwrapper > div > nav{display:none;}
	  #maincontainer > header{display:none;}
	  img.bb{ width:150px; margin-top:10px;}
	   img.hb{ width:140px; margin-top:10px;}
	  .party_heading {
    font-size: +30px;

   }
   .splashy-printer{ display:none;}
   .party_head li {
	   font-size:22px;
    }
	.table td{
		min-height:30px !important;
		}
	.table th, .table td {
    padding: 3px !important;
    line-height: 18px;
    text-align: left;
	vertical-align: top;
    border-top: 1px solid #ddd;
}
 table {
    border-collapse: collapse;
	border: 1px solid black;
  }
  th, td {
    border: 1px solid black;
    padding: 10px;
    text-align: left;
  }
#contentwrapper > div > div:nth-child(9) > div > table > thead > tr > th:nth-child(2){ width:250px !important;}
#contentwrapper > div > div:nth-child(9) > div > table > thead > tr > th:nth-child(3){ width:150px !important;}
#contentwrapper > div > div:nth-child(9) > div > table > thead > tr > th:nth-child(5){ min-width:150px !important;}
#contentwrapper > div > div:nth-child(9) > div > table > thead > tr > th:nth-child(6){ min-width:150px !important;}
#contentwrapper > div > div:nth-child(9) > div > table > thead > tr > th:nth-child(7){ min-width:150px !important;}
.date_th{ width:130px !important;}
   -->
</style>

    <div class="row-fluid">
      <div class="span12">
        <h3 class="heading"><b>Full Year report   <?php $thisYear = $order->get_year($user->year);
		echo "</b>".$thisYear['name']." ( ".$thisYear['limit']." )";
		?></h3>
        <?php
	//	mypr($thisYear);
		$data['party']=1;
	$data['gaam']= 68;
	$data['from']=08/01/2016;
	$data['to']=02/21/2017 ;
//	echo strlen($_POST['data']['clients']['id']);
//	exit;
//	$party_details = $party->getParty($_POST['data']['party_id']);
//	mypr($party_details);
	//exit;
	$reportFullYear = $order->reportFullYear($data);
//	mypr($reportFullYear);
	
		
//exit;
		?>
        <table class="table table-bordered table-striped " >
          <thead>
            <tr class="guj">
                <th style="width:20px;"></th>
                <th style="width:260px;">paaTI-nauM naama.</th>
                <th style="width:25px;">gaama</th>
                <th style="width:25px;">gaunaI</th>
                <th></th>
                <th></th>
            </tr>
          </thead>
          <tbody>
            <?php 
			//$party_list = $party->listParty('100');
///			mypr($party_list);
			$sr = 1;
			
			
		//	exit;
			foreach($reportFullYear as $one){
				
//						mypr($one);
//				exit;
			?>
            <tr class="guj">
              <td><?php echo str_pad($sr, 3, "0", STR_PAD_LEFT);?>&nbsp;</td>
              <td><?php echo $one['name'].'-'.$one['id'];?>&nbsp;</td>
              <td><?php echo $one['gaam'];?></td>
              <td><?php echo $one['guni'];?></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <?php
	//		exit;
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
<a href="javascript:void(0)" class="sidebar_switch off_switch ttip_r" title="Hide Sidebar">Sidebar switch</a> <script type="text/javascript" src="js/jquery.debouncedresize.min.js"></script><script type="text/javascript" src="js/jquery.actual.min.js"></script><script type="text/javascript" src="js/jquery.cookie.min.js"></script><script type="text/javascript" src="js/bootstrap/js/bootstrap.min.js"></script><script type="text/javascript" src="js/lib/qtip2/jquery.qtip.min.js"></script><script type="text/javascript" src="js/lib/jBreadcrumbs/js/jquery.jBreadCrumb.1.1.min.js"></script><script type="text/javascript" src="js/lib/sticky/sticky.min.js"></script><script type="text/javascript" src="js/ios-orientationchange-fix.js"></script><script type="text/javascript" src="js/lib/antiscroll/antiscroll.js"></script><script type="text/javascript" src="js/lib/antiscroll/jquery-mousewheel.js"></script><script type="text/javascript" src="js/lib/colorbox/jquery.colorbox.min.js"></script><script type="text/javascript" src="js/gebo_common.js"></script> 
<script>
				$(document).ready(function() {
					//* show all elements & remove preloader
					setTimeout('$("html").removeClass("js")',1000);
				});
			</script>
</div>
</body></html>