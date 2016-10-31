<?php
session_start();
include('init.php');
include('configPDO.php');


$msgid=$_GET['msgid'];
  
	
	
	
	$STM1 = $dbh->prepare('DELETE FROM tbl_mail WHERE msgid="'.$msgid.'"');
	
	$STM1->execute();

                
unset($msgid1);
               
header( "location:newmsg.php"); 
  

?>
