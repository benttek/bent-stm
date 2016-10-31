<?php
session_start();
include('configPDO.php');

	
	$uid1 = $_SESSION['username'];
	$uid=$_POST['uid'];
	$pass2=$_POST['pass2'];

	
	$STM1a = $dbh->prepare("SELECT * FROM tbl_users WHERE `username` = '$uid1'");

    $STM1a->execute();

    $STMrecordsu1 = $STM1a->fetchAll();
    foreach($STMrecordsu1 as $cuser1) {

	
		$userida = $cuser1['id'];
	}


 
	$STM = $dbh->prepare("Update tbl_users SET `password`='$pass2' WHERE `id`='$userida'");

	$STM->execute();
	
header("location:bt_newpwconfirm.php?u=$uid");
exit();
 

?>