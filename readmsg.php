<?php
include('init.php');
include('configPDO.php');

$usr=$_SESSION['username'];

$STM = $dbh->prepare("SELECT * FROM tbl_users WHERE username = '$user' OR username='$user1'");

    $STM->execute();

    $STMrecordsu = $STM->fetchAll();
    foreach($STMrecordsu as $u1)

$uimg = $u1['img'];	
$userida = $u1['id'];
$ugrp = $u1['ugroup'];
$uname=$u1['fname']." ".$u1['lname'];

$sentby=$u1['fname'];

$sentto=$u1['fname'];


$msgid1 = "-1";
if (isset($_GET['msgid'])) {
  $msgid1 = $_GET['msgid'];
}

$STM = $dbh->prepare("UPDATE tbl_mail SET status='read' WHERE msgid='$msgid1' AND msgto = '$usr'");

	$STM->execute();

$STMmsg = $dbh->prepare("SELECT * FROM tbl_mail, tbl_message WHERE tbl_mail.msgid = tbl_message.msgid AND tbl_mail.msgid = '$msgid1'");

    $STMmsg->execute();

    $STMrecordsmsg = $STMmsg->fetchAll();
    foreach($STMrecordsmsg as $msg1)



?>
<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" href="favicon.ico" >
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="apple-mobile-web-app-capable" content="yes" />
<title>Read Message</title>
   	
	<link rel="apple-touch-icon" sizes="57x57" href="img/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="img/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="img/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="img/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="img/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="img/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="img/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="img/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="img/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="img/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="img/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
	<link rel="manifest" href="../img/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="../img/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
	
   <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Slick slider css -->
    <link href="css/skdslider.css" rel="stylesheet">
    <!-- Font awesome css -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- smooth animate css file -->
    <link rel="stylesheet" href="css/animate.css"> 
    <!-- Main style css -->
    <link rel="stylesheet" href="style.css">
    <!-- Favicon -->
    
    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,100' rel='stylesheet' type='text/css'> 

		<link href="assets/modal/js/bootstrap-modal.css" rel="stylesheet">
		<link href="assets/modal/js/bootstrap-modal-bs3patch.css" rel="stylesheet">
		
<link rel="shortcut icon" href="favicon.ico?v=2" />
<!--<link rel="stylesheet" href="css/style.css" />-->

<script language="JavaScript">

function refreshParent() {
  window.opener.location.href = window.opener.location.href;

  if (window.opener.progressWindow)
		
 {
    window.opener.progressWindow.close()
  }
  window.close();
}

</script>


</head>


<body style="background-color: #2d2d2d;">

<div id="container">

<h3 class="style14">Read Message</h3>

    <table width="68%" border="0" align="center">
      <tr>
        <th scope="col">&nbsp;</th>
        <th height="64" align="left" scope="col"><a href="JavaScript:refreshParent()" style="color:red;">close</a></th>
        <th align="left" scope="col"></th>
        <th align="left" scope="col">&nbsp;</th>
        <th colspan="2" align="left" scope="col"><p class="style16"><a href="newmsg.php">Message - READ</a></p></th>
      </tr>
		<?php 
		$STMrd = $dbh->prepare("UPDATE tbl_mail SET status='read' WHERE msgid = '$msgid1' AND msgto='$usr'");

			$STMrd->execute();
		
		$STMmsg = $dbh->prepare("SELECT * FROM tbl_mail, tbl_message WHERE tbl_mail.msgid = tbl_message.msgid AND tbl_mail.msgid = '$msgid1' AND tbl_mail.msgto='$usr'");

			$STMmsg->execute();

			$STMrecordsmsg = $STMmsg->fetchAll();
			foreach($STMrecordsmsg as $msg1) {

		?>     

	 <tr>
        <th width="96" height="31" scope="col">&nbsp;</th>
		
        <th width="115" align="left" scope="col">
		<div align="left"><span class="style16"><h5>From</h5></span></div>
		</th>
        
		<th width="330" align="left" scope="col">
		<div align="left" class="style16">
		<span class="style14"><h5><?php echo $msg1['sentby']; ?></h5></span></div>
		</th>
        
		<th width="51" align="left" scope="col">&nbsp;</th>
        
		<th colspan="2" align="left" scope="col">
		
		<div align="center">
		
		<a href="replymsg.php?msgid=<?php echo $msg1['msgid'];?>"><img src="img/mail_reply.png" width="36" height="36" alt="reply" /></a> 
		
		<a href="forwrdmsg.php?msgid=<?php echo $msg1['msgid'];?>"><img src="img/mail_forward.png" width="36" height="36" alt="forward" /></a> 
		
		<a href="delmsg.php?msgid=<?php echo $msg1['msgid'];?>"><img src="img/email_delete.png" width="43" height="43" alt="delete" /></a>
		
		</div>
		
		</th>
      </tr>
      
      <tr>
        <td height="51">&nbsp;</td>
        <td align="left"><span class="style16"><h5>Subject</h5></span></td>
        
		<td colspan="4" align="left"><span class="style14"><h5><?php echo $msg1['msubject']; ?></h5></span>
		</td>
      
	  
	  </tr>
     
	 <tr>
        <td height="34">&nbsp;</td>
        <td align="left"><span class="style16"><h5>Date</h5></span></td>
        <td colspan="4" align="left"><span class="style14"><h5><?php echo $msg1['msgdate']; ?></h5></span></td>
      </tr>
      
	  <tr>
        <td>&nbsp;</td>
        <td align="left">&nbsp;</td>
        <td align="left">&nbsp;</td>
        <td align="left">&nbsp;</td>
        <td width="111" align="left">&nbsp;</td>
        <td width="94" align="left">&nbsp;</td>
      </tr>
  </table>
  <table width="52%" border="1" align="center">
      <tr>
        <td height="87" align="left" valign="top"><p style="color: white;"><?php echo nl2br($msg1['msgtext']); ?></p>
       </td>
    </tr>
	
  </table>
 
  
			<?php } ?>


			
  <p><br class="clearfloat" />
  </p>
<!-- end #container -->
</div>
</body>
</html>
