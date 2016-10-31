<?php
session_start();


include('init.php');
include('configPDO.php');


$user=($_SESSION['username']);

$STM = $dbh->prepare("SELECT * FROM tbl_users WHERE username = '$user'");

    $STM->execute();

    $STMrecordsu = $STM->fetchAll();
    foreach($STMrecordsu as $u1)

$uimg = $u1['img'];	
$userida = $u1['id'];
$ugrp = $u1['ugroup'];

$todayDate = date("Y-m-d g:i a");// current date
$currentTime = time($todayDate); //Change date into time
$timeAfterOneHour = ($currentTime-1);
$hourdiff = "+11"; 
$today1 = date("Y-m-d",time() + ($hourdiff * 3600));

	$STM = $dbh->prepare("SELECT * FROM tbl_company");

    $STM->execute();

    $STMrecordsco = $STM->fetchAll();
    foreach($STMrecordsco as $co)
	
$coname = $co['url_name'];
	
?>

<!DOCTYPE html>
<html>

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  
      

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
<link rel='stylesheet' href='assets/css/app.css'>

  <link href='https://fonts.googleapis.com/css?family=Roboto:100,300,400,700|Roboto+Condensed:300,400,700' rel='stylesheet' type='text/css'>

  <link href="img/favicon.ico" rel="shortcut icon">
  <link href="assets/apple-touch-icon.png" rel="apple-touch-icon">
  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
    @javascript html5shiv respond.min
  <![endif]-->

  <title><?php echo $coname." POS";?></title>
  
  <script type="text/javascript">
		function MM_openBrWindow(theURL,winName,features) {
		window.open(theURL,winName,features);
		}
        </script>

</head>

<body class="glossed">


<?php include_once("top_bar.php"); ?>
  
  

  <div class="main-content">
   

<!-- Sys Admin Actions --> 
<div class="row"> 
  <div class="col-md-12">
    <div class="widget widget-purple">
      <span class="offset_anchor" id="widget_links"></span>
      <div class="widget-title">
        <div class="widget-controls">
  <a href="#" class="widget-control widget-control-full-screen" data-toggle="tooltip" data-placement="top" title="" data-original-title="Full Screen"><i class="fa fa-expand"></i></a>
  <a href="#" class="widget-control widget-control-full-screen widget-control-show-when-full" data-toggle="tooltip" data-placement="left" title="" data-original-title="Exit Full Screen"><i class="fa fa-expand"></i></a>
  <a href="#" class="widget-control widget-control-refresh" data-toggle="tooltip" data-placement="top" title="" data-original-title="Refresh"><i class="fa fa-refresh"></i></a>
  <a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip" data-placement="top" title="" data-original-title="Minimize"><i class="fa fa-minus-circle"></i></a>
  <a href="#" class="widget-control widget-control-remove" data-toggle="tooltip" data-placement="top" title="" data-original-title="Remove"><i class="fa fa-times-circle"></i></a>
</div>
        <h3><i class="fa fa-ok-circle"></i> System Administration</h3>
      </div>
      <div class="widget-content">
        
         <div class="row">
              <div class="col-md-3" align="center">
                <div class="btn btn-primary" data-toggle="modal" data-target="#adduser">+ User</div>
              </div>
              <div class="col-md-3" align="center">
                <div class="btn btn-primary" data-toggle="modal" data-target="#addteam">+ Team</div>
              </div>
			  <div class="col-md-3" align="center">
                <div class="btn btn-primary" data-toggle="modal" data-target="#addcomp">+ Company</div>
              </div>
			  
			   <div class="col-md-3" align="center">
                <div class="btn btn-primary" data-toggle="modal" data-target="#addofc">+ Office</div>
              </div>
            </div>
          </div>
        </div>
      </div>
     </div>
	 
<!-- Sys Admin Actions --> 
<div class="row"> 


