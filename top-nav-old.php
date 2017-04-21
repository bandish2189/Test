 <body>
		<div id="loading_layer" style="display:none">
			<img src="img/ajax_loader.gif" alt=""/>        </div>
		
		<div id="maincontainer" class="clearfix">
			
            <!-- header -->
            <header>
  <div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
      <div class="container-fluid"> 
	  	<a href="orders.php" class="brand">Transport System</a>        <!--<a class="brand" href=""><i class="icon-home icon-white"></i> Gebo Admin</a>-->
        <ul class="nav user_menu pull-right">
          <!--<li class="hidden-phone hidden-tablet">
            <div class="nb_boxes clearfix"> <a data-toggle="modal" data-backdrop="static" href="#myMail" class="label ttip_b" title="New messages">25 <i class="splashy-mail_light"></i></a> <a data-toggle="modal" data-backdrop="static" href="#myTasks" class="label ttip_b" title="New tasks">10 <i class="splashy-calendar_week"></i></a> </div>
          </li>-->
          <li class="divider-vertical hidden-phone hidden-tablet"></li>
          <li class="dropdown"> <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">Administartor <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <!--<li><a href="user_profile.html">My Profile</a></li>
              <li><a href="javascrip:void(0)">Another action</a></li>-->
              <li class="divider"></li>
              <li><a href="logins/logout">Log Out</a></li>
            </ul>
          </li>
        </ul>
        <a data-target=".nav-collapse" data-toggle="collapse" class="btn_menu"> <span class="icon-align-justify icon-white"></span> </a>
        <nav>
          <div class="nav-collapse">
            <ul class="nav">
              <li class="dropdown"> <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-list-alt icon-white"></i> Order <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="orders.add.php">New Order</a></li>
                  <li><a href="orders.php">List Orders</a></li>
                  <li><a href="orders.complate.list.php">Complete Order</a></li>                  
                  </ul>
              </li>
              <li class="dropdown"> <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-list-alt icon-white"></i> Client <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="clients.add.php">Add Client</a></li>
                  <li><a href="clients.php">List Clients</a></li>
                </ul>
              </li>
              <li class="dropdown"> <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-list-alt icon-white"></i> Party <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="parties">Add Party</a></li>
                  <li><a href="parties.php">List Parties</a></li>
                </ul>
              </li>
              <li class="dropdown"> <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-list-alt icon-white"></i> Billing <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="billing">Generate Bill</a></li>
                  <!--<li><a href="">Bills</a></li>
                  <li><a href="">Bill Payment</a></li>
                  <li><a href="">Cash Voucher</a></li>-->
                </ul>
              </li>
              
              <li class="dropdown"> <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-list-alt icon-white"></i> Truck Owner <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="truckowner.add.php">Add</a></li>
                  <li><a href="truckowner.php">List</a></li>
                </ul>
              </li>
              <li class="dropdown"> <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-list-alt icon-white"></i> Truck <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="truck.add.php">Add</a></li>
                  <li><a href="truck.php">List</a></li>
                </ul>
              </li>
              <li class="dropdown"> <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-list-alt icon-white"></i> Driver <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="driverRegisters/add">Add</a></li>
                  <li><a href="driverRegisters/add">List</a></li>
                </ul>
              </li>
              <li class="dropdown"> <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-list-alt icon-white"></i> Cash Vouchers <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="cashvoucher.php">List</a></li>
                </ul>
              </li>
              <li> </li>
            </ul>
          </div>
        </nav>
      </div>
    </div>
  </div>
  <div class="modal hide fade" id="myMail">
    <div class="modal-header">
      <button class="close" data-dismiss="modal">×</button>
      <h3>New messages</h3>
    </div>
    <div class="modal-body">
      <div class="alert alert-info">In this table jquery plugin turns a table row into a clickable link.</div>
      <table class="table table-condensed table-striped" data-rowlink="a">
        <thead>
          <tr>
            <th>Sender</th>
            <th>Subject</th>
            <th>Date</th>
            <th>Size</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Declan Pamphlett</td>
            <td><a href="javascript:void(0)">Lorem ipsum dolor sit amet</a></td>
            <td>23/05/2012</td>
            <td>25KB</td>
          </tr>
          <tr>
            <td>Erin Church</td>
            <td><a href="javascript:void(0)">Lorem ipsum dolor sit amet</a></td>
            <td>24/05/2012</td>
            <td>15KB</td>
          </tr>
          <tr>
            <td>Koby Auld</td>
            <td><a href="javascript:void(0)">Lorem ipsum dolor sit amet</a></td>
            <td>25/05/2012</td>
            <td>28KB</td>
          </tr>
          <tr>
            <td>Anthony Pound</td>
            <td><a href="javascript:void(0)">Lorem ipsum dolor sit amet</a></td>
            <td>25/05/2012</td>
            <td>33KB</td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="modal-footer"> <a href="javascript:void(0)" class="btn">Go to mailbox</a> </div>
  </div>
  <div class="modal hide fade" id="myTasks">
    <div class="modal-header">
      <button class="close" data-dismiss="modal">×</button>
      <h3>New Tasks</h3>
    </div>
    <div class="modal-body">
      <div class="alert alert-info">In this table jquery plugin turns a table row into a clickable link.</div>
      <table class="table table-condensed table-striped" data-rowlink="a">
        <thead>
          <tr>
            <th>id</th>
            <th>Summary</th>
            <th>Updated</th>
            <th>Priority</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>P-23</td>
            <td><a href="javascript:void(0)">Admin should not break if URL&hellip;</a></td>
            <td>23/05/2012</td>
            <td class="tac"><span class="label label-important">High</span></td>
            <td>Open</td>
          </tr>
          <tr>
            <td>P-18</td>
            <td><a href="javascript:void(0)">Displaying submenus in custom&hellip;</a></td>
            <td>22/05/2012</td>
            <td class="tac"><span class="label label-warning">Medium</span></td>
            <td>Reopen</td>
          </tr>
          <tr>
            <td>P-25</td>
            <td><a href="javascript:void(0)">Featured image on post types&hellip;</a></td>
            <td>22/05/2012</td>
            <td class="tac"><span class="label label-success">Low</span></td>
            <td>Updated</td>
          </tr>
          <tr>
            <td>P-10</td>
            <td><a href="javascript:void(0)">Multiple feed fixes and&hellip;</a></td>
            <td>17/05/2012</td>
            <td class="tac"><span class="label label-warning">Medium</span></td>
            <td>Open</td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="modal-footer"> <a href="javascript:void(0)" class="btn">Go to task manager</a> </div>
			<script>
				$(document).ready(function() {
					//* show all elements & remove preloader
					setTimeout('$("html").removeClass("js")',1000);
				});
			</script>

  </div>
</header>   