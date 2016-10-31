<?php
session_start();

include('init.php');
include('configPDO.php');


("SET NAMES 'UTF8'");

$user=$_SESSION['username'];
//$user1=($_GET['u']);
$STM = $dbh->prepare("SELECT * FROM tbl_users WHERE username = '$user' OR username='$user1'");

    $STM->execute();

    $STMrecordsu = $STM->fetchAll();
    foreach($STMrecordsu as $u1)


$uimg = $u1['img'];	
$userida = $u1['id'];
$ugrp = $u1['ugroup'];


//include('common_lang.php');

$STMD= $dbh->prepare("SELECT * FROM tbl_company");
    $STMD->execute();
    $row_company = $STMD->fetch();
	$totalRows_company = $row_company;
	
	
$coname = $row_company['url_name'];
$coimg = $row_company['logo'];
$imgwidth=$row_company['imgwidth'];
$imgheight=$row_company['imgheight'];

$STMMM= $dbh->prepare("SELECT count(*) as countm FROM tbl_mail WHERE msgto='$user' AND status='new'");
    $STMMM->execute();
      ;

    $STMrecordsum = $STMMM->fetchAll();
    foreach($STMrecordsum as $mu1)
	

	$cntmail= $mu1['countm'];
	
date_default_timezone_set('UTC');	
	
$today = date("Y-m-d");
$todayDate = date("Y-m-d g:i a");// current date
$currentTime = time($todayDate); //Change date into time
$timeAfterOneHour = ($currentTime-1);
$hourdiff = "+13"; 
$today1 = date("Y-m-d",time() + ($hourdiff * 3600));


?>

<!DOCTYPE html>
<html>

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>MyCheck In - Admin</title>
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script src="https://js.pusher.com/3.0/pusher.min.js"></script>

<script src="https://code.jquery.com/jquery-latest.js"></script> 
<!--
<script src="//js.pusher.com/3.0/pusher.min.js"></script>
-->     


<style>
.datepicker {
z-index: 99999 !important;
}

</style>
   <link rel="shortcut icon" href="favicon.ico" />
   <link href="assets/css/bootstrap.min.css" rel="stylesheet">
   <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
<link rel='stylesheet' href='assets/css/plugins/fullcalendar.css'>
<link rel='stylesheet' href='assets/css/plugins/datatables/datatables.css'>
<link rel='stylesheet' href='assets/css/plugins/datatables/bootstrap.datatables.css'>
<link rel='stylesheet' href='assets/css/plugins/chosen.css'>
<link rel='stylesheet' href='assets/css/plugins/jquery.timepicker.css'>
<link rel='stylesheet' href='assets/css/plugins/daterangepicker-bs3.css'>
<link rel='stylesheet' href='assets/css/plugins/colpick.css'>
<link rel='stylesheet' href='assets/css/plugins/dropzone.css'>
<link rel='stylesheet' href='assets/css/plugins/jquery.handsontable.full.css'>
<link rel='stylesheet' href='assets/css/plugins/jscrollpane.css'>
<link rel='stylesheet' href='assets/css/plugins/jquery.pnotify.default.css'>
<link rel='stylesheet' href='assets/css/plugins/jquery.pnotify.default.icons.css'>


<link rel="stylesheet" href="https://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css" />


  
  <link rel='stylesheet' href='assets/css/app.css'>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!--
<link rel='stylesheet' href='assets/css/all.css'>

<script src="assets/js/all.js" type="text/javascript" charset="UTF-8"></script>

 <link href='https://fonts.googleapis.com/css?family=Roboto:100,300,400,700|Roboto+Condensed:300,400,700' rel='stylesheet' type='text/css'>
-->
 

  <link href="favicon.ico" rel="shortcut icon">
  <link href="assets/apple-touch-icon.png" rel="apple-touch-icon">

  
  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
    @javascript html5shiv respond.min
  <![endif]-->

  
  
   <script type="text/javascript">
		function MM_openBrWindow(theURL,winName,features) {
		window.open(theURL,winName,features);
		}
        </script>
		
<script>
  function resizeIframe(obj) {
    obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
  }
</script>


