<?php
session_start();
require_once '../class.user.php';
$person=$_SESSION['userSession'];
$addqualification = new USER();
if($addqualification->is_logged_in()=="")
{
	$addqualification->redirect('../login?edit-curriculum-vitae');
}
$useremail=$_SESSION['userSession'];
$institution=$_POST['instinput'];
$courseinfo=$_POST['courseinput'];
$start_date=$_POST['startinput'];
$end_date=$_POST['endinput'];
$qualification=$_POST['qualinput'];
$skills=$_POST['skillsinput'];
$msg[0]="";
if($addqualification->savequalification($useremail,$institution,$courseinfo,$start_date,$end_date,$qualification,$skills)){
$id[0] = $addqualification->lasdID();		
//$msg[0]="<div class='alert alert-success'><button class='close' data-dismiss='alert'>&times;</button><strong>You have successfully added a referee!</strong></div>";
}


echo $id[0];
?>
