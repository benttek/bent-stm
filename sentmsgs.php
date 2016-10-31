<?php
session_start();

include('init.php');
include('configPDO.php');
require_once 'device/Mobile_Detect.php';
$detect = new Mobile_Detect;

$deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');
$scriptVersion = $detect->getScriptVersion();

("SET NAMES 'UTF8'");

$curpg = basename($_SERVER['PHP_SELF']);

$user=($_SESSION['username']);
//$user1=($_GET['u']);


$STM = $dbh->prepare("SELECT * FROM tbl_users WHERE username = '$user' OR username='$user1'");

    $STM->execute();

    $STMrecordsu = $STM->fetchAll();
    foreach($STMrecordsu as $u1)

$uimg = $u1['img'];	
$userida = $u1['id'];
$ugrp = $u1['ugroup'];
$uname=$u1['fname']." ".$u1['lname'];

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
	<meta name="apple-mobile-web-app-capable" content="yes" />
    <title>MY Check In</title>

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
    <!-- Google Fonts 
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,100' rel='stylesheet' type='text/css'> 
	-->
		<link href="assets/modal/js/bootstrap-modal.css" rel="stylesheet">
		<link href="assets/modal/js/bootstrap-modal-bs3patch.css" rel="stylesheet">
   
<style>
.row{
  margin-top: 10px;
  margin-bottom: 10px
}
</style>

<script type="text/javascript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body style="background-color: #2d2d2d;">

  <?php
  if ( $detect->isMobile() ) {
	  include ('headermob.html');
  }else{  
  include ('header.html');
  } ?>
  


  <!-- START FEATURES SECTION -->
  <section id="featuresSection">
    <div class="container">
      
        <div class="col-lg-12 col-md-12">
          <div class="features_area">
           
			
            <div class="features_responsive">
              
				<div id="container">
						  <div id="sidebar1">
							<h3 class="style14">Sent</h3>
							<p><a href="newmsg.php">COMPOSE Message</a></p>
							<p><a href="bt_msgcenter.php">Inbox</a></p>
							<p><a href="msgtrash.php">Trash</a></p>
							<br>
							<table width="80%" border="0" align="center" class="sortable">
							  <tr>
								
								
								<th width="7%" align="left" scope="col"><h5>Forward</h5></th>
								<th width="7%" align="left" scope="col"><h5>Delete</h5></th>
								<th width="15%" align="left" scope="col"><h5>To</h5></th>
								<th width="45%" align="left" scope="col"><h5>Subject</h5></th>
								<th width="12%" align="right"><h5>Date</h5></th>
								
							  </tr>
		  <?php 
							
											   
		   $STM1 = $dbh->prepare("SELECT * FROM tbl_mail, tbl_message WHERE tbl_mail.msgid = tbl_message.msgid AND (tbl_mail.sentby = '$user') GROUP BY tbl_mail.msgid ORDER BY tbl_mail.status ASC, tbl_message.msgdate DESC");

			$STM1->execute();

			$STMrecordsm = $STM1->fetchAll();
			foreach($STMrecordsm as $mail)
			 
			
			{?>
				
							
							  <tr>
								
								
			
			
			<td align="left"><a href="forwardmsg.php?msgid=<?php echo $mail['msgid'];?>"><img src="img/mail_forward.png" width="24" height="24" alt="forward" /></a></td>
			
			<td align="left"><a href="delmsg.php?msgid=<?php echo $mail['msgid'];?>"><img src="img/email_delete.png" width="28" height="28" alt="delete" /></a></td>

			<td align="left"><a href="#"><?php echo $mail['msgto']; ?></a></td>

			<td align="left"><a href="javascript;:"onclick="MM_openBrWindow('readmsg.php?msgid=<?php echo $mail['msgid'];?>','','scrollbars=yes,width=50%,height=auto');return false"><strong><?php echo $mail['msubject'];?></strong></a></td>

			<td align="left"><a href="#"><?php echo $mail['msgdate']; ?></a></td>

			

			</tr>
							  <?php } ?>
							</table>
							
							
							<p>&nbsp;</p>
						  </div>
						<div id="mainContent"> </div>
							<!-- This clearing element should immediately follow the #mainContent div in order to force the #container div to contain all child floats -->
						  <p>&nbsp;</p>
						  <p>&nbsp;</p>
						  <p>&nbsp;</p>
						  <p>&nbsp;</p>
						  <p>&nbsp;</p>
						  <p><br class="clearfloat" />
						  </p>
						<!-- end #container -->
						</div>

			
				<div class="col-md-12">
                  
					 
				  <h4><p>This is a <b><?php echo $deviceType; ?></b></p></h4>

					
                  
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

  <!-- Initialize jQuery Library 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <!-- Google map 
  <script src="https://maps.googleapis.com/maps/api/js"></script>-->
  
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