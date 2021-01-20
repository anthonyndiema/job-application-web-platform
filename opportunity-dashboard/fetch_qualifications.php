<?php
//error_reporting(0);
session_start();
require_once ('../class.user.php');//require "configure.php";
$id=$_GET['id'];
$retrievequalifications = new USER();
if($retrievequalifications->is_logged_in()=="")
{
	$retrievequalifications->redirect('../login?edit-curriculum-vitae');
}
$useremail=$_SESSION['userSession'];
$sql="";
if($id=="invalid"){
$sql="select * from academicqual where useremail='".$useremail."'";
}
else{
$sql="select * from academicqual where useremail='".$useremail."' and acid='".$id."'";
}
$stmt = $retrievequalifications->runQuery($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($result);
//useremail,refereenm,workr,organization,contactaddr,contpno,emailaddr
/*echo "<tr><td>".$row['refereenm']."</td><td>".$row['workr']."</td><td>".$row['organization']."</td><td>".$row['contaddr']."</td><td>".$row['contpno']."</td><td>".$row['emailaddr']."</td></tr>";*/


?>
