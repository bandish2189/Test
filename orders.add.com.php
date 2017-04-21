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
require_once("models/header.php");
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
                    
					
					<script type="text/javascript" src="js/forms/jquery.inputmask.min.js"></script><script type="text/javascript" src="js/lib/validation/jquery.validate.min.js"></script>
<!--Jquery UI Auto Suggestion-->
<link rel="stylesheet" type="text/css" href="css/lib/jquery-ui/css/Aristo/Aristo.css"/><script type="text/javascript" src="js/lib/jquery-ui/jquery-ui-1.8.20.custom.min.js"></script>
<link rel="stylesheet" href="js/lib/smoke/themes/gebo.css" />
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
        <div class="span2"><a href="javascript:void(0)" class="btn" id="smoke_prompt">Prompt</a></div>
        <div class="span2">
        	<p>Add City</p>
            <span class="f_req btn" onclick="javascript:ajax_city(this,'new')"><i class="splashy-add"></i></span>
            
            </div>
      </div>
      <div class="row-fluid ">
        <div class="span5">
          <label>From:<span class="f_req">*</span></label>
          <select name="data[Order][from_city]" class="span10" id="OrderFromCity">
<option value="">--- Select From City ---</option>
 <?php  

	echo $city_list_htm ;
?>

</select>	
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
<option value="1">ANKHOL</option>
<option value="2">KARANNAGAR</option>
<option value="3">CHHATRAL</option>
<option value="4">KADI</option>
<option value="5">NANADASAN</option>
<option value="6">DHANALI</option>
<option value="7">BALIYASAN</option>
<option value="8">JAGUDAN </option>
<option value="9">MEHSANA</option>
<option value="10">KALOL</option>
<option value="11">LANGHNAJ</option>
<option value="12">KAIYAL</option>
<option value="13">KHOTHA</option>
<option value="14">CHANGODAR</option>
<option value="15">BAVLA</option>
<option value="16">SARKHEJ</option>
<option value="17">ASHOKNAGAR</option>
<option value="18">PALAVASANA</option>
<option value="19">VAMAJ</option>
<option value="20">THOL</option>
<option value="21">VADAVI</option>
<option value="22">MERDA ADRAJ</option>
<option value="23">RAJKOT </option>
<option value="24">JAMNAGAR</option>
<option value="25">GONDAL</option>
<option value="26">SURENDRANAGAR</option>
<option value="27">VADHVAN</option>
<option value="28">LAKHTAR </option>
<option value="29">VIRAMGAM</option>
<option value="30">PATDI</option>
<option value="31">ANAND</option>
<option value="32">DAHOD</option>
<option value="33">GODHARA</option>
<option value="34">JETPURA</option>
<option value="35">SAPAR</option>
<option value="36">METODA</option>
<option value="37">HALAMTALA</option>
<option value="38">JETPUR</option>
<option value="39">JUNAGADH</option>
<option value="40">KESHOD</option>
<option value="41">DHORAJI</option>
<option value="42">UNA</option>
<option value="43">VERAVAL</option>
<option value="44">KODINAR</option>
<option value="45">MAHUVA</option>
<option value="46">BHAVNAGAR</option>
<option value="47">TALAJA</option>
<option value="48">BOTAD</option>
<option value="49">DHANDHUKA</option>
<option value="50">CHOTILA</option>
<option value="51">MORBI</option>
<option value="52">RAJPUR</option>
<option value="53">JASDAN</option>
<option value="54">AJKOT</option>
<option value="55">SAYLA</option>
<option value="56">SUTRAPADA</option>
<option value="57">SAWARKUNDLA</option>
<option value="58">AMRELI</option>
<option value="59">DHASA</option>
<option value="60">GHARIYADHAR</option>
<option value="61">PALITANA</option>
<option value="62">VALLBHIPUR</option>
<option value="63">DHOLA</option>
<option value="64">NADIYAD</option>
<option value="65">BARODA</option>
<option value="66">PALANPUR</option>
<option value="67">HIMMATNAGAR</option>
<option value="68">AHMEDABAD</option>
<option value="69">SONIKICHAL</option>
<option value="70">VAISHNDEVI</option>
<option value="71">SUGHAD</option>
<option value="72">HATHIJAN</option>
<option value="73">WIDE ANGLE</option>
<option value="74">THALTEJ</option>
<option value="75">S G ROAD</option>
<option value="76">C G ROAD</option>
<option value="77">DERDI</option>
<option value="78">BALASINOR</option>
<option value="79">DAKOR</option>
<option value="80">CHANDHKHEDA</option>
<option value="81">NAROL</option>
<option value="82">NARODA </option>
<option value="83">GOTA</option>
<option value="84">VAGHODIYA</option>
<option value="85">SAVLI</option>
<option value="86">VATVA</option>
<option value="87">ZAGHDIYA</option>
<option value="88">ANKLESHVAR</option>
<option value="89">SURAT</option>
<option value="90">NAVSARI</option>
<option value="91">BHARUCH</option>
<option value="92">PALEJ</option>
<option value="93">BILIMORA</option>
<option value="94">VAPI</option>
<option value="95">PANOLI</option>
<option value="96">MANAVADAR</option>
<option value="97">VISAVADAR</option>
<option value="98">BHESAN</option>
<option value="99">TIMBI</option>
<option value="100">GIRGADADA</option>
<option value="101">DIV</option>
<option value="102">SARDHAR</option>
<option value="103">KUVADVA</option>
<option value="104">BHUJ</option>
<option value="105">NAKHTRANA</option>
<option value="106">MUNDRA</option>
<option value="107">MANDVI</option>
<option value="108">ANJAR</option>
<option value="109">MADHAPAR(KUTCH)</option>
<option value="110">NALIYA</option>
<option value="111">GANDHIDHAM</option>
<option value="112">ZALOD</option>
<option value="113">BORSAD</option>
<option value="114">KHAMBHAT</option>
<option value="115">TARAPUR</option>
<option value="116">KHEDA</option>
<option value="117">MEMDABAD</option>
<option value="118">SANDHANA</option>
<option value="119">SANAND</option>
<option value="120">PETLAD</option>
<option value="121">VALETVA</option>
<option value="122">ANAS</option>
<option value="123">PIPLOD</option>
<option value="124">FATEPURA</option>
<option value="125">SANTRAMPUR</option>
<option value="126">BAKROL</option>
<option value="127">PATAN</option>
<option value="128">SIDHHPUR</option>
<option value="129">UNJA</option>
<option value="130">MODASA</option>
<option value="131">SACHIN</option>
<option value="132">PADRA</option>
<option value="133">HALOL</option>
<option value="134">LUNAVADA</option>
<option value="135">SEHRA</option>
<option value="136">JAMBUSAR</option>
<option value="137">HALVAD</option>
<option value="138">VADIYA</option>
<option value="139">KUKAVAV</option>
<option value="140">BAGSARA</option>
<option value="141">VANKANER</option>
<option value="142">LIMBDI</option>
<option value="143">RAJULA</option>
<option value="144">PIPAVAV</option>
<option value="145">JAMJODHPUR</option>
<option value="146">SIKKA</option>
<option value="147">RELIENCE(JAMNAGAR0</option>
<option value="148">ESSAR(JAMNAGAR)</option>
<option value="149">MITANA</option>
<option value="150">DHAVRKA</option>
<option value="151">JAMKHAMBHALIYA</option>
<option value="152">PORBANDAR</option>
<option value="153">BHATIYA</option>
<option value="154">LATHI</option>
<option value="155">VASAI(JAMNAGAR)</option>
<option value="156">SONGAD(BHAVNAGAR)</option>
<option value="157">SONGAD(SURAT)</option>
<option value="158">VYARA</option>
<option value="159">CHIKHLI</option>
<option value="160">VALSAD</option>
<option value="161">DHARMPUR</option>
<option value="162">NANAPAUNDA</option>
<option value="163">VANSADA</option>
<option value="164">BABRA</option>
<option value="165">MENDARADA</option>
<option value="166">LALPUR</option>
<option value="167">PAVIJETPUR</option>
<option value="168">CHHOTA UDAIPUR</option>
<option value="169">BODELI</option>
<option value="170">NASVADI</option>
<option value="171">DHABHOI</option>
<option value="172">DAMNAGAR</option>
<option value="173">CHARADVA(MORBI)</option>
<option value="174">TANKARA</option>
<option value="175">MALIYA</option>
<option value="176">SAMKHYARI</option>
<option value="177">AMBALIYASAN</option>
<option value="178">VIJAPUR</option>
<option value="179">VISNAGAR</option>
<option value="180">BALOL</option>
<option value="181">PALEJ(MEHSANA)</option>
<option value="182">KHATRAJ</option>
<option value="183">SANTEJ</option>
<option value="184">ODHAV</option>
<option value="185">CHANDARADA</option>
<option value="186">BUDASAN</option>
<option value="187">GANDHINAGAR</option>
<option value="188">ADALAJ</option>
<option value="189">DISA</option>
<option value="190">DHANERA</option>
<option value="191">RADHANPUR</option>
<option value="192">SAMI</option>
<option value="193">HARIJ</option>
<option value="194">BECHARAJI</option>
<option value="195">THARAD</option>
<option value="196">THARA</option>
<option value="197">UNAVA</option>
<option value="198">MANSA</option>
<option value="199">GOZARIYA</option>
<option value="200">THAN</option>
<option value="201">MULI</option>
<option value="202">RANPUR</option>
<option value="203">CHUDA</option>
<option value="204">RAJPIPLA</option>
<option value="205">PAVAGADH</option>
<option value="206">KARJAN</option>
<option value="207">PALEJ(BHARUCH)</option>
<option value="208">PALIYAD</option>
<option value="209">BARVADA</option>
<option value="210">GADHADA</option>
<option value="211">VINCHIYA</option>
<option value="212">PRANCHI</option>
<option value="213">MALIYA HATINA</option>
<option value="214">MANDALI</option>
<option value="215">KHAVDI(JAMNAGAR)</option>
<option value="216">KOTHA</option>
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
            
            <script type="text/javascript" src="js/jquery.debouncedresize.min.js"></script>
			<script type="text/javascript" src="js/jquery.actual.min.js"></script>
			<script type="text/javascript" src="js/jquery.cookie.min.js"></script>
			<script type="text/javascript" src="js/bootstrap/js/bootstrap.min.js"></script>
			<script type="text/javascript" src="js/lib/qtip2/jquery.qtip.min.js"></script>
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
								smoke.prompt('What\'s your name?',function(e){
									if (e){
										//smoke.alert('Your name is '+e);
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
