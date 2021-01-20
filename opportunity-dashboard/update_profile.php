<?php
session_start();
require_once '../class.user.php';
//aboutprogress,abouttable,aboutform,abouttxt

$updateprofile = new USER();
if($updateprofile->is_logged_in()=="")
{
	$updateprofile->redirect('../login.php');
}
$useremail=$_SESSION['userSession'];

$about=$_POST['abouttxt'];
$id[0]="";
if($updateprofile->updateprof($useremail,$about)){
$id[0] = "done";		
}
else{
$id[0] = " not done";
}


echo $id[0];
?>
