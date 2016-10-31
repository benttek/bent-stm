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
	
	
	$STM1 = $dbh->prepare('SELECT * FROM tbl_chkin WHERE user="'.$user.'" ORDER BY timestamp DESC LIMIT 1');
	
	$STM1->execute();
	$STMdetail = $STM1->fetchAll();
		
		
	foreach($STMdetail as $cidetail)

	$chkinid=$cidetail['chkin_id'];
	
	
	$STM = $dbh->prepare('UPDATE tbl_chkin SET chkinimg="'.$docname.'" WHERE chkin_id="'.$chkinid.'"');
	$STM->execute(); 
	
	$STM2 = $dbh->prepare('UPDATE tbl_lastchkin SET chkinimg="'.$docname.'" WHERE user="'.$user.'"');
	$STM2->execute(); 
	
	
	echo 'Successfully Uploaded '.$docname.' id='.$chkinid;
	
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