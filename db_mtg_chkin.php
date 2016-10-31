<?php
include('init.php');
include('configPDO.php');

$user=$_GET['u'];

$mtgbkid = $_GET['mbkid']; 

$stat = "checked-in";


$STM = $dbh->prepare("UPDATE tbl_mtg_attend SET status='$stat' WHERE mtgbk_id='$mtgbkid'");

	$STM->execute();
	
 /*
 $STM2 = $dbh->prepare("UPDATE tbl_mail SET status='new' WHERE msgid='$msgida'");

	$STM2->execute();
 */             

               
header( "location:bt_my_bookings.php?user=$user"); 
exit();

?>