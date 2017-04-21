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
if(isset($_GET)&& !empty($_GET)){
	echo 'get';
	exit;
	}
if(isset($_POST['data'])){
//	echo 'post';
//	mypr($_POST['data']);
//	echo strlen($_POST['data']['clients']['id']);
//	exit;
//		$date=date("Y/m/d");
//		$_POST['data']['clients']['date']= date_format($date,"Y-m-d");

if(!empty($_POST['data'])){
	$inserted_id  = $client->create($_POST['data']['Client']);
//	echo $inserted_id;
//	mypr($_POST['data']);
	header('Location: clients.php');

	$inserted_order = $order->insertDebitOrder($_POST['data']);
	//echo $inserted_order;
	
	//mypr($_POST['data']);
//	header('Location: orders.printlr.php?id='.$inserted_order);
}elseif($_POST['data']['Order']['order_type']==1){
	echo 'credit order';
	$inserted_order = $order->insertCreditOrder($_POST['data']);
	echo $inserted_order;
	exit;
//	insertCreditOrder
	}

	
	exit;
	}
if(isset($_GET['id'])){
	echo $_GET['id'];
	$truck_details = $truck->selectTruck($id); 
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
                                    <a href="/clients/index">
                                    	Clients                                    </a>
                                </li>
                                <li class="last">Add</li>
                            </ul></div></div>
                        </div>
                    </nav>
                    
					
					<!-- validation -->
<script type="text/javascript" src="/js/lib/validation/jquery.validate.min.js"></script>

<form action="" class="form_validation_reg" id="ClientAddForm" method="post" accept-charset="utf-8" novalidate><div style="display:none;"><input type="hidden" name="_method" value="POST"></div>

	<div class="formSep">
		<div class="row-fluid">
			<div class="span4">
				<label>Client Name <span class="f_req">*</span></label>
				<input name="data[Client][client_name]" class="span12" maxlength="255" type="text" id="ClientClientName">				<span class="help-block">Note: driver name should be unique as possible</span>
			</div>
            <div class="span4">
				<label>Contact Person <span class="f_req">*</span></label>
				<input name="data[Client][contact_person]" empty="--- Select Truck Owner City ---" class="span12" maxlength="255" type="text" id="ClientContactPerson">			</div>
            <div class="span4">
				<label>Contact No <span class="f_req">*</span></label>
				<input name="data[Client][contact_no]" class="span12" maxlength="50" type="text" id="ClientContactNo">			</div>
		</div>
	</div>

	<div class="formSep">
		<div class="row-fluid">
			<div class="span4">
				<label>Email Address <span class="f_req">*</span></label>
				<input name="data[Client][email_address]" class="span12" maxlength="255" type="text" id="ClientEmailAddress">			</div>
		</div>
	</div>
    <div class="formSep">
		<div class="row-fluid">
			<div class="span4">
				<label>Place <span class="f_req">*</span></label>
				<select name="data[Client][client_place]" class="span10" id="ClientClientPlace">
<option value="">--- Select Place ---</option>
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
		</div>
	</div>

	

	<div class="formSep">
		<div class="row-fluid">
			<div class="span4">
				<label>Client Address</label>
				<textarea name="data[Client][client_address]" class="span12" cols="8" rows="4" id="ClientClientAddress"></textarea>			</div>
		</div>
	</div>

	<div class="form-actions">
		<button class="btn btn-inverse" type="submit">Save changes</button>
		<a href="/clients" class="btn">Cancel</a>	</div>

</form>



<script type="text/javascript">
	
	$(document).ready(function() {
		//* regular validation
		gebo_validation.reg();
	});

	//* validation

	gebo_validation = {

		reg: function() {

            reg_validator = $('.form_validation_reg').validate({

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
					'data[Client][client_name]': { required: true },
					'data[Client][contact_person]': { required: true },
					'data[Client][contact_no]': { required: true, number:true, minlength:10 },
					'data[Client][email_address]': { required: true, email:true }
				},

                invalidHandler: function(form, validator) {

					$.sticky("There are some errors. Please corect them and submit again.", {autoclose : 5000, position: "top-right", type: "st-error" });

				}

            })

        }

	};

</script>

            
                    
                   	     

                   
                </div>
</div>
	</body>
</html>
