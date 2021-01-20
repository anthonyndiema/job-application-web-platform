<?php
//error_reporting(0);
session_start();
require_once ('../class.user.php');
$retrieveprofinfo = new USER();
if($retrieveprofinfo->is_logged_in()=="")
{
	$retrieveprofinfo->redirect('../login?edit-curriculum-vitae');
}
$useremail=$_SESSION['userSession'];
$sql="select * from profile where usremail='".$useremail."'";
$stmt = $retrieveprofinfo->runQuery($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
if($stmt->rowCount() > 0)
	{
echo json_encode($result);
}
?>
