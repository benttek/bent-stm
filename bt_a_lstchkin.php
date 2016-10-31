<?php
//session_start();

include('init.php');
include('configPDO.php');
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

("SET NAMES 'UTF8'");

$curpg = basename($_SERVER['PHP_SELF']);

$user=$_SESSION['username'];
$user1=$_GET['u'];
$lci=$_GET['lci'];


$STM = $dbh->prepare("SELECT * FROM tbl_users WHERE username='$user1'");

    $STM->execute();

    $STMrecordsu = $STM->fetchAll();
    foreach($STMrecordsu as $u1)

$uimg = $u1['img'];	
$userida = $u1['id'];
$ugrp = $u1['ugroup'];
$uname=$u1['fname']." ".$u1['lname'];



//include('common_lang.php');




date_default_timezone_set('UTC');	
	
$today = date("Y-m-d");
$todayDate = date("Y-m-d g:i a");// current date
$currentTime = time($todayDate); //Change date into time
$timeAfterOneHour = ($currentTime-1);
$hourdiff = "+13"; 
$today1 = date("Y-m-d",time() + ($hourdiff * 3600));




?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MY Last Check In</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Slick slider css -->
    <link href="css/skdslider.css" rel="stylesheet">
    <!-- Font awesome css -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- smooth animate css file -->
    <link rel="stylesheet" href="css/animate.css"> 
    <!-- Main style css -->
    <link rel="stylesheet" href="style.css">
    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico" />
    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,100' rel='stylesheet' type='text/css'> 

		<link href="assets/modal/js/bootstrap-modal.css" rel="stylesheet">
		<link href="assets/modal/js/bootstrap-modal-bs3patch.css" rel="stylesheet">
		
		
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/css/bootstrapValidator.min.css'>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js'></script>

   
<style>
.row{
  margin-top: 10px;
  margin-bottom: 10px
}
</style>



<script language="JavaScript">
<!--
function closePopup() {
   window.close();
}
//-->
</script>


  </head>

  <body style="background-color: #2d2d2d;">


  


  <!-- START FEATURES SECTION -->
  <section id="featuresSection">
    <div class="container">
      
        <div class="col-lg-12 col-md-12">
          <div class="features_area">
           
			
			<div class="slider_content" style="align:center;">
			<a href="#"><img src="<?php echo $uimg;?>" width="200" height="200"></a>
                    <span><?php echo $uname;?></span>
					<span>Last Check-In  <?php echo "  - ".$lci;?></span>
                    <span><a href="JavaScript:closePopup()">Close</a></span>
                    
            </div>
            <div class="features_responsive">
              

				<div class="col-md-12">
                  
					<?php
					$STMi = $dbh->prepare("SELECT * FROM tbl_chkin WHERE chkin_id='$lci'");

					$STMi->execute();

						$STMrecordsi = $STMi->fetchAll();
						foreach($STMrecordsi as $ui1)

						$checkinid= $ui1['chkin_id'];	
							
						$lat=$ui1['chkinlat'];
						$long=$ui1['chkinlong'];
						$chkinpic=$ui1['chkinimg'];
					
					/*
					chkin_id
					user
					timestamp
					chkindate
					chkintime
					chkinlat
					chkinlong
					chkinimg
					*/
							
					?>
					<?php echo $checkinid;?><br><br>
					<iframe src = "https://maps.google.com/maps?q=<?php echo $lat;?>,<?php echo $long;?>&hl=es;z=14&amp;output=embed"></iframe>
					<br><br>
					<?php echo $chkinpic;?><br>
					<img src="<?php echo $chkinpic;?>" width="300" height="auto"/>
					<br><br>
					  					
				</div>
			
				<div class="col-md-12">
                  
					 
				 

					</a>
                  
                </div>
              
            </div>
           </div>
        </div>
     
    </div>  
 </section>
<br><br><br><br><br>
  <!-- START FOOTER SECTION -->
  <footer id="footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="footer_area">
            <p>Designed By <a href="#" rel="nofollow">BENT Technology Labs, Inc.</a></p>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- END FOOTER SECTION -->

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
  
  <script src="assets/modal/js/bootstrap-modal.js"></script>
  <script src="assets/modal/js/bootstrap-modalmanager.js"></script>

  </body>
</html>