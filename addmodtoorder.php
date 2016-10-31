<?php
session_start();

include('configPDO.php');



$orderid=$_GET['ordid'];
$modid=$_GET['modid'];
$ticket=$_GET['t'];


$STM = $dbh->prepare('SELECT * FROM tbl_shop WHERE id="'.$modid.'"');
	
	$STM->execute();
	$STMdetail = $STM->fetchAll();
		
		
		foreach($STMdetail as $odetail)

	$item=$odetail['name'];


$STMP = $dbh->prepare("INSERT INTO tbl_ordermods (orderdetailid, ordmod, ticket) VALUES(:orderdetailid, :ordmod, :ticket)");
	
	$STMP->bindParam(':orderdetailid', $orderid);
	$STMP->bindParam(':ordmod', $item);
	$STMP->bindParam(':ticket', $ticket);

	
	$STMP->execute();



$ticket = $_SESSION["ticket"] ;
$server = $_SESSION["server"] ;
$table = $_SESSION["table"] ;
$guests = $_SESSION["guests"] ;
$rpg = $_SESSION["rpg"] ;

$today1 = $_SESSION["orderdt"] ;
	
header( "location:bt_order1.php?ticket=$ticket&table=$table&guests=$guests&server=$server&rpg=$rpg" ); 


 /*	
echo $orderid."    orderid||";
echo $modid."    modid||";
echo $item."    item||";
	
echo $ticket."    ticket||";
echo $server."    server||";
echo $table."    table||";
echo $guests."    guests||";
echo $today1."    today1||";	


*/
?>