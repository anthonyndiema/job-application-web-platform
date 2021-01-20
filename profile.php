<?php
error_reporting(0);
session_start();
require_once 'class.user.php';
$emp_detl = new USER();
// $person=$_SESSION['userSession'];
if(!$emp_detl->is_logged_in())
{
	$emp_detl->redirect('login.php');
}
//
 //newpasstx,newpassconfirm,btnupdateypassword
$curremail=$_SESSION['userSession'];
        
       $stmtzz = $emp_detl->runQuery("SELECT * FROM users WHERE email=:email_id");
	$stmtzz->execute(array(":email_id"=>$_SESSION['userSession']));
	$row = $stmtzz->fetch(PDO::FETCH_ASSOC);
        $usrid=$row['id'];
        if(isset($_POST['empbtnupdateypassword']))
		{
        if($stmtzz->rowCount() == 1)
	{
		
			$pass = $_POST['empnewpasstx'];
			$cpass = $_POST['empnewpassconfirm'];
			
			if($cpass!==$pass)
			{
				$msg = "<div class='alert alert-danger'>
						<button class='close' data-dismiss='alert'>&times;</button>
						<strong>Sorry!</strong>  Password Doesn't match. 
						</div>";
			}
			else
			{
				$password = md5($cpass);
				$stmtzz = $emp_detl->runQuery("UPDATE users SET password=:upass WHERE id=:uid");
				$stmtzz->execute(array(":upass"=>$password,":uid"=>$usrid));
				
				$msg = "<div class='alert alert-success'>
						<button class='close' data-dismiss='alert'>&times;</button>
						You have successfully changed your password.
						</div>";
				//header("refresh:5;login.php");
			}
		}	
	}
	
