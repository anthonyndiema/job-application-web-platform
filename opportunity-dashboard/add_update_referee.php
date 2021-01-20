<?php
session_start();
require_once '../class.user.php';
$person=$_SESSION['userSession'];
$addreferee = new USER();
if($addreferee->is_logged_in()=="")
{
	$addreferee->redirect('../login?edit-curriculum-vitae');
}
//useremail,refereenm,workr,organization,contactaddr,contpno,emailaddr
//refname,refwork,reforganization,refaddress,refphone,refemail
$useremail=$_SESSION['userSession'];
$refereenm=$_POST['refname'];
$workr=$_POST['refwork'];
$organization=$_POST['reforganization'];
$contactaddr=$_POST['refaddress'];
$contpno=$_POST['refphone'];
$emailaddr=$_POST['refemail'];
$msg[0]="";
if($addreferee->savereferee($useremail,$refereenm,$workr,$organization,$contactaddr,$contpno,$emailaddr)){
$id[0] = $addreferee->lasdID();		
}


echo $id[0];
?>
