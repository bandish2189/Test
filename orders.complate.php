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
	echo $inserted_order;
	exit;
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
                            <div style="overflow:hidden; position:relative; width: 1053px;"><div><ul style="width: 5000px;">
                                <li class="first">
                                    <a href="javascript:void(0)"><i class="icon-home"></i></a>
                                </li>
                                <li>
                                    <a href="/orders/index">
                                    	Orders                                    </a>
                                </li>
                                <li class="last">Complete</li>
                            </ul></div></div>
                        </div>
                    </nav>
                    
					
					<!-- validation -->
<script type="text/javascript" src="js/lib/validation/jquery.validate.min.js"></script>
<form action="/orders/complete/7" class="form_validation_reg" id="OrderCompleteForm" method="post" accept-charset="utf-8"><div style="display:none;"><input type="hidden" name="_method" value="PUT"></div>
  <input type="hidden" name="data[Order][id]" value="7" id="OrderId">
  <div class="row-fluid">
    <div class="span12">
      <h3 class="heading">New Order
        
        LR NO : <input name="data[Order][lr_no]" maxlength="50" type="text" value="ASKJDAS" id="OrderLrNo">        
        <input name="data[Order][order_generation_date]" value="2016-07-08" readonly type="text" id="OrderOrderGenerationDate">        
        <!--<label  style="margin-left:50px;" class="radio inline">
          <input type="radio" value="Cash" checked name="Order">
          Cash Order 
        </label>
        <label class="radio inline">
          <input type="radio" value="debit" name="Order">
          Debit Order 
        </label>-->

        <input type="radio" name="data[Order][order_type]" id="OrderOrderType1" value="1" checked="checked">Cash Order<input type="radio" name="data[Order][order_type]" id="OrderOrderType0" value="0" checked="checked">Debit Order
      </h3>
    </div>
  </div>
  <div class="row-fluid ">
    <div class="span6 well">
      <div class="row-fluid ">
        <div class="span5">
          <label>Client Name<span class="f_req">*</span></label>
          <div id="txtHint">
          	 <select name="data[Order][client_id]" class="chzn_a span10" id="OrderClientId">
<option value="">--- Select Client ---</option>
<option value="3">British super alloys </option>
<option value="4">Shree balram rolling mill pvt ltd</option>
<option value="5">Vimal oil &amp; foods ltd</option>
<option value="6">Gresh casting ltd</option>
<option value="7">Someshvar ispat pvt ltd</option>
<option value="8">Vivek steel </option>
<option value="9">Adani indusries</option>
<option value="10">Asian tubes ltd</option>
<option value="11">vivan steel</option>
<option value="12">Madhusudan steel</option>
<option value="13">Shree rangam packing</option>
<option value="14">hi-tech pipe</option>
<option value="15">N K Protins</option>
<option value="16">crystal ceramics</option>
<option value="17">marbolite ceramics</option>
<option value="18">steel house</option>
<option value="19">Gujrat ambuja export ltd</option>
<option value="20">GROMER FEET</option>
<option value="21"></option>
<option value="22">MANOJ KUMAR</option>
<option value="23">MANOJ KUMAR</option>
<option value="24">ASJDLKAJSDLJ</option>
<option value="25">ASJDLKAJSDLJ</option>
<option value="26">ASJDLKAJSDLJ</option>
<option value="27" selected="selected">ASJDLKAJSDLJ</option>
<option value="28">British super alloys </option>
<option value="29">British super alloys </option>
<option value="30">TEST</option>
<option value="31">TEST</option>
<option value="32">Shree balram rolling mill pvt ltd</option>
<option value="33">Gujrat ambuja export ltd</option>
<option value="34">Gujrat ambuja export ltd</option>
<option value="35">Shree balram rolling mill pvt ltd</option>
<option value="36">Vimal oil &amp; foods ltd</option>
<option value="37">Vimal oil &amp; foods ltd</option>
</select>          </div>
        </div>
        <div class="span5">
          <label>Place:<span class="f_req">*</span></label>
          <select name="data[Order][order_city]" class="span10" id="OrderOrderCity">
<option value="">--- Select Order City ---</option>
<option value="1">ANKHOL</option>
<option value="2">KARANNAGAR</option>
<option value="3">CHHATRAL</option>
<option value="4" selected="selected">KADI</option>
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
      </div>
      <div class="row-fluid ">
        <div class="span5">
          <label>From:<span class="f_req">*</span></label>
          <select name="data[Order][from_city]" class="span10" id="OrderFromCity">
<option value="">--- Select From City ---</option>
<option value="1">ANKHOL</option>
<option value="2">KARANNAGAR</option>
<option value="3">CHHATRAL</option>
<option value="4" selected="selected">KADI</option>
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
        <div class="span5">
          <label>To:<span class="f_req">*</span></label>
          <select name="data[Order][to_city]" class="span10" id="OrderToCity">
