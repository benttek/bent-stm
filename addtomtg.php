<?php
include('configPDO.php');

("SET NAMES 'UTF8'");

date_default_timezone_set('UTC');	
$todayDate = date("Y-m-d g:i a");// current date
$currentTime = time($todayDate); //Change date into time
$timeAfterOneHour = ($currentTime-1);
$hourdiff = "+13"; // hours diff btwn server and local time
$singdate = date("Y-m-d",time() + ($hourdiff * 3600));
$curdate1 = date("Y-m-d H:i:s",time() + ($hourdiff * 3600));

$mtgid=$_POST['mtgid'];
$status="booked";

// values from form
$name=$_POST['name'];
$checkbox=$_POST['checkbox'];

if($checkbox>0){

foreach($checkbox as $i) { 

$STM = $dbh->prepare("INSERT INTO tbl_mtg_attend(emp_name, booking_id, `status`) VALUES ('$name[$i]','$mtgid', '$status')");
$STM->execute();
}
}

header( "location:bt_roomres.php?mid=$mtgid"); 

exit();

/*


$STM2 = $dbh->prepare("INSERT INTO tbl_message (msgid, msgdate) VALUES ('$msgid', '$curdate1')");
$STM2->execute();

}


*/
?>