if(isset($_POST['empprof-submit']))
{
	$txfname = trim($_POST['empupfname']);
	$txlname = trim($_POST['empuplname']);
	$txuseremail = trim($_POST['empupemail']);
        $txusername = trim($_POST['empupusername']);
        $txphoneno = trim($_POST['empupphoneno']);
        
            
        
	
	if($stmtzz->rowCount() > 0)
	{
            $userid=$row['id'];
	if($emp_detl->updateemppersonalinfo($txfname,$txlname,$txuseremail,$txusername,$txphoneno,$userid)){
            $_SESSION['userSession'] = $txuseremail;
         $msg = "<div class='alert alert-success'>
						<button class='close' data-dismiss='alert'>&times;</button>
						You have successfully updated your personal information.
						</div>";
        }
        	
            
           /* $msg = "
		      <div class='alert alert-error'>
				<button class='close' data-dismiss='alert'>&times;</button>
					<strong>Sorry !</strong>  email already exists , Please Try another one
			  </div>
			  ";*/
	}
	else
	{
        $emp_detl->redirect('manage-ads.php');}/**/
}
$stmt = $emp_detl->runQuery("SELECT * FROM users WHERE email=:usremail");
$stmt->execute(array(":usremail"=>$_SESSION['userSession'])/*$_SESSION['userSession'])*/);
$row = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="keywords" content="idawn,engineering jobs, hospitality jobs, IT Jobs, Telecommunication Jobs, Contracts, Full time jobs, Legal Jobs, Legal Admin Jobs, Salary Scale">
<meta name="description" content="idawn - your profile settings">
   <title>idawn - your profile settings</title>

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
              <li><a href="manage-ads.php"><i class="fa fa-briefcase"></i> MANAGE</a></li>
                <li><a href="post-advert.php"><i class="lnr lnr-plus-circle"></i> POST JOB</a></li>
                <li><a href="profile.php" class="active"> <i class="fa fa-user"></i> PROFILE</a></li>
              <li><a href="logout.php"><i class="fa fa-sign-out"></i> SIGN OUT</a></li>
            </ul>
          </div>
          <!-- Navbar End -->
        </div>
      </nav>
      <!-- Off Canvas Navigation -->

      
    </div>
    <!-- Header Section End -->

    <!-- Page Header Start -->
    
    <!-- Page Header End --> 

    <!-- Start Content -->
    <div id="content" class="disp3">
      <div class="container">
        <div class="row">
            
            
            
            
          <div class="col-sm-3 page-sideabr">
            <aside>
              <div class="inner-box">
                  
                  
                  
                  
                <div class="user-panel-sidebar">
                  
                    <div class="collapse-box">
                      <div class="widget-title">
                  <h5>Ads Statistics</h5>
                </div>
                        <div class="categories-list">
                    
                       <?php
                                                    $con=mysqli_connect('localhost','idawncok_root','1993Ndiema1993','idawncok_jobboard');
                                                    if(!$con){
                                                        die('Could not connect'.  mysqli_errno());
                                                    }
                                                    $sql = "SELECT * FROM advert where useremail='".$curremail."'";
                                                     $sql2 = "SELECT * FROM advert where useremail='".$curremail."' and  status='active'";
                                                    $sql3 = "SELECT * FROM advert where useremail='".$curremail."' and  status='inactive'";
                                                    $sql4 = "SELECT * FROM advert where useremail='".$curremail."' and  status='pending'";
                                                    $sql5 = "SELECT * FROM advert where useremail='".$curremail."' and  isfavorite='yes'";
                                               
                                                    
                                                    if($result=mysqli_query($con,$sql)){
                                                        $result=mysqli_query($con,$sql);
                                                        $count=mysqli_num_rows($result);
                                                        
                                                        $result=mysqli_query($con,$sql2);
                                                        $count2=mysqli_num_rows($result);
                                                        $result=mysqli_query($con,$sql3);
                                                        $count3=mysqli_num_rows($result);
                                                        
                                                        $result=mysqli_query($con,$sql4);
                                                        $count4=mysqli_num_rows($result);
                                                        
                                                        $result=mysqli_query($con,$sql5);
                                                        $count5=mysqli_num_rows($result);
                                                        
                                                       
                                                       
                                                        
                                                    }
                                                        ?>
                          <table class="table table-bordered table-hover">
                          
                           <tr><td><a href="manage-ads.php"> All Ads</a></td><td><?php echo $count; ?></td></tr>
                              <tr><td><a href="active-ads.php"> Active Ads</a></td><td><?php echo $count2; ?></td></tr>
                              <tr><td><a href="inactive-ads.php"> Inactive Ads</a></td><td><?php echo $count3; ?></td></tr>
                              <tr><td><a href="pending-ads.php"> Pending Approval</a></td><td><?php echo $count4; ?></td></tr>
                              <tr><td><a href="favorites.php"> Favorites</a></td><td><?php echo $count5; ?></td></tr>
                          </table>
                         
                      
                  </div>
                 
                   
                  </div>
                  
                    
                    
                    <div class="collapse-box">
                      <div class="widget-title">
                  <h5>Close Account</h5>
                </div>
                    <div aria-expanded="true" id="close" class="panel-collapse collapse in">
                      <ul class="acc-list">
                        <li>
                            <a href="confirm-closure.php"><i class="fa fa-close"></i> Close Account</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                    
                    
                    
                </div>
              </div>
              
            </aside>
          </div>
          <div class="col-sm-9 page-content">
            <div class="inner-box">
              <div class="usearadmin">
                  <h5><a href="#">Profile Settings&nbsp;&nbsp;&nbsp; (<?php echo $row['fname']."  ".$row['lname'];  ?>)</a></h5>
              </div>
            </div>
            <div class="inner-box">
              
              <div id="accordion" class="panel-group">
                <div class="panel panel-default">
                    <div>
                        <?php
        if(isset($msg))
		{
			echo $msg;
		}
		?>
                    </div>
                  <div class="panel-heading">
                    <h4 class="panel-title"> <a href="#collapseB1" data-toggle="collapse"> Personal Information </a> </h4>
                  </div>
                  <div class="panel-collapse collapse in" id="collapseB1">
                    <div class="panel-body">
                        <form method="post" name="prof-form">
                        <table class="table table-bordered table-hover">
                            <tr>
                                <td>First Name</td>
                                <td><input class="form-control" name="empupfname" value="<?php echo $row['fname'];?>" type="text"></td>
                            </tr>
                            <tr>
                                <td>Last Name</td>
                                <td><input class="form-control" name="empuplname" value="<?php echo $row['lname'];?>" type="text"></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><input class="form-control" name="empupemail" value="<?php echo $row['email'];?>" type="email"></td>
                            </tr>
                            <tr>
                                <td>User Name</td>
                                <td><input class="form-control" name="empupusername" value="<?php echo $row['username'];?>" type="text"></td>
                            </tr>
                            <tr>
                                <td>Phone Number</td>
                                <td><input class="form-control" name="empupphoneno" value="<?php echo $row['telephone'];?>" type="tel"></td>
                            </tr>
                            <tr>
                                <td colspan="2"><center><input type="submit" name="empprof-submit" value="Update Personal Information" class="btn btn-success"/></center></td>
                            </tr>
                        </table>
                     
                        
                      </form>
                    </div>
                  </div>
                </div>
                <div class="panel panel-default ">
                  <div class="panel-heading">
                    <h4 class="panel-title"> <a aria-expanded="false" class="collapsed" href="#collapseB2" data-toggle="collapse"> Manage Passwords </a> </h4>
                  </div>
                  <div style="height: 0px;" aria-expanded="false" class="panel-collapse collapse" id="collapseB2">
                    <div class="panel-body">
                      <form method="post">
                          <table class="table table-bordered table-hover">
                              <tr><td>Your New Password:</td><td><input class="form-control" name="empnewpasstx" placeholder="type password..." type="password"></td></tr>
                              <tr><td>Confirm Password:</td><td><input class="form-control" name="empnewpassconfirm"placeholder="repeat password..." type="password"></td></tr>
                              <tr><td colspan="2"><input class="btn btn-success"type="submit" name="empbtnupdateypassword" value="Update Passoword"</td></tr>
                          </table>
                       
                        
                      </form>
                    </div>
                  </div>
                </div>
                
              </div>
            </div>
          </div>
        </div>  
      </div>      
    </div>
    <!-- End Content -->    
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
