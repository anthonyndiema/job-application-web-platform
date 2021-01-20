<?php
//error_reporting(0);
session_start();
require_once ('../class.user.php');//require "configure.php";
$retrievejobs = new USER();
if($retrievejobs->is_logged_in()=="")
{
	$retrievejobs->redirect('../login?edit-curriculum-vitae');
}
$useremail=$_SESSION['userSession'];
//select * from advert where adname like %adname% and adcategory=adcategory and company=company and jobtype=jobtype and jobpermit=jobpermit and location like %location%
$sql="select * from advert";
$type=$_GET['type'];
if($type!='all'){

$searchkey=$_POST["searchkey"];
$searchcat=$_POST["searchcat"];
$searchorg=$_POST["searchorg"];
$searchtype=$_POST["searchtype"];
$searchloc=$_POST["searchloc"];
$searchpermit=$_POST["searchpermit"];
$adkey=base64_encode($searchkey);
$sql.=" where company like '%".$searchorg."%' and jlocation like '%".$searchloc."%' AND adname like '%".$searchkey."%' or addesc like '%".$adkey."%'";
if($searchtype!="all"){
$sql.=" and jobtype='$searchtype'";
if($searchpermit!="all"){
$sql.=" and jobpermit='".$searchpermit."'";
}
}
else{
if($searchpermit!="all"){
$sql.=" WHERE jobpermit='".$searchpermit."'";
}
}
}
$stmt = $retrievejobs->runQuery($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($result);

?>