<!-- User Browse -->       
    
      <div class="widget widget-purple">
      <span class="offset_anchor" id="widget_users"></span>
      <div class="widget-title">
              <div class="widget-controls">
  <a href="#" class="widget-control widget-control-full-screen" data-toggle="tooltip" data-placement="top" title="" data-original-title="Full Screen"><i class="fa fa-expand"></i></a>
  <a href="#" class="widget-control widget-control-full-screen widget-control-show-when-full" data-toggle="tooltip" data-placement="left" title="" data-original-title="Exit Full Screen"><i class="fa fa-expand"></i></a>
  <a href="#" class="widget-control widget-control-refresh" data-toggle="tooltip" data-placement="top" title="" data-original-title="Refresh"><i class="fa fa-refresh"></i></a>
  <a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip" data-placement="top" title="" data-original-title="Minimize"><i class="fa fa-minus-circle"></i></a>
  <a href="#" class="widget-control widget-control-remove" data-toggle="tooltip" data-placement="top" title="" data-original-title="Remove"><i class="fa fa-times-circle"></i></a>
</div>
        <h3><i class="fa fa-table"></i>Users</h3>
      </div>
      <div class="widget-content">
        <div class="table-responsive">
        <table class="table table-bordered table-hover datatable">
          <thead>
            <tr>
              <th>ID</th>
              <th>User Name</th>
              <th>Name</th>
              <th>Group</th>
              <th>Pic / Sign</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
           <?php

    $STM = $dbh->prepare("SELECT * FROM tbl_users");
    $STM->execute();
    $STMrecordusers = $STM->fetchAll();
    foreach($STMrecordusers as $users1)
        { ?>
			
			<tr>
              <td><?php echo $users1['id'];?></a></td>
              <td><a href="bt_userdetails.php?userid=<?php echo $users1['id'];?>"><?php echo $users1['username'];?></a></td>
              <td><?php echo $users1['fname']." ".$users1['lname'];?></td>
              <td><?php echo $users1['ugroup'];?></td>
              <td>
			  <img src="<?php echo $users1['img'];?>" alt="+" width="40" height="40">
			  <img src="<?php echo $users1['sign'];?>" alt="+" width="70" height="30">
			  </td>
              
			  <td class="text-center">
			  <div class="btn btn-default btn-xs" data-toggle="modal" data-target="#addpic<?php echo $users1['id']; ?>">+ Pic</div>
			  
			  <div class="btn btn-default btn-xs" data-toggle="modal" data-target="#addsign<?php echo $users1['id']; ?>">+ Signature</div>
			  <div class="btn btn-default btn-xs" data-toggle="modal" data-target="#chngpass<?php echo $users1['id']; ?>">password</div>
			  <div class="btn btn-default btn-xs" data-toggle="modal" data-target="#edituser<?php echo $users1['id']; ?>">Edit</div>
			  </td>
			  
            </tr>
				<?php }	?>	
			</tbody>
				
        </table>
		
        </div>
      </div>
    </div>
    
    <!-- Company -->
    <div class="widget widget-purple">
      <span class="offset_anchor" id="widget_company"></span>
      <div class="widget-title">
              <div class="widget-controls">
  <a href="#" class="widget-control widget-control-full-screen" data-toggle="tooltip" data-placement="top" title="" data-original-title="Full Screen"><i class="fa fa-expand"></i></a>
  <a href="#" class="widget-control widget-control-full-screen widget-control-show-when-full" data-toggle="tooltip" data-placement="left" title="" data-original-title="Exit Full Screen"><i class="fa fa-expand"></i></a>
  <a href="#" class="widget-control widget-control-refresh" data-toggle="tooltip" data-placement="top" title="" data-original-title="Refresh"><i class="fa fa-refresh"></i></a>
  <a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip" data-placement="top" title="" data-original-title="Minimize"><i class="fa fa-minus-circle"></i></a>
  <a href="#" class="widget-control widget-control-remove" data-toggle="tooltip" data-placement="top" title="" data-original-title="Remove"><i class="fa fa-times-circle"></i></a>
