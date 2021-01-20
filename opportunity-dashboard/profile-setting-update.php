<?php
session_start();
require_once '../class.user.php';
$updateprofinfo = new USER();
if($updateprofinfo->is_logged_in()=="")
{
	$updateprofinfo->redirect('../login?profile-settings');
}
//profilesettingform,proffname,proflname,profsname,profemail,profphone
$useremail=$_SESSION['userSession'];

$fname=$_POST['proffname'];
$lname=$_POST['proflname'];
$sname=$_POST['profsname'];
$telephone=$_POST['profphone'];
$msg[0]="";
if($updateprofinfo->updateprofsetting($useremail,$fname,$lname,$sname,$telephone)){
$id[0] = "<div class='alert alert-success'><button class='close' data-dismiss='alert'>&times;</button><strong>Information updated successfully!</strong></div>";		
}


echo $id[0];
?>
