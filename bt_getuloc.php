<?php
session_start();

include('init.php');
include('configPDO.php');


("SET NAMES 'UTF8'");

$user=($_SESSION['username']);
//$user1=($_GET['u']);

$lastordera = $_COOKIE['lastorder'];


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
<html lang="en-US">
<head>
<title>BENT Check IN Locator</title>


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
    <link rel="shortcut icon" type="image/png" href="img/favicon.png"/>
    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,100' rel='stylesheet' type='text/css'>     
   
<style>
.row{
  margin-top: 30px;
  margin-bottom: 30px
}
</style>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
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
		url:'location/getLocation.php',
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
<style type="text/css">
	p{ border: 2px dashed #009755; width: auto; padding: 10px; font-size: 18px; border-radius: 5px; color: #FF7361;}
    span.label{ font-weight: bold; color: #000;}
</style>
</head>
<body>
    <p><span class="label">Your Location:</span> <span id="location"></span></p>
	
	
	



</body>
</html>
