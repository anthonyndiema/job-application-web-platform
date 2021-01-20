<?php
require_once '../class.user.php';
$user_jobs = new USER();
if($user_jobs->is_logged_in()=="")
{
	$user_jobs->redirect('../login?browse-jobs');
}
$sql="SELECT * FROM advert";
$stmt = $user_jobs->runQuery($sql);
	$stmt->execute();
	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	echo json_encode($result);
?>
