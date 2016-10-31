<?php

define('INCLUDE_CHECK',1);
require "connect.php";


$ordid = $_GET['ordid'];

$result1 = mysql_query("SELECT itemid, item FROM tbl_order WHERE order_id='$ordid'");
while($row1=mysql_fetch_assoc($result1))
{
$itemid=$row1['itemid'];
$item=$row1['item'];
}

$result2 = mysql_query("SELECT category, id FROM tbl_shop WHERE id='$itemid'");
while($row2=mysql_fetch_assoc($result2))
{
$category=$row2['category'];
}

?>

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">Close</button>
	
    <h5 class="modal-title">Modify - <?php echo $item;?></h5>
</div>

    <div class="modal-body">
			
			<div class="container">
				

			<div class="content-area">
    
    		<div class="content">
            	
				
                 <?php
				
					
				$result = mysql_query("SELECT * FROM tbl_shop WHERE category ='$category' AND subcat='mod'");
				while($row=mysql_fetch_assoc($result))
				{
					
					echo '<div class="product" align="center"><a href="addmodtoorder.php?ordid='.$ordid.'&modid='.$row['id'].'&t='.$row['ticket'].'"><img src="img/products/'.$row['img'].'" width="90" height="90" class="pngfix" /><br>'.($row['name']).'</a></div>';
					
				}
				
				?>
                
                
       	        <div class="clear"></div>
				<br><br>
				<form action="addmodtoorder2.php" method="POST">
				<div class="col-md-5">
				<input class="form-control" type="text" id="ordmod" name="ordmod" placeholder="Custom Modifier" value=""/>
				</div>
				<input type="hidden" id="ordid" name="ordid" value="<?php echo $ordid;?>"/>
				<input type="hidden" id="ticket" name="ticket" value="<?php echo $row['ticket'];?>"/>
				<div class="col-md-1">
				<input type="submit" id="submit" name="submit" class="btn btn-primary" value="ADD"/>
				</div>
				</form>
            </div>

        </div>
        <div class="col-md-1"></div>
 <?php 
		$result1 = mysql_query("SELECT ordermod_id FROM tbl_ordermods WHERE orderdetailid='$ordid'");
	
		while($moda=mysql_fetch_assoc($result1))
		{
		 $hvmod = $moda['ordermod_id'];
		 }
		 if(isset($hvmod)){
		 
		?>
          <div class="col-md-5">
    <div class="widget widget-purple">
      <span class="offset_anchor" id="widget_options"></span>
      
      <div class="widget-content">
		<div class="widget-title">
        
        <h3><i class="fa fa-ok-circle"></i>Mods</h3>
		</div>
		
		<div class="table-responsive">
        <table class="table table-bordered table-hover datatable">
          <thead>
            <tr>
			 
			 <th>ID</th>
             <th>Modifier</th>
			 <th class="text-center" ></th>
            </tr>
          </thead>
          <tbody>
           
		   <?php

    $result = mysql_query("SELECT * FROM tbl_ordermods WHERE orderdetailid='$ordid'");
	
	while($mod=mysql_fetch_assoc($result))
	{
		
    ?>
			
			<tr>
			  <td><?php echo $mod['ordermod_id'];?></td>
			  <td><?php echo $mod['ordmod'];?></td>
			 <td><a href="db_moddel.php?modid=<?php echo $mod['ordermod_id'];?>"><image src="img/del.jpg" width="16" height="auto"/></a>
			   </td>
            </tr> 
        <?php }	?>
            
          </tbody>
        </table>
        
				
		</div>
		<?php } ?>
		
		</div>
     </div>
</div>
		
		</div>

    </div>
		  </div>
		  <div class="bottom-container-border"></div>
		  <div class="modal-footer">
          
        </div>
    
