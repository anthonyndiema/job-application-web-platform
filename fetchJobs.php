<?php 
require_once ('class.user.php');
$fetchjobs = new USER();
$sql="select * from advert where jlocation like '%".trim($_GET['loc'])."%' and adname like '%".trim($_GET['key'])."%' or adcategory like '%".trim($_GET['key'])."%' or addesc like '%".trim($_GET['key'])."%'";
$stmt = $fetchjobs->runQuery($sql);
//array(":loc"=>trim($_GET['loc']),":key"=>base64_encode(trim($_GET['key'])))
$stmt->execute();
$result= $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($result);
?>
