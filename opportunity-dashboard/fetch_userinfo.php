<?php
//error_reporting(0);
session_start();
require_once ('../class.user.php');
$retrieveuserinfo = new USER();
if($retrieveuserinfo->is_logged_in()=="")
{
	$retrieveuserinfo->redirect('../login?edit-curriculum-vitae');
}
$useremail=$_SESSION['userSession'];
$sql="select * from users where email='".$useremail."'";
$stmt = $retrieveuserinfo->runQuery($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($result);
?>
