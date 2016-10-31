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
    <title>MY Check In - Settings</title>

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
    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,100' rel='stylesheet' type='text/css'> 

		<link href="assets/modal/js/bootstrap-modal.css" rel="stylesheet">
		<link href="assets/modal/js/bootstrap-modal-bs3patch.css" rel="stylesheet">
		
		
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/css/bootstrapValidator.min.css'>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js'></script>

     <script type="text/javascript">
 $(document).ready(function() {
    $('#contact_form').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'fa fa-check',
            invalid: 'fa fa-remove',
            validating: 'fa fa-refresh'
        },
        
            pass1: {
                validators: {
					stringLength: {
                        min: 8,
                    notEmpty: {
                        message: 'Enter New Password'
                    },
                    emailAddress: {
                        message: 'Enter New Password'
                    }
                }
            },
			 pass2: {
                validators: {
					stringLength: {
                        min: 8,
                    notEmpty: {
                        message: 'Enter Password Again'
                    },
                    emailAddress: {
                        message: 'Enter Password Again'
                    }
                }
            },
            mobile: {
                validators: {
                    notEmpty: {
                        message: 'Please supply your phone number'
                    },
                    mobile: {
                        country: 'TH',
                        message: 'Please supply a vaild phone number with area code'
                    }
                }
            },
   
           
            }
        })
        .on('success.form.bv', function(e) {
            $('#success_message').slideDown({ opacity: "show" }, "slow") // Do something ...
                $('#contact_form').data('bootstrapValidator').resetForm();

            // Prevent form submission
            e.preventDefault();

            // Get the form instance
            var $form = $(e.target);

            // Get the BootstrapValidator instance
            var bv = $form.data('bootstrapValidator');

            // Use Ajax to submit form data
            $.post($form.attr('action'), $form.serialize(), function(result) {
                console.log(result);
            }, 'json');
        });
});



        </script>
   
<style>
.row{
  margin-top: 10px;
  margin-bottom: 10px
}
</style>




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
  <section>
    <div class="container" style="background-color: #2d2d2d;">
      
        <div class="col-md-12">
          <div class="features_area">
           
			<br><br><br><br>
			<div class="slider_content" style="align:center;">
			<a href="<?php echo $ecamlink;?>?u=<?php echo $user;?>"><img src="<?php echo $uimg;?>" width="150" height="150"></a>
                    <span><?php echo $uname;?></span>
					<span>Change Password</span>
                    
                    
            </div>
            <div class="features_responsive">
              

				<div class="col-md-12">
                  
					<form action="uchangepw.php" name="cngpass" method="post">
				<script src='passtest.js'></script>	
				<div class="form-group">
				 <label class="col-md-4 control-label" for="pass1"></label>  
						<div class="col-md-4 inputGroupContainer">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-check"></i></span>
					  <input name="pass1" id="pass1" placeholder="Enter Password" class="form-control"  type="password" size="50%"/>
						</div>
					 </div> 
				</div>
					<br>
						   <div class="form-group">
					  <label class="col-md-4 control-label" for="pass2"></label>  
						<div class="col-md-4 inputGroupContainer">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-check"></i></span>
							<input name="pass2" id="pass2" placeholder="Confirm Password" class="form-control"  type="password" onkeyup="checkPass(); return false;" size="50%"/>
							
						</div>
						<span id="confirmMessage" class="confirmMessage"></span>
					  </div>
					</div>
					<br><br>
				<div class="form-group">
					  <label class="col-md-4 control-label" for="btn1"></label>  
						<div class="col-md-4 inputGroupContainer">
						<div class="input-group">
						<input name="uid" id="uid" type="hidden" value="<?php echo $user;?>"/>
							<input name="submit" id="submit" class="form-control"  type="submit" value="Update"/>
							
						</div>
						<span id="confirmMessage" class="confirmMessage"></span>
					  </div>
					</div>
					
					</form>
					<br><br>
			</div>
		</div>
	</div>
</section>

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