<script type="text/javascript">
$(function(){
    $(document).ready(function(){
        $.ajaxSetup({cache: false});
    });
    getStatus();
});
function getStatus() {
    $('div#toplinks').load('ajax_stream.php').fadeIn("slow");
    setTimeout("getStatus()",3000);  // refresh every 30000 milliseconds (30 seconds)
}
</script>

        
</head>

<body class="glossed">


<?php require("top_bar.php"); ?>

  <div class="main-content">
    
<div><!--<img src="<?php echo $coimg ;?>" width="280" height="auto" alt="BENT MYCheck in" Vspace="20">
--></div>

<div class="text-center">					

	
	<div class="row">
		
		
	<div class="toplinks" id="toplinks">	
		<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
			<a href="#widget-emps">
				<button type="button" class="btn btn-action btn-lg btn-round btn-default btn-action" style="display: block; width: 100%;"><i class="fa fa-group "></i>Employees</button>
				
				
			</a>
		</div>
		<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
			<a href="#booking">
				<button type="button" class="btn btn-action btn-lg btn-round btn-default btn-action" style="display: block; width: 100%;"><i class="fa fa-table"></i>Booking</button>
				
			</a>
		</div>
		
		<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
			<a href="bt_cal/cal1.php?u=<?php echo $user;?>">
				<button type="button" class="btn btn-action btn-lg btn-round btn-default btn-action" style="display: block; width: 100%;"><i class="fa fa-calendar"></i>Calendar</button>
			</a>
		</div>
		
		<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
			<a href="bt_msgcenter.php?u=<?php echo $user;?>">
				<button type="button" class="btn btn-action btn-lg btn-round btn-default btn-action" style="display: block; width: 100%;"><i class="fa fa-envelope"></i><?php echo $cntmail;?> - Messages</button>
				
			</a>
		</div>
		</div>
	</div>
</div>

<br><br>

  
    <div class="widget widget-purple">
      <span class="offset_anchor" id="widget_options"></span>
      <div class="widget-title">
        <div class="widget-controls">
  <a href="#" class="widget-control widget-control-full-screen" data-toggle="tooltip" data-placement="top" title="" data-original-title="Full Screen / เต็มจอ"><i class="fa fa-expand"></i></a>
  <a href="#" class="widget-control widget-control-full-screen widget-control-show-when-full" data-toggle="tooltip" data-placement="left" title="" data-original-title="Exit Full Screen"><i class="fa fa-expand"></i></a>
  <a href="#" class="widget-control widget-control-refresh" data-toggle="tooltip" data-placement="top" title="" data-original-title="Refresh / รีเฟรช"><i class="fa fa-refresh"></i></a>
  <a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip" data-placement="top" title="" data-original-title="Minimize / ลดส่วน"><i class="fa fa-minus-circle"></i></a>
  <a href="#" class="widget-control widget-control-remove" data-toggle="tooltip" data-placement="top" title="" data-original-title="Remove / ปิดออก"><i class="fa fa-times-circle"></i></a>
</div>
		<h3><i class="fa fa-table"></i><?php echo $lang['DASH_Shortcuts']; ?>Quick Links</h3>
		</div>
      <div class="widget-content">
		<div class="row">
              <div class="col-md-3" align="center">
				
				<span data-toggle="modal" data-target="#addemp"><a href="#" class="widget-control btn btn-lg btn-primary" style="color: white;" data-toggle="tooltip" data-placement="top" data-original-title="Add Employee"><i class="fa fa-plus"></i> Employee</a></span>
				
              </div>
			   <div class="col-md-3" align="center">
				<a href= "bt_sales.php#widget_browse" class="btn btn-lg btn-primary"><i class="fa fa-plus"></i>Event</a>
              </div>
			  <div class="col-md-3" align="center">
				<a href= "bt_sales.php#widget_browse" class="btn btn-lg btn-primary"><?php echo $lang['DASH_Reports']; ?><i class="fa fa-plus"></i>Message</a>
              </div>
			  <div class="col-md-3" align="center">
				<a href= "bt_sales.php#widget_browse" class="btn btn-lg btn-primary"><?php echo $lang['DASH_Employees']; ?><i class="fa fa-plus"></i>Booking</a>
              </div>
            </div>
		</div>
    </div>
  


