<?php
include('configPDO.php');

if(isset($_GET['bkid'])){

$bookid=$_GET['bkid'];


	$STM = $dbh->prepare("UPDATE tbl_mtgrmbook SET `status`='cancelled' WHERE mtgbook_id='$bookid'");
	$STM->execute();
	
	$STM = $dbh->prepare("UPDATE tbl_mtg_attend SET `status`='cancelled' WHERE booking_id='$bookid'");
	$STM->execute();
	
}
header("location: hmhead.php");
exit();

?>