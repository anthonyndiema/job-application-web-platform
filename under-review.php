<?php 


error_reporting(0);
session_start();
$jobadvert=$_GET['advertid'];
require_once 'class.user.php';require_once ('codebird/codebird.php');
$approve_job_ = new USER();
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
$message .= "<h1>User Location: ".$approve_job_->get_client_ip()."</h1><br/>";
$message .= "<tr><td><strong>User email:</strong> </td><td>" . $_GET['usreml']. "</td></tr>";
$message .= "<tr><td><strong>Application email:</strong> </td><td>" . $row['ademail'] . "</td></tr>";
$message .= "<tr><td><strong>Application URL:</strong> </td><td>" . $row['adurl'] . "</td></tr>";
$message .= "<tr><td><strong>Approve Job:</strong> </td><td><a href='http://www.idawn.co.ke/approve-job?status=".base64_encode('active')."&jobid=".base64_encode($jobadvert)."'>Click HERE to Approve :)</a></td></tr>";
$message .= "<tr><td><strong>Decline Advert:</strong> </td><td><a href='http://www.idawn.co.ke/approve-job?status=".base64_encode('declined')."&jobid=".base64_encode($jobadvert)."'>Click HERE to Decline :)</a></td></tr>";

$message .= "</table>";
$message .= "</body></html>";
            
            
            
   
mail($to, $subject, $message, $headers);

}		

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="keywords" content="idawn,job review,job,congrtulations">
    <meta name="Description" content="idawn - Job Under Review::Congratulations. You have sucessfully posted the job It Will be available soon">
   <title>idawn - Job Under Review::Congratulations. You have sucessfully posted the job It Will be available soon</title>

     <!-- Favicon -->
    <link rel="shortcut icon" href="assets/img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">    
    <link rel="stylesheet" href="assets/css/jasny-bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/jasny-bootstrap.min.css" type="text/css">
    <!-- Material CSS -->
    <link rel="stylesheet" href="assets/css/material-kit.css" type="text/css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css" type="text/css">
        <!-- Line Icons CSS -->
    <link rel="stylesheet" href="assets/fonts/line-icons/line-icons.css" type="text/css">
    <!-- Line Icons CSS -->
    <link rel="stylesheet" href="assets/fonts/line-icons/line-icons.css" type="text/css">
    <!-- Main Styles -->
    <link rel="stylesheet" href="assets/css/main.css" type="text/css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="assets/extras/animate.css" type="text/css">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="assets/extras/owl.carousel.css" type="text/css">
    <link rel="stylesheet" href="assets/extras/owl.theme.css" type="text/css">
    <link rel="stylesheet" href="assets/extras/settings.css" type="text/css">
    <!-- Responsive CSS Styles -->
    <link rel="stylesheet" href="assets/css/responsive.css" type="text/css">
        <!-- Bootstrap Select -->
    <link rel="stylesheet" href="assets/css/bootstrap-select.min.css">  
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-9085745333411810",
    enable_page_level_ads: true
  });