<br><br>

   <div class="widget widget-purple">
      <span class="offset_anchor" id="widget_chkin"></span>
      <div class="widget-title">
              <div class="widget-controls">
  
  <a href="#" class="widget-control widget-control-settings"><i class=""></i></a>
  <a href="#" class="widget-control widget-control-full-screen" data-toggle="tooltip" data-placement="top" title="" data-original-title="Full Screen / เต็มจอ"><i class="fa fa-expand"></i></a>
  <a href="#" class="widget-control widget-control-full-screen widget-control-show-when-full" data-toggle="tooltip" data-placement="left" title="" data-original-title="Exit Full Screen / ออกจากเต็มหน้าจอ"><i class="fa fa-expand"></i></a>
  <a href="#" class="widget-control widget-control-refresh" data-toggle="tooltip" data-placement="top" title="" data-original-title="Refresh / รีเฟรช"><i class="fa fa-refresh"></i></a>
  <a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip" data-placement="top" title="" data-original-title="Minimize / ลดส่วน"><i class="fa fa-minus-circle"></i></a>
  <a href="#" class="widget-control widget-control-remove" data-toggle="tooltip" data-placement="top" title="" data-original-title="Remove / ปิดออก"><i class="fa fa-times-circle"></i></a>
</div>
        <h3><i class="fa fa-table"></i>Check In</h3>
      </div>
      <div class="widget-content">
        <div class="table-responsive">
				<table class="table table-bordered table-hover datatable">
				  <thead>
					<tr>
					  <th width="5%"><?php echo $lang['emp_id']; ?>ID</th>
					  <th><?php echo $lang['INV_Part_Number']; ?>Name</th>
					  <th><?php echo $lang['INV_Product_Name']; ?>Location</th>
					  <th><?php echo $lang['INV_Description']; ?>Last Check In</th>
					  <th><?php echo $lang['INV_Suppliers']; ?>Image</th>
					  <th></th>
					</tr>
				  </thead>
				  <tbody>
				   <?php


	/*  SAVE THIS QUERY
    $STM = $dbh->prepare(" SELECT ID, first_name, last_name, mobile, usrnm, user, chkinlat, chkinlong, timestamp, chkindate, chkintime, chkin_id
     FROM tbl_employees l left outer join
          tbl_lastchkin i
          on i.user = l.usrnm");
	*/
	
	$STM = $dbh->prepare("SELECT t1.* FROM tbl_chkin t1 WHERE t1.timestamp = (SELECT MAX(t2.timestamp) FROM tbl_chkin t2 WHERE t2.user = t1.user)");	  
    $STM->execute();

    $STMrecords1 = $STM->fetchAll();
    foreach($STMrecords1 as $row1)
	 
	
	{?>
			
			<tr>
              <td><?php echo $row1['chkin_id'];?></td>
              <td><?php echo $row1['user'];?></a></td>
              <td><a href="bt_a_lstchkin.php?lci=<?php echo $row1['chkin_id'];?>&u=<?php echo $row1['user'];?>"><?php echo $row1['chkin_id']." - ".$row1['chkinlat'].",".$row1['chkinlong'];?><br></a></td>
              <td><?php echo $row1['chkindate']." - ".$row1['chkintime'];?></td>
              
			  <td><img src="<?php echo $row1['chkinimg'];?>" width="50" height="auto"/></td>
              
			  <td class="text-right">
                
							
				<a href="javascript;:"onclick="MM_openBrWindow('bt_a_lstchkin.php?lci=<?php echo $row1['chkin_id'];?>&u=<?php echo $row1['user'];?>','','scrollbars=yes,width=50%,height=auto');return false" class="btn btn-primary btn-lg">View</a>
				
				<a href="bt_chkinhist.php?usr1=<?php echo $row1['user'];?>" class="btn btn-info btn-lg"> <?php echo $lang['MENUB_Edit']; ?>History</a>
              </td>
            </tr> 

		
        <?php }
		
			?>
            
          </tbody>
        </table>
        </div>
      </div>
    </div>
	
   <div class="widget widget-purple">
      <span class="offset_anchor" id="widget_emps"></span>
      <div class="widget-title">
              <div class="widget-controls">
  <span data-toggle="modal" data-target="#addemp"><a href="#" class="widget-control" data-toggle="tooltip" data-placement="top" data-original-title="Add New Employee"><i class="fa fa-plus"></i>Employee</a></span>
  <a href="#" class="widget-control widget-control-settings"><i class=""></i></a>
  <a href="#" class="widget-control widget-control-full-screen" data-toggle="tooltip" data-placement="top" title="" data-original-title="Full Screen / เต็มจอ"><i class="fa fa-expand"></i></a>
  <a href="#" class="widget-control widget-control-full-screen widget-control-show-when-full" data-toggle="tooltip" data-placement="left" title="" data-original-title="Exit Full Screen / ออกจากเต็มหน้าจอ"><i class="fa fa-expand"></i></a>
  <a href="#" class="widget-control widget-control-refresh" data-toggle="tooltip" data-placement="top" title="" data-original-title="Refresh / รีเฟรช"><i class="fa fa-refresh"></i></a>
  <a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip" data-placement="top" title="" data-original-title="Minimize / ลดส่วน"><i class="fa fa-minus-circle"></i></a>
  <a href="#" class="widget-control widget-control-remove" data-toggle="tooltip" data-placement="top" title="" data-original-title="Remove / ปิดออก"><i class="fa fa-times-circle"></i></a>
