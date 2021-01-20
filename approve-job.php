<?php 
session_start();
require_once 'class.user.php';require_once('codebird/codebird.php');
$jobadvert=  base64_decode($_GET['jobid']);$newstatus=  base64_decode($_GET['status']);
$approve_job = new USER();
$stmt = $approve_job->runQuery("UPDATE advert SET status=:newstatus where adid=:adid");
	$stmt->execute(array(":newstatus"=>$newstatus,":adid"=>$jobadvert));
$stmtzz = $approve_job->runQuery("SELECT * FROM advert WHERE adid=:ad_id");
	$stmtzz->execute(array(":ad_id"=>$jobadvert));
	$row = $stmtzz->fetch(PDO::FETCH_ASSOC);     
if($newstatus=='active'){        
$duedate=$row['duedate']; 
$adnm=  substr($row['adname'],0,20);$addsc=substr($row['addesc'],0,40);$link="www.smartwriting.us/jobs/job-info?jobid=$jobadvert";$jloc=$row['jlocation'];
//require codebird

\Codebird\Codebird::setConsumerKey("nkQXLq7kYrOejfiyU82RORgB9","eTBCUXCpB7rFFvcRofQn8QAxd6yjVGZskBQFCXzzNIgHxgKMEs");
$cb=\Codebird\Codebird::getInstance();
$cb->setToken("703566319774515200-zw8PYBiZ6CuKar4KrBORp0EdxUeTwg","qK3GEx06wWO4hZj1UIT2VTanTp2QVa37YGKEaEYuaPorq");
$params=array('status'=>'Apply:: '.$adnm.' ('.$addsc.') at '.$jloc.' Before '.$duedate);
$reply=$cb->statuses_update($params);
$msg="
					<div class='alert alert-success'>
						<button class='close' data-dismiss='alert'>&times;</button>
						<strong>Success!</strong>  The status for advert id (".$jobadvert.") has been updated successfully to".$newstatus."</div>";

}
else{
 $msg="
					<div class='alert alert-danger'>
						<button class='close' data-dismiss='alert'>&times;</button>
						<strong>Advert Declined!</strong>  The status for advert id (".$jobadvert.") has been updated successfully to".$newstatus."</div>";
   
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
     <meta name="keywords" content="idawn,engineering jobs, hospitality jobs, IT Jobs, Telecommunication Jobs, Contracts, Full time jobs, Legal Jobs, Legal Admin Jobs, Salary Scale">
    <meta name="description" content="idawn - approve job">
   <title>idawn - approve job</title>

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
              <li><a href="index.php.php">HOME</a></li>
                <li><a href="jobs.php">JOBS</a></li>
                <li><a href="post-advert.php">POST JOB</a></li>
                <li><a href="signup.php"><i class="fa fa-registered"></i>SIGN UP</a></li>
              <li><a href="login.php"><i class="fa fa-sign-in"></i> LOGIN</a></li>
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
    <section id="content">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
           <div class="inner-box posting">
              <div class="alert alert-success alert-lg" role="alert">
              <h2 class="postin-title"><?php echo $msg; ?></div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Content section End --> 
    
<!-- Footer Section Start -->
    <footer>
      <!-- Footer Area Start -->
      <section class="footer-Content">
        <div class="container">
          <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="widget">
                <h3 class="block-title">About us</h3>
                <div class="textwidget">
                    <p>
                       Smartwriting Research Company is made up of dedicated people who work together to ensure that their clients are offered quality service  in research writing, SEO / Blog articles writing, Homework Support and many other writing services from across the globe. 
                       <br/>The platform also contains free job posting and job search, connecting employers and job seekers
                    </p>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="widget">
                  
                <h3 class="block-title">Smartwriting</h3>
                <div class="textwidget">
                <p><a href="../index">HOME</a></p>
                    <p><a href="../howitworks">HOW IT WORKS</a></p>
                    <p><a href="../about">ABOUT US</a></p>
                    <p><a href='../pricing'>PRICING</a></p>
                    <p><a href='../blog'>BLOG</a></p>
                  <p><a href="../order">PLACE ORDER</a></p>
                  <p><a href="../faqs">FAQs</a></p>
                  <p><a href="../signup">SIGN UP</a></p>
                  <p><a href="../login">SIGN IN</a></p>
                
                  </div>
              </div>
            </div>
              <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="widget">
                  
                <h3 class="block-title">Jobs Section</h3>
                <div class="textwidget">
                    <p><a href="index.php">JOBS BOARD</a></p>
                    <p><a href="post-advert.php">POST JOB</a></p>
                    <p><a href="jobs.php">VIEW JOBS</a></p>
                    <p><a href='../blog'>BLOG</a></p>
                    <p><a href='signup.php'>SIGN UP</a></p>
                    <p><a href="login.php">SIGN IN</a></p>
                
                  </div>
              </div>
            </div>
            
              <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="widget">
                  
                <h3 class="block-title">Visit our Blog</h3>
                <div class="textwidget">
                    <p><a href="../blog/how_to_write_a_good_essay_paper">Essay Writing Services</a></p>
                    <p><a href="../blog/research_paper_writing_service">Research Paper Writing</a></p>
                    <p><a href="../blog/reflection_essay_writing">Reflection Papers Writing</a></p>
                    <p><a href="../blog/deal_with_homework_issues">Homework Help</a></p>
                
                  </div>
              </div>
            </div>

          </div>
        </div>
      </section>
      <!-- Footer area End -->
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
                <a class="twitter" target="_blank" href="https://www.twitter.com/idawnke"><i class="fa fa-twitter"></i></a>
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
