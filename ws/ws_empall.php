<?php
include_once('confi.php');

//if($_SERVER['REQUEST_METHOD'] == "POST"){
	// Get data
	

	$sql="SELECT * FROM tbl_employees ";
	$result=mysql_query($sql);

	$res = array();
	while($row = mysql_fetch_array($result)) {
        
	
        $res['fname'] = $row["first_name"];
		$res['lname'] = $row["last_name"];
		
		
}
header('Content-type: application/json');
echo json_encode($res);

?>