</div>
        <h3><i class="fa fa-table"></i>Employees</h3>
      </div>
      <div class="widget-content">
        <div class="table-responsive">
				<table class="table table-bordered table-hover datatable">
				  <thead>
					<tr>
					  <th width="5%"><?php echo $lang['emp_id']; ?>ID</th>
					  <th><?php echo $lang['INV_Part_Number']; ?>Name</th>
					  <th><?php echo $lang['INV_Product_Name']; ?>Mobile</th>
					  <th><?php echo $lang['INV_Description']; ?>Email</th>
					  <th><?php echo $lang['INV_Suppliers']; ?>Profile Image</th>
					  <th></th>
					</tr>
				  </thead>
				  <tbody>
				   <?php


	//  SAVE THIS QUERY
    $STMe1 = $dbh->prepare("SELECT * FROM tbl_employees l left outer join tbl_users i on i.username = l.usrnm");
	  
    $STMe1->execute();

    $STMrecords1e1 = $STMe1->fetchAll();
    foreach($STMrecords1e1 as $e1)
	 
	
	{?>
			
			<tr>
              <td><?php echo $e1['ID'];?></td>
              <td><?php echo $e1['first_name']." ".$e1['last_name'];?></td>
              <td><?php echo $e1['mobile'];?></td>
              <td><?php echo $e1['1.email'];?></td>
              
			  <td><img src="<?php echo $e1['img'];?>" width="50" height="auto"/></td>
              
			  <td class="text-right">
                
							
				<a href="bt_empdetail.php?usr1=<?php echo $e1['user'];?>" class="btn btn-lg btn-round btn-primary"><?php echo $lang['MENUB_Edit']; ?>View</a>
				
              </td>
            </tr> 

		
        <?php }
		
			?>
            
          </tbody>
        </table>
        </div>
      </div>
    </div>

<!-- end notification widget -->



<!-- task widget -->

   <div class="widget widget-red">
      <span class="offset_anchor" id="widget_calendar"></span>
      <div class="widget-title">
              <div class="widget-controls">
  <span data-toggle="modal" data-target="#addtask"><a href="#" class="widget-control" data-toggle="tooltip" data-placement="top" data-original-title="Add New Task"><i class="fa fa-plus"></i>Task</a></span>
  <a href="#" class="widget-control widget-control-settings"><i class=""></i></a>
  <a href="#" class="widget-control widget-control-full-screen" data-toggle="tooltip" data-placement="top" title="" data-original-title="Full Screen / เต็มจอ"><i class="fa fa-expand"></i></a>
  <a href="#" class="widget-control widget-control-full-screen widget-control-show-when-full" data-toggle="tooltip" data-placement="left" title="" data-original-title="Exit Full Screen"><i class="fa fa-expand"></i></a>
  <a href="#" class="widget-control widget-control-refresh" data-toggle="tooltip" data-placement="top" title="" data-original-title="Refresh / รีเฟรช"><i class="fa fa-refresh"></i></a>
  <a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip" data-placement="top" title="" data-original-title="Minimize / ลดส่วน"><i class="fa fa-minus-circle"></i></a>
  <a href="#" class="widget-control widget-control-remove" data-toggle="tooltip" data-placement="top" title="" data-original-title="Remove / ปิดออก"><i class="fa fa-times-circle"></i></a>
