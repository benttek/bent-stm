<?php
include ('init.php');

//header("Content-Type: text/html; charset=utf-8");
////mysql_query("SET NAMES 'UTF8'");

$userid=$_SESSION['username'];

$todayDate = date("Y-m-d g:i:s a");// current date
$currentTime = time($todayDate); //Change date into time
$timeAfterOneHour = ($currentTime-1);
$hourdiff = "+13"; 
$singdate = date("Y-m-d",time() + ($hourdiff * 3600));
$curdate1 = date("d-M-Y H:i",time() + ($hourdiff * 3600));
?>

<?php

echo $curdate1;?>