<option value="">--- Select To City ---</option>
<option value="1">ANKHOL</option>
<option value="2">KARANNAGAR</option>
<option value="3">CHHATRAL</option>
<option value="4">KADI</option>
<option value="5">NANADASAN</option>
<option value="6">DHANALI</option>
<option value="7">BALIYASAN</option>
<option value="8" selected="selected">JAGUDAN </option>
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
</select>        </div>
      </div>
      <div class="row-fluid ">
        <div class="span5">
          <label>Payment By:<span class="f_req">*</span></label>
          <input type="radio" name="data[Order][payment_by]" id="OrderPaymentBy1" value="1" checked="checked">Party<input type="radio" name="data[Order][payment_by]" id="OrderPaymentBy0" value="0">Client        </div>
      </div>
    </div>

    <div class="span6 well">

      <p class="f_legend"><span class="span6">Party Details</span>

              
        <input type="hidden" name="data[Party][1][id]" value="1" id="OrderPaymentBy">        
        <input name="data[Party][1][party_name]" value="Party1" placeholder="Party Name" type="text" id="OrderPaymentBy">        
        <input name="data[Party][1][address]" value="TEST ADDRESS" placeholder="Party Address" type="text" id="OrderPaymentBy">        
        <input name="data[Party][1][contact_person]" value="TEST CONTACT PERSON" placeholder="Contact Person" type="text" id="OrderPaymentBy">        
        <input name="data[Party][1][contact_no]" value="1234567890" placeholder="Contact No" type="number" id="OrderPaymentBy">        
        <input name="data[Party][1][email_address]" value="TEST@EMAIL.COM" placeholder="Email Address" type="email" id="OrderPaymentBy">        
        <select name="data[Party][1][party_place]" readonly="readonly" class="span10" id="OrderPaymentBy">