</div>
        <h3><i class="fa fa-table"></i>Company</h3>
      </div>
      <div class="widget-content">
        <div class="table-responsive">
        <table class="table table-hover datatable">
          <thead>
            <tr>
              
              <th>Company</th>
              <th>Tab Name</th>
              <th>Email</th>
              <th>Website</th>
              <th>Images</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
           <?php

    $STM = $dbh->prepare("SELECT * FROM tbl_company");

    $STM->execute();

    $STMrecords2 = $STM->fetchAll();
    foreach($STMrecords2 as $row2)
        { ?>
			
			<tr>
              
              <td><?php echo $row2['co_name'];?></td>
              <td><?php echo $row2['url_name'];?></td>
              <td><?php echo $row2['email'];?></td>
              <td class="text-right"><?php echo $row2['website'];?></td>
              <td class="text-right"></td>
              <td class="text-right">
                <a href="#" class="btn btn-danger btn-xs remove-tr"><i class="fa fa-times"></i></a>
              </td>
            </tr> 

        <?php }  ?>
            
          </tbody>
        </table>
        </div>
      </div>
    </div>
	
	   <!-- Warehouse -->
    <div class="widget widget-purple">
      <span class="offset_anchor" id="widget_office"></span>
      <div class="widget-title">
              <div class="widget-controls">
  <a href="#" class="widget-control widget-control-full-screen" data-toggle="tooltip" data-placement="top" title="" data-original-title="Full Screen"><i class="fa fa-expand"></i></a>
  <a href="#" class="widget-control widget-control-full-screen widget-control-show-when-full" data-toggle="tooltip" data-placement="left" title="" data-original-title="Exit Full Screen"><i class="fa fa-expand"></i></a>
  <a href="#" class="widget-control widget-control-refresh" data-toggle="tooltip" data-placement="top" title="" data-original-title="Refresh"><i class="fa fa-refresh"></i></a>
  <a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip" data-placement="top" title="" data-original-title="Minimize"><i class="fa fa-minus-circle"></i></a>
  <a href="#" class="widget-control widget-control-remove" data-toggle="tooltip" data-placement="top" title="" data-original-title="Remove"><i class="fa fa-times-circle"></i></a>
</div>
        <h3><i class="fa fa-table"></i>Offices</h3>
      </div>
      <div class="widget-content">
        <div class="table-responsive">
        <table class="table table-hover datatable">
          <thead>
            <tr>
              
              <th>ID</th>
              <th>Office Name</th>
              <th>Province</th>
              <th>Country</th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody>
           <?php

    $STM = $dbh->prepare("SELECT * FROM tbl_warehse");

    $STM->execute();

    $STMrecords3 = $STM->fetchAll();
    foreach($STMrecords3 as $row3)
        { ?>
			
			<tr>
              
              <td><?php echo $row3['warehseid '];?></td>
              <td><?php echo $row3['name'];?></td>
              <td><?php echo $row3['province'];?></td>
              <td><?php echo $row3['country'];?></td>
              <td class="text-right"></td>
              <td class="text-right">
                <a href="#" class="btn btn-danger btn-xs remove-tr"><i class="fa fa-times"></i></a>
              </td>
            </tr> 

        <?php }  ?>
            
          </tbody>
        </table>
        </div>
      </div>
    </div>
    
    
    <!-- Product Unit -->


<!-- end task widget -->
   
   
   <!-- End widgets-->
   
      
      </div>
    </div>
  </div>
</div>
    
  <div class="page-footer">
  © 2014 BENT Technology Labs, Inc.
</div>

<!-- add user -->

<div class="modal fade" id="adduser" tabindex="-1" role="dialog" aria-labelledby="modalFormStyle1Label" aria-hidden="true">
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
                  <div class="col-sm-8 fa-align-right">
                  <input type="text" class="form-control input-sm" name="username" id="username" placeholder="User Login Name">
                </div>
                </div>
               <div class="form-group">
                 <div class="col-sm-8 fa-align-right">
                  <input type="text" class="form-control input-sm" name="password" id="password" placeholder="Password">
                </div>
                </div>
               <div class="form-group">
                 <div class="col-md-4 fa-align-right">
                  <input type="text" class="form-control input-sm" name="fname" id="fname" placeholder="First Name">
                </div>
                <div class="col-md-4 fa-align-left">
                  <input type="text" class="form-control input-sm" name="lname" id="lname" placeholder="Last Name">
                </div>
                </div>
                <div class="form-group">
               
                <div class="col-md-4 fa-align-right">
                  <input type="text" class="form-control input-sm" name="title" id="title" placeholder="Job Title">
                </div>
                </div> 
                <div class="form-group">
                
                <div class="col-md-3 fa-align-right">
                  <select name="ugroup" id="ugroup">
				  <option value="0">---User Group---</option>
          <option value="admin">Admin</option>
          <option value="sales">Sales</option>
		  <option value="sales">Accounting</option>
			</select>
                </div>
                
                
                <div class="col-md-3 fa-align-right">
                  <select name="editor" id="editor">
				  <option value="0">---Editor?---</option>
          <option value="yes">Yes</option>
          <option value="no">No</option>
			</select>
                </div>

				<div class="col-md-3 fa-align-right">
                  <select name="approver" id="approver">
				  <option value="0">---Approver?---</option>
          <option value="yes">Yes</option>
          <option value="no">No</option>
			</select>
                </div>				
                <div class="form-group">
				</div>
                <div class="col-md-6 fa-align-left">
                  <input type="text" class="form-control input-sm" name="email" id="email" placeholder="Email">
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

