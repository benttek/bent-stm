<?php
session_start();
include('configPDO.php');

$randnumid=($rndate.rand(1,100000));

$rndnum=$randnumid;

if (isset($_FILES['myFile'])) {
    // Example:
    move_uploaded_file($_FILES['myFile']['tmp_name'], "users/".$rndnum.$_FILES['myFile']['name']);
    
	$filename=($rndnum.$_FILES['myFile']['name']);
	$user = $_SESSION['username'];
	$docname=("users/".$filename);
	

	$STM = $dbh->prepare('UPDATE tbl_users SET img="'.$docname.'" WHERE username="'.$user.'"');
	$STM->execute(); 
	
	
	echo 'Successfully Uploaded '.$docname.' id='.$user;
	
		/*  
	
	tbl_chkin
		chkin_id
		user
		timestamp
		chkindate
		chkintime
		chkinlat
		chkinlong
		chkinimg
		
	*/
	
}
?>