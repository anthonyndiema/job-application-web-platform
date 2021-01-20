<?php
session_start();
require_once '../class.user.php';
$update = new USER();
if($update->is_logged_in()=="")
{
	$update->redirect('../login?edit-curriculum-vitae');
}
$id=$_GET["i"];
$hobby=$_GET["hobby"];
$stmt = $update->runQuery("UPDATE hobbies set hobby='".$hobby."' where id='".$id."'");
	$stmt->execute();
	
$msg[0]=$id."done successfully";
echo $msg[0];
?>
