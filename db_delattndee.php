<?php
include('configPDO.php');

if(isset($_GET['atndid'])){

$attndid=$_GET['atndid'];


	$STM = $dbh->prepare("DELETE FROM tbl_mtg_attend WHERE mtgbk_id='$attndid' AND msg_id=''");
	$STM->execute();
	
	$STM2 = $dbh->prepare("UPDATE tbl_mtg_attend SET status='cancelled' WHERE mtgbk_id='$attndid'");
	$STM2->execute();
}

$mtgid=$_GET['mid'];

header("location: bt_roomres.php?mid=$mtgid");
exit();

?>