<!-- end add user -->

<!-- add prod unit -->

<div class="modal fade" id="produnit" tabindex="-1" role="dialog" aria-labelledby="modalFormStyle1Label" aria-hidden="true">
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
          <h3><i class="fa fa-ok-circle"></i>Add Product Unit</h3>
        </div>
        <div class="widget-content">
          <div class="modal-body">

            <form action="db_addpunit.php" method="post" id="form" class="form-horizontal">
              <div class="form-group">
                  <div class="col-sm-6 fa-align-right">
                  <input type="text" class="form-control input-sm" name="unit" id="unit" placeholder="Product Unit (English)">
                </div>
                
                 <div class="col-sm-6 fa-align-right">
                  <input type="text" class="form-control input-sm" name="unitth" id="unitth" placeholder="Product Unit (Thai - ภาษาไทย)">
                </div>
                </div>
               <div class="form-group">
                 <div class="col-md-6 fa-align-right">
                  <input type="text" class="form-control input-sm" name="abven" id="abven" placeholder="Unit Abbreviation (English)">
                </div>
                <div class="col-md-6 fa-align-left">
                  <input type="text" class="form-control input-sm" name="abvth" id="abvth" placeholder="Unit Abbreviation (Thai - ภาษาไทย)">
                </div>
                </div>
                <div class="form-group">
                <div class="col-md-offset-3 col-lg-10">
               	<input type="submit" name="addpunit" id="addpunit" class="btn btn-info" value="Add">
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
<!--- End Add product unit Form-->

<!-- add Company -->

<div class="modal fade" id="addcomp" tabindex="-1" role="dialog" aria-labelledby="modalFormStyle1Label" aria-hidden="true">
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
          <h3><i class="fa fa-ok-circle"></i>Add Company</h3>
        </div>
        <div class="widget-content">
          <div class="modal-body">

            <form action="db_company.php" method="post" id="form" class="form-horizontal">
              <div class="form-group">
                  <div class="col-sm-6 fa-align-right">
                  <input type="text" class="form-control input-sm" name="coname" id="coname" placeholder="Company Name (English)">
                </div>
                
                 <div class="col-sm-6 fa-align-right">
                  <input type="text" class="form-control input-sm" name="urlname" id="urlname" placeholder="Short Name - Shows on Browser Tab">
                </div>
                </div>
               <div class="form-group">
                 <div class="col-md-6 fa-align-right">
                  <input type="text" class="form-control input-sm" name="addline1" id="addline1" placeholder="Address Line 1 (English)">
                </div>
                <div class="col-md-6 fa-align-left">
                  <input type="text" class="form-control input-sm" name="addline2" id="addline2" placeholder="Address Line 2 (English)">
                </div>
                </div>
				
				 <div class="form-group">
                  <div class="col-sm-6 fa-align-right">
                  <input type="text" class="form-control input-sm" name="phone" id="phone" placeholder="Office Phone Number">
                </div>
                
                 <div class="col-sm-6 fa-align-right">
                  <input type="text" class="form-control input-sm" name="fax" id="fax" placeholder="Office Fax Number">
                </div>
                </div>
               <div class="form-group">
                 <div class="col-md-6 fa-align-right">
                  <input type="text" class="form-control input-sm" name="mobile" id="mobile" placeholder="Mobile Number">
                </div>
                <div class="col-md-6 fa-align-left">
                  <input type="text" class="form-control input-sm" name="email" id="email" placeholder="Main Company Email">
                </div>
                </div>
				 <div class="form-group">
                  <div class="col-sm-6 fa-align-right">
                  <input type="text" class="form-control input-sm" name="website" id="website" placeholder="Company Website (ie. www.website.com)">
                </div>
                </div>
                
				
                <div class="form-group">
                <div class="col-md-offset-3 col-lg-10">
               	<input type="submit" name="addcomp" id="addcomp" class="btn btn-info" value="Add">
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
<!--- End Add Company Form-->

