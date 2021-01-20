<?php
session_start();
require_once '../class.user.php';
$update = new USER();
if($update->is_logged_in()=="")
{
	$update->redirect('../login?edit-curriculum-vitae');
}
$id=$_GET["i"];
$award=$_GET["award"];
$dt=$_GET["dt"];
$stmt = $update->runQuery("UPDATE award set award='".$award."',date='".$dt."' where id='".$id."'");
	$stmt->execute();
	
$msg[0]=$id."done successfully";
echo $msg[0];
?>
