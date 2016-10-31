<?php
include('init.php');
include('configPDO.php');

$user=$_GET['u'];

$mtgbkid = $_GET['mbkid']; 

$stat = "confirmed";


$STM = $dbh->prepare("UPDATE tbl_mtg_attend SET status='$stat' WHERE mtgbk_id='$mtgbkid'");

	$STM->execute();
	


$STMmm = $dbh->prepare("SELECT * FROM tbl_mtg_attend LEFT JOIN tbl_mtgrmbook ON tbl_mtgrmbook.mtgbook_id = tbl_mtg_attend.booking_id WHERE tbl_mtg_attend.mtgbk_id ='$mtgbkid'");

$STMmm->execute();

$STMrecordsmm = $STMmm->fetchAll();
foreach($STMrecordsmm as $mm1)

$mtitle=$mm1['mtg_title'];
$mstrtdate=$mm1['start_date']."T".$mm1['start_time'];
$menddate=$mm1['start_date']."T".$mm1['end_time'];

 
$STM2 = $dbh->prepare("INSERT INTO calendar(`title`, `startdate`, `enddate`, `allDay`, `user`) VALUES('$mtitle','$mstrtdate','$menddate','false','$user')");

$STM2->execute();
            

               
header( "location:bt_my_bookings.php?user=$user"); 
exit();

?>