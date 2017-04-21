<?php
/*
UserCake Version: 2.0.2
http://usercake.com
*/

require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}
$party = new Party();
$city = new City();
//mypr($_POST['party_id']);
$list = $party->Getparty($_POST['party_id']);
$ran = rand();
//mypr($list);
if(!(count($list['PartyId'])>0)){
	$noid = 'noid';
	
	}
//echo json_encode($list);
//exit;
?>
<div class="row-fluid party_<?php echo $list['PartyId']; ?> " style="    padding: 8px 0px 8px 5px; color: #c09853; background-color: #fcf8e3; border: 1px solid #fbeed5;    -webkit-border-radius: 4px;    -moz-border-radius: 4px;    border-radius: 4px;">
    <div class="span11">
    <div class="row-fluid">
    <div class="span4">
      <label>Party Name <span class="f_req">*</span></label>
      <input name="data[OrderTransportFreight][<?php if(!(isset($noid))){echo $list['PartyId'];}else{echo'new'.$ran;} ?>][party_name]" <?php if(!(isset($noid))){ ?>readonly="readonly"<?php } ?> class="span12" value="<?php echo $list['PartyName']; ?>" type="text" id="OrderTransportFreightPartyName"/><input type="hidden" name="data[OrderTransportFreight][<?php if(!(isset($noid))){echo $list['PartyId'];}else{echo'new'.$ran;} ?>][party_id]" value="<?php echo $list['PartyId']; ?>" id="OrderTransportFreightPartyId"/>  
      <input type="hidden" name="data[OrderTransportFreight][<?php if(!(isset($noid))){echo $list['PartyId'];}else{echo'new'.$ran;} ?>][id]" value="<?php echo $list['PartyId']; ?>" />      
    </div>
    <div class="span4">
      <label>Place<span class="f_req">*</span></label>
      <?php if(isset($noid)){ 
	  $citylist = $city->ListCity();
	  
//	  mypr($citylist);
?>
	  <select name="data[OrderTransportFreight][<?php if(!(isset($noid))){echo $list['PartyId'];}else{echo'new'.$ran;} ?>][party_place]" class="span10" >
			<option value="">-select-</option>
            <?php
	  foreach($citylist as $ci){
		echo '<option value="'.$ci['CityId'].'">'.$ci['CityName'].'</option>';
		  }
      echo'</select>';
	  
	  ?>
      <?php }else{ ?>
      <input name="data[OrderTransportFreight][<?php if(!(isset($noid))){echo $list['PartyId'];}else{echo'new'.$ran;} ?>][party_place]" readonly class="span10"  id="PartyPartyPlace" type="hidden" value="<?php echo $list['PartyPlaceId']; ?>"/>  
      <input readonly class="span10" id="PartyPartyPlace" type="text" value="<?php echo $list['PartyPlace']; ?>"/>  
      <?php } ?>
    </div>
    <div class="span4">
      <label>Transport Fright<span class="f_req">*</span></label>
      <input name="data[OrderTransportFreight][<?php if(!(isset($noid))){echo $list['PartyId'];}else{echo'new'.$ran;} ?>][transport_freight]" class="span10" maxlength="255" type="text" id="OrderTransportFreightTransportFreight"/>  
    </div>
    </div>
    <div class="row-fluid">
    <div class="span4">
	  <label>Weight</label>
      <input name="data[OrderTransportFreight][<?php if(!(isset($noid))){echo $list['PartyId'];}else{echo'new'.$ran;} ?>][weight]" class="span10" type="number" id="OrderTransportFreightWeight"/>      </div>
      <div class="span4">
      <label>Actual Weight</label>
      <input name="data[OrderTransportFreight][<?php if(!(isset($noid))){echo $list['PartyId'];}else{echo'new'.$ran;} ?>][actual_weight]" class="span10" type="number" id="OrderTransportFreightActualWeight"/>      </div>
     <div class="span4">
	  <label>Note</label>
      <input name="data[OrderTransportFreight][<?php if(!(isset($noid))){echo $list['PartyId'];}else{echo'new'.$ran;} ?>][note]" class="span10" maxlength="25" type="text" id="OrderTransportFreightNote"/>      </div>
   </div>
   </div>

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