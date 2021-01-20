<?php
session_start();
require_once 'class.user.php';
$user = new USER();

if($user->is_logged_in()!="")
{
	$user->redirect('login.php');
}
$msg="";
if(isset($_POST['btn-submitjb']))
{
	$email = $_POST['txtemailjb'];
	
	$stmt = $user->runQuery("SELECT id FROM users WHERE email=:email LIMIT 1");
	$stmt->execute(array(":email"=>$email));
	$row = $stmt->fetch(PDO::FETCH_ASSOC);	
	if($stmt->rowCount() == 1)
	{
		$id = base64_encode($row['id']);
		$code = md5(uniqid(rand()));
		
		$stmt = $user->runQuery("UPDATE users SET tokencode=:token WHERE email=:email");
		$stmt->execute(array(":token"=>$code,"email"=>$email));
		
		$to=$email;
               $subject = "reset password at www.idawn.co.ke/jobs";

$headers = "From: www.idawn.co.ke\r\n";
$headers .= "Reply-To: no-reply@idawn.co.ke\r\n";
$headers .= "CC: no-reply@idawn.co.ke\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$message = '<html><body>';
$message .= "<h1>Hello,</h1><br/>";
$message .= "<p>To reset you password, <a href='http://s/jobs/reset-password?id=$id&code=$code'>click here.</a></p>";
$message .= "<p>Or copy this link directly to your browser, <a href='http://www.idawn.co.ke/jobs/reset-password.php?id=$id&code=$code'>http://www.idawn.co.ke/reset-password.php?id=$id&code=$code</a></p>";
$message .= "<p>This message has been sent to ".$email." If you are not the intended recipient, please contact us through support@idawn.co.ke</p>";
$message .= "<br/><br/>Best Regards, <br/><br/>The Idawn JobsBoard Support Team.<br/>www.idawn.co.ke.";
$message .= "</body></html>";
            
	
            
            
            
   
mail($to, $subject, $message, $headers);
                
               $msg = "<div class='alert alert-success'>
					<button class='close' data-dismiss='alert'>&times;</button>
					We've sent an email to $email.
                    Please click on the password reset link in the email to generate new password. 
			  	</div>";
	}
	else
	{
		$msg = "<div class='alert alert-danger'>
					<button class='close' data-dismiss='alert'>&times;</button>
					<strong>Sorry!</strong>  this email is not found in our database. 
			    </div>";
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
     <meta name="keywords" content="idawn,password,email,change password,forgot password">
    <meta name="description" content="idawn - Forgot your password? request change.">
   <title>idawn - forgot password? request change.</title>

     <!-- Favicon -->
     <link rel="shortcut icon" href="assets/img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">    
    <link rel="stylesheet" href="assets/css/jasny-bootstrap.min.css" type="text/css">
    <!-- Material CSS -->
    <link rel="stylesheet" href="assets/css/material-kit.css" type="text/css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css" type="text/css">
        <!-- Line Icons CSS -->
    <link rel="stylesheet" href="assets/fonts/line-icons/line-icons.css" type="text/css">
    <!-- Main Styles -->
    <link rel="stylesheet" href="assets/css/main.css" type="text/css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="assets/extras/animate.css" type="text/css">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="assets/extras/owl.carousel.css" type="text/css">
    <link rel="stylesheet" href="assets/extras/owl.theme.css" type="text/css">
    <!-- Responsive CSS Styles -->
    <link rel="stylesheet" href="assets/css/responsive.css" type="text/css">    
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
              <li><a href="index.php">HOME</a></li>
                <li><a href="jobs.php">JOBS</a></li>
                <li><a href="post-advert.php">POST JOB</a></li>
                <li><a href="blog-topics.php">OUR BLOG</a></li>
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


    <!-- Content section Start --> 
    <section id="content" class="disp3">
      <div class="container">
        <div class="row">
          <div class="col-sm-6 col-sm-offset-4 col-md-4 col-md-offset-4">
            <div class="page-login-form box">
              <h3>
                Forgot Password? Request Change
              </h3>
              <?php
			if(isset($msg))
			{
				echo $msg;
			}
			else
			{
				?>
              	<div class='alert alert-info'>
				Please enter your email address. You will receive a link to create a new password via email.!
				</div>  
                <?php
			}
			?>
               
                <form method="post" class="login-form">
                  <div class="form-group">
                  <div class="input-icon">
                    <i class="icon fa fa-envelope-o"></i>
                    <input type="email" id="pass" class="form-control" name="txtemailjb" placeholder="Email Address">
                  </div>
                </div> 
                   
                    <input type="submit" name="btn-submitjb" class="btn btn-common log-btn" value="Reset Password"/>
              </form>
              <ul class="form-links">
                <li class="pull-left"><a href="signup.php">Don't have an account?</a></li>
                <li class="pull-right"><a href="login.php">Back to Login</a></li>
              </ul>
            </div>
          </div>
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
