<?php
session_set_cookie_params('3600');
session_start();
	include("lib/db.class.php");
	include_once "config.php";  
	$db = new DB($config['database'], $config['host'], $config['username'], $config['password']);
$tbl_name="tbl_users"; // Table name

// username and password sent from form 
$myusername=$_REQUEST['username']; 
$mypassword=$_REQUEST['password'];

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);

$sql="SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'" ;
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);
// If result matched $myusername and $mypassword, table row must be 1 row

if($count==1){
// Register $myusername, $mypassword and redirect to file "dashboard.php"
$row = mysql_fetch_row($result);


$_SESSION['id']=$row[0];
$_SESSION['username']=$row[1];
$_SESSION['usertype']=$row[3];
$_SESSION['ugroup']=$row[8];

$user=$_SESSION['username'];
$ppge=$_POST['ppg'];
/* $ip= $_SERVER['REMOTE_ADDR'];
$action="login";

$STM = $dbh->prepare("INSERT INTO tbl_userlog(user, action, ip) VALUES (:user,:action,:ip)");
	
    $STM->bindParam(':user', $user);
	$STM->bindParam(':action', $action);
	$STM->bindParam(':ip', $ip); */
	
if($row[3]=="admin")

	
header("location:hmhead.php");
else 
die("Not Valid User Type. Check with your application administartor");

}else {
header("location:index.php?msg=Wrong%20Username%20or%20Password&type=error");
}
?>