<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
      <div class="container-fluid"> 
	  	<a href="orders.php" class="brand">BKRS SYSTEM <strong style="font-size:26px;"><?php echo $_SESSION['userCakeUser']->company['name']; ?></strong></a>        <!--<a class="brand" href=""><i class="icon-home icon-white"></i> Gebo Admin</a>-->
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
                  <li><a href="orders_date.php">Change Date</a></li>    
                   <li><a href="orders.mail.php">Mail Order</a></li>                  
                  </ul>
              </li>
              
              
              <li class="dropdown"> <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-list-alt icon-white"></i> Party <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="party.add.php">Add Party</a></li>
                  <li><a href="parties.php">List Parties</a></li>
                </ul>
              </li>
              <li class="dropdown guj"> <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-list-alt icon-white"></i>rIpaaoT- <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="report-sell-buy.php">paaTI-naao KarId vaocaaNa </a></li>
                  <li><a href="full-year-report.php">AaKaa vaYa-naao rIpaaoT-</a></li>
                </ul>
              </li>
              <li><a href="city.php" class="guj">gaama</a></li>
              <li><a href="logout.php">Logout</a></li>

                	
              <li> </li>
            </ul>
          </div>
        </nav>
      </div>
    </div>
  </div>
  