<!-- add Warehouse -->

<div class="modal fade" id="addofc" tabindex="-1" role="dialog" aria-labelledby="modalFormStyle1Label" aria-hidden="true">
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
          <h3><i class="fa fa-ok-circle"></i>Add Office</h3>
        </div>
        <div class="widget-content">
          <div class="modal-body">

            <form action="db_company.php" method="post" id="form" class="form-horizontal">
              <div class="form-group">
                  <div class="col-sm-6 fa-align-right">
                  <input type="text" class="form-control input-sm" name="wname" id="wname" placeholder="Office Name (English)"/>
                </div>
                
                 <div class="col-sm-6 fa-align-right">
                  <input type="text" class="form-control input-sm" name="add1" id="add1" placeholder="Address"/>
                </div>
                </div>
               <div class="form-group">
                 <div class="col-md-6 fa-align-right">
                  <input type="text" class="form-control input-sm" name="add2" id="add2" placeholder="Address 2"/>
                </div>
                <div class="col-md-6 fa-align-left">
                  <input type="text" class="form-control input-sm" name="subdistrict" id="subdistrict" placeholder="Sub-district / ตำบล"/>
                </div>
                </div>
				
				 <div class="form-group">
                  <div class="col-sm-6 fa-align-right">
                  <input type="text" class="form-control input-sm" name="district" id="district" placeholder="District / อำเภอ"/>
                </div>
                
                 <div class="col-sm-6 fa-align-right">
                  <input type="text" class="form-control input-sm" name="province" id="province" placeholder="Province / จังหวัด"/>
                </div>
                </div>
               <div class="form-group">
                 <div class="col-md-6 fa-align-right">
                  <input type="text" class="form-control input-sm" name="country" id="country" placeholder="Country / ประเทศ">
                </div>
                <div class="col-md-6 fa-align-left">
                  <input type="text" class="form-control input-sm" name="postcode" id="postcode" placeholder="Post Code / รหัสไปรษณีย์">
                </div>
                </div>
				 				
                <div class="form-group">
                <div class="col-md-offset-3 col-lg-10">
               	<input type="submit" name="addwrhse" id="addwrhse" class="btn btn-info" value="Add">
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
<!--- End Add Office Form-->

<!-- add prod cat -->

<div class="modal fade" id="prodcat" tabindex="-1" role="dialog" aria-labelledby="modalFormStyle1Label" aria-hidden="true">
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
          <h3><i class="fa fa-ok-circle"></i>Add Product Category</h3>
        </div>
        <div class="widget-content">
          <div class="modal-body">

            <form action="db_addpunit.php" method="post" id="form" class="form-horizontal">
              <div class="form-group">
                  <div class="col-sm-6 fa-align-right">
                  <input type="text" class="form-control input-sm" name="prodcaten" id="prodcaten" placeholder="Product Category (English)">
                </div>
                
                 <div class="col-sm-6 fa-align-right">
                  <input type="text" class="form-control input-sm" name="prodcatth" id="prodcatth" placeholder="Product Category (Thai - ภาษาไทย)">
                </div>
                </div>
            
                <div class="form-group">
                <div class="col-md-offset-3 col-lg-10">
               	<input type="submit" name="addprodcat" id="addprodcat" class="btn btn-info" value="Add">
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
<!--- End Add product Category Form-->

<!-- add s doc type -->

<div class="modal fade" id="sdoctype" tabindex="-1" role="dialog" aria-labelledby="modalFormStyle1Label" aria-hidden="true">
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
          <h3><i class="fa fa-ok-circle"></i>Add CRM Doc Type</h3>
        </div>
        <div class="widget-content">
          <div class="modal-body">

            <form action="db_addpunit.php" method="post" id="form" class="form-horizontal">
              <div class="form-group">
                  <div class="col-sm-6 fa-align-right">
                  <input type="text" class="form-control input-sm" name="doctype" id="doctype" placeholder="CRM Document Type (English)">
                </div>
                </div>
            
                <div class="form-group">
                <div class="col-md-offset-3 col-lg-10">
               	<input type="submit" name="adddoctype" id="adddoctype" class="btn btn-info" value="Add">
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
<!--- End Add s doc type Form-->

