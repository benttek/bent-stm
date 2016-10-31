<?php
session_start();

include('init.php');
include('configPDO.php');
include('dt.php');
require_once 'device/Mobile_Detect.php';
$detect = new Mobile_Detect;

$deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');
$scriptVersion = $detect->getScriptVersion();

if ( $detect->isMobile() ) {
$ecamlink='imgcamemppic.html'; 
} elseif( $detect->isTablet() ){
$ecamlink='imgcamemppic.html';  
} else {
$ecamlink='empcam/cam.php';
}

$curpg = basename($_SERVER['PHP_SELF']);

("SET NAMES 'UTF8'");

$user=($_SESSION['username']);
//$user=($_GET['u']);
$STM = $dbh->prepare("SELECT * FROM tbl_users WHERE username = '$user' OR username='$user1'");

    $STM->execute();

    $STMrecordsu = $STM->fetchAll();
    foreach($STMrecordsu as $u1)


$uimg = $u1['img'];	
$userida = $u1['id'];
$ugrp = $u1['ugroup'];


$STMue = $dbh->prepare("SELECT * FROM tbl_employees WHERE userid='$userida'");

    $STMue->execute();

    $STMrecordsue = $STMue->fetchAll();
    foreach($STMrecordsue as $ue1)

$uname=$ue1['first_name']." ".$ue1['last_name'];

$_SESSION["username"] = "$user";

//include('common_lang.php');

$STMD= $dbh->prepare("SELECT * FROM tbl_company");
    $STMD->execute();
    $row_company = $STMD->fetch();
	$totalRows_company = $row_company;
	
	
$coname = $row_company['url_name'];
$coimg = $row_company['logo'];
$imgwidth=$row_company['imgwidth'];
$imgheight=$row_company['imgheight'];

$mtgid=$_GET['mid'];


$reqdt=$_POST['dt'];
$reqtm=$_POST['tm'];
$reqtype=$_POST['type'];


$rmtype=$_GET['type'];



?>

<!DOCTYPE html>
<html>

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script src="https://code.jquery.com/jquery-1.7.2.min.js"></script>
<script src="https://code.jquery.com/ui/1.8.21/jquery-ui.min.js"></script>


<script type="text/javascript" src="simpletip/jquery.simpletip-1.3.1.pack.js"></script>


<script type="text/javascript" src="script.js"></script>

<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel='stylesheet' href='assets/css/demo.css'>
<link rel='stylesheet' href='assets/css/order.css'>

  <link href='https://fonts.googleapis.com/css?family=Roboto:100,300,400,700|Roboto+Condensed:300,400,700' rel='stylesheet' type='text/css'>

  <link href="img/favicon.ico" rel="shortcut icon">
  <link href="assets/apple-touch-icon.png" rel="apple-touch-icon">
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css" />


 


<script type="text/javascript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>

		<title>MyCheckIn Booking</title>
  


</head>

<body class="glossed" style="background-color: #2d2d2d;">

  

  
  <div class="main-content" style="background-color: #2d2d2d;">
   

<!--  Actions --> 


<div class="row">
  <div class="col-md-6">
    <div class="widget widget-dark-grey">
      <span class="offset_anchor" id="widget_options"></span>
      <div class="widget-title">

		<h3><i class="fa fa-ok-circle"></i><?php echo $user;?>
		
		<span style="float: right ;">
		<a href="bt_roomres.php?type=room">Room</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <a href="bt_roomres.php?type=table">Table</a>   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="bt_roomres.php?type=desk">Desk</a>
		</span>
		</h3>
		</div>
      <div class="widget-content">
		<div class="row">
             
		<?php
			if(isset($rmtype)){
			
			$STMr = $dbh->prepare("SELECT * FROM tbl_mtgroom WHERE room_type='$rmtype'");
			$STMr->execute();
				
			} else {
				
			$STMr = $dbh->prepare("SELECT * FROM tbl_mtgroom");
			$STMr->execute();
						
			}
			$STMrecordsr = $STMr->fetchAll();
			foreach($STMrecordsr as $r1)
			{
			 ?>
		
		<a href="#room" class="roomButton btn btn-action btn-lg btn-default btn-action" style="height:150px;width:150px; margin: 10px; color: black; border: 6px;" data-rmid="<?php echo $r1['mtgrm_id'];?>" data-toggle="modal" data-target="#room" data-popup='tooltip' title='Details & Booking' data-container='body'><h5><?php echo $r1['mtgrm_name'];?></h5><br><img src="<?php echo $r1['room_img'];?>" width="80" height="auto"/>
		</a>
		<a href="javascript;:" class="btn btn-sm btn-default" onclick="MM_openBrWindow('book_cal/rm_cal.php?rmid=<?php echo $r1['mtgrm_id'];?>','','scrollbars=yes,width=800,height=800');return false"><i class="fa fa-calendar fa-2x"></i></a>
			
			<?php }?>	
		
		</div>
			 </div>
            </div>
			
			 </div>
		
	
