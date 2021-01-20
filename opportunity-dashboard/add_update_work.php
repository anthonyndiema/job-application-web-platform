<?php
session_start();
require_once '../class.user.php';
$addworkinfo = new USER();
if($addworkinfo->is_logged_in()=="")
{
	$addworkinfo->redirect('../login?edit-curriculum-vitae');
}
//workid,useremail,roleplayed,organization,start_date,end_date,responsibilities
// tbl:newworkinfo,form:workform,input:roleworkinput,compworkinput,startworkinput,endworkinput,responstext,btn:saveworkbtn

$useremail=$_SESSION['userSession'];
$roleplayed=$_POST['roleworkinput'];
$organization=$_POST['compworkinput'];
$start_date=$_POST['startworkinput'];
$end_date=$_POST['endworkinput'];
$responsibilities=$_POST['responstext'];
$msg[0]="";
if($addworkinfo->saveworkinfo($useremail,$roleplayed,$organization,$start_date,$end_date,$responsibilities)){
$id[0] = $addworkinfo->lasdID();		
//$msg[0]="<div class='alert alert-success'><button class='close' data-dismiss='alert'>&times;</button><strong>You have successfully added a referee!</strong></div>";
}


echo $id[0];
?>
