<?php
include('init.php');
include('configPDO.php');

("SET NAMES 'UTF8'");

date_default_timezone_set('UTC');	
$todayDate = date("Y-m-d g:i a");// current date
$currentTime = time($todayDate); //Change date into time
$timeAfterOneHour = ($currentTime-1);
$hourdiff = "+13"; // hours diff btwn server and local time
$singdate = date("Y-m-d",time() + ($hourdiff * 3600));
$curdate1 = date("Y-m-d H:i:s",time() + ($hourdiff * 3600));


$usr = $_POST['usr'];


$sentbya=$_POST['sentbya'];

$msgid=$_POST['msgid'];



// Get values from form
$name=$_POST['name'];
$checkbox=$_POST['checkbox'];


// Check if button name "Submit" is active, do this
if($checkbox>0){
//for($i=0;$i<$count;$i++){


foreach($checkbox as $i) { 


$STM = $dbh->prepare("INSERT INTO tbl_mail(msgto, status, sentby, msgid, msgdt) VALUES ('$name[$i]', 'open', '$sentbya', '$msgid', '$curdate1')");

$STM->execute();
}
$STM2 = $dbh->prepare("INSERT INTO tbl_message (msgid, msgdate) VALUES ('$msgid', '$curdate1')");
$STM2->execute();

}

 echo "<script>
 opener.location.href = 'newmsg.php';
close();</script>";
exit();


?>