<?php
session_start();

include('init.php');
include('configPDO.php');
require_once 'device/Mobile_Detect.php';
$detect = new Mobile_Detect;

$deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');

if ( $detect->isMobile() ) {
$camlink='imgcam2.php'; 
} elseif( $detect->isTablet() ){
$camlink='imgcam2.php';  
} else {
$camlink='comphoto/cam.php';
}
  
("SET NAMES 'UTF8'");

$curpg = basename($_SERVER['PHP_SELF']);

$user=($_SESSION['username']);
$user1=($_GET['u']);
$lci=$_GET['lci'];


$STM = $dbh->prepare("SELECT * FROM tbl_users WHERE username = '$user' OR username='$user1'");

    $STM->execute();

    $STMrecordsu = $STM->fetchAll();
    foreach($STMrecordsu as $u1)

$uimg = $u1['img'];	
$userida = $u1['id'];
$ugrp = $u1['ugroup'];
$uname=$u1['fname']." ".$u1['lname'];
//include('common_lang.php');

$STMD= $dbh->prepare("SELECT * FROM tbl_company");
    $STMD->execute();
    $row_company = $STMD->fetch();
	$totalRows_company = $row_company;
	
	
$coname = $row_company['url_name'];
$coimg = $row_company['logo'];
//$imgwidth=$row_company['imgwidth'];
//$imgheight=$row_company['imgheight'];

date_default_timezone_set('UTC');	
	
$today = date("Y-m-d");
$todayDate = date("Y-m-d g:i a");// current date
$currentTime = time($todayDate); //Change date into time
$timeAfterOneHour = ($currentTime-1);
$hourdiff = "+13"; 
$mindiff1 = "10";
$today1 = date("Y-m-d",time() + ($hourdiff * 3600));

$chkindate=date("Y-m-d",time() + ($hourdiff * 3600));

$chkintime=date("H:i:s",time() + ($hourdiff * 3600));

$less5min = date('Y-m-d H:i:s', strtotime('-2 minutes'));



?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="apple-mobile-web-app-capable" content="yes" />
    <title>MY Check In</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Slick slider css -->
    
    <!-- Font awesome css -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- smooth animate css file -->
    <link rel="stylesheet" href="css/animate.css"> 
    <!-- Main style css -->
    <link rel="stylesheet" href="style.css">
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
    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,100' rel='stylesheet' type='text/css'>     
   




<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<?php
if(!isset($checkinid)){
?>
<script>
$(document).ready(function(){
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showLocation);
    } else { 
        $('#location').html('Geolocation is not supported by this browser.');
    }
});

function showLocation(position) {
	var latitude = position.coords.latitude;
	var longitude = position.coords.longitude;

	$.ajax({
		type:'POST',
		url:'location/getLocationa.php',
		data:'latitude='+latitude+'&longitude='+longitude,
		success:function(msg){
            if(msg){
               $("#location").html(msg);
            }else{
                $("#location").html('Not Available');
            }
		}
	});
}
</script>
<?php } ?>


<script type="text/javascript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>


<style type="text/css">
	p{ width: auto; padding: 10px; font-size: 18px; border-radius: 5px; color: #FF7361;}
    span.label{ font-weight: bold; color: #fff;}
</style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body style="background-color: #2d2d2d;">
  <!-- BEGAIN PRELOADER -->
  <div id="preloader">
    <div id="status">&nbsp;</div>
  </div>
  <!-- END PRELOADER -->

<br><br>

  <?php
  if ( $detect->isMobile() ) {
	  include ('headermob.html');
  }else{  
  include ('header.html');
  } ?>

  <!-- START FEATURES SECTION -->
  <section>
    <div class="container" style="background-color: #2d2d2d;">
		 <div class="col-lg-12">
          
			
           
			<br><br><br><br>
			  <div style="align:center;">
				
				<a href="javascript;:" onclick="MM_openBrWindow('<?php echo $camlink;?>?u=<?php echo $user;?>','','scrollbars=yes,width=800,height=600');return false" style="color: white;">
				<i class="fa fa-camera-retro fa-4x"></i><br><h4>Take Photo</h4></a>
				
				
				
            </div>
			 <?php
			 
			 
			if(isset($checkinid)){
				
				echo $checkinid;
				
				$STMlc = $dbh->prepare("SELECT * FROM tbl_chkin WHERE user='$user' OR user='$user1' ORDER BY timestamp DESC LIMIT 1");

				$STMlc->execute();

				$STMrecordslc = $STMlc->fetchAll();
				foreach($STMrecordslc as $lci1a)
				
				$lastchkinid=$lci1a['chkin_id'];
				//$lat1 = ;
				//$long1 = ;

			?>
			<?php } ?>
			  
			
			
			 
						
			 <div class="row">
			 <div class="col-md-12">
			<br><br><br><br>
			<p><span class="label"></span> <span id="location"></span></p>
						
			</div>
			</div>
            <div class="features_responsive">
             
				
			

				<div class="row">
				
				<div class="col-md-4">
                  
					 <a href="db_delloc.php" class="modalButton5" style=""><h3></h3></a>
                  
                </div>
				</div>

            </div>
		
		</div>
    </div>  
 </section>



  <!-- JQuery Files -->

  <!-- Initialize jQuery Library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <!-- Google map -->
  <script src="https://maps.googleapis.com/maps/api/js"></script>
  <script src="js/jquery.ui.map.js"></script>  
  <!-- Skds slider -->
  <script src="js/skdslider.min.js"></script>
  <!-- Bootstrap js  -->
  <script src="js/bootstrap.min.js"></script>
  <!-- For smooth animatin  -->
  <script src="js/wow.min.js"></script> 

  <!-- Custom js -->
  <script type="text/javascript" src="js/custom.js"></script>

  </body>
</html>