<?php
session_start();

include('configPDO.php');


$mtitle=$_POST['mtitle'];
$mdate=$_POST['mdate'];
$stime=$_POST['stime'];
$etime=$_POST['etime'];
$rmid=$_POST['rmid'];
$rmname=$_POST['rmname'];
$bkby=$_SESSION['username'];


$STMP = $dbh->prepare("INSERT INTO tbl_mtgrmbook (mtg_title, start_time, start_date, end_time, room_id, room_name, booking_by) VALUES(:mtg_title, :start_time, :start_date, :end_time, :room_id, :room_name, :booking_by)");
	
	$STMP->bindParam(':mtg_title', $mtitle);
	$STMP->bindParam(':start_time', $stime);
	$STMP->bindParam(':start_date', $mdate);
	$STMP->bindParam(':end_time', $etime);
	$STMP->bindParam(':room_id', $rmid);
	$STMP->bindParam(':room_name', $rmname);
	$STMP->bindParam(':booking_by', $bkby);

	$STMP->execute();
	
	$lid = $dbh->lastInsertId();
	
	
	$STMue = $dbh->prepare("SELECT * FROM tbl_employees WHERE usrnm='$bkby'");
    $STMue->execute();
    $STMrecordsue = $STMue->fetchAll();
    foreach($STMrecordsue as $ue1)
	
	$empid = $ue1['ID'];
	$empname = $ue1['first_name']." ".$ue1['last_name'];
	$status="booked";
	
	$STME = $dbh->prepare("INSERT INTO tbl_mtg_attend (empid, emp_name, booking_id, status) VALUES(:empid, :emp_name, :booking_id, :status)");
	
	$STME->bindParam(':empid', $empid);
	$STME->bindParam(':emp_name', $empname);
	$STME->bindParam(':booking_id', $lid);
	$STME->bindParam(':status', $status);
	
	$STME->execute();

	$STMmnum = $dbh->prepare("SELECT * FROM tbl_mtgrmbook WHERE booking_by='$bkby' ORDER BY mtgbook_id DESC LIMIT 1");
    $STMmnum->execute();
    $STMrecordsmnum = $STMmnum->fetchAll();
    foreach($STMrecordsmnum as $mnum1)
	
	$mtgid = $mnum1['mtgbook_id'];
	
header( "location:bt_roomres.php?mid=$mtgid"); 



 /*	
echo $ticket."    ticket||";
echo $server."    server||";
echo $table."    table||";
echo $guests."    guests||";
echo $today1."    today1||";
echo $itemid."    itemid||";
echo $item."    item||";
echo $price."    price||";
echo $printer."    printer||";
echo $qty."    qty||";
echo $status."    status||"; 
*/
?>