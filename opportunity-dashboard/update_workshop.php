<?php
session_start();
require_once '../class.user.php';
$update = new USER();
if($update->is_logged_in()=="")
{
	$update->redirect('../login?edit-curriculum-vitae');
}
$id=$_GET["i"];
$theme=$_GET["theme"];
$sdt=$_GET["sdt"];
$edt=$_GET["edt"];
$skills=$_GET["skills"];
$stmt = $update->runQuery("UPDATE workshoptbl set theme='".$theme."',datestart='".$sdt."',dateend='".$edt."',skills='".$skills."' where id='".$id."'");
	$stmt->execute();
	
$msg[0]=$id."done successfully";
echo $msg[0];
?>
