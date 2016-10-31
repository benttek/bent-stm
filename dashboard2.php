<?php
//session_start();

include('init.php');
include('configPDO.php');


("SET NAMES 'UTF8'");

$user=($_SESSION['username']);
//$user1=($_GET['u']);

//$lastordera = $_COOKIE['lastorder'];


$STM = $dbh->prepare("SELECT * FROM tbl_users WHERE username = '$user'");

    $STM->execute();

    $STMrecordsu = $STM->fetchAll();
    foreach($STMrecordsu as $u1)

$uimg = $u1['img'];	
$userida = $u1['id'];
$ugrp = $u1['ugroup'];

if($ugrp=="suser"){
header("location:udash.php?user=$user");	
} elseif ($ugrp=="manager"){
header("location:mdash.php?user=$user");			
}

//include('common_lang.php');

$STMD= $dbh->prepare("SELECT * FROM tbl_company");
    $STMD->execute();
    $row_company = $STMD->fetch();
	$totalRows_company = $row_company;
	
	
$coname = $row_company['url_name'];
$coimg = $row_company['logo'];
$imgwidth=$row_company['imgwidth'];
$imgheight=$row_company['imgheight'];



date_default_timezone_set('UTC');		
	
$today = date("Y-m-d");
$todayDate = date("Y-m-d g:i a");// current date
$currentTime = time($todayDate); //Change date into time
$timeAfterOneHour = ($currentTime-1);
$hourdiff = "+13"; 
$today1 = date("Y-m-d",time() + ($hourdiff * 3600));

/*

$STMd2 = $dbh->prepare("SELECT max(orderdate) as maxdate2 FROM tbl_ttgs GROUP BY orderdate");
				$STMd2->execute();
				foreach($STMd2 as $mdate2)
				
				$lastdate2=$mdate2['maxdate2'];
	
$STMc = $dbh->prepare("SELECT sum(guests) as gueststotal FROM tbl_ttgs WHERE orderdate='$lastdate2'");
    $STMc->execute();
    $row_c = $STMc->fetch();
	$totalRows_c = $row_c;
	
	$totalcust = ($row_c['gueststotal']);
	//$lastdate =($row_c['lastdate']);

*/	


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BENT MyCheck in - Admin</title>

	<link rel="shortcut icon" href="../favicon.ico" />

	<link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Font awesome css -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- smooth animate css file -->
    <link rel="stylesheet" href="css/animate.css"> 
    <!-- Main style css -->
    <link rel="stylesheet" href="style.css">
    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico" />
	
	

<link href="assets/modal/css/bootstrap-modal.css" rel="stylesheet">
<link href="assets/modal/css/bootstrap-modal-bs3patch.css" rel="stylesheet">

<link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
<!--
<link href="assets/css/bootstrap.css" rel="stylesheet">


<link rel='stylesheet' href='../assets/css/order.css'>
-->


<script src='assets/js/moment.min.js'></script>
<script src='assets/js/jquery.min.js'></script>
<script src='assets/js/jquery-ui.min.js'></script>
<script src='assets/js/fullcalendar.min.js'></script>
    
    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico"/>
    <!-- Google Fonts -->
    
    <link rel='stylesheet' href='assets/css/plugins/datatables/datatables.css'>
	<link rel='stylesheet' href='assets/css/plugins/datatables/bootstrap.datatables.css'>
	
	
  </head>

  <body>
  <!-- BEGIN PRELOADER 
  <div id="preloader">
    <div id="status">&nbsp;</div>
  </div>
  -->
  
  <!-- END PRELOADER -->

  <!-- START HEADER SECTION -->
  <header id="headerArea">
    <a href="#" class="scrollToTop"><i class="fa fa-angle-up"></i></a>
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="slider_area">           
          <div class="menuarea"> 
            <div class="navbar navbar-default navbar-fixed-top" role="navigation">
              <div class="container">
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                  <!-- For Text Logo -->
                 <a class="navbar-brand logo" href="#"><span>My</span>Check In</a>
                 <!-- For Img Logo -->
                  <!--  <a class="navbar-brand logo" href="#"><img src="img/logo.png" alt="logo"></a> -->
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                  <ul class="nav navbar-nav navbar-right custom_nav mobnav" id="top-menu">
                    <li class="active"><a href="#headerArea">HOME</a></li>
                    <li><a href="#emps">Employees </a></li>
                    <li><a href="#book">Booking</a></li>
                    <li><a href="#mygroup">My Group</a></li>
                    <li><a href="#setting">Settings</a></li>
                    <li><a href="#message"><span>XX</span> Messages</a></li>
                    <li><a href="logout.php">Logout</a></li>
                  </ul>
                </div><!--/.nav-collapse -->
              </div>
            </div>
          </div>
                  
        </div>
      </div>  
    </div>      
  </header>
  <!-- END HEADER SECTION -->
