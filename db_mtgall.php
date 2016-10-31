<?php
session_start();

include('configPDO.php');

$user=$_SESSION['username'];

$mtgid=$_POST['mtgid'];
$status="booked";


$STM3 = $dbh->prepare("SELECT first_name FROM tbl_employees");
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
	
?>
