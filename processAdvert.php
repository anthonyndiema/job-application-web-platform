<?php 
$.ajax({
                type:"POST",
                url:"processAdvert.php",
                data:{pid:getUrlParameter("advertid"),usreml:getUrlParameter("usreml"),lat:position.coords.latitude,lng: position.coords.longitude},                
                success:function(data){
                    alert(data);
                },
                error:function(data){
                    alert(data);
                }
            });
session_start();
require_once 'class.user.php';
require_once ('codebird/codebird.php');
$jobadvert=$_POST['pid'];
$lat=$_POST['lat'];
$lng=$_POST['lng'];
$usreml=$_POST['usreml'];
$approve_job_ = new USER();
$ip1=$approve_job_->get_client_ip();
$msg='';
$stmt = $approve_job_->runQuery("SELECT * FROM advert WHERE adid=:adid");
	$stmt->execute(array(":adid"=>$jobadvert));
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
if($row['useremail']=='anthonyndm@gmail.com'){
    $stmt = $approve_job_->runQuery("UPDATE advert SET status='active' WHERE adid=:adid");
	$stmt->execute(array(":adid"=>$jobadvert));
	$duedate=$row['duedate'];// job-info.php?jcat=$1&jobid=$2&jname=$3
$adnm=  substr($row['adname'],0,20);$addsc=substr($row['addesc'],0,40);$link="www.idawn.co.ke/jobs/".$row["adcategory"]."/".$jobadvert."/".$adnm;$jloc=$row['jlocation'];
//require "codebird";

\Codebird\Codebird::setConsumerKey("nkQXLq7kYrOejfiyU82RORgB9","eTBCUXCpB7rFFvcRofQn8QAxd6yjVGZskBQFCXzzNIgHxgKMEs");
$cb=\Codebird\Codebird::getInstance();
$cb->setToken("703566319774515200-zw8PYBiZ6CuKar4KrBORp0EdxUeTwg","qK3GEx06wWO4hZj1UIT2VTanTp2QVa37YGKEaEYuaPorq");
$params=array('status'=>'Apply:: '.$adnm.' ('.$addsc.') at '.$jloc.' Before '.$duedate);
$reply=$cb->statuses_update($params);

    $msg = "
		      <div class='alert alert-danger'>
				<button class='close' data-dismiss='alert'>&times;</button>
					<strong>Success!</strong> Your advert is now live!
			  </div>
			  ";
    
}
else{
$to="anthonyndm@gmail.com";
$subject = 'Approve 1 job-From www.idawn.co.ke';

$headers = "From: jobs@idawn.co.ke\r\n";
$headers .= "Reply-To: jobs@idawn.co.ke\r\n";
$headers .= "CC: idawn.co.ke\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$message = '<html><body>';
$message .= '<h1>Hello, Anthony!</h1>Please Approve this 1 job that has been posted recently<br/>';
$message .= '</body></html>';
$message = '<html><body>';
$message .= "<h1>User Location: ".$ip1."</h1><br/>";
$message .= "<tr><td><strong>User email:</strong> </td><td>" . $usreml. "</td></tr>";
$message .= "<h1>Location Coordinates: $lat,$lng</h1><br/>";
$message .= "<h1>Approve the job: ".$row['adname']."</h1><br/>";
$message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
$message .= "<tr><td><strong>Job ID:</strong> </td><td>" . $row['adid'] . "</td></tr>";
$message .= "<tr><td><strong>Advert Name:</strong> </td><td>" . $row['adname'] . "</td></tr>";
$message .= "<tr><td><strong>Advert Description:</strong> </td><td>" . base64_decode($row['addesc']) . "</td></tr>";
$message .= "<tr><td><strong>Ad Category:</strong> </td><td>" . $row['adcategory'] . "</td></tr>";
$message .= "<tr><td><strong>Ad Type:</strong> </td><td>" . $row['jobtype'] . "</td></tr>";
$message .= "<tr><td><strong>Ad Permit:</strong> </td><td>" . $row['jobpermit'] . "</td></tr>";
$message .= "<tr><td><strong>Posted on:</strong> </td><td>" . $row['dtpostd'] . "</td></tr>";
$message .= "<tr><td><strong>Deadline Date:</strong> </td><td>" . $row['duedate'] . "</td></tr>";
$message .= "<tr><td><strong>Application email:</strong> </td><td>" . $row['ademail'] . "</td></tr>";
$message .= "<tr><td><strong>User email:</strong> </td><td>" . $usreml. "</td></tr>";
$message .= "<tr><td><strong>Application URL:</strong> </td><td>" . $row['adurl'] . "</td></tr>";
$message .= "<tr><td><strong>Approve Job:</strong> </td><td><a href='http://www.idawn.co.ke/approve-job?status=".base64_encode('active')."&jobid=".base64_encode($jobadvert)."'>Click HERE to Approve :)</a></td></tr>";
$message .= "<tr><td><strong>Decline Advert:</strong> </td><td><a href='http://www.idawn.co.ke/approve-job?status=".base64_encode('declined')."&jobid=".base64_encode($jobadvert)."'>Click HERE to Decline :)</a></td></tr>";

$message .= "</table>";
$message .= "</body></html>";
            
            
            
   
mail($to, $subject, $message, $headers);

}		
echo 'done';
?>