<?php
include('configPDO.php');

if(isset($_GET['bkid'])){

$bookid=$_GET['bkid'];


	$STM = $dbh->prepare("DELETE FROM tbl_mtg_attend WHERE booking_id='$bookid' AND msg_id=''");
	$STM->execute();
	
	$STM2 = $dbh->prepare("UPDATE tbl_mtg_attend SET status='cancelled' WHERE booking_id='$bookid'");
	$STM2->execute();
}
header("location: bt_roomres.php?mid=$bookid");
exit();

?>