<br><br><br><br><br><br><br><br>
 <div class="row">
 
  <!-- START EMP SECTION -->
  <section id="emps">
    
    
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12">
                 
				<div class="table-responsive">
				<table class="table table-bordered table-hover datatable">
				  <thead>
					<tr>
					  <th width="5%"><?php echo $lang['emp_id']; ?>ID</th>
					  <th><?php echo $lang['INV_Part_Number']; ?>Name</th>
					  <th><?php echo $lang['INV_Product_Name']; ?>Mobile</th>
					  <th><?php echo $lang['INV_Description']; ?>Location</th>
					  <th><?php echo $lang['INV_Suppliers']; ?>Last Check In</th>
					  <th></th>
					</tr>
				  </thead>
				  <tbody>
				   <?php



    $STM = $dbh->prepare(" SELECT ID, first_name, last_name, mobile, usrnm, user, chkinlat, chkinlong, timestamp
     FROM tbl_employees l left outer join
          tbl_lastchkin i
          on i.user = l.usrnm");

    $STM->execute();

    $STMrecords1 = $STM->fetchAll();
    foreach($STMrecords1 as $row1)
	 
	
	{?>
			
			<tr>
              <td><?php echo $row1['ID'];?></td>
              <td><?php echo $row1['first_name']." ".$row1['last_name'];?></a></td>
              <td><?php echo $row1['mobile'];?></td>
              <td><a href=""><?php echo $row1['chkinlat'].",".$row1['chkinlong'];?></a></td>
              
			  <td><?php echo $row1['timestamp'];?></td>
              
			  <td class="text-right">
                
				<a href="#" class="btn btn-info btn-lg" data-toggle="modal" data-target="#editprod<?php echo $row8['productid'];?>"><i class="fa fa-times"></i><?php echo $lang['MENUB_Edit']; ?>View</a>
              </td>
            </tr> 

		
        <?php }
		
			?>
            
          </tbody>
        </table>
        </div>
		
		  <span data-toggle="modal" data-target="#addemp"><a href="#" data-toggle="tooltip" data-placement="top" data-original-title="Add New Employee"><i class="fa fa-plus"></i>Employee</a></span>
		  
		   <span data-toggle="modal" data-target="#addtask"><a href="#" data-toggle="tooltip" data-placement="top" data-original-title="Add New Employee"><i class="fa fa-plus"></i>Task</a></span>
               

          
        </div>
      </div>
    </div>
  </section>
  
  
  
    <section id="book">
   
    
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="pricelist_area">            
          <div class="single_pricelist_area">
            <div class="row">
              
                
                 <div>
                   <p>Booking2</p>
                 </div>
                 
               
             
            
     
          
            </div>
          </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  
      <section id="mygroup">
    <h1>My Group</h1>
    
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="pricelist_area">            
          <div class="single_pricelist_area">
            <div class="row">
              <div class="col-lg-3 col-md-6 col-sm-6">
                
                 <div >
                   <p>Groups</p>
                 </div>
                 
                
              </div>
            
     
          
            </div>
          </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  
  
  
        <section id="setting">
    <h1>Settings</h1>
    
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="pricelist_area">            
          <div class="single_pricelist_area">
            <div class="row">
              <div class="col-lg-3 col-md-6 col-sm-6">
                
                 <div>
                   <p>Settings</p>
                 </div>
                 
                
              </div>
            
     
          
            </div>
          </div>
          </div>
        </div>
      </div>
    </div>
  </section>
          <!-- BEGAIN GOOGLE MAP -->
          <div class="google_map wow fadeInUp">                         
            <div id="map_canvas"></div>
          </div>
        </div>
      </div>
    </div>
  </section>

</div> <!-- row close -->
  <!-- END CONTACT SECTION -->

  <!-- START FOOTER SECTION -->
  <footer id="footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="footer_area">
            <p>Designed By <a href="#" rel="nofollow">BENT Labs</a></p>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- END FOOTER SECTION -->
  
  <!-- Modal SECTION -->

<div class="modal fade" id="addemp">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="widget widget-blue">
        <div class="widget-title">

          <h3><i class="fa fa-ok-circle"></i>Add New Employee</h3>
        </div>
        <div class="widget-content">
          <div class="modal-body">

            <form action="db_addemp.php" method="post" id="addcont_form" role="form" class="form-horizontal">
              <div class="form-group">
                  <div class="col-sm-12 fa-align-right">
                  <input type="textarea" class="form-control" name="task_desc" id="task_desc" placeholder="Task Description">
                </div>
                </div>
               
			   <div class="form-group">
                 <div class="col-md-6 fa-align-right">
                
				   <select name="emptype" id="emptype" class="form-control">
            	  <option value="0">--- Module ---</option>
 <?php

    $STM = $dbh->prepare("SELECT * FROM lut_modules");

    $STM->execute();

    $STMrecords9 = $STM->fetchAll();
    foreach($STMrecords9 as $row9)
        { ?><option value="<?php echo $row9['moduleid'];?>"><?php echo $row9['module'].' '.$row9['module_th'] ;?> </option>
                 <?php  } ?>  
                  </select>  
                </div>
                </div>
			   
               <div class="form-group">
                 <div class="col-md-6 fa-align-right">
                
				   <select name="assignto" id="assignto" class="form-control">
            	  <option value="0">---Assigned To---</option>
 <?php

    $STM = $dbh->prepare("SELECT * FROM  tbl_users");

    $STM->execute();

    $STMrecords3 = $STM->fetchAll();
    foreach($STMrecords3 as $row3)
        { ?><option value="<?php echo $row3['id'];?>"><?php echo $row3['fname'].' '.$row3['lname'] ;?> </option>
                 <?php  } ?>  
                  </select>  
                </div>
                
                 <div class="col-md-6 fa-align-right">
                
				   <select name="assignby" id="assignby" class="form-control">
            	  <option value="0">---Assign By---</option>
 <?php

    $STM = $dbh->prepare("SELECT * FROM  tbl_users");

    $STM->execute();

    $STMrecords3a = $STM->fetchAll();
    foreach($STMrecords3a as $row3)
        { ?><option <?php if($userida == $row3['id']){echo("selected");}?> value="<?php echo $row3['id'];?>"><?php echo $row3['fname'].' '.$row3['lname'] ;?> </option>
                 <?php  } ?>  
                  </select>  
                </div>
                </div>
                <div class="form-group">
                <div class="col-md-6 fa-align-left">
				 <div class="input-group">
				 <input type="date" name="startdate" value="" id="startdate" placeholder="Start Date" class="form-control input-datepicker">
                  <span class="input-group-addon"></span>
				  </div>
                </div>
                              
                <div class="col-md-6 fa-align-right">
				 <div class="input-group">
				<input type="date" name="duedate" id="duedate" placeholder="Due Date" class="form-control input-datepicker">
                  <span class="input-group-addon"></span>
                 </div> 
                </div>
                </div>
                <div class="form-group">
				<div class="col-md-6 fa-align-right">
			   <div class="input-group">
                  <input type="time" name="due_time" id="due_time" placeholder="Due Time" class="form-control input-timepicker">
                  <span class="input-group-addon"></span>
                </div>
                </div>
                </div>
                
                 <div class="form-group">
                <div class="col-md-6 fa-align-left">
                 <select class="form-control" name="customer" id="customeradd"  >
						<option value="0">---Customer---</option>
						<?php

						$STM = $dbh->prepare("SELECT * FROM  tbl_customer ORDER BY cust_name ASC");

						$STM->execute();

						$STMCUST = $STM->fetchAll();
						foreach($STMCUST as $cust)
						{ ?><option value="<?php echo $cust['cust_ID'];?>"><?php echo $cust['cust_name'] ;?> </option>
						<?php  } ?>  
						</select>  
                </div>
                
                
               
                
                <div class="col-md-6 fa-align-right">
                 	<div id="selectonchange" style="display:none;">
				
				  </div>					
						
                  </div>
                  </div>
				  
                 <div class="form-group">
                 <div class="col-md-12 fa-align-right">
                <input type="text" class="form-control" name="task_notes" id="task_notes" placeholder="Task Notes">
                </div>
                </div> 
                 
				  
                <div class="form-group">
                <div class="col-md-offset-3 col-lg-10">
                <input type="submit" name="submit" id="submit" class="btn btn-info" value="Save">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  
                </div> 
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>





  
  
  <div class="modal fade" id="addtask" tabindex="-1" role="dialog" aria-labelledby="addtaskLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="widget widget-blue">
        <div class="widget-title">

          <h3><i class="fa fa-ok-circle"></i>Add New Task</h3>
        </div>
        <div class="widget-content">
          <div class="modal-body">

            <form action="db_addtaskdash.php" method="post" id="addcont_form" role="form" class="form-horizontal">
              <div class="form-group">
                  <div class="col-sm-12 fa-align-right">
                  <input type="textarea" class="form-control" name="task_desc" id="task_desc" placeholder="Task Description">
                </div>
                </div>
               
			   <div class="form-group">
                 <div class="col-md-6 fa-align-right">
                
				   <select name="module" id="module" class="form-control">
            	  <option value="0">--- Module ---</option>
 <?php

    $STM = $dbh->prepare("SELECT * FROM lut_modules");

    $STM->execute();

    $STMrecords9 = $STM->fetchAll();
    foreach($STMrecords9 as $row9)
        { ?><option value="<?php echo $row9['moduleid'];?>"><?php echo $row9['module'].' '.$row9['module_th'] ;?> </option>
                 <?php  } ?>  
                  </select>  
                </div>
                </div>
			   
               <div class="form-group">
                 <div class="col-md-6 fa-align-right">
                
				   <select name="assignto" id="assignto" class="form-control">
            	  <option value="0">---Assigned To---</option>
 <?php

    $STM = $dbh->prepare("SELECT * FROM  tbl_users");

    $STM->execute();

    $STMrecords3 = $STM->fetchAll();
    foreach($STMrecords3 as $row3)
        { ?><option value="<?php echo $row3['id'];?>"><?php echo $row3['fname'].' '.$row3['lname'] ;?> </option>
                 <?php  } ?>  
                  </select>  
                </div>
                
                 <div class="col-md-6 fa-align-right">
                
				   <select name="assignby" id="assignby" class="form-control">
            	  <option value="0">---Assign By---</option>
 <?php

    $STM = $dbh->prepare("SELECT * FROM  tbl_users");

    $STM->execute();

    $STMrecords3a = $STM->fetchAll();
    foreach($STMrecords3a as $row3)
        { ?><option <?php if($userida == $row3['id']){echo("selected");}?> value="<?php echo $row3['id'];?>"><?php echo $row3['fname'].' '.$row3['lname'] ;?> </option>
                 <?php  } ?>  
                  </select>  
                </div>
                </div>
                <div class="form-group">
                <div class="col-md-6 fa-align-left">
				 <div class="input-group">
				 <input type="date" name="startdate" value="" id="startdate" placeholder="Start Date" class="form-control input-datepicker">
                  <span class="input-group-addon"></span>
				  </div>
                </div>
                              
                <div class="col-md-6 fa-align-right">
				 <div class="input-group">
				<input type="date" name="duedate" id="duedate" placeholder="Due Date" class="form-control input-datepicker">
                  <span class="input-group-addon"></span>
                 </div> 
                </div>
                </div>
                <div class="form-group">
				<div class="col-md-6 fa-align-right">
			   <div class="input-group">
                  <input type="time" name="due_time" id="due_time" placeholder="Due Time" class="form-control input-timepicker">
                  <span class="input-group-addon"></span>
                </div>
                </div>
                </div>
                
                 <div class="form-group">
                <div class="col-md-6 fa-align-left">
                 <select class="form-control" name="customer" id="customeradd"  >
						<option value="0">---Customer---</option>
						<?php

						$STM = $dbh->prepare("SELECT * FROM  tbl_customer ORDER BY cust_name ASC");

						$STM->execute();

						$STMCUST = $STM->fetchAll();
						foreach($STMCUST as $cust)
						{ ?><option value="<?php echo $cust['cust_ID'];?>"><?php echo $cust['cust_name'] ;?> </option>
						<?php  } ?>  
						</select>  
                </div>
                
                
               
                
                <div class="col-md-6 fa-align-right">
                 	<div id="selectonchange" style="display:none;">
				
				  </div>					
						
                  </div>
                  </div>
				  
                 <div class="form-group">
                 <div class="col-md-12 fa-align-right">
                <input type="text" class="form-control" name="task_notes" id="task_notes" placeholder="Task Notes">
                </div>
                </div> 
                 
				  
                <div class="form-group">
                <div class="col-md-offset-3 col-lg-10">
                <input type="submit" name="submit" id="submit" class="btn btn-info" value="Save">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  
                </div> 
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
  
  

  <!-- JQuery Files -->

<script src="assets/modal/js/bootstrap-modal.js"></script>
<script src="assets/modal/js/bootstrap-modalmanager.js"></script>

<!--
<script src='assets/js/plugins/jquery.pnotify.js'></script>
<script src='assets/js/plugins/jquery.sparkline.min.js'></script>
<script src='assets/js/plugins/mwheelIntent.js'></script>
<script src='assets/js/plugins/mousewheel.js'></script>
<script src='assets/js/bootstrap/tab.js'></script>
<script src='assets/js/bootstrap/dropdown.js'></script>
<script src='assets/js/bootstrap/tooltip.js'></script>
<script src='assets/js/bootstrap/collapse.js'></script>
<script src='assets/js/bootstrap/scrollspy.js'></script>
<script src='assets/js/plugins/bootstrap-datepicker.js'></script>
<script src='assets/js/bootstrap/transition.js'></script>
<script src='assets/js/plugins/jquery.knob.js'></script>
<script src='assets/js/plugins/jquery.flot.min.js'></script>
<script src='assets/js/plugins/datatables/datatables.min.js'></script>
<script src='assets/js/plugins/chosen.jquery.min.js'></script>
<script src='assets/js/plugins/jquery.timepicker.min.js'></script>
<script src='assets/js/plugins/daterangepicker.js'></script>
<script src='assets/js/plugins/colpick.js'></script>
<script src='assets/js/plugins/moment.min.js'></script>
<script src='assets/js/plugins/datatables/bootstrap.datatables.js'></script>
<script src='assets/js/bootstrap/modal.js'></script>
<script src='assets/js/plugins/raphael-min.js'></script>
<script src='assets/js/plugins/morris-0.4.3.min.js'></script>
<script src='assets/js/plugins/justgage.1.0.1.min.js'></script>
<script src='assets/js/plugins/jquery.maskedinput.min.js'></script>
<script src='assets/js/plugins/jquery.maskmoney.js'></script>
<script src='assets/js/plugins/summernote.js'></script>
<script src='assets/js/plugins/dropzone-amd-module.js'></script>
<script src='assets/js/plugins/jquery.validate.min.js'></script>
<script src='assets/js/plugins/jquery.bootstrap.wizard.min.js'></script>
<script src='assets/js/plugins/jscrollpane.min.js'></script>
<script src='assets/js/application.js'></script>

-->

  </body>
</html>