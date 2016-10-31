<?php
include('init.php');
include('configPDO.php');

$userid=$_SESSION['username'];

$today = date("Y-m-d");
$todayDate = date("Y-m-d g:i a");// current date
$currentTime = time($todayDate); //Change date into time
$timeAfterOneHour = ($currentTime-1);
$hourdiff = "+13"; 
$today1 = date("Y-m-d H:i:s",time() + ($hourdiff * 3600));

$msgida = $_POST['msgid']; 
$msgto= $_POST['msgto'];
$sentby = $_POST['sentby'];

if (!empty($_POST['msubject'])) 
{
$msgsub = $_POST['msubject']; 
}
else { $msgsub = "No Subject";
}

$msgtxt = $_POST['msgtext'];
$msgstat = "new";


$STM1 = $dbh->prepare("INSERT INTO tbl_mail(msgto, status, sentby, msgid, msgdt) VALUES ('$msgto', '$msgstat', '$sentby', '$msgida', '$today1')");

$STM1->execute();

$STM2 = $dbh->prepare("INSERT INTO tbl_message (msgid, msgdate, msubject, msgtext) VALUES ('$msgida', '$today1','$msgsub','$msgtxt')");

$STM2->execute();

               
header("location:bt_msgcenter.php?u=$userid"); 


/*
echo $today1."  | today1 ";
echo $msgida."  | msgida ";
echo $msgto."  | msgto ";
echo $sentby."  | sentby ";
echo $msgsub."  | msgsub ";
echo $msgtxt."  | msgtxt ";
 
*/
?>