<?php
error_reporting(0);
session_start();
require_once '../class.user.php';
$msg="";
  $jobid=$_GET['id'];
$user_jobs = new USER();
if($user_jobs->is_logged_in()=="")
{
	$user_jobs->redirect('../login?browse-jobs');
}
$stmt = $user_jobs->runQuery("SELECT * FROM advert WHERE adid=:adid");
	$stmt->execute(array(":adid"=>$jobid));
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	
	if($stmt->rowCount() > 0)
	{
	$msg="<div class='alert alert-danger'>
				<button class='close' data-dismiss='alert'>&times;</button>
					<strong>Sorry!</strong> An error has occured! <a href='browse-jobs.php'>Please go back and find all jobs</a>
			  </div>";
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
   <title>Welcome Back! Opportunity Dashboard</title>

     <!-- Favicon -->
     <link rel="shortcut icon" href="../assets/img/favicon.png">
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
              <li><a href="index.php">DASHBOARD</a></li>
              <li><a href="edit-curriculum-vitae">EDIT CURRICULUM VITAE</a></li>
                <li><a href="job-applications.php">JOB APPLICATIONS</a></li>
                <li><a href="#"  class="active">BROWSE JOBS</a></li>
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
           
            <!-- Product filter Start -->
          
          
          <!--start of col-->
          <div class="col-sm-12 page-content">
          <div class="inner-box">
              <div class="usearadmin">
               <h1 class="ad-title center"><a href="#"><?php echo $row["adname"] ?></a></h1>
               <h4 class="location center">Hiring Organization : <?php echo $row["company"] ?></h4>
               <h4 class="location center">Job Location : <?php echo $row["jlocation"] ?></h4>
              </div>
            </div>
          <div id="accordion" class="panel-group">
                <div class="panel panel-default">
                  
                  <div class="panel-collapse collapse in" id="collapseB1">
                    <div class="panel-body">
                    <table class="table table-search2 table-responsive">
                    <tr><td><h4 class="block-title"><?php echo $row["adcategory"] ?></h4></td><td class="center title"><h3>JOB DESCRIPTION</h3></td></tr>
                    <tr><td><h4 class="block-title"><?php echo $row["jobtype"] ?></h4></td><td rowspan="4"><?php echo base64_decode($row["addesc"]); ?></td></tr>
                    <tr><td><h4 class="block-title"><?php echo $row["jobpermit"];?></h4></td></tr>
                    <tr><td>Job Posted on: <?php echo $row["dtpostd"] ?></td></tr>
                    <tr><td>Job Valid Until: <?php echo $row["duedate"] ?></td></tr>
                    <tr>
                    <?php if($row['how_to']=="url"){?>
                    <td colspan="2" class="center"><a href="<?php echo $row['adurl']; ?>"class='btn btn-success btn-sm' id="apply-btn" name="apply-btn">Click to Apply</a></td>
                    <?php } ?>
                    <?php if($row['how_to']=="email"){?>
                    <td colspan="2" class="center"><a href="mailto:<?php echo $row['ademail'].'?subject=Application for '.$row['adname']. ' Position';?>&body=I am writing to express my interest in the <?php echo $row['adname']; ?> position listed on Idawn.co.ke. I have experience in the <?php echo $row['adcategory'];?> industry. While much of my experience has been in the business world, I understand the social value of this sector and my business experience would be an asset to your organization...." class='btn btn-success btn-sm' id="apply-btn" name="apply-btn">APPLY JOB 	VIA LINK</a></td>
                    <?php } ?>
                     <?php if($row['how_to']=="letter"){?>
                    <td colspan="2" class="center"><a href="<?php echo $row['adurl']; ?>"class='btn btn-success btn-sm' id="apply-btn" name="apply-btn"><i class="fa fa-edit"></i> Send hardcopy Letter</a></td>
                    <?php } ?>
                     <?php if($row['how_to']=="telephone"){?>
                    <td colspan="2" class="center"><a href="tel:<?php echo $row['adtel']; ?>" class='btn btn-success btn-sm' id="apply-btn" name="apply-btn"><i class="fa fa-phone"></i>Call The Employer</a></td>
                    <?php } ?>
                     <?php if($row['how_to']=="upload"){?>
                     <form id="applyform" method="post">
                    
                     <tr>
                    <td><div class="form-group">
                          <label class="control-label right">Cover Letter: <span class="req">*</span></label></div></td>
                    <td class="center">
                     
                     <div class="form-group">
                          <textarea id="cletter" class="form-control" name="cletter" rows="15" placeholder="Paste Cover Letter Here" type="text"></textarea
                     </div>
                     </td>
                     </tr>
                     
                     <tr>
                    <td class="center" colspan='2'>
                     
                     <div class="form-group">
                          <input class="btn btn-success btn-sm" id="submapp" name="submapp" value="SUBMIT APPLICATION" type="submit">
                     </div>
                     </td>
                     </tr>
                     </form>
                    
                    <?php } ?>
                   </tr>
                    <tr class=""></tr>
                    </table>
                    </div>
                  </div>
                 </div>
            </div>
              </div>
              <!--end of col-->
              
              
              
            <!-- Product filter End -->

            <!-- Adds wrapper Start -->
            <div class="adds-wrapper">

            </div>
          
          <!-- ads wrapper end-->

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
