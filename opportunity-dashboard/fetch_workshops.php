<?php
//error_reporting(0);
session_start();
require_once ('../class.user.php');//require "configure.php";
$id=$_GET['id'];
$retrieveworkshop = new USER();
if($retrieveworkshop->is_logged_in()=="")
{
	$retrieveworkshop->redirect('../login?edit-curriculum-vitae');
}
$useremail=$_SESSION['userSession'];
$sql="";
if($id=="invalid"){
$sql="select * from workshoptbl where usremail='".$useremail."'";
}
else{
$sql="select * from workshoptbl where usremail='".$useremail."' and id='".$id."'";
}
$stmt = $retrieveworkshop->runQuery($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($result);
//useremail,refereenm,workr,organization,contactaddr,contpno,emailaddr
/*echo "<tr><td>".$row['refereenm']."</td><td>".$row['workr']."</td><td>".$row['organization']."</td><td>".$row['contaddr']."</td><td>".$row['contpno']."</td><td>".$row['emailaddr']."</td></tr>";*/


?>
