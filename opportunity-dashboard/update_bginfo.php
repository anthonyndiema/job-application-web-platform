<?php
session_start();
require_once '../class.user.php';
$updatebginfo = new USER();
if($updatebginfo->is_logged_in()=="")
{
	$updatebginfo->redirect('../login?edit-curriculum-vitae');
}
//fname,lname,telephone,address,postalcode,town
$useremail=$_SESSION['userSession'];
//fnamein,telnoin,adrin,postin,townin
$fname=$_POST['fnamein'];
$lname=$_POST['lnamein'];
$telephone=$_POST['telnoin'];
$address=$_POST['addrin'];
$postalcode=$_POST['postin'];
$town=$_POST['townin'];
$msg[0]="";
if($updatebginfo->updatebginfo($useremail,$fname,$lname,$telephone,$address,$postalcode,$town)){
$id[0] = "done";		
}


echo $id[0];
?>
