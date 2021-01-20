<?php
session_start();
require_once '../class.user.php';
$updatebginfo = new USER();
if($updatebginfo->is_logged_in()=="")
{
	$updatebginfo->redirect('../login?edit-curriculum-vitae');
}
//fname,lname,sname,profemail,gender,dob,nationality,civicstat,languages,religion
$useremail=$_SESSION['userSession'];

$sname=$_POST['sname_in'];
$languages=$_POST['lang_in'];
$dob=$_POST['dob_in'];
$profemail=$_POST['profem_in'];
$gender=$_POST['gender_in'];
$nationality=$_POST['nationality_in'];
$civicstat=$_POST['civic_in'];
$religion=$_POST['religion_in'];

$msg[0]="";
if($updatebginfo->updatepersonal2info($useremail,$sname,$languages,$dob,$profemail,$gender,$nationality,$civicstat,$religion)){
$id[0] = "done";		
}


echo $id[0];
?>
