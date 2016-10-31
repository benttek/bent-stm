<?php
session_start();

include('init.php');
include('configPDO.php');

$curpg = basename($_SERVER['PHP_SELF']);

("SET NAMES 'UTF8'");
$usr1=$_GET['usr1'];
$user=($_SESSION['username']);
//$user1=($_GET['u']);
$STM = $dbh->prepare("SELECT * FROM tbl_users WHERE username = '$user' OR username='$user1'");

    $STM->execute();

    $STMrecordsu = $STM->fetchAll();
    foreach($STMrecordsu as $u1)


$uimg = $u1['img'];	
$userida = $u1['id'];
$ugrp = $u1['ugroup'];


$STMue = $dbh->prepare("SELECT * FROM tbl_employees WHERE userid='$userida'");

    $STMue->execute();

    $STMrecordsue = $STMue->fetchAll();
    foreach($STMrecordsue as $ue1)

$uname=$ue1['first_name']." ".$ue1['last_name'];

$_SESSION["username"] = "$user";

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
        
</head>

<body class="glossed">


<?php require("top_bar.php"); ?>

  <div class="main-content">
    


<br><br>

   <div class="widget widget-purple">
      <span class="offset_anchor" id=""></span>
      <div class="widget-title">
              <div class="widget-controls">
  
  <a href="#" class="widget-control widget-control-settings"><i class=""></i></a>
  <a href="#" class="widget-control widget-control-full-screen" data-toggle="tooltip" data-placement="top" title="" data-original-title="Full Screen / เต็มจอ"><i class="fa fa-expand"></i></a>
  <a href="#" class="widget-control widget-control-full-screen widget-control-show-when-full" data-toggle="tooltip" data-placement="left" title="" data-original-title="Exit Full Screen / ออกจากเต็มหน้าจอ"><i class="fa fa-expand"></i></a>
  <a href="#" class="widget-control widget-control-refresh" data-toggle="tooltip" data-placement="top" title="" data-original-title="Refresh / รีเฟรช"><i class="fa fa-refresh"></i></a>
  <a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip" data-placement="top" title="" data-original-title="Minimize / ลดส่วน"><i class="fa fa-minus-circle"></i></a>
  <a href="#" class="widget-control widget-control-remove" data-toggle="tooltip" data-placement="top" title="" data-original-title="Remove / ปิดออก"><i class="fa fa-times-circle"></i></a>
</div>
        <h3><i class="fa fa-table"></i><?php echo $usr1;?> - Check In</h3>
      </div>
      <div class="widget-content">
        <div class="table-responsive">
				<table class="table table-bordered table-hover datatable">
				  <thead>
					<tr>
					  
					  <th width="5%"><?php echo $lang['emp_id']; ?>ID</th>
					  
					  <th><?php echo $lang['INV_Product_Name']; ?>Location</th>
					  <th><?php echo $lang['INV_Description']; ?>Last Check In</th>
					  <th><?php echo $lang['INV_Suppliers']; ?>Image</th>
					  <th></th>
					</tr>
					
				  </thead>
				  <tbody>
				   <?php



    $STM = $dbh->prepare(" SELECT * FROM tbl_chkin WHERE user = '$usr1'");

    $STM->execute();

    $STMrecords1 = $STM->fetchAll();
    foreach($STMrecords1 as $row1)
	 
	
	{?>
			
			<tr>
              <td><?php echo $row1['chkin_id'];?></td>
              
              <td><a href="bt_a_lstchkin.php?lci=<?php echo $row1['chkin_id'];?>&u=<?php echo $row1['user'];?>"><?php echo $row1['chkin_id']." - ".$row1['chkinlat'].",".$row1['chkinlong'];?><br></a></td>
              <td><?php echo $row1['chkindate']." - ".$row1['chkintime'];?></td>
              
			  <td><img src="<?php echo $row1['chkinimg'];?>" width="50" height="auto"/></td>
              
			  <td class="text-right">
                
							
					
				
				<a href="javascript;:"onclick="MM_openBrWindow('bt_a_lstchkin.php?lci=<?php echo $row1['chkin_id'];?>&u=<?php echo $row1['user'];?>','','scrollbars=yes,width=50%,height=auto');return false" class="btn btn-primary btn-lg">View</a>
				
              </td>
            </tr> 

		
        <?php }	?>
            
          </tbody>
        </table>
        </div>
      </div>
    </div>

<!-- end notification widget -->

<div class="modal fade" id="viewloc<?php echo $row1['chkin_id'];?>" tabindex="-1" role="dialog" aria-labelledby="modalFormStyle1Label" aria-hidden="true">
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
			
									
					
						
					
          
			</div>
			
		<div class="bottom-container-border"></div>
		  <div class="modal-footer">
          <button type="button" class="close" data-dismiss="modal">Close</button>
        </div>
			</div>
		</div>
	</div>
	</div>
</div>

<script>
    $('.modalButton9').click(function(){
        var locid = $(this).attr('data-locid');
        $.ajax({url:"usrmaploc.php?locid="+locid,cache:false,success:function(result){
            $(".modal-content").html(result);
        }});
    });
	

</script>


<!-- end task widget -->
	

</div>







  <div class="page-footer">
 © 2014 BENT Technology Labs, Inc.
</div>
</div>




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