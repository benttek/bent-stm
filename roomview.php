<?php

//define('INCLUDE_CHECK',1);
include('configPDO.php');


$rmid = $_GET['rmid'];

$STMrn= $dbh->prepare("SELECT * FROM tbl_mtgroom WHERE mtgrm_id='$rmid'");
$STMrn->execute();
$STMrecordsrn = $STMrn->fetchAll();
foreach($STMrecordsrn as $rn1)
$rmname=$rn1['mtgrm_name'];

//$user = $_SESSION['username'];

?>

<script type="text/javascript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h5 class="modal-title">Room - <?php echo $rmid." - ".$rmname;?></h5>
</div>
    <div class="modal-body">
			
			<div class="container">
    
    		<div class="content">
				
				<div class="col-md-4">
				<form action="db_addroom.php" name="frmaddroom" method="post">
				
				Meeting Title<br>
				<input type="text" name="mtitle" id="mtitle" value=""/>
				<br><br>
				Date<br>
				<input type="date" name="mdate" id="mdate" value=""/>
				<br><br>
				Start<br>
				<input type="time" name="stime" id="stime" value=""/>
				<br>End<br>
				<input type="time" name="etime" id="etime" value=""/>
				<br>
				<input type="hidden" name="rmid" id="rmid" value="<?php echo $rmid;?>"/>
				<input type="hidden" name="bkby" id="bkby" value="<?php echo $user;?>"/>
				<input type="hidden" name="rmname" id="rmname" value="<?php echo $rmname;?>"/>
				
				<br><br>
				<input type="submit" name="submit" id="submit" value="Add Booking"/>
				
				</form>
				
						
				</div>	
				
				
				<div class="col-md-4">
                 <?php
				
					
				$STMrm= $dbh->prepare("SELECT * FROM tbl_mtgroom WHERE mtgrm_id='$rmid'");
				$STMrm->execute();
      

				$STMrecordsrm = $STMrm->fetchAll();
				foreach($STMrecordsrm as $rm1)
				{ ?>
					
					<div class="product" align="center"><?php echo $rm1['mtgrm_name']." Location: ".$rm1['mtgrm_num']." Floor: ".$rm1['flr_num']." Seats: ".$rm1['tbl_seats'];?><br><img src="<?php echo $rm1['room_img'];?>" width ="200" height="auto"/></div>
					
				<?php }	?>
                </div>
				
				<div class="col-md-4">
                 <?php
				
					
				$STMrmbkd= $dbh->prepare("SELECT * FROM tbl_mtgrmbook WHERE room_id='$rmid'");
				$STMrmbkd->execute();
      

				$STMrecordsrmbkd = $STMrmbkd->fetchAll();
				foreach($STMrecordsrmbkd as $rmbkd1)
				{ ?>
					
					<div class="product" align="center"><?php echo $rmbkd1['mtg_title']." | ".$rmbkd1['start_date']." ".$rmbkd1['start_time']."-".$rmbkd1['end_time'];?><br>
					
					
					<a href="javascript;:" class="btn btn-lg btn-primary" onclick="MM_openBrWindow('book_cal/rm_cal.php?rmid=<?php echo $rmid;?>','','scrollbars=yes,width=800,height=800');return false">Room Calendar</a>
					</div>
				<?php }	?>
				
								
                </div>
				
				<div class="bottom-container-border"></div>
	
				
       	        <div class="clear"></div>
            </div>
    </div>
</div>
		  <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
 



 