<option value="">--- Select Party Place ---</option>
<option value="1">ANKHOL</option>
<option value="2" selected="selected">KARANNAGAR</option>
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
        
      
    </p></div>

  </div>
  <div class="clearfix"></div>
  <div class="row-fluid ">
    <div class="span6 well">
      <p class="f_legend">Truck Details</p>
      <div class="row-fluid">
        <div class="span4">
          <label>Pcs/Weight:<span class="f_req">*</span>(Guarantee)</label>
          <input name="data[Order][qty]" class="span10" disabled maxlength="255" type="text" value="25" id="OrderQty"> 
        </div>
        <div class="span4">
          <label>Meterial:<span class="f_req">*</span></label>
          <input name="data[Order][meterial]" class="span10" maxlength="255" type="text" value="888" id="OrderMeterial"> 
        </div>
        <div class="span4">
          <label>Truck Fright:<span class="f_req">*</span></label>
          <input name="data[Order][truck_fright]" class="span10" maxlength="255" type="text" value="400" id="OrderTruckFright">        </div>
      </div>
      <div class="row-fluid">
        <div class="span8">
          <label>Note:<span class="f_req">*</span></label>
          <textarea name="data[Order][note]" rows="3" cols="5" class="span10" id="OrderNote"></textarea> 
        </div>
        <div class="span4">
          <label>Actual Pcs/Weight:<span class="f_req">*</span></label>
          <input name="data[Order][actual_qty]" class="span10" maxlength="255" type="text" id="OrderActualQty"> 
        </div>
        <div class="span4">
          <label>Order Completion Date:<span class="f_req">*</span></label>
          <input name="data[Order][order_completion_date]" readonly class="span10" value="2016-07-08 07:04:46" type="text" id="OrderOrderCompletionDate"> 
        </div>
        <input type="hidden" name="data[Order][completed_by]" value="Login User" id="OrderCompletedBy">
      </div>
      <div class="row-fluid">
        <div class="span4">
          <label>Truck Number:<span class="f_req">*</span></label>								
          
          <input type="hidden" name="data[Truck][id]" value="20" id="TruckId">
          <input name="data[Truck][truck_number]" class="span10 col-md-12 form-control" placeholder="Search truck..." autocomplete="off" maxlength="255" type="text" value="GJ.1.CT.7976" id="TruckTruckNumber"> 
        </div>
        <div class="span4">
          <label>Chessis Number:<span class="f_req">*</span></label>
          <input name="data[Truck][chassis_no]" class="span10" maxlength="255" type="text" value="CHE101" id="TruckChassisNo">        </div>
        <div class="span4">
          <label>Engine Number:<span class="f_req">*</span></label>
          <input name="data[Truck][engine_no]" class="span10" maxlength="255" type="text" value="ENG101" id="TruckEngineNo">        </div>
      </div>
      <div class="row-fluid">
        <div class="span4">
          <label>Owner Name:<span class="f_req">*</span></label>
          <input type="hidden" name="data[TruckOwner][id]" value="20" id="TruckOwnerId">          <input name="data[TruckOwner][owner_name]" class="span10" maxlength="255" type="text" value="OWNER" id="TruckOwnerOwnerName"> 
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
<option value="26" selected="selected">SURENDRANAGAR</option>
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
          <input name="data[TruckOwner][contact_no]" class="span10" maxlength="50" type="text" value="9824763423" id="TruckOwnerContactNo"> 
        </div>
      </div>
    </div>
    <div class="span6 well">
      <p class="f_legend">Driver Details</p>
      <div class="formSep">
        <div class="row-fluid">
          <div class="span4">
            <label>Driver Name:<span class="f_req">*</span></label>
            <input type="hidden" name="data[DriverRegister][id]" value="16" id="DriverRegisterId">            <input name="data[DriverRegister][driver_name]" class="span10" maxlength="255" type="text" value="[9879215960][9879215960]" id="DriverRegisterDriverName">          </div>
          <div class="span4">
            <label>Driver Mobile No:<span class="f_req">*</span></label>
            <input name="data[DriverRegister][mobileno]" class="span10" maxlength="255" type="text" value="9879215960" id="DriverRegisterMobileno">          </div>
          <div class="span4">
            <label>Licence Number:<span class="f_req">*</span></label>
            <input name="data[DriverRegister][licenseno]" class="span10" maxlength="255" type="text" value="" id="DriverRegisterLicenseno">          </div>
        </div>
        <div class="row-fluid">
          <div class="span4">
            <label>Advance Payment:<span class="f_req">*</span></label>
            <input name="data[Order][advance_pay]" class="span10" maxlength="255" type="text" value="0" id="OrderAdvancePay">          </div>
          <div class="span4">
            <label>Received By:<span class="f_req">*</span></label>
            <input name="data[CashVoucher][received_by]" class="span10" value="[9879215960][9879215960]" maxlength="255" type="text" id="CashVoucherReceivedBy">          </div>
          <div class="span4">
            <label>Commission:<span class="f_req">*</span></label>
            <input name="data[Order][commision]" class="span10" maxlength="255" type="text" value="300" id="OrderCommision">          </div>
          <div class="span4">
            <label>&nbsp;</label>
            <input type="submit" name="submit" value="Submit">
            <a href="/parties" class="btn">Cancel</a>          </div>
        </div>
      </div>
    </div>

    <div class="span6 well">
      <p class="f_legend">Driver Payment Details</p>
      <div class="formSep">
        <div class="row-fluid">
          <div class="span4">
            <label>Total Amount:<span class="f_req">*</span></label>
            <input type="hidden" name="data[DriverTransaction][order_id]" value="7" id="DriverTransactionOrderId">            <input type="hidden" name="data[DriverTransaction][driver_id]" value="16" id="DriverTransactionDriverId">            <input name="data[DriverTransaction][total_amount]" class="span10" readonly step="any" type="number" id="DriverTransactionTotalAmount">          </div>
          <div class="span4">
            <label>Payable Amount:<span class="f_req">*</span></label>
            <input name="data[DriverTransaction][payable_amount]" class="span10" readonly step="any" type="number" id="DriverTransactionPayableAmount">          </div>
          <div class="span4">
            <label>Payment Status:</label>
            <input type="hidden" name="data[DriverTransaction][status]" id="DriverTransactionStatus_" value=""><input type="radio" name="data[DriverTransaction][status]" id="DriverTransactionStatus1" value="1" checked="checked">Paid<input type="radio" name="data[DriverTransaction][status]" id="DriverTransactionStatus0" value="0" checked="checked">Unpaid          </div>
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
            url: "http://trans.swaggerunit.com//orders/ajax_party",
            data: myKeyVals,
            dataType: "text",
            success: function(resultData) { 
              $("#ajax_party").append(resultData); 
            }
      });
      
      saveData.error(function() { 
        alert("Something went wrong"); 
      }); 
    }

  }
</script>

<script>
  $(function() {
    $( "#OrderActualQty" ).change(function() {
      var actual_qty = parseFloat($("#OrderActualQty").val()).toFixed(2);
      var truck_fright = parseFloat($("#OrderTruckFright").val()).toFixed(2);
      var advance_pay = parseFloat($("#OrderAdvancePay").val()).toFixed(2);
      var commision = parseFloat($("#OrderCommision").val()).toFixed(2);

      var total_amount = parseFloat(actual_qty * truck_fright).toFixed(2);
      var payable_amount = parseFloat(total_amount - advance_pay - commision).toFixed(2);
      
      $("#DriverTransactionTotalAmount").val(total_amount);
      $("#DriverTransactionPayableAmount").val(payable_amount);
    });
  });
</script>               
                    
                   	     

                   
                </div>
		
		</div>
	</body>
</html>
