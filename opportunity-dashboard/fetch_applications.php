<?php
//error_reporting(0);
session_start();
require_once ('../class.user.php');//require "configure.php";
$status=$_GET['status'];
$retrieveapplications = new USER();
if($retrieveapplications->is_logged_in()=="")
{
	$retrieveapplications->redirect('../login?edit-curriculum-vitae');
}
$useremail=$_SESSION['userSession'];
$sql="";
if($status==""){
$sql="SELECT * FROM `applications` left outer join users on applications.applicantid =`users`.`id` left outer join advert on applications.jobid =advert.adid left outer join files on users.id=files.user_id where email='".$useremail."'";
}
else{
$sql="SELECT * FROM `applications` left outer join users on applications.applicantid =`users`.`id` left outer join advert on applications.jobid =advert.adid left outer join files on users.id=files.user_id where appstatus='".$status."' and  email='".$useremail."'";
}

$stmt = $retrieveapplications->runQuery($sql);
$stmt->execute();
$result =$stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($result);

?>
