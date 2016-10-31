<?php
session_start();
include('init.php');
include('configPDO.php');
require_once 'device/Mobile_Detect.php';
$detect = new Mobile_Detect;

$deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');
$scriptVersion = $detect->getScriptVersion();

("SET NAMES 'UTF8'");

$user=($_SESSION['username']);
//$user1=($_GET['u']);


$STM = $dbh->prepare("SELECT * FROM tbl_users WHERE username = '$user' OR username='$user1'");

    $STM->execute();

    $STMrecordsu = $STM->fetchAll();
    foreach($STMrecordsu as $u1)

$uimg = $u1['img'];	
$userida = $u1['id'];

$STMue = $dbh->prepare("SELECT * FROM tbl_employees WHERE userid='$userida'");

    $STMue->execute();

    $STMrecordsue = $STMue->fetchAll();
    foreach($STMrecordsue as $ue1)


$sentby=$ue1['first_name'];

$_SESSION['sentby']=$sentby;

$team=$ue1['team'];

$STM1 = $dbh->prepare("SELECT msgid FROM tbl_mail WHERE sentby = '$sentby' AND status='open'");

    $STM1->execute();

    $STMrecords1 = $STM1->fetchAll();
    foreach($STMrecords1 as $m1)


$msgida=$m1['msgid'];

if(isset($msgida)){

$_SESSION['msgid1']=$msgida;	

}else{


$randmsgid=($rndate.rand(1,10000000000));

$msgida=$randmsgid;

$_SESSION['msgid1']=$msgida;

}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="apple-mobile-web-app-capable" content="yes" />
    <title>MY Check In</title>
	
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

    <!-- Google Fonts 
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,100' rel='stylesheet' type='text/css'> 
	-->
		<link href="assets/modal/js/bootstrap-modal.css" rel="stylesheet">
		<link href="assets/modal/js/bootstrap-modal-bs3patch.css" rel="stylesheet">
   
<style>
.row{
  margin-top: 10px;
  margin-bottom: 10px
}
</style>
<style type="text/css">
body {
	background-color: black;
}
body,td,th {
	color: #fff;
}
</style>



    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

<script type="text/javascript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>

</head>
<br><br>
  <?php
  if ( $detect->isMobile() ) {
	  include ('headermob.html');
  }else{  
  include ('header.html');
  } ?>
   
    <table width="60%" border="0" align="center">
      <tr>
        <td colspan="2" align="center"><h2>New Message</h2></td>
      </tr>
      <tr>
        <td width="16%">
        <?php 
		
		$STM3 = $dbh->prepare("SELECT count(msgto) as cntmsgto FROM tbl_mail WHERE msgid='$msgida'");

    $STM3->execute();

    $STMrecords3 = $STM3->fetchAll();
    foreach($STMrecords3 as $m3)

	{
	$recount=$m3['cntmsgto'];
	}
		if($recount == 0) { ?>
        <a href="javascript;:" class="style13" onclick="MM_openBrWindow('mailtopop1.php','','scrollbars=yes,width=290,height=800');
return false">To (Click):</a>
<?php } 
else
{
?>
<a href="javascript;:" class="style13" onclick="MM_openBrWindow('mailtopop2.php?mi=<?php echo $msgida;?>','','scrollbars=yes,width=290,height=800');
return false">To (Add):</a>
<?php } ?>

</td>
        <td width="84%">&nbsp;
      
	  <?php 
	  
	  
	$STM2 = $dbh->prepare("SELECT msgto, msgid FROM tbl_mail WHERE msgid='$msgida'");

    $STM2->execute();

    $STMrecords2 = $STM2->fetchAll();
    foreach($STMrecords2 as $m2)

	{

	  ?>  
	  
	  <a href="remmsgto.php?msgto=<?php echo $m2['msgto'];?>&msgid=<?php echo $m2['msgid'];?>" class="btn btn-default"><i class="fa fa-minus-circle"></i><?php echo " ".$m2['msgto'];?></a><?php } ?>
	  
	  </td>
		</tr>

	   <tr>
		          
            
			
          </tr>
          
      <tr>
      </tr>
        <td height="16">&nbsp;</td>
      </tr>
    </table>
    <form id="form1" name="form1" method="post" action="msgsent.php">
    <table width="49%" border="0" align="center">
      <tr>
        <td colspan="2" align="left">&nbsp;</td>

		</tr>
            
       
      <tr>
        <td colspan="2" align="left">Subject</td>
        <td colspan="2" align="left" valign="top">
          <input name="msubject" type="text" id="msubject" value="" size="60" />
        </td>
        <td width="4" align="left">&nbsp;</td>
      </tr>
      <tr>
        <td width="92" height="24" align="left">&nbsp;</td>
        <td colspan="3" align="left">&nbsp;</td>
        <td align="left">&nbsp;</td>
      </tr>
      <tr>
        <td align="left" valign="top">Message</td>
        <td colspan="3" align="left"><textarea name="msgtext" value="" cols="70" rows="15" id="msgtext"></textarea></td>
        <td align="left">&nbsp;</td>
      </tr>
      <tr>
        <td valign="top">&nbsp;</td>
        <td colspan="3" align="right">        
        <input type="hidden" name="msgid" id="msgid" value="<?php echo $msgida;?>">
        <input type="hidden" name="status" id="status" value="new">
        <input type="submit" name="Submit" value="Send"></td>
        <td align="center">&nbsp;</td>
      </tr>
    
  </table>
  
</form>
<p><br class="clearfloat" /></p>
<!-- end #container -->
</div>
</body>
</html>
