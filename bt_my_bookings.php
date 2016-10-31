<?php
session_start();

include('init.php');
include('configPDO.php');
include('dt.php');
require_once 'device/Mobile_Detect.php';
$detect = new Mobile_Detect;

$deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');
$scriptVersion = $detect->getScriptVersion();

if ( $detect->isMobile() ) {
$ecamlink='imgcamemppic.html'; 
} elseif( $detect->isTablet() ){
$ecamlink='imgcamemppic.html';  
} else {
$ecamlink='empcam/cam.php';
}

$curpg = basename($_SERVER['PHP_SELF']);

("SET NAMES 'UTF8'");

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
$fname=$ue1['first_name'];

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


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="apple-mobile-web-app-capable" content="yes" />
	<title>MyCheck In</title>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script src="https://code.jquery.com/jquery-1.7.2.min.js"></script>
<script src="https://code.jquery.com/ui/1.8.21/jquery-ui.min.js"></script>


<script type="text/javascript" src="simpletip/jquery.simpletip-1.3.1.pack.js"></script>


<script type="text/javascript" src="script.js"></script>

<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel='stylesheet' href='assets/css/demo.css'>
<link rel='stylesheet' href='assets/css/order.css'>

  <link href='https://fonts.googleapis.com/css?family=Roboto:100,300,400,700|Roboto+Condensed:300,400,700' rel='stylesheet' type='text/css'>

  <link href="img/favicon.ico" rel="shortcut icon">
  <link href="assets/apple-touch-icon.png" rel="apple-touch-icon">
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css" />

 
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="57x57" href="img/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="img/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="img/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="img/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="img/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="img/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="img/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="img/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="img/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="img/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="img/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
	<link rel="manifest" href="../img/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="../img/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">

	
   <link rel="stylesheet" href="style.css">
   
       <!-- Bootstrap 
    <link href="css/bootstrap.min.css" rel="stylesheet"> 
    <!-- Slick slider css 
    <link href="css/skdslider.css" rel="stylesheet">-->
    <!-- Font awesome css 
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- smooth animate css file 
    <link rel="stylesheet" href="css/animate.css"> 
    <!-- Main style css 
    
    <!-- Favicon 
	-->

  
<style>
.table-hover 
tbody 
tr:hover td, 
.table-hover tbody 
tr:hover th {
  background-color: grey;
}
</style>

<script type="text/javascript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>


  </head>

<body class="glossed" style="background-color: #2d2d2d;">

  
  <?php
  
  if ( $detect->isMobile() ) {
	  include ('headermob.html');
  }else{  
  include ('header.html');
  } 
  
  ?>


  <!-- START FEATURES SECTION -->
  <section>
    <div class="container">
      
        <div class="col-lg-12">
          <div class="features_area">
           
			<br><br><br><br><br><br>
			<div class="slider_content" style="align:center;">
			
                    <span>My Meetings</span>

    
            </div>
            <div class="features_responsive">
              

				<div class="col-md-12">
                  
									<div class="table-responsive">
        <table class="table table-bordered table-hover datatable">
          <thead>
            <tr>
             
			 <th><h5>Title</h5></th>
			 <th><h5>Location</h5></th>
			 <th><h5>Date</h5></th>
			 <th><h5>Time</h5></th>
			 <th><h5>Status</h5></th>
			 <th></th>
            </tr>
          </thead>
          <tbody>
           

		   <?php
		   
			
			
		   
		   $STMmm = $dbh->prepare("SELECT * FROM tbl_mtg_attend LEFT JOIN tbl_mtgrmbook ON tbl_mtgrmbook.mtgbook_id = tbl_mtg_attend.booking_id WHERE tbl_mtg_attend.emp_name ='$fname' AND tbl_mtgrmbook.start_date >= '$today1'");
			$STMmm->execute();
			$STMrecordsmm = $STMmm->fetchAll();
			foreach($STMrecordsmm as $mm1)
			{
			?>
			
			<tr>
			
			  
              <td style="color: white;"><?php echo $mm1['mtg_title'];?></td>
			  <td style="color: white;"><?php echo $mm1['room_name'];?></td>
			  <td style="color: white;"><?php echo $mm1['start_date'];?></td>
			  <td style="color: white;"><?php echo $mm1['start_time']." - ".$mm1['end_time'];?></td>
			  <td style="color: white;"><?php echo $mm1['status'];?></td>
			  <td>
			  <?php
			  
			  $stat=$mm1['status'];
			  
			  if($stat=='booked'){
			  ?>
			  
				<a href="db_cnfrm_mtg.php?mbkid=<?php echo $mm1['mtgbk_id'];?>&u=<?php echo $user;?>" class="btn btn-default" data-popup='tooltip' title='Confirm Attendance & Add to Calendar' data-container='body'>confirm</a>
			  
			  <?php } elseif($stat=='confirmed') {  ?>
			
				<a href="db_mtg_chkin.php?mbkid=<?php echo $mm1['mtgbk_id'];?>&u=<?php echo $user;?>" class="btn btn-default" data-popup='tooltip' title='Check In' data-container='body'>check-in</a>  
				  
			  <?php } else {} ?>
			  
			  <a href="#mtgview" class="mtgButton btn btn-default" data-mid="<?php echo $mm1['mtgbook_id'];?>" data-toggle="modal" data-target="#mtgview" data-popup='tooltip' title='Booking Details' data-container='body'>view</a>
			 
			  
			  <?php 
			  $bkby=$mm1['booking_by'];
			  if($bkby == $user){
			  ?>
			  
			  <a href="bt_roomres.php?mid=<?php echo $mm1['mtgbook_id'];?>" class="btn btn-default" data-popup='tooltip' title='Edit Booking' data-container='body'>Edit</a>
			  </td>
			  
			<?php } ?>
            </tr> 
		   
		   
		   <?php }	?>
            
          </tbody>
        </table>
	</div>  
					
				</div>
			
				<div class="col-md-12">
                  
                </div>
              
            </div>
           </div>
        </div>
     
    </div>  
 </section>
 
<div id="mtgview" class="modal fade" style="font-weight: normal;">
    <div class="modal-dialog" style="width:70%!important;">
          <div class="modal-content">

          </div>
    </div>
</div>




<script>
    $('.mtgButton').click(function(){
        var mid = $(this).attr('data-mid');
        $.ajax({url:"bt_book_view.php?mid="+mid,cache:false,success:function(result){
            $(".modal-content").html(result);
        }});
    });
	

</script>

  <!-- END FOOTER SECTION -->

  <!-- JQuery Files -->

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

  <script src="assets/modal/js/bootstrap-modal.js"></script>
  <script src="assets/modal/js/bootstrap-modalmanager.js"></script>

  </body>
</html>