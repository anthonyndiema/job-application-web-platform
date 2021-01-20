<?php
session_start();
require_once '../class.user.php';
$update = new USER();
if($update->is_logged_in()=="")
{
	$update->redirect('../login?edit-curriculum-vitae');
}
$id=$_GET["i"];
$role=$_GET["r"];
$org=$_GET["o"];
$sdt=$_GET["sdt"];
$edt=$_GET["edt"];
$respo=$_GET["respo"];
$stmt = $update->runQuery("UPDATE workdetails set roleplayed='".$role."',organization='".$org."',start_date='".$sdt."',end_date='".$edt."',responsibilities='".$respo."' where workid='".$id."'");
	$stmt->execute();
	
$msg[0]=$id."done successfully";
echo $msg[0];
?>
