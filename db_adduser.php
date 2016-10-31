<?php
include('configPDO.php');

if(isset($_POST["adduser"])=="Add"){

// Define Variables
$username=$_POST['username'];//username
$password=$_POST['password']; //password
$fname=$_POST['fname'];//fname
$lname=$_POST['lname'];//lname
$title=$_POST['title'];//title
$ugroup=$_POST['ugroup'];//ugroup
$team=$_POST['team'];//team
$teamleader=$_POST['teamleader'];//teamleader
$hphone=$_POST['hphone'];//hphone
$mobile=$_POST['mobile'];//mobile
$address=$_POST['address'];//address
$district=$_POST['district'];//district
$city=$_POST['city'];//city
$province=$_POST['province'];//province
$postcode=$_POST['postcode'];//postcode
$govid=$_POST['govid'];//govid
$bdate=$_POST['bdate'];//bdate
$hdate=$_POST['hdate'];//hdate
$usertype=$_POST['usertype'];
$email=$_POST['email'];
$status=$_POST['status'];
$usrimg="users/bentlo.png";

/*
echo $username."  username ||";
echo $password." password ||";
echo $fname." fname ||";
echo $lname." lname ||";
echo $title." title ||";
echo $ugroup."  ugroup ||";
echo $team." team ||";
echo $teamleader." teamleader ||";
echo $hphone." hphone ||";
echo $mobile." mobile ||";
echo $address." address ||";
echo $district." district ||";
echo $city." city ||";
echo $province." province ||";
echo $postcode." postcode ||";
echo $govid." govid ||";
echo $bdate." bdate ||";
echo $hdate." hdate ||";
echo $usertype." usertype ||";
echo $email." email ||";
echo $status." status ||";
*/


 $STM = $dbh->prepare("INSERT INTO tbl_users(username, password, user_type, title, fname, lname, ugroup, email, user_status, img) VALUES (:username, :password, :usertype, :title, :fname, :lname, :ugroup, :email, :status, :img)");
	
    $STM->bindParam(':username', $username);
	$STM->bindParam(':password', $password);
	$STM->bindParam(':usertype', $usertype);
	$STM->bindParam(':title', $title);
	$STM->bindParam(':fname', $fname);
	$STM->bindParam(':lname', $lname);
	$STM->bindParam(':ugroup', $ugroup);
	$STM->bindParam(':email', $email);
	$STM->bindParam(':status', $status);
	$STM->bindParam(':img,', $usrimg);

	$STM->execute();
	
	$STMMM= $dbh->prepare("SELECT id, username FROM tbl_users WHERE username='$username'");
    $STMMM->execute();
      
    $STMrecordsum = $STMMM->fetchAll();
    foreach($STMrecordsum as $mu1)
	

	$uid= $mu1['id'];
	
	$STM = $dbh->prepare("INSERT INTO tbl_employees(last_name, first_name, userid, usrnm, email, job_title, job_group, home, mobile, address, district, city, province, postcode, hiredate, birthdate, gender, govid, team, team_leader) VALUES (:last_name, :first_name, :userid, :usrnm, :email, :job_title, :job_group, :home, :mobile, :address, :district, :city, :province, :postcode, :hiredate, :birthdate, :gender, :govid, :team, :team_leader)");
	
    $STM->bindParam(':last_name', $lname);
	$STM->bindParam(':first_name', $fname);
	$STM->bindParam(':userid', $uid);
	$STM->bindParam(':usrnm', $username);
	$STM->bindParam(':email', $email);
	$STM->bindParam(':job_title', $title);
	$STM->bindParam(':job_group', $lname);
	$STM->bindParam(':home', $hphone);
	$STM->bindParam(':mobile', $mobile);
	$STM->bindParam(':address', $address);
	$STM->bindParam(':district', $district);
	$STM->bindParam(':city', $city);
	$STM->bindParam(':province', $province);
	$STM->bindParam(':postcode', $postcode);
	$STM->bindParam(':hiredate', $hdate);
	$STM->bindParam(':birthdate', $bdate);
	$STM->bindParam(':gender', $editor);
	$STM->bindParam(':govid', $govid);
	$STM->bindParam(':team', $team);
	$STM->bindParam(':team_leader', $teamleader);

	$STM->execute();
				
header( "location:hmhead.php"); 

}

if(isset($_POST["submit2"])=="Edit"){

$userid=$_POST['uid'];
$username=$_POST['username'];
$password=$_POST['password']; 
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$title=$_POST['title'];
$ugroup=$_POST['ugroup'];
$editor=$_POST['editor'];
$approver=$_POST['approver'];
$usertype=$_POST['usertype'];
$email=$_POST['email'];
$status=$_POST['status'];


$STM = $dbh->prepare('UPDATE tbl_co_contact SET username="'.$username.'",password="'.$password.'",user_type="'.$usertype.'",title="'.$title.'",fname="'.$fname.'",lname="'.$lname.'",ugroup="'.$ugroup.'",editor="'.$editor.'",approver="'.$approver.'",email="'.$email.'",user_status="'.$status.'"  WHERE id="'.$userid.'"');
  $STM->execute();
				
header( "location:bt_sysadmin.php");  

}

if(isset($_GET['d'])){
if($_POST['cont_id'])
{
$cont_id=$_POST['cont_id'];

	$STM = $dbh->prepare('DELETE FROM tbl_co_contact  WHERE co_contactid="'.$cont_id.'"');
	$STM->execute();
echo '1';
die;
}
}

/*
echo $username."  username ||";
echo $password." password ||";
echo $fname." fname ||";
echo $lname." lname ||";
echo $title." title ||";
echo $ugroup."  ugroup ||";
echo $team." team ||";
echo $teamleader." teamleader ||";
echo $hphone." hphone ||";
echo $mobile." mobile ||";
echo $address." address ||";
echo $district." district ||";
echo $city." city ||";
echo $province." province ||";
echo $postcode." postcode ||";
echo $govid." govid ||";
echo $bdate." bdate ||";
echo $hdate." hdate ||";
echo $usertype." usertype ||";
echo $email." email ||";
echo $status." status ||";
*/


?>