</script>
<style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
  </head>

  <body>  
    <!-- Header Section Start -->
    <div class="header navbar-fixed">     
      <nav class="navbar navbar-default main-navigation" role="navigation">
        <div class="container">
          <div class="navbar-header">
            <!-- Stat Toggle Nav Link For Mobiles -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <!-- End Toggle Nav Link For Mobiles -->
           <a class="navbar-brand logo" href="index.php"><img src="assets/img/logo.png" alt=""></a>
          </div>
          <!-- brand and toggle menu for mobile End -->

          <!-- Navbar Start -->
          <div class="collapse navbar-collapse" id="navbar">
            <ul class="nav navbar-nav navbar-right">
               <?php
                if($approve_job_->is_logged_in()=="")
{
                    echo '<li><a href="index.php">HOME</a></li>
                <li><a href="job-listings.php">JOBS</a></li>
                <li><a href="post-advert.php" class="active">POST JOB</a></li>
                <li><a href="blog-topics.php">OUR BLOG</a></li>
                <li><a href="signup.php"><i class="fa fa-registered"></i>SIGN UP</a></li>
              <li><a href="login.php"><i class="fa fa-sign-in"></i> LOGIN</a></li>';
}
else{
    echo '<li><a href="manage-ads.php"><i class="fa fa-briefcase"></i> MANAGE</a></li>
                <li><a href="post-advert.php" class="active"><i class="lnr lnr-plus-circle"></i> POST JOB</a></li>
                <li><a href="blog-topics.php">OUR BLOG</a></li>
             <li><a href="profile.php"> <i class="fa fa-user"></i> PROFILE</a></li>
              <li><a href="logout.php"><i class="fa fa-sign-out"></i> SIGN OUT</a></li>';
}
                ?>
            </ul>
          </div>
          <!-- Navbar End -->
        </div>
      </nav>
      <!-- Off Canvas Navigation -->
      
      
    </div>
    <!-- Header Section End -->

    <!-- Page Header Start -->
    <div class="page-header" style="background: url(assets/img/banner2.jpg);">
      <div class="container">
        <div class="row">         
          <div class="col-md-12">
          </div>
        </div>
      </div>
    </div>
    <!-- Page Header End --> 

    <!-- Content section Start --> 
    <section id="content" class='disp3'>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
           <div class="inner-box posting">
               <div>
              <p><?php echo $msg;?></p>
              
            </div>
              <div class="alert alert-success alert-lg" role="alert">
              <h2 class="postin-title">✔ Congratulations! You have successfully posted the job</h2>
              <p>The Advert Will be available soon after the review process is complete. Please wait patiently...</p>
              <p>You may <a href="manage-ads.php" class="btn btn-primary">Manage Job Adverts</a> </p>
            </div>
            </div>
          </div>
        </div>
          <div class="row">
              <div id="map"></div>
    <script>
      // Note: This example requires that you consent to location sharing when
      // prompted by your browser. If you see the error "The Geolocation service
      // failed.", it means you probably did not give permission for the browser to
      // locate you.
      var map, infoWindow;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -34.397, lng: 150.644},
          zoom: 6
        });
        infoWindow = new google.maps.InfoWindow;

        // Try HTML5 geolocation.
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };

            infoWindow.setPosition(pos);
            infoWindow.setContent('Location found.');
            infoWindow.open(map);
            map.setCenter(pos);
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }
      }

      function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
        infoWindow.open(map);
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBxHIsgv-nh5qMTSX4W0PSrnMHlvj0TDBo&callback=initMap">
    </script>
          </div>
      </div>
    </section>
    <!-- Content section End --> 
    
 <!-- Footer Section Start -->
    <footer>

<!-- Copyright Start  -->
      <div id="copyright">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="site-info pull-center">
                  <center> <p><a href="http://www.idawn.co.ke"><b>www.idawn.co.ke</a> &copy; <?php echo date('Y');?>: All copyrights reserved
                          &nbsp;&nbsp;&nbsp;&nbsp;</b></center>
              </div>              
                <div class="bottom-social-icons social-icon pull-center"> <center>
                <a class="facebook" target="_blank" href="#"><i class="fa fa-facebook"></i></a> 
                <a class="twitter" target="_blank" href="#"><i class="fa fa-twitter"></i></a></center>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Copyright End -->

    </footer>
    <!-- Footer Section End --> 
    <!-- Go To Top Link -->
    <a href="#" class="back-to-top">
      <i class="fa fa-angle-up"></i>
    </a>
      
    <!-- Main JS  -->
    <script type="text/javascript" src="assets/js/jquery-min.js"></script>      
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/material.min.js"></script>
    <script type="text/javascript" src="assets/js/material-kit.js"></script>
    <script type="text/javascript" src="assets/js/jquery.parallax.js"></script>
    <script type="text/javascript" src="assets/js/owl.carousel.min.js"></script>
    <script type="text/javascript" src="assets/js/wow.js"></script>
    <script type="text/javascript" src="assets/js/main.js"></script>
    <script type="text/javascript" src="assets/js/jquery.counterup.min.js"></script>
    <script type="text/javascript" src="assets/js/waypoints.min.js"></script>
    <script type="text/javascript" src="assets/js/jasny-bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/form-validator.min.js"></script>
    <script type="text/javascript" src="assets/js/contact-form-script.js"></script>    
    <script type="text/javascript" src="assets/js/jquery.themepunch.revolution.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.themepunch.tools.min.js"></script>
    <script src="assets/js/bootstrap-select.min.js"></script>
  </body>
</html>
