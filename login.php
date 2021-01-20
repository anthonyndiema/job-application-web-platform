<?php
session_start();
require_once 'class.user.php';
$user_login = new USER();

if($user_login->is_logged_in()!="")
{
	redirecttodashboard($user_login,$email);
}
function redirecttodashboard($user_login,$email){
      $stmt = $user_login->runQuery("SELECT usrtype FROM users WHERE email=:usremail");
$stmt->execute(array(":usremail"=>$email));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if($row['usrtype']=='Job Seeker'){
    $user_login->redirect('opportunity-dashboard/index?usr=welcome+back');
}
else{
$user_login->redirect('manage-ads.php');}
	}

if(isset($_POST['btn-login']))
{
	$email = trim($_POST['txtemail']);
	$upass = trim($_POST['txtupass']);
	
	if($user_login->login($email,$upass))
	{
	redirecttodashboard($user_login,$email);
     } 
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
 <meta name="description" content="idawn - login to access your account">
   <title>idawn - login to access your account</title>

     <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
     <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
     <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
     <link rel="manifest" href="site.webmanifest">
     <link rel="mask-icon" href="safari-pinned-tab.svg" color="#ff99f6">
     <meta name="msapplication-TileColor" content="#ff99f6">
     <meta name="theme-color" content="#ff99f6">
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
<ins class="adsbygoogle"
style="display:block"
data-ad-format="fluid"
data-ad-layout-key="-ed+5p-2-bb+pw"
data-ad-client="ca-pub-9085745333411810"
data-ad-slot="5470503391"></ins>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({});
</script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-33686729-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-33686729-1');
</script>
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
            <a class="navbar-brand logo" href="index.php"><img src="assets/img/logo.png" alt="free job ads kenya. free online advertising site in kenya. jobs in kenya. job vacancies. best jobs kenya"></a>
          </div>
          <!-- brand and toggle menu for mobile End -->

         <!-- Navbar Start -->
          <div class="collapse navbar-collapse" id="navbar">
            <ul class="nav navbar-nav navbar-right">
              <li><a href="index.php">HOME</a></li>
              <li><a href="job-listings.php">JOBS</a></li>
                <li><a href="post-advert.php">POST JOB</a></li>
                <li><a href="blog-topics.php">OUR BLOG</a></li>
              <li><a href="signup.php"><i class="fa fa-registered"></i>SIGN UP</a></li>
              <li><a href="login.php" class="active"><i class="fa fa-sign-in"></i> LOGIN</a></li>
            </ul>
          </div>
          <!-- Navbar End -->
        </div>
      </nav>
     
      
    </div>
    <!-- Header Section End -->

    

    <!-- Content section Start --> 
    <section id="content" class="disp2">
      <div class="container">
        <div class="row">
          <div class="col-sm-6 col-sm-offset-4 col-md-4 col-md-offset-4">
            <div class="page-login-form box">
              <h3>
                Login to your Account
              </h3>
                  
                <?php 
		if(isset($_GET['inactive']))
		{
			?>
                <div class='alert alert-danger'>
				<button class='close' data-dismiss='alert'>&times;</button>
				<strong>Sorry!</strong> This Account is not Activated Go to your Email and Activate it. 
			</div>
            <?php
		}
		?>
                <?php
        if(isset($_GET['error']))
		{
			?>
            <div class='alert alert-danger'>
				<button class='close' data-dismiss='alert'>&times;</button>
				<strong>Wrong Details!</strong> 
			</div>
            <?php
		}
                ?>
              <form method="post" class="login-form">
                <div class="form-group">
                  <div class="input-icon">
                      <label>Email Address </label>
                      <input type="email" id="txtemail" class="form-control" name="txtemail" value="" placeholder="Email Address">
                  </div>
                </div> 
                <div class="form-group">
                  <div class="input-icon">
                      <label>Password</label>
                      <input type="password" class="form-control" name="txtupass" value="<?php echo ''; ?>" placeholder="Password">
                  </div>
                </div>                  
                
                  <input type="submit" name="btn-login" class="btn btn-common log-btn" value="Sign In"/>
              </form>
              <ul class="form-links">
                <li class="pull-left"><a href="signup.php">Don't have an account?</a></li>
                <li class="pull-right"><a href="forgot-password.php">Lost your password?</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!--Content section End --> 
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
