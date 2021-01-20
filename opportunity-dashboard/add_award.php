<?php
session_start();
require_once '../class.user.php';
$addaward = new USER();
if($addaward->is_logged_in()=="")
{
	$addaward->redirect('../login?edit-curriculum-vitae');
}
$usremail=$_SESSION['userSession'];
$award=$_POST['award'];
$date=$_POST['awarddate'];
$id[0]="";
if($addaward->saveaward($usremail,$award,$date)){
$id[0] = $addaward->lasdID();		
//$msg[0]="<div class='alert alert-success'><button class='close' data-dismiss='alert'>&times;</button><strong>You have successfully added a referee!</strong></div>";
}


echo $id[0];
?>