<!-- Add adduserpic popup start --> 

<?php

    $STM = $dbh->prepare("SELECT * FROM tbl_users");
    $STM->execute();
    $STMrecordusers = $STM->fetchAll();
    foreach($STMrecordusers as $users1)
        { ?>

<div class="modal fade" id="addpic<?php echo $users1['id'];?>" tabindex="-1" role="dialog" aria-labelledby="addattachmentLabel" aria-hidden="true">
  <div class="modal-dialog" style="width:50%!important;">
    <div class="modal-content">
      <div class="widget widget-purple">
        <div class="widget-title">
          <div class="widget-controls">
  
  <a href="#" class="widget-control widget-control-full-screen widget-control-show-when-full" data-toggle="tooltip" data-placement="left" title="" data-original-title="Exit Full Screen"><i class="fa fa-expand"></i></a>
  <a href="#" data-toggle="dropdown" class="widget-control widget-control-settings"><i class="fa fa-cog"></i></a>
  <a href="#" class="widget-control widget-control-refresh" data-toggle="tooltip" data-placement="top" title="" data-original-title="Refresh"><i class="fa fa-refresh"></i></a>
  <a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip" data-placement="top" title="" data-original-title="Minimize"><i class="fa fa-minus-circle"></i></a>
  
</div>
          <h3><i class="fa fa-ok-circle"></i>Add User Picture</h3>
        </div>
        <form enctype="multipart/form-data" action="add_userpic.php?uid=<?php echo $users1['id'];?>" method="post" name="formqpayment" class="style1" id="formqpayment">
        <div class="widget-content">
          <div class="modal-body">
                 <div class="row">
              <div class="col-md-4">
                <h4 class="widget-header" style="font-size: 16px!important; font-weight: 0!important;"> Add Picture --> <?php echo $users1['username']." - ".$users1['id'];?></h4>
				
				
				<input name="puid" type="hidden" id="puid" value="<?php echo $users1['id'];?>"/>
				 
              </div>       
			 
			  <div class="col-md-4">
			  <a href="cam/cam.php?uid=<?php echo $users1['id'];?>" class="btn btn-info" target="blank">Take Web Cam Photo</a>
			  </div>
			
			</div>
			 <div class="row">
                <div class="col-md-2">
                <h4 class="widget-header" style="font-size: 16px!important; font-weight: 0!important;">Upload File</h4>
 
              </div>
              </div>
              	 <div class="row">
 
              <div class="col-md-2">
			  <input name="uploaded" type="file" size="35" />
               </div>
			  
              </div><br>
			  <div class="row">
			   <div class="form-group">
                <div class="col-md-offset-3 col-lg-10">
                <input type="submit" name="userpic" id="userpic" class="btn btn-info" value="Upload">
                
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div> 
              </div>  </div>
          </div>
        </div>
</form>
      </div>
    </div>
  </div>
</div>
<?php } ?>
<!-- Add adduserpic popup end -->


<!-- Add addusersign popup start --> 