</div>
        <h3><i class="fa fa-table"></i><?php echo $lang['DASH_My_Tasks']; ?></h3>
      </div>
      <div class="widget-content">
        <div class="table-responsive">
        <table class="table table-bordered table-hover datatable">
          <thead>
            <tr>
			 <th><div class="checkbox"><input type="checkbox"></div></th>
             <th><?php echo $lang['DASH_My_Tasks']; ?></th>
			 <th><?php echo $lang['DASH_My_Tasks']; ?></th>
             <th><?php echo $lang['DASH_My_Tasks']; ?> </th>
             <th><?php echo $lang['DASH_My_Tasks']; ?></th>
             <th class="text-center" ><?php echo $lang['DASH_My_Tasks']; ?></th>
            </tr>
          </thead>
          <tbody>
           
		   <?php

    $STM = $dbh->prepare("SELECT * FROM calendar WHERE ORDER By S");

    $STM->execute();

    $STMrecords4 = $STM->fetchAll();
    foreach($STMrecords4 as $task)
        { ?>
			
			<tr>
			 <td><div class="checkbox"><input type="checkbox"></div></td>
              <td><a href="bt_taskdetails.php?taskid=<?php echo $task['taskid'];?>"><?php echo $task['taskid'];?></a></td>
			  <td><a href="bt_taskdetails.php?taskid=<?php echo $task['taskid'];?>"><?php echo $task['task_desc'];?></a></td>
              <td>
			  <?php 
			  $due = $task['duedate'];
			  
			  if ($due<$today1) {
			  ?>
			  <div class="label label-danger"><?php echo date('M d', strtotime($task['duedate']));?></div>
              <?php } elseif ($due==$today1) { ?>
              <div class="label label-warning"><?php echo date('M d', strtotime($task['duedate']));?></div>
              <?php } else {?>
              <div class="label label-success"><?php echo date('M d', strtotime($task['duedate']));?></div>
              <?php } ?>
              
              </td>
              
              
              <td><?php echo $task['status'];?></td>
			
              <td class="text-center">
                              
			  <div class="btn btn-default btn-xs" data-toggle="modal" data-target="#edittask<?php echo $task['taskid'];?>"><?php echo $lang['MENUB_Edit']; ?></div>
                
			   </td>
            </tr> 
        <?php }	?>
            
          </tbody>
        </table>
        <div class="label label-danger"> - Past Due Date / ที่ผ่านมาวันที่ครบกำหนด </div>
		<div class="label label-warning"> - Due Today / เนื่องจากวันนี้ </div>
		<div class="label label-success"> - Future Due / เนื่องจากในอนาคต </div>
				
		</div>
      </div>
    </div>

<!-- end task widget -->
	

</div>




  <div class="page-footer">
 © 2014 BENT Technology Labs, Inc.
</div>
</div>


<div id="map" class="modal fade">
    <div class="modal-dialog">
          <div class="modal-content">

          </div>
    </div>
</div>

<div class="modal fade" id="addemp" tabindex="-1" role="dialog" aria-labelledby="modalFormStyle1Label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="widget widget-purple">
        <div class="widget-title">
          <div class="widget-controls">
  
  <a href="#" class="widget-control widget-control-full-screen widget-control-show-when-full" data-toggle="tooltip" data-placement="left" title="" data-original-title="Exit Full Screen"><i class="fa fa-expand"></i></a>
  <a href="#" data-toggle="dropdown" class="widget-control widget-control-settings"><i class="fa fa-cog"></i></a>
  <a href="#" class="widget-control widget-control-refresh" data-toggle="tooltip" data-placement="top" title="" data-original-title="Refresh"><i class="fa fa-refresh"></i></a>
  <a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip" data-placement="top" title="" data-original-title="Minimize"><i class="fa fa-minus-circle"></i></a>
  
