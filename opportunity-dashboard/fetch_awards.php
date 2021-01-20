<?php
//error_reporting(0);
session_start();
require_once ('../class.user.php');//require "configure.php";
$id=$_GET['id'];
$retrieveawards = new USER();
if($retrieveawards->is_logged_in()=="")
{
	$retrieveawards->redirect('../login?edit-curriculum-vitae');
}
$useremail=$_SESSION['userSession'];
$sql="";
if($id=="invalid"){
$sql="select * from award where usremail='".$useremail."'";
}
else{
$sql="select * from award where usremail='".$useremail."' and id='".$id."'";
}
$stmt = $retrieveawards->runQuery($sql);
$stmt->execute();
$result =$stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($result);

?>
