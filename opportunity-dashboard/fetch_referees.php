<?php
//error_reporting(0);
session_start();
require_once ('../class.user.php');//require "configure.php";
$id=$_GET['id'];
$retrievereferees = new USER();
if($retrievereferees->is_logged_in()=="")
{
	$retrievereferees->redirect('../login?edit-curriculum-vitae');
}
$useremail=$_SESSION['userSession'];
$sql="";
if($id=="invalid"){
$sql="select * from referees where useremail='".$useremail."'";
}
else{
$sql="select * from referees where useremail='".$useremail."' and id='".$id."'";
}
$stmt = $retrievereferees->runQuery($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($result);
//useremail,refereenm,workr,organization,contactaddr,contpno,emailaddr
/*echo "<tr><td>".$row['refereenm']."</td><td>".$row['workr']."</td><td>".$row['organization']."</td><td>".$row['contaddr']."</td><td>".$row['contpno']."</td><td>".$row['emailaddr']."</td></tr>";*/


?>
