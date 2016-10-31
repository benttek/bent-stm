<?php
include('init.php');
include('configPDO.php');

date_default_timezone_set('UTC');	
$todayDate = date("Y-m-d g:i a");// current date
$currentTime = time($todayDate); //Change date into time
$timeAfterOneHour = ($currentTime-1);
$hourdiff = "+13"; // hours diff btwn server and local time
$singdate = date("Y-m-d",time() + ($hourdiff * 3600));
$curdate1 = date("Y-m-d H:i:s",time() + ($hourdiff * 3600));

$sentby=$_POST['sentby'];

$msgid = $_POST['msgid']; 

$STM3 = $dbh->prepare("SELECT first_name FROM tbl_employees");
$STM3->execute();

$STMrecordsu3 = $STM3->fetchAll();

foreach($STMrecordsu3 as $u3)


	{				
		
$msgto=$u3['first_name'];

$STM111= $dbh->prepare("INSERT INTO tbl_mail (msgto, status, sentby, msgid, msgdt) VALUES ('$msgto', 'open', '$sentby', '$msgid', '$curdate1')");
    $STM111->execute();


			}
	
	
 echo "<script>
 opener.location.href = 'newmsg.php';
close();</script>";
exit();
	
?>
