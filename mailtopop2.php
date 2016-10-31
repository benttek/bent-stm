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


$usr = $_SESSION['username'];


$sentbya=$_SESSION['sentby'];

$msgid=$_SESSION['msgid1'];



?>
<!DOCTYPE html>
<html lang="en">

<head>
<link rel="shortcut icon" href="favicon.ico" >
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Choose Recipient</title>
<style>body,td,th {
	font-family: Tahoma, Geneva, sans-serif;
	font-size: 12px;
}
</style>

<script language="JavaScript">
<!--
function refreshParent() {
  window.opener.location.href = window.opener.location.href;

  if (window.opener.progressWindow)
		
 {
    window.opener.progressWindow.close()
  }
  window.close();
}
//-->
</script>
</head>



<body class="twoColHybLtHdr">

<div id="container">
  <div id="header">
    <table width="93%" border="0">
      <tr>
        <td width="40%"><span class="style16"><img src="img/bentlogo.png" alt="BENT Labs" width="180" height="auto" align="left"/></span></td>
        <td width="6%">&nbsp;</td>
        
      </tr>
    </table>
  </div>
  <p>

<?php echo $msgid;?><br>
Sent By - <?php echo $sentbya;?>  
  
<br><br>

<form action="msgall.php" name="frmmsgall" method="post">
<input type="hidden" name="sentby" id="sentby" value="<?php echo $sentbya;?>">
<input type="hidden" name="msgid" id="msgid" value="<?php echo $msgid;?>">
<input type="submit" id="submit" name="submit" class="btn btn-round btn-primary" value="Everyone"/>
</form>
<br>
<form action="msgmygrp.php" name="frmmsgmygrp" method="post">
<input type="hidden" name="sentby" id="sentby" value="<?php echo $sentbya;?>">
<input type="hidden" name="msgid" id="msgid" value="<?php echo $msgid;?>">
<input type="submit" id="submit" name="submit" class="btn btn-round btn-primary" value="My Group"/>
</form>
  
  <p>
  <?php

$STM3 = $dbh->prepare("SELECT first_name FROM tbl_employees");
$STM3->execute();

$STMrecordsu3 = $STM3->fetchAll();

// Count table rows
//$count=mysql_num_rows($result);

$i = 0;
foreach($STMrecordsu3 as $u3){
	
?>
  <form id="form1" name="form1" method="post" action="addmsgto.php">
<tr>
<td align="left"><input name="checkbox[]" type="checkbox" id="checkbox[]" value="<?php echo $i++;?>"/></td>
<td align="left"><input name="name[]" type="text" id="name" value="<?php echo $u3['first_name'];?>" readonly="readonly"/></td>
<td></td>
</tr>
<p>
  <?php
}
?>
<input type="hidden" name="usr" id="usr" value="<?php echo $usr;?>"/>
<input type="hidden" name="sentbya" id="sentbya" value="<?php echo $sentbya;?>"/>
<input type="hidden" name="msgid" id="msgid" value="<?php echo $msgid;?>"/>
  <input type="submit" name="Submit" value="Done">
</p>
<p><a href="JavaScript:refreshParent()">close window</a></p>
</form>
<?php

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

}else{
exit();
}


?>

</p>
  
  
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p><br class="clearfloat" />
  </p>
<!-- end #container -->
</div>
</body>
</html>