</div>
          <h3><i class="fa fa-ok-circle"></i>Add New User</h3>
        </div>
        <div class="widget-content">
          <div class="modal-body">

            <form action="db_adduser.php" method="post" id="adduser_form" class="form-horizontal">
              <div class="form-group">
                  <div class="col-sm-4 fa-align-right">
                  <input type="text" class="form-control input-md" name="username" id="username" placeholder="User Login Name">
                </div>
                <div class="col-sm-4 fa-align-right">
                  <input type="text" class="form-control input-md" name="password" id="password" placeholder="Password">
                </div>
				</div>
              
               <div class="form-group">
                 <div class="col-md-4 fa-align-right">
                  <input type="text" class="form-control input-md" name="fname" id="fname" placeholder="First Name">
                </div>
                <div class="col-md-4 fa-align-left">
                  <input type="text" class="form-control input-md" name="lname" id="lname" placeholder="Last Name">
                </div>
                <div class="col-md-4 fa-align-right">
                  <input type="text" class="form-control input-md" name="title" id="title" placeholder="Job Title">
                </div>
				</div>
 
                <div class="form-group">
                
                <div class="col-md-8 fa-align-right">
                <div class="btn-group" data-toggle="buttons">
			  <label class="btn btn-default active">
				<input type="radio" name="ugroup" id="ugroup" value="suser" autocomplete="off"> Sales
			  </label>
			  <label class="btn btn-default">
				<input type="radio" name="ugroup" id="ugroup" value="manager" autocomplete="off">Manager
			  </label>
			  <label class="btn btn-default">
				<input type="radio" name="ugroup" id="ugroup" value="admin" autocomplete="off">Admin
			  </label>
			 </div> 
                </div>
                

				</div>	
				
              
				
				<div class="form-group">
				<div class="col-md-6 fa-align-left">
				<label for="team">Team</label>
				<select class="form-control" name="team" id="team">
				
				 <?php

				$STM = $dbh->prepare("SELECT * FROM lut_teams");

				$STM->execute();

				$STMrecords9 = $STM->fetchAll();
				foreach($STMrecords9 as $row9)
					{ ?><option value="<?php echo $row9['teamname'];?>"><?php echo $row9['teamname'];?> </option>
							 <?php  } ?>  
				  
				</select>

				</div> 
				<div class="col-md-6 fa-align-left">
				<div class="btn-group" data-toggle="buttons">
			  Team Leader / Team Member
			  <label class="btn btn-default active">
				<input type="radio" name="teamleader" id="teamleader" value="yes" autocomplete="off"> Team Leader
			  </label>
			  <label class="btn btn-default">
				<input type="radio" name="teamleader" id="teamleader" value="no" autocomplete="off"> Team Member
			  </label>
			 </div> 
			</div>
			</div>
			<div class="form-group">
			<div class="col-md-4 fa-align-left">
				<div class="btn-group" data-toggle="buttons">
			  <label class="btn btn-default active">
				<input type="radio" name="sex" id="sex" value="m" autocomplete="off"> male
			  </label>
			  <label class="btn btn-default">
				<input type="radio" name="sex" id="sex" value="f" autocomplete="off"> Female
			  </label>
			 </div> 
			</div>
			
			</div>
				
				  <div class="form-group">
				
				<div class="col-md-6 fa-align-left">
                  <input type="text" class="form-control input-md" name="hphone" id="hphone" placeholder="Home Phone">
				
				</div>
				<div class="col-md-6 fa-align-left">
                  <input type="text" class="form-control input-md" name="mobile" id="mobile" placeholder="Mobile Phone">
				
				</div>
                </div>
				<div class="form-group">
                 <div class="col-sm-12 fa-align-right">
                  <input type="text" class="form-control input-md" name="address" id="address" placeholder="Address">
                </div>
                </div>
				<div class="form-group">
                 <div class="col-sm-4 fa-align-right">
                  <input type="text" class="form-control input-md" name="district" id="district" placeholder="District">
                </div>
				<div class="col-sm-4 fa-align-right">
                  <input type="text" class="form-control input-md" name="city" id="city" placeholder="City">
                </div>
				<div class="col-sm-4 fa-align-right">
                  <input type="text" class="form-control input-md" name="province" id="province" placeholder="Province">
                </div>
                </div>
				<div class="form-group">
                 <div class="col-sm-4 fa-align-right">
                  <input type="text" class="form-control input-md" name="postcode" id="postcode" placeholder="Post Code">
                </div>
				<div class="col-sm-4 fa-align-right">
                 <input type="text" class="form-control input-md" name="govid" id="govid" placeholder="Government ID">
                </div>
				</div>
				<div class="form-group">
				
				<div class="col-sm-4 fa-align-right">
                  Birth Date
				  <input type="date" class="form-control input-md" name="bdate" id="bdate" placeholder="Birth Date">
                </div>
				<div class="col-sm-4 fa-align-right">
				Hire Date
                  <input type="date" class="form-control input-md" name="hdate" id="hdate" placeholder="Hire Date">
                </div>
				</div>
				<div class="form-group">
				<div class="col-md-8 fa-align-left">
                  <input type="text" class="form-control input-md" name="email" id="email" placeholder="Email">
				  <input type="hidden" class="form-control input-sm" name="usertype" id="usertype" value="admin">
				  <input type="hidden" class="form-control input-sm" name="status" id="status" value="active">
                </div>
                </div>
 				
                <div class="form-group">
                <div class="col-md-offset-3 col-lg-10">
               	<input type="submit" name="adduser" id="adduser" class="btn btn-info" value="Add">
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


