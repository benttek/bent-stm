<?php
session_start();
include('configPDO.php');

$user=$_SESSION['username'];

$mtgid=$_GET['bkid'];

$randmsgid=($rndate.rand(1,10000000000));



date_default_timezone_set('UTC');	

$hourdiff = "+7"; // hours diff btwn server and local time
$singdate = date("Y-m-d",time() + ($hourdiff * 3600));
$curdate1 = date("Y-m-d H:i:s",time() + ($hourdiff * 3600));


$STM3 = $dbh->prepare("SELECT * FROM tbl_mtg_attend WHERE booking_id ='$mtgid' AND msg_id =''");
$STM3->execute();

$STMrecordsu3 = $STM3->fetchAll();

foreach($STMrecordsu3 as $u3)

{				
	
$mtgattnd=$u3['emp_name'];


$STM = $dbh->prepare("INSERT INTO tbl_mail(msgto, status, sentby, msgid, msgdt) VALUES ('$mtgattnd', 'new', '$user', '$randmsgid', '$curdate1')");
$STM->execute();

$STM4 = $dbh->prepare("UPDATE tbl_mtg_attend SET msg_id='$randmsgid' WHERE emp_name = '$mtgattnd' AND booking_id='$mtgid'");
$STM4->execute();	

}

$STM3a = $dbh->prepare("SELECT * FROM tbl_mtgrmbook WHERE mtgbook_id ='$mtgid'");
$STM3a->execute();

$STMrecordsu3a = $STM3a->fetchAll();

foreach($STMrecordsu3a as $u3a) {

$mtgtitle=$u3a['mtg_title'];


$msgsubj="Meeting: ".$mtgtitle;

$msgtext="You have been invited to a meeting: ".$mtgtitle." on ".$u3a['start_date']." from ".$u3a['start_time']." - ".$u3a['end_time'].". Go to booking to confirm and view details";

$STM2 = $dbh->prepare("INSERT INTO tbl_message (msgid, msgdate, msubject, msgtext) VALUES ('$randmsgid', '$curdate1', '$msgsubj', '$msgtext')");
$STM2->execute();	




}
	
header("location:hmhead.php");

exit();


/*
message to... for new event
$STM111= $dbh->prepare("INSERT INTO tbl_mail (msgto, status, sentby, msgid, msgdt) VALUES ('$msgto', 'open', '$sentby', '$msgid', '$curdate1')");
    $STM111->execute();

*/
?>
