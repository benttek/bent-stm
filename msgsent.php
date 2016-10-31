<?php
include('init.php');
include('configPDO.php');

$userid=$_SESSION['username'];

$msgida = $_POST['msgid']; 
$msubject=$_POST['msubject'];
$msgtext=$_POST['msgtext'];


$status = "confirmed";


$STM = $dbh->prepare("UPDATE tbl_message SET msubject='$msubject', msgtext='$msgtxt' WHERE msgid='$msgida'");

	$STM->execute();
	
 $STM2 = $dbh->prepare("UPDATE tbl_mail SET status='new' WHERE msgid='$msgida'");

	$STM2->execute();
                
unset($msgid1);
               
header( "location:bt_msgcenter.php"); 
  

?>