<div class="col-md-6">
    <div class="widget widget-dark-grey">
      <span class="offset_anchor" id="widget_links"></span>
      <div class="widget-title">
        
        <h3><i class="fa fa-ok-circle"></i>Room Booking</h3>
      </div>
      <div class="widget-content">
        
         <div class="container">
    
    	
        
        <div class="content-area">
    
    		
				

				<form name="checkoutForm" method="post" action="bt_orderin.php">
                
                <div class="table-responsive">
        <table class="table table-bordered table-hover datatable">
          <thead>
            <tr>
			 
             <th>ID</th>
			 <th>Room Name</th>
			 <th>Date</th>
			 <th>Time</th>
			 <th></th>
			 <th></th>
            </tr>
          </thead>
          <tbody>
           
		  
		   		   
		   
		   <?php
		   
		   if(isset($mtgid)){
		   
		   $STMres = $dbh->prepare("SELECT * FROM tbl_mtgrmbook WHERE mtgbook_id='$mtgid'");
			$STMres->execute();
			$STMrecordsres = $STMres->fetchAll();
			foreach($STMrecordsres as $res1)
			{
			$resid=$res1['mtgbook_id'];
			
			?>
			
			<tr>
			
			  <td><?php echo $res1['mtgbook_id'];?></td>
              <td><?php echo $res1['room_name'];?>
			  
			  </td>
			  <td><?php echo $res1['start_date'];?></td>
			  <td><?php echo $res1['start_time']."-".$res1['end_time'];?></td>
			  			  
			<td width="10%"> 
			<a href="#addattendee" class="modalButton1" data-resid="<?php echo $res1['mtgbook_id'];?>" data-toggle="modal" data-target="#addattendee" data-popup='tooltip' title='Add Attendees' data-container='body'><image src="img/itemmod.png" width="16" height="auto"/></a>
			</td>
			
			<td width="10%"><a href="db_cancelmtg.php?bkid=<?php echo $resid;?>"><image src="img/del.jpg" width="16" height="auto"/></a></td>
            </tr> 
		   <?php }}	?>
            
          </tbody>
        </table>
		
		<div class="table-responsive">
        <table class="table table-bordered table-hover datatable">
          <thead>
            <tr>
			 
             
			 <th>Attendees</th>
			 <th></th>
			 
            </tr>
          </thead>
          <tbody>
           
		  
		   		   
		   
		   <?php
		   
		   if(isset($mtgid)){
		   
		   $STMresa = $dbh->prepare("SELECT * FROM tbl_mtg_attend WHERE booking_id ='$mtgid' AND status !='cancelled'");
			$STMresa->execute();
			$STMrecordsresa = $STMresa->fetchAll();
			foreach($STMrecordsresa as $resa1)
			{
			?>
			
			<tr>
			
			  
              <td><?php echo $resa1['emp_name'];?></td>
			  <td><a href="db_delattndee.php?atndid=<?php echo $resa1['mtgbk_id'];?>&mid=<?php echo $mtgid;?>"><image src="img/del.jpg" width="16" height="auto"/></a></td>
			  
            </tr> 
		   <?php }}	?>
            
          </tbody>
        </table>
        
				
		    </div>
                
				</form>                
                <div class="clear"></div>

				<div id="total"></div>

       	        <div class="clear"></div>
                
                
				<a href="db_mtgcnfrm.php?bkid=<?php echo $resid;?>" class="btn btn-success btn-lg btn-round">Confirm</a>
				
				
				
				<a href="db_cancelmtg.php?bkid=<?php echo $resid;?>" class="btn btn-danger btn-lg btn-round">Cancel</a>
				
				<a href="db_delallattnd.php?bkid=<?php echo $resid;?>" class="btn btn-danger btn-lg btn-round">Clear Attendees</a>
				
				
				
                


        </div>
        
        <div class="bottom-container-border">
        </div>

    </div>
          </div>
        </div>
      </div>
  <?php //} ?>  
 

