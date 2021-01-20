<?php
session_start();
require_once 'class.user.php';

$reg_user = new USER();

if($reg_user->is_logged_in()!="")
{
	$reg_user->redirect('index.php');
}


if(isset($_POST['btn-signup']))
{

        $usrtype = trim($_POST['usertype']);
        if($usrtype=="Employer"){
        $company=trim($_POST['txtorganization']);
        }
        else{$company="";}
	$email = trim($_POST['txtemail']);
	$upass = trim($_POST['txtpass']);
        $fname = trim($_POST['txtfname']);
        $lname = trim($_POST['txtlname']);
       $stats = 'Y';

	$code = md5(uniqid(rand()));
	
	$stmt = $reg_user->runQuery("SELECT * FROM users WHERE email=:email_id");
	$stmt->execute(array(":email_id"=>$email));
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	
	if($stmt->rowCount() > 0)
	{
		$msg = "
		      <div class='alert alert-danger'>
				<button class='close' data-dismiss='alert'>&times;</button>
					<strong>Sorry !</strong>  email already exists , Please Try another one
			  </div>
			  ";
	}
	else
	{
		if($reg_user->registerusr($usrtype,$company,$fname,$lname,$email,$upass,$code,$stats))
		{			
			$id = $reg_user->lasdID();		
			$key = base64_encode($id);
			$id = $key;
			 $to = $email;
 
$subject = 'your account has been created at idawn';

$headers = "From: accounts@idawn.co.ke\r\n";
$headers .= "Reply-To: accounts@idawn.co.ke\r\n";
$headers .= "CC: support@idawn.co.ke\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$message = '<html><body>';
$message .= '<h1>Hello, '.$fname.'!</h1>Your '.$usertype.' account has successfully been created!<br/>';
$message .= '</body></html>';
$message = '<html><body>';
$message .= "<h1>Welcome to idawn, ".$fname."  ".$lname."</h1><br/>";
$message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
$message .= "<tr><td><strong>Email:</strong> </td><td>" . $email . "</td></tr>";
$message .= "<tr><td><strong>Account Confirmation Link:</strong> </td><td><a href='http://www.idawn.co.ke/confirm.php?id=$id&code=$code'>Click HERE to Activate :)</a></td></tr>";

$message .= "</table>";
$message .= "</body></html>";
            
            
            
   
//mail($to, $subject, $message, $headers);
			$msg = "
					
                                        <div class='inner-box posting'>
              <div class='alert alert-success alert-lg' role='alert'>
              <h2 class='postin-title'>✔ Account Creation is <strong>Successful</strong></h2>
              <p>You can now access your account by loging in</p>
              
            </div>
            <p style='color:blue;'><a href='login.php'>Login to Your Account</a></p>
            </div>
					";
		}
		else
		{
			echo "sorry , Query could no execute...";
		}		
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
    <meta name="description" content="idawn - create your account and post jobs">
   <title>idawn - create your account and post jobs</title>

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
    <script src="plugin/jquery-1.12.1.min.js"></script>
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
                <li><a href="signup.php" class="active"><i class="fa fa-registered"></i>SIGN UP</a></li>
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
    <section id="content"class="disp3">
      <div class="container">
        <div class="row">
          <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
            <div class="page-login-form box">
              <h3>
                  Create Your Account in <br/> Just 1 Minute
              </h3>
                <div>
               <?php if(isset($msg)) echo $msg;  ?></div>
                <form method="post" class="login-form">
                  <div class="form-group">
                  <div class="input-icon">
                      <label>I am:</label>
                      <select name="usertype" class="form-control" id="usertype" required="required">
                      <option>Select User</option>
                      <option value="Employer">An Employer</option>
                      <option value="Job Seeker">A Job Seeker</option>
                      </select>
                    
                  </div>
                </div> 
                
                  <div class="form-group">
                  <div class="input-icon">
                      <label>First Name</label>
                    <input type="text" id="txtfname" class="form-control" name="txtfname" placeholder="First Name" required="required">
                  </div>
                </div> 
                  <div class="form-group">
                  <div class="input-icon">
                    <label>Last Name</label>
                    <input type="text" id="txtlname" class="form-control" name="txtlname" placeholder="Last Name" required="required">
                  </div>
                </div>
                  
<div class="form-group" id="orgtitle">
                  <div class="input-icon">
                      <label>Company/Hiring Organization:</label>
                      <input type="text" id="txtorganization" class="form-control" name="txtorganization" placeholder="e.g Safaricom Limited">
                    
                  </div>
                </div>  
                <div class="form-group">
                  <div class="input-icon">
                    <label>Email Address:</label>
                    <input type="email" id="txtemail" class="form-control" name="txtemail" placeholder="Email Address" required="required">
                  </div>
                </div>






                <div class="form-group">
                  <div class="input-icon">
                    <label>Password</label>
                    <input type="password" class="form-control" name="txtpass" placeholder="Password" required="required">
                  </div>
                </div>                  
                
                    <input type="submit" name="btn-signup" class="btn btn-common log-btn" value="Sign Up"/>
              </form>
                <ul class="form-links">
                    <li class="pull-left"><a href="login.php">I already own an account?</a></li>
                
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
     <script type="text/javascript">
     $('#orgtitle').hide();
     $('#usertype').change(function(){
     var usrtype=$('#usertype').val();
     if(usrtype=="Employer"){
     $('#orgtitle').show();
     }
     else{
     $('#orgtitle').hide();
     }
     });
     </script> 
     <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-33686729-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-33686729-1');
</script>
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
