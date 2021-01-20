<?php
session_start();
require_once '../class.user.php';
$update = new USER();
if($update->is_logged_in()=="")
{
	$update->redirect('../login?edit-curriculum-vitae');
}
//rnm,work,org,addr,pno,eml
$id=$_GET["i"];
$rnm=$_GET["rnm"];
$work=$_GET["work"];
$org=$_GET["org"];
$addr=$_GET["addr"];
$pno=$_GET["pno"];
$eml=$_GET["eml"];
$stmt = $update->runQuery("UPDATE referees set refereenm='".$rnm."',workr='".$work."',organization='".$org."',contaddr='".$addr."',contpno='".$pno."',emailaddr='".$eml."' where id='".$id."'");
	$stmt->execute();
	
$msg[0]=$id."done successfully";
echo $msg[0];
?>