<!-- add task -->

<div class="modal fade" id="addtask" tabindex="-1" role="dialog" aria-labelledby="addtaskLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="widget widget-purple">
        <div class="widget-title">
          <div class="widget-controls">
  
  <a href="#" class="widget-control widget-control-full-screen widget-control-show-when-full" data-toggle="tooltip" data-placement="left" title="" data-original-title="Exit Full Screen"><i class="fa fa-expand"></i></a>
  
  <a href="#" class="widget-control widget-control-refresh" data-toggle="tooltip" data-placement="top" title="" data-original-title="Refresh"><i class="fa fa-refresh"></i></a>
  <a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip" data-placement="top" title="" data-original-title="Minimize"><i class="fa fa-minus-circle"></i></a>
  
</div>
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
				 <input type="text" name="startdate" value="" id="startdate" placeholder="Start Date" class="form-control input-datepicker">
                  <span class="input-group-addon"></span>
				  </div>
                </div>
                              
                <div class="col-md-6 fa-align-right">
				 <div class="input-group">
				<input type="text" name="duedate" id="duedate" placeholder="Due Date" class="form-control input-datepicker">
                  <span class="input-group-addon"></span>
                 </div> 
                </div>
                </div>
                <div class="form-group">
				<div class="col-md-6 fa-align-right">
			   <div class="input-group">
                  <input type="text" name="due_time" id="due_time" placeholder="Due Time" class="form-control input-timepicker">
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



