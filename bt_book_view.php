<?php

//define('INCLUDE_CHECK',1);
include('configPDO.php');


$mid = $_GET['mid'];

/*
$STMrn= $dbh->prepare("SELECT * FROM tbl_mtgroom WHERE mtgrm_id='$rmid'");
$STMrn->execute();
$STMrecordsrn = $STMrn->fetchAll();
foreach($STMrecordsrn as $rn1)
$rmname=$rn1['mtgrm_name'];
*/
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
    <h5 class="modal-title">Meeting - <?php echo $mid." - ".$rmname;?></h5>
</div>
    <div class="modal-body">
			
			<div class="container">
    
    		<div class="content">
				
				
				
				
				<div class="col-md-4">
                 <?php
				
					
				$STMrm= $dbh->prepare("SELECT * FROM tbl_mtgrmbook LEFT JOIN tbl_mtgroom ON tbl_mtgroom.mtgrm_id = tbl_mtgrmbook.room_id WHERE tbl_mtgrmbook.mtgbook_id ='$mid'");
				$STMrm->execute();
      

				$STMrecordsrm = $STMrm->fetchAll();
				foreach($STMrecordsrm as $rm1)
				{ ?>
					
					<div class="product" align="center"><?php echo $rm1['mtgrm_name']." Location: ".$rm1['mtgrm_num']." Floor: ".$rm1['flr_num']." Seats: ".$rm1['tbl_seats'];?><br><img src="<?php echo $rm1['room_img'];?>" width ="200" height="auto"/></div>
					
				<?php }	?>
                </div>
				
				
				<div class="col-md-4">
                 
				<div class="table-responsive">
        <table class="table table-bordered table-hover datatable">
          <thead>
            <tr>
			 
             
			 <th>Attendees</th>
			 <th>Status</th>
			 
            </tr>
          </thead>
          <tbody>
           
		  
		   		   
		   
		   <?php
		  
		   $STMresa = $dbh->prepare("SELECT * FROM tbl_mtg_attend WHERE booking_id ='$mid'");
			$STMresa->execute();
			$STMrecordsresa = $STMresa->fetchAll();
			foreach($STMrecordsresa as $resa1)
			{
			?>
			
			<tr>
			
			  
              <td><?php echo $resa1['emp_name'];?></td>
			  <td><?php echo $resa1['status'];?></td>
			  
            </tr> 
		   <?php } ?>
            
          </tbody>
        </table>
        
				
		    </div>
				
								
                </div>
				
							
				<div class="col-md-4">
                 <?php
				
					
				$STMmbkd= $dbh->prepare("SELECT * FROM tbl_mtgrmbook WHERE mtgbook_id='$mid'");
				$STMmbkd->execute();
      

				$STMrecordsmbkd = $STMmbkd->fetchAll();
				foreach($STMrecordsmbkd as $mbkd1)
				{ ?>
					
					<div class="product" align="center">
					<?php echo $mbkd1['mtg_title'];?><br>
					
					<?php echo $mbkd1['start_date'];?><br>
					
					<?php echo $mbkd1['start_time']." - ".$mbkd1['end_time'];?><br>
					
					
					<a href="javascript;:" class="btn btn-lg btn-primary" onclick="MM_openBrWindow('book_cal/rm_cal.php?rmid=<?php echo $mbkd1['room_id'];?>','','scrollbars=yes,width=800,height=800');return false">Room Calendar</a>
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
 



 