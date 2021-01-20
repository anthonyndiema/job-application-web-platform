<?php
session_start();
require_once '../class.user.php';
$update = new USER();
if($update->is_logged_in()=="")
{
	$update->redirect('../login?edit-curriculum-vitae');
}
$id=$_GET["i"];
$inst=$_GET["inst"];
$course=$_GET["course"];
$sdt=$_GET["sdt"];
$edt=$_GET["edt"];
$qual=$_GET["qual"];
$skills=$_GET["skills"];
$stmt = $update->runQuery("UPDATE academicqual set institution='".$inst."',courseinfo='".$course."',start_date='".$sdt."',end_date='".$edt."',qualification='".$qual."',skills='".$skills."' where acid='".$id."'");
	$stmt->execute();
	
$msg[0]=$id."done successfully";
echo $msg[0];
?>
