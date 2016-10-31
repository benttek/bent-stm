<?php 
session_start();

include('init.php');
include('configPDO.php');


("SET NAMES 'UTF8'");

$user=($_SESSION['username']);
//$user1=($_GET['u']);

//$lastordera = $_COOKIE['lastorder'];


$STM = $dbh->prepare("SELECT * FROM tbl_users WHERE username = '$user'");

    $STM->execute();

    $STMrecordsu = $STM->fetchAll();
    foreach($STMrecordsu as $u1)

$uimg = $u1['img'];	
$userida = $u1['id'];
$ugrp = $u1['ugroup'];

if($ugrp=="suser"){
header("location:udash.php?user=$user");	
} elseif ($ugrp=="manager"){
header("location:mdash.php?user=$user");			
}elseif ($ugrp=="admin"){
header("location:dashboard.php?user=$user");
}
?>