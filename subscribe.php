<?php
//error_reporting(0);
session_start();
require_once ('class.user.php');//require "configure.php";

$subscribeusr = new USER();
$email=$_POST["email"];
//if(){
//
//}
$stmt = $subscribeusr->runQuery("insert into subscribe(email) values(:subscribe_email)");
$stmt->execute(array(":subscribe_email"=>$email));
          
$msg[0]="<div class='alert alert-success'><button class='close' data-dismiss='alert'>&times;</button><strong>Thank you for subscribing!</strong></div>";

echo $msg[0];

?>
