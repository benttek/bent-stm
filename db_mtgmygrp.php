<?php
session_start();
include('configPDO.php');

$user=$_SESSION['username'];

$mtgid=$_POST['mtgid'];
$status="booked";


$STMa = $dbh->prepare("SELECT team FROM tbl_employees WHERE usrnm='$user'");
$STMa->execute();

$STMrecordsua = $STMa->fetchAll();

foreach($STMrecordsua as $ua1)
$myteam=$ua1['team'];

$STM3 = $dbh->prepare("SELECT first_name FROM tbl_employees WHERE team='$myteam'");
$STM3->execute();

$STMrecordsu3 = $STM3->fetchAll();

foreach($STMrecordsu3 as $u3)
{				
		
$mtgattnd=$u3['first_name'];
	
$STM = $dbh->prepare("INSERT INTO tbl_mtg_attend(emp_name, booking_id, `status`) VALUES 
('$mtgattnd','$mtgid', '$status')");
$STM->execute();
	
}
	
header("location:bt_roomres.php?mid=$mtgid");

exit();


/*
message to... for new event
$STM111= $dbh->prepare("INSERT INTO tbl_mail (msgto, status, sentby, msgid, msgdt) VALUES ('$msgto', 'open', '$sentby', '$msgid', '$curdate1')");
    $STM111->execute();

*/
?>
