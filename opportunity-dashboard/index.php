<?php
//error_reporting(0);
session_start();
require_once '../class.user.php';
$user = new USER();
if($user->is_logged_in()=="")
{
	$user->redirect('../login.php');
}
$person=$_SESSION['userSession'];
$stmt = $user->runQuery("select * from users where email=:person");
$stmt->execute(array(":person"=>$person));
$row=$stmt->fetchAll(PDO::FETCH_ASSOC);
$urs=$_GET["usr"];
$msg="";
if($urs==NULL){
$msg="Dear ";
}
else{
$msg="Welcome Back, ";
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
   <title><?php echo $msg;foreach($row as $rows){
               echo $rows['fname']."  ".$rows['lname'].",";
               } ?> Opportunity Dashboard</title>

     <!-- Favicon -->
     <link rel="apple-touch-icon" sizes="180x180" href="../apple-touch-icon.png">
     <link rel="icon" type="image/png" sizes="32x32" href="../favicon-32x32.png">
     <link rel="icon" type="image/png" sizes="16x16" href="../favicon-16x16.png">
     <link rel="manifest" href="../site.webmanifest">
     <link rel="mask-icon" href="../safari-pinned-tab.svg" color="#ff99f6">
     <meta name="msapplication-TileColor" content="#ff99f6">
     <meta name="theme-color" content="#ff99f6">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" type="text/css">    
    <link rel="stylesheet" href="../assets/css/jasny-bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../assets/css/jasny-bootstrap.min.css" type="text/css">
    <!-- Material CSS -->
    <link rel="stylesheet" href="../assets/css/material-kit.css" type="text/css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css" type="text/css">
        <!-- Line Icons CSS -->
    <link rel="stylesheet" href="../assets/fonts/line-icons/line-icons.css" type="text/css">
    <!-- Line Icons CSS -->
    <link rel="stylesheet" href="../assets/fonts/line-icons/line-icons.css" type="text/css">
    <!-- Main Styles -->
    <link rel="stylesheet" href="../assets/css/main.css" type="text/css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="../assets/extras/animate.css" type="text/css">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="../assets/extras/owl.carousel.css" type="text/css">
    <link rel="stylesheet" href="../assets/extras/owl.theme.css" type="text/css">
    <link rel="stylesheet" href="../assets/extras/settings.css" type="text/css">
    <!-- Responsive CSS Styles -->
    <link rel="stylesheet" href="../assets/css/responsive.css" type="text/css">
        <!-- Bootstrap Select -->
    <link rel="stylesheet" href="../assets/css/bootstrap-select.min.css">  
<script type="text/javascript" src="../pagination/js/jquery-1.11.2.min.js"></script>
<script src="http://www.cloudformatter.com/Resources/Pages/CSS2Pdf/Script/xepOnline.jqPlugin.js"></script>

    <script type="text/javascript">
$(document).ready(function() {
       
});
</script>
 <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-9085745333411810",
    enable_page_level_ads: true
  });
</script>
  </head>

  <body> 
     
    <!-- Header Section Start -->
    <div class="header navbar-fixed">    
      <nav class="navbar navbar-default main-navigation" role="navigation">
        <div class="container">
          <div class="navbar-header ">
            <!-- Stat Toggle Nav Link For Mobiles -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <!-- End Toggle Nav Link For Mobiles -->
            <a class="navbar-brand logo" href="../index.php"><img src="../assets/img/logo.png" alt=""></a>
          </div>
          <!-- brand and toggle menu for mobile End -->
<!-- Navbar Start -->
          <div class="collapse navbar-collapse" id="navbar">
            <ul class="nav navbar-nav navbar-right">
              <li><a href="index.php"  class="active">DASHBOARD</a></li>
              <li><a href="edit-curriculum-vitae.php">EDIT CURRICULUM VITAE</a></li>
                <li><a href="job-applications.php">JOB APPLICATIONS</a></li>
                <li><a href="browse-jobs.php">BROWSE JOBS</a></li>
                <li><a href="profile-settings.php">PROFILE SETTINGS</a></li>
              <li><a href="logout.php"><i class="fa fa-sign-out"></i> LOGOUT</a></li>
            </ul>
          </div>
          <!-- Navbar End -->
          
        </div>
      </nav>
      
      
    </div>
    <!-- Header Section End -->