<div id="room" class="modal fade" style="font-weight: normal;">
    <div class="modal-dialog" style="width:70%!important;">
          <div class="modal-content">

          </div>
    </div>
</div>




<script>
    $('.roomButton').click(function(){
        var rmid = $(this).attr('data-rmid');
        $.ajax({url:"roomview.php?rmid="+rmid,cache:false,success:function(result){
            $(".modal-content").html(result);
        }});
    });
	

</script>

<script>
$("#viewt1").on('hide', function () {
    window.location.reload();
    });
</script>


<div id="addattendee" class="modal fade" style="font-weight: normal;">
    <div class="modal-dialog" style="width:80%!important;">
          <div class="modal-content">

          </div>
    </div>
</div>




<script>
    $('.modalButton1').click(function(){
        var resid = $(this).attr('data-resid');
        $.ajax({url:"addattendees.php?resid="+resid,cache:false,success:function(result){
            $(".modal-content").html(result);
        }});
    });
	

</script>

<script>
$("#viewt1").on('hide', function () {
    window.location.reload();
    });
</script>


	</div>  <!-- Row -->
  </div>  <!-- Main Content -->


   <!-- End widgets-->


<!-- modals -->






<script src='assets/js/plugins/jquery.pnotify.js'></script>
<script src='assets/js/plugins/jquery.sparkline.min.js'></script>
<script src='assets/js/plugins/mwheelIntent.js'></script>
<script src='assets/js/plugins/mousewheel.js'></script>
<script src='assets/js/bootstrap/tab.js'></script>
<script src='assets/js/bootstrap/dropdown.js'></script>
<script src='assets/js/bootstrap/tooltip.js'></script>
<script src='assets/js/bootstrap/collapse.js'></script>
<script src='assets/js/bootstrap/scrollspy.js'></script>
<script src='assets/js/plugins/bootstrap-datepicker.js'></script>
<script src='assets/js/bootstrap/transition.js'></script>
<script src='assets/js/plugins/jquery.knob.js'></script>
<script src='assets/js/plugins/jquery.flot.min.js'></script>
<script src='assets/js/plugins/fullcalendar.js'></script>
<script src='assets/js/plugins/datatables/datatables.min.js'></script>
<script src='assets/js/plugins/chosen.jquery.min.js'></script>
<script src='assets/js/plugins/jquery.timepicker.min.js'></script>
<script src='assets/js/plugins/daterangepicker.js'></script>
<script src='assets/js/plugins/colpick.js'></script>
<script src='assets/js/plugins/moment.min.js'></script>
<script src='assets/js/plugins/datatables/bootstrap.datatables.js'></script>
<script src='assets/js/bootstrap/modal.js'></script>
<script src='assets/js/plugins/raphael-min.js'></script>
<script src='assets/js/plugins/morris-0.4.3.min.js'></script>
<script src='assets/js/plugins/justgage.1.0.1.min.js'></script>
<script src='assets/js/plugins/jquery.maskedinput.min.js'></script>
<script src='assets/js/plugins/jquery.maskmoney.js'></script>
<script src='assets/js/plugins/summernote.js'></script>
<script src='assets/js/plugins/dropzone-amd-module.js'></script>
<script src='assets/js/plugins/jquery.validate.min.js'></script>
<script src='assets/js/plugins/jquery.bootstrap.wizard.min.js'></script>
<script src='assets/js/plugins/jscrollpane.min.js'></script>
<script src='assets/js/application.js'></script>

<script src='assets/js/template_js/forms.js'></script>

<script src='assets/js/template_js/table.js'></script>

<script src='assets/js/template_js/dashboard.js'></script>

<script src='assets/js/template_js/calendar.js'></script>

  <script src="assets/modal/js/bootstrap-modal.js"></script>
  <script src="assets/modal/js/bootstrap-modalmanager.js"></script>

<!-- @include _footer