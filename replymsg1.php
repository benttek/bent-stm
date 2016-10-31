<?php
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
$ugrp = $u1['ugroup'];
$uname=$u1['fname']." ".$u1['lname'];

$sentby=$u1['fname'];

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
    <title>MY Check In</title>

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
    <link rel="shortcut icon" href="favicon.ico" />
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

  <header id="headerArea">
    <a href="#" class="scrollToTop"><i class="fa fa-angle-up"></i></a>
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="slider_area">           
          <div class="menuarea"> 
            <div class="navbar navbar-default navbar-fixed-top" role="navigation">
              <div class="container">
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                  <!-- For Text Logo -->
                 <a class="navbar-brand logo" href="#"><span>My</span>Check In - Message Center</a>
                 <!-- For Img Logo -->
                  <!--  <a class="navbar-brand logo" href="#"><img src="img/logo.png" alt="logo"></a> -->
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                  <ul class="nav navbar-nav navbar-right custom_nav mobnav" id="top-menu">
                    <li class="active"><a href="killesess.php?msgid=<?php echo $msgida;?>">HOME</a></li>

                    <li><a href="logout.php">Logout</a></li>
                  </ul>
                </div><!--/.nav-collapse -->
              </div>
            </div>
          </div>
                  
        </div>
      </div>  
    </div>      
  </header>
   
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
        <input type="text" name="msgid" id="msgid" value="<?php echo $msgida;?>">
        <input type="hidden" name="status" id="status" value="new">
        <input type="submit" name="Submit" value="Send"></td>
        <td align="center">&nbsp;</td>
      </tr>
    
  </table>
  
</form>
<p>&nbsp;</p>
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
