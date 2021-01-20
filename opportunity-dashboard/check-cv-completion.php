<?php
//error_reporting(0);
session_start();
require_once ('../class.user.php');
$cvprogress= new USER();
if($cvprogress->is_logged_in()=="")
{
	$cvprogress->redirect('../login?edit-curriculum-vitae');
}
$useremail=$_SESSION['userSession'];
$sql="select * from cvcomplete where usr='".$useremail."'";
$stmt = $cvprogress->runQuery($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($result);
?>
