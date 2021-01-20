<?php
//error_reporting(0);
session_start();
require_once ('../class.user.php');
$cvprogress= new USER();
if($cvprogress->is_logged_in()=="")
{
	$cvprogress->redirect('../login?edit-curriculum-vitae');
}
$rate=$_GET['rate'];
$type=$_GET['type'];
$stat=$_GET['status'];
$useremail=$_SESSION['userSession'];
$sql="select * from cvcomplete where usr='".$useremail."'";
$sql1="UPDATE cvcomplete set rate=rate+'".$rate."',".$type."='".$stat."' where usr='".$useremail."'";
$sql2="INSERT INTO cvcomplete(usr,rate) values('".$useremail."','".$rate."')";
$stmt = $cvprogress->runQuery($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
if($stmt->rowCount() > 0)
	{
$stmt = $cvprogress->runQuery($sql1);
$stmt->execute();
}
else{
$stmt = $cvprogress->runQuery($sql2);
$stmt->execute();
}

?>