<?php

    $STM = $dbh->prepare("SELECT * FROM tbl_users");
    $STM->execute();
    $STMrecordusers = $STM->fetchAll();
    foreach($STMrecordusers as $users1)
        { ?>

<div class="modal fade" id="addsign<?php echo $users1['id'];?>" tabindex="-1" role="dialog" aria-labelledby="addattachmentLabel" aria-hidden="true">
  <div class="modal-dialog" style="width:50%!important;">
    <div class="modal-content">
      <div class="widget widget-purple">
        <div class="widget-title">
          <div class="widget-controls">
  
  <a href="#" class="widget-control widget-control-full-screen widget-control-show-when-full" data-toggle="tooltip" data-placement="left" title="" data-original-title="Exit Full Screen"><i class="fa fa-expand"></i></a>
  <a href="#" data-toggle="dropdown" class="widget-control widget-control-settings"><i class="fa fa-cog"></i></a>
  <a href="#" class="widget-control widget-control-refresh" data-toggle="tooltip" data-placement="top" title="" data-original-title="Refresh"><i class="fa fa-refresh"></i></a>
  <a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip" data-placement="top" title="" data-original-title="Minimize"><i class="fa fa-minus-circle"></i></a>
  
</div>
          <h3><i class="fa fa-ok-circle"></i>Add Signature</h3>
        </div>
        <form enctype="multipart/form-data" action="add_userpic.php?uida=<?php echo $users1['id'];?>" method="post" name="formqpayment" class="style1" id="formqpayment">
        <div class="widget-content">
          <div class="modal-body">
                 <div class="row">
              <div class="col-md-">
                <h4 class="widget-header" style="font-size: 16px!important; font-weight: 0!important;"> Add Signature --> <?php echo $users1['username'];?></h4>
				
				
				<input name="puid" type="hidden" id="puid" value="<?php echo $users1['id'];?>"/>
				 
              </div>       
			 
			
			</div>
			 <div class="row">
                <div class="col-md-2">
                <h4 class="widget-header" style="font-size: 16px!important; font-weight: 0!important;">Upload File</h4>
 
              </div>
              </div>
              	 <div class="row">
 
              <div class="col-md-2">
			  <input name="uploaded" type="file" size="35" />
               </div>
			  
              </div><br>
			  <div class="row">
			   <div class="form-group">
                <div class="col-md-offset-3 col-lg-10">
                <input type="submit" name="usersign" id="usersign" class="btn btn-info" value="Upload">
                
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div> 
              </div>  </div>
          </div>
        </div>
</form>
      </div>
    </div>
  </div>
</div>
<?php } ?>
<!-- Add addusersign popup end -->

<!-- change password popup start --> 

<?php

    $STM = $dbh->prepare("SELECT * FROM tbl_users");
    $STM->execute();
    $STMrecordusers = $STM->fetchAll();
    foreach($STMrecordusers as $users1)
        { ?>

<div class="modal fade" id="chngpass<?php echo $users1['id'];?>" tabindex="-1" role="dialog" aria-labelledby="addattachmentLabel" aria-hidden="true">
  <div class="modal-dialog" style="width:50%!important;">
    <div class="modal-content">
      <div class="widget widget-purple">
        <div class="widget-title">
          <div class="widget-controls">
  
  <a href="#" class="widget-control widget-control-full-screen widget-control-show-when-full" data-toggle="tooltip" data-placement="left" title="" data-original-title="Exit Full Screen"><i class="fa fa-expand"></i></a>
  <a href="#" data-toggle="dropdown" class="widget-control widget-control-settings"><i class="fa fa-cog"></i></a>
  <a href="#" class="widget-control widget-control-refresh" data-toggle="tooltip" data-placement="top" title="" data-original-title="Refresh"><i class="fa fa-refresh"></i></a>
  <a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip" data-placement="top" title="" data-original-title="Minimize"><i class="fa fa-minus-circle"></i></a>
  
</div>
          <h3><i class="fa fa-ok-circle"></i>Change User Password</h3>
        </div>
        <form enctype="multipart/form-data" action="add_userpic.php?uidpass=<?php echo $users1['id'];?>" method="post" name="formqpayment" class="style1" id="formqpayment">
        <div class="widget-content">
          <div class="modal-body">
                 <div class="row">
              <div class="col-md-">
                <h4 class="widget-header" style="font-size: 16px!important; font-weight: 0!important;"> Current Password --> <?php echo $users1['password'];?></h4>
				
				
				<input name="puid" type="hidden" id="puid" value="<?php echo $users1['id'];?>"/>
				 
              </div>       
			 
			
			</div>
			 <div class="row">
                <div class="form-group">
                  <div class="col-sm-8 fa-align-right">
                  <input type="text" class="form-control input-sm" name="password" id="password" placeholder="New Password">
                </div>
                </div>
              </div>
              	 <br>
			  <div class="row">
			   <div class="form-group">
                <div class="col-md-offset-3 col-lg-10">
                <input type="submit" name="chngpass" id="chngpass" class="btn btn-info" value="Save">
                
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div> 
              </div>  </div>
          </div>
        </div>
</form>
      </div>
    </div>
  </div>
</div>
<?php } ?>
<!-- change password popup end -->


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
  <a href="#" data-toggle="dropdown" class="widget-control widget-control-settings"><i class="fa fa-cog"></i></a>
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

						$STM = $dbh->prepare("SELECT * FROM  tbl_customer ");

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
<!-- End Edit Task -->

<!--- End Add Task-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
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