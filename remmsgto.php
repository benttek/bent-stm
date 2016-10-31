<?php

include('configPDO.php');

$msgto=$_GET['msgto'];
$msgid=$_GET['msgid'];
$prevpg=$_SERVER['HTTP_REFERER'];   
	
	
	
	$STM1 = $dbh->prepare('DELETE FROM tbl_mail WHERE msgto="'.$msgto.'" AND msgid="'.$msgid.'"');
	
	$STM1->execute();
header("location:$prevpg");
exit();
	
?>