<!-- Search wrapper Start -->
    <div id="search-row-wrapper">
      <div class="container">
       
      </div>
    </div>
    <!-- Search wrapper End -->
<div class="main-container">
      <div class="container">
        <div class="row">

           <div class="col-sm-12 page-content disp2">
          
            <div class="inner-box" id="cvpg">
              <div class="usearadmin">
               <h3><a href="#"><?php echo $msg." "; 
               foreach($row as $rows){
               echo $rows['fname']."  ".$rows['lname'].",";
               }?></a></h3>
              </div>
            </div>
            <div class="inner-box">
              <div class="useradmin">
              <h3 class="title-2">Quick guide for job applicants</h3>
              <p>The job applicant dashboard has been designed to allow the users to edit their profile information, apply jobs, view existing applications and keep track of jobs applied.</p>
              <p>Our system has a feature of downloading customized and professional curriculum vitae as pdf or editable word doc, which can be used for any job application accross the world. </p>
              <h4 class="title-2">How to get your customised, professional cv</h4>
              <p>1. Fill in your particulars at the <span ><a href="edit-curriculum-vitae">EDIT CV</a> page</span></p>
              <p>2. Ensure that you have added all the required information until the system displays your cv completion rate as <span class="link-success">100%</span></p>
              <p>3. A "DOWNLOAD CV" button will appear automatically at the top of the page. Click on it and your CV yill be downloaded</p>
              <h4 class="title-2">How to Apply Jobs Online</h4>
              <p>Idawn provides different methods you can apply jobs:</p>
              <p>1. Uploading CV directly into the dashboard</p>
              <p>2. Sending your application to employer's email address</p>
              <p>3. Redirecting to an external link</p>
              <p>4. Submitting a hardcover application letter to the employer</p>
                <h4 class="title-2">Finally</h4>
                <p><b>No one</b> should ask for <b>money to facilitate your application process</b>. Inform our support team <a href="mailto:complaints@idawn.co.ke">complaints@idawn.co.ke</a> in case of such issues as soon as possible</p>
              <p>We wish you all the best in your job search</p>
              </div>
            
            </div>
            
              
          
          </div>
<!--end of col-->

      </div>
</div>

</div>
  
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
               <a class="facebook" target="_blank" href="https://www.facebook.com/idawnkenya"><i class="fa fa-facebook"></i></a> 
                <a class="twitter" target="_blank" href="https://www.twiter.com/idawnke"><i class="fa fa-twitter"></i></a></center>
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
    
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-33686729-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-33686729-1');
</script>

   
    <script type="text/javascript" src="../assets/js/jquery-min.js"></script>      
    <script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../assets/js/material.min.js"></script>
    <script type="text/javascript" src="../assets/js/material-kit.js"></script>
    <script type="text/javascript" src="../assets/js/jquery.parallax.js"></script>
    <script type="text/javascript" src="../assets/js/owl.carousel.min.js"></script>
    <script type="text/javascript" src="../assets/js/wow.js"></script>
    <script type="text/javascript" src="../assets/js/main.js"></script>
    <script type="text/javascript" src="../assets/js/jquery.counterup.min.js"></script>
    <script type="text/javascript" src="../assets/js/waypoints.min.js"></script>
    <script type="text/javascript" src="../assets/js/jasny-bootstrap.min.js"></script>
    <script type="text/javascript" src="../assets/js/form-validator.min.js"></script>
    <script type="text/javascript" src="../assets/js/contact-form-script.js"></script>    
    <script type="text/javascript" src="../assets/js/jquery.themepunch.revolution.min.js"></script>
    <script type="text/javascript" src="../assets/js/jquery.themepunch.tools.min.js"></script>
    <script src="../assets/js/bootstrap-select.min.js"></script>
  </body>
</html>
