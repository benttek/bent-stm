<!-- TOP BAR -->
<script>

		$(document).ready( function(){
		
		$('#time').load('clock.php');
		refresh();
		});
			function refresh()
			{
			setTimeout( function() {
	 		$('#time').load('clock.php');
			refresh();
			}, 3000);
			
			
			}

			

</script>

<div class="all-wrapper fixed-header">
  <div class="page-header">
  <div class="header-links"> 
      
      <div class="dropdown">
      <a href="#" data-toggle="dropdown" class="header-link clearfix">
	   <div class="user-name-w" id="time">
       <?php echo $today1;?>  
        </div></a>

      
    </div>
    

				<ul class="nav navbar-nav navbar-right custom_nav mobnav" id="top-menu">
                    <li class="active"><a href="dashboard.php">HOME</a></li>
                    <li><a href="#widget_chkin">Check In </a></li>
                    <li><a href="#widget_emps">Employees</a></li>
					<li><a href="#widget_booking">Booking</a></li>
                    <li><a href="bt_sysadmin.php">Settings</a></li>
                    <li><a href="bt_msgcenter.php?u=<?php echo $user;?>">Messages</a></li>
					<li><a href="#widget_rpts">Reports</a></li>
                    <li><a href="logout.php">Logout</a></li>
                 </ul>
	
  </div>
  
  
  
    </div> <!-- end top-bar 
	
	<a class="current logo hidden-xs" href="dashboard.php"><i class="fa"></i>MyCheck In</a>
	<a class="menu-toggler"  href="#"><i id="menu-toggler-click" class="fa fa-bars"></i></a>-->
