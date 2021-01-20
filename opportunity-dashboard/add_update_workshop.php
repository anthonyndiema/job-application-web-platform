<?php
session_start();
require_once '../class.user.php';
$addworkshop = new USER();
if($addworkshop->is_logged_in()=="")
{
	$addworkshop->redirect('../login?edit-curriculum-vitae');
}
//workshoptbl,usremail,theme,datestart,dateend,skills
  //workshoploading,workshoptable,workshopform,wtheme,wsdate,wedate,wskills
$usremail=$_SESSION['userSession'];
$theme=$_POST['wtheme'];
$datestart=$_POST['wsdate'];
$dateend=$_POST['wedate'];
$skills=$_POST['wskills'];
$msg[0]="";
if($addworkshop->saveworkshop($usremail,$theme,$datestart,$dateend,$skills)){
$id[0] = $addworkshop->lasdID();		
//$msg[0]="<div class='alert alert-success'><button class='close' data-dismiss='alert'>&times;</button><strong>You have successfully added a referee!</strong></div>";
}


echo $id[0];
?>