<!-- Edit Task -->

 <?php

    $STM = $dbh->prepare("SELECT * FROM tbl_tasks WHERE assignby='$userida'");

    $STM->execute();

    $STMrecords4 = $STM->fetchAll();
	
    foreach($STMrecords4 as $task)
        { ?>
<div class="modal fade" id="edittask<?php echo $task['taskid'];?>" tabindex="-1" role="dialog" aria-labelledby="edittaskLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="widget widget-purple">
        <div class="widget-title">
          <div class="widget-controls">
  
  <a href="#" class="widget-control widget-control-full-screen widget-control-show-when-full" data-toggle="tooltip" data-placement="left" title="" data-original-title="Exit Full Screen"><i class="fa fa-expand"></i></a>
  
  <a href="#" class="widget-control widget-control-refresh" data-toggle="tooltip" data-placement="top" title="" data-original-title="Refresh"><i class="fa fa-refresh"></i></a>
  <a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip" data-placement="top" title="" data-original-title="Minimize"><i class="fa fa-minus-circle"></i></a>
  
</div>
          <h3><i class="fa fa-ok-circle"></i>Edit Task</h3>
        </div>
       <div class="widget-content">
          <div class="modal-body">

            <form action="db_addtaskdash.php" method="post" id="addcont_form" role="form" class="form-horizontal">
			<input type="hidden" value="<?php echo $task['taskid'];  ?>" name="taskid"/>
              <div class="form-group">
                  <div class="col-sm-12 fa-align-right">
                  <input type="textarea" class="form-control" value="<?php echo $task['task_desc'];?>" name="task_desc" id="task_desc" placeholder="Task Description">
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
        { ?><option <?php if($task['assignto'] == $row3['id']){echo("selected");}?>  value="<?php echo $row3['id'];?>"><?php echo $row3['fname'].' '.$row3['lname'] ;?> </option>
                 <?php  } ?>  
                  </select>  
                </div>
                </div>
                <div class="form-group">
                 <div class="col-md-6 fa-align-right">
                
				   <select name="assignby" id="assignby" class="form-control">
            	  <option value="0">---Assign By---</option>
 <?php

    $STM = $dbh->prepare("SELECT * FROM  tbl_users");

    $STM->execute();

    $STMrecords3a = $STM->fetchAll();
    foreach($STMrecords3a as $row3)
        { ?><option <?php if($task['assignby'] == $row3['id']){echo("selected");}?> value="<?php echo $row3['id'];?>"><?php echo $row3['fname'].' '.$row3['lname'] ;?> </option>
                 <?php  } ?>  
                  </select>  
                </div>
                </div>
                <div class="form-group">
                <div class="col-md-6 fa-align-left">
				 <div class="input-group">
				 <input type="text" name="startdate" value="<?php echo $task['startdate'];?>" id="startdate" placeholder="Start Date" class="form-control input-datepicker">
                  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
				  </div>
                </div>
                              
                <div class="col-md-6 fa-align-right">
				 <div class="input-group">
				<input type="text" name="duedate" value="<?php echo $task['duedate'];?>" id="duedate" placeholder="Due Date" class="form-control input-datepicker">
                  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                 </div> 
                </div>
                </div>
                <div class="form-group">
				<div class="col-md-6 fa-align-right">
			   <div class="input-group">
                  <input type="text" name="due_time" value="<?php echo $task['due_time'];?>" id="due_time" placeholder="Due Time" class="form-control input-timepicker">
                  <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                </div>
                </div>
                </div>
 			      <div class="form-group">
                
                <div class="col-md-6 fa-align-left">
                 						<select class="form-control" name="customer" id="customeraddedit"  >
						<option value="0">---Customer---</option>
						<?php

						$STM = $dbh->prepare("SELECT * FROM  tbl_customer ORDER BY cust_name ASC");

						$STM->execute();

						$STMCUST = $STM->fetchAll();
						foreach($STMCUST as $cust)
						{ ?><option <?php if($task['customer'] == $cust['cust_ID']){echo("selected");}?> value="<?php echo $cust['cust_ID'];?>"><?php echo $cust['cust_name'] ;?> </option>
						<?php  } ?>  
						</select>  
						
                  </div>
				   <div class="col-md-6 fa-align-right">
                 	<div id="selectonchange1" style="display:none;">
				
				  </div>	
                  </div>
				  </div>
                 <div class="form-group">
                 <div class="col-sm-12 fa-align-right">
                <input type="text" class="form-control input-sm" value="<?php echo $task['task_notes'];?>" name="task_notes" id="task_notes" placeholder="Task Notes">
                </div>
                </div> 
                 
				  
                <div class="form-group">
                <div class="col-md-offset-3 col-lg-10">
                <input type="submit" name="edit" id="edit" class="btn btn-info" value="Edit">
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


<?php  }  ?>



<!-- end modals -->


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
<script src='assets/js/plugins/fullcalendar.js'></script>
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

<script src='assets/js/template_js/forms.js'></script>

<script src='assets/js/template_js/table.js'></script>

<script src='assets/js/template_js/dashboard.js'></script>

<script src='assets/js/template_js/calendar.js'></script>


<!-- @include _footer