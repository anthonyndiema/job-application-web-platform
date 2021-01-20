<?php
session_start();
require_once 'class.user.php';
$user_login = new USER();

if($user_login->is_logged_in()!="")
{
	redirecttodashboard($user_login,$email);
}
function redirecttodashboard($user_login,$email){
      $stmt = $user_login->runQuery("SELECT usrtype FROM users WHERE email=:usremail");
$stmt->execute(array(":usremail"=>$email));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if($row['usrtype']=='Job Seeker'){
    $user_login->redirect('opportunity-dashboard/index?usr=welcome+back');
}
else{
$user_login->redirect('manage-ads.php');}
	}

if(isset($_POST['btn-login']))
{
	$email = trim($_POST['txtemail']);
	$upass = trim($_POST['txtupass']);
	
	if($user_login->login($email,$upass))
	{
	redirecttodashboard($user_login,$email);
     } 
}
?>
