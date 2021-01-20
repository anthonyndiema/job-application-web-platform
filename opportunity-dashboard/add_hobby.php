<?php
session_start();
require_once '../class.user.php';
$addhobby = new USER();
if($addhobby->is_logged_in()=="")
{
	$addhobby->redirect('../login?edit-curriculum-vitae');
}
$usremail=$_SESSION['userSession'];
$hobby=$_POST['hobby'];
$msg[0]="";
if($addhobby->savehobby($usremail,$hobby)){
$id[0] = $addhobby->lasdID();		
}
echo $id[0];
?>
