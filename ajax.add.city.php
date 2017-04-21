<?php
/*
UserCake Version: 2.0.2
http://usercake.com
*/

require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}
$city = new City();

//mypr($_POST);
$newCity = $city->ajaxInsert($_POST['cityname']);
mypr($newCity);

exit;
if(isset($_GET['term'])){
		$Trucklist = $truck->searchTruck($_GET['term']);
//mypr($list);
echo	json_encode($Trucklist);
	
}
//echo json_encode($list);
exit;
?>
<div class="row-fluid party_<?php echo $list['PartyId']; ?>">
    <div class="span3">
      <label>Party Name <span class="f_req">*</span></label>
      <input name="data[OrderTransportFreight][<?php echo $list['PartyId']; ?>][party_name]" <?php if(!(isset($noid))){ ?>readonly="readonly"<?php } ?> class="span12" value="<?php echo $list['PartyName']; ?>" type="text" id="OrderTransportFreightPartyName"/><input type="hidden" name="data[OrderTransportFreight][<?php echo $list['PartyId']; ?>][party_id]" value="<?php echo $list['PartyId']; ?>" id="OrderTransportFreightPartyId"/>      
    </div>
    <div class="span2">
      <label>Place<span class="f_req">*</span></label>
      <?php if(isset($noid)){ 
	  $citylist = $city->ListCity();
	  mypr($citylist);
      
	  
	  ?>
      <?php }else{ ?>
      <input name="data[OrderTransportFreight][<?php echo $list['PartyId']; ?>][party_place]" readonly class="span10"  id="PartyPartyPlace" type="hidden" value="<?php echo $list['PartyPlaceId']; ?>"/>  
      <input readonly class="span10" id="PartyPartyPlace" type="text" value="<?php echo $list['PartyPlace']; ?>"/>  
      <?php } ?>
    </div>
    <div class="span2">
      <label>Transport Fright<span class="f_req">*</span></label>
      <input name="data[OrderTransportFreight][<?php echo $list['PartyId']; ?>][transport_freight]" class="span10" maxlength="255" type="text" id="OrderTransportFreightTransportFreight"/>  
    </div>
    <div class="span2">
	  <label>Weight</label>
      <input name="data[OrderTransportFreight][<?php echo $list['PartyId']; ?>][weight]" class="span10" type="number" id="OrderTransportFreightWeight"/>      </div>
     <div class="span2">
	  <label>Note</label>
      <input name="data[OrderTransportFreight][<?php echo $list['PartyId']; ?>][note]" class="span10" maxlength="25" type="text" id="OrderTransportFreightNote"/>      </div>

    <div class="span1">
      <label> &nbsp;</label>
      <a href="javascript:void(0)" onclick="javascript:remove_party(this)"><i class="splashy-remove"></i></a>
    </div>
</div>

<script type="text/javascript">
  function remove_party(obj){
    $(obj).parent().parent().remove();
  }
</script>