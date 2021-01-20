<?php
session_start();
require_once '../class.user.php';
$del = new USER();
if($del->is_logged_in()=="")
{
	$del->redirect('../login?edit-curriculum-vitae');
}
$id=$_GET['id'];
$sql="DELETE FROM academicqual WHERE acid=$id";
$stmt=$del->runQuery($sql);
$stmt->execute();
echo json_encode($stmt);
?>
