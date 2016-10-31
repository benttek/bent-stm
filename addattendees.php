<?php
include('configPDO.php');


$mtgid = $_GET['resid'];

$STMrn= $dbh->prepare("SELECT * FROM tbl_mtgroom WHERE mtgrm_id='$rmid'");
$STMrn->execute();
$STMrecordsrn = $STMrn->fetchAll();
foreach($STMrecordsrn as $rn1)
$bookedby=$rn1['booked_by'];

?>

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">Close</button>
	
    <h5 class="modal-title">Meeting ID - <?php echo $mtgid;?></h5>
</div>

    <div class="modal-body">
			
		<div class="container">
				

			<div class="content-area">
    
				<div class="content">
            	
					<form action="db_mtgall.php" name="frmmtgall" method="post">
					<input type="hidden" name="bkdby" id="bkdby" value="<?php echo $bookedby;?>">
					<input type="hidden" name="mtgid" id="mtgid" value="<?php echo $mtgid;?>">
					<input type="submit" id="submit" name="submit" class="btn btn-round btn-primary" value="Everyone"/>
					</form>
					<form action="db_mtgmygrp.php" name="frmmtgmygrp" method="post">
					<input type="hidden" name="bkdby" id="bkdby" value="<?php echo $bookedby;?>">
					<input type="hidden" name="mtgid" id="mtgid" value="<?php echo $mtgid;?>">
					<input type="submit" id="submit" name="submit" class="btn btn-round btn-primary" value="My Group"/>
					</form>
					 <br><br>
					  
					  <?php

					$STM3 = $dbh->prepare("SELECT first_name FROM tbl_employees");
					$STM3->execute();

					$STMrecordsu3 = $STM3->fetchAll();
					$i = 0;
					foreach($STMrecordsu3 as $u3){
						
					?>
					<form id="form1" name="form1" method="post" action="addtomtg.php">
					<tr>
					<p>
					<td align="left"><input name="checkbox[]" type="checkbox" id="checkbox[]" value="<?php echo $i++;?>"/></td>
					<td align="left"><input name="name[]" type="text" id="name" value="<?php echo $u3['first_name'];?>" readonly="readonly"/></td>
					</p>
					</tr>
					
					<?php }	?>
					<input type="hidden" name="mtgid" id="mtgid" value="<?php echo $mtgid;?>"/>
					<input type="submit" name="Submit" value="Done">
					
					<p><a href="JavaScript:window.close()">close window</a></p>
					</form>	
                 
				</div>
			</div>
		</div>

		 
		  <div class="bottom-container-border"></div>
		  <div class="modal-footer">
          
			</div>
 </div>   
