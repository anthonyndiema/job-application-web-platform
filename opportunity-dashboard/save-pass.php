<?php
session_start();
require_once '../class.user.php';
$person=$_SESSION['userSession'];
$updatepassword = new USER();
if($updatepassword->is_logged_in()=="")
{
	$updatepassword->redirect('../login?profile-settings');
}
////passloading,passform,oldpass,newpass,repeatpass

$useremail=$_SESSION['userSession'];
$oldpass=$_POST['oldpass'];
$newpass=$_POST['newpass'];
$repeatpass=$_POST['repeatpass'];
$msg[0]="";
if($newpass==$repeatpass){
$stmt = $updatepassword->runQuery("SELECT * FROM users WHERE email=:email_id");
	$stmt->execute(array(":email_id"=>$useremail));
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	if($row["password"]==md5($oldpass)){
	if($updatepassword->updatepassword($newpass,$useremail)){
$msg[0]="<div class='alert alert-success'><button class='close' data-dismiss='alert'>&times;</button><strong>You have successfully changed the password!</strong></div>";
}
	}
	else{
	$msg[0]="<div class='alert alert-danger'><button class='close' data-dismiss='alert'>&times;</button><strong>Your current password is wrong!</strong></div>";
}
	}
else{
$msg[0]="<div class='alert alert-danger'><button class='close' data-dismiss='alert'>&times;</button><strong>Passwords do not Match!</strong></div>";
}



echo $msg[0];
?>
