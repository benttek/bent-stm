<?php

include('configPDO.php');

$msgto=$_GET['msgto'];
$msgid=$_GET['msgid'];
$prevpg=$_SERVER['HTTP_REFERER'];   
$status="trash";	
	
	
	$STM1 = $dbh->prepare('UPDATE tbl_mail set status ="'.$status.'" WHERE msgto="'.$msgto.'" AND msgid="'.$msgid.'"');
	
	$STM1->execute();
header("location:$prevpg");
exit();
	
?>