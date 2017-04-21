<?php
/*
UserCake Version: 2.0.2
http://usercake.com
*/

require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}
require_once("models/header.php");
require_once("models/header.php");
include("top-nav.php");
$party = new Party();
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
        <h3 class="heading">Party  List <a href="orders.php" class="btn btn-warning" style="font-size:19px">Order</a></h3>
        <table class="table table-bordered table-striped table_vam" id="index">
          <thead>
            <tr class="guj">
                <th></th>
                <th>paaTI-nauM naama.</th>
                <th>gaama</th>
                <th>sarnaamau</th>
                <th>maao.1 /maao.2 / maao.3</th>
                <th>[mao[la</th>
                <th></th>
            </tr>
          </thead>
          <tbody>
            <?php 
			$party_list = $party->listParty('100');
///			mypr($party_list);
			$sr = 1;
			foreach($party_list as $one){
				
//				mypr($one);
			?>
            <tr class="guj">
              <td><?php echo str_pad($sr, 3, "0", STR_PAD_LEFT);?>&nbsp;</td>
              <td><?php echo $one['name'];?>&nbsp;</td>
              <td><?php echo $one['city_name'];?></td>
              <td><?php echo $one['address'];?></td>
              <td><?php echo $one['m1'];?>&nbsp;</br><?php echo $one['m2'];?>&nbsp;</br><?php echo $one['m3'];?>&nbsp;</td>
              <td><?php echo $one['mail'];?>&nbsp;</td>
              
              <td class="actions"><a href="party.edit.php?id=<?php echo $one['id'];?>">sauQaarao</a></td>
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