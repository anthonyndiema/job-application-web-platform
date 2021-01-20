<?php
error_reporting(0);
session_start();
$ad_id=$_GET['ad_id'];
require_once 'class.user.php';
$edit_job = new USER();
$msg="Please edit your advert and click the update button";

if(!$edit_job->is_logged_in())
{
	$edit_job->redirect('login.php');
}

$usremail=$_SESSION['userSession'];
        $curremail=$usremail;
       $stmtzz = $edit_job->runQuery("SELECT * FROM advert WHERE adid=:ad_id");
	$stmtzz->execute(array(":ad_id"=>$ad_id));
	$row = $stmtzz->fetch(PDO::FETCH_ASSOC);
        
if(isset($_POST['edit-ad-btn']))
{
	$adname = trim($_POST['adtitleedit']);
	$addesc = trim($_POST['addescredit']);
	$adurl = trim($_POST['adurledit']);
        $ademail = trim($_POST['ademailedit']);
        $duedate = trim($_POST['duedateedit']);
        $jlocation = trim($_POST['jlocationedit']);
            
        
	
	if($stmtzz->rowCount() > 0)
	{
            $adid=$row['adid'];
	if($edit_job->updateaddet($adname,$addesc,$adurl,$ademail,$duedate,$jlocation,$ad_id)){
            
         $msg = "<div class='alert alert-success'>
						<button class='close' data-dismiss='alert'>&times;</button>
						<i class='fa fa-check'></i>You have successfully updated your job advert.
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
        $edit_job->redirect('edit-ad.php?ad_id='.$ad_id);}/**/
}
$stmt = $edit_job->runQuery("SELECT * FROM advert WHERE adid=:ad_id");
$stmt->execute(array(":ad_id"=>$ad_id)/*$_SESSION['userSession'])*/);
$row = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
     <meta name="keywords" content="idawn,jobs, engineering jobs, hospitality jobs, IT Jobs, Telecommunication Jobs, Contracts, Full time jobs, Legal Jobs, Legal Admin Jobs, Salary Scale">
    <meta name="description" content="idawn - Edit your job advert">
   <title>idawn - edit your advert</title>
<link rel="stylesheet" href="loader/css/main.css">
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
             <li><a href="manage-ads.php" class="active"><i class="fa fa-briefcase"></i> MANAGE</a></li>
             <li><a href="post-advert.php"><i class="lnr lnr-plus-circle"></i> POST JOB</a></li>
             <li><a href="profile.php"> <i class="fa fa-user"></i> PROFILE</a></li>
             <li><a href="logout.php"><i class="fa fa-sign-out"></i> SIGN OUT</a></li>
            </ul>
          </div>
          <!-- Navbar End -->
        </div>
      </nav>
      <!-- Off Canvas Navigation -->
      </div>
    <!-- Header Section End -->
    <!-- Start Content 
    <div id="content"  class="disp3">-->
      <div class="container disp3">
        <div class="row">
          <div class="col-sm-3 page-sidebar">
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
               <h3><?php echo $msg; ?></h3>
              </div>
            </div>
            <div class="inner-box">
              <div class="welcome-msg">
                <h3 class="page-sub-header2 clearfix no-padding">Edit Job Advert </h3>
               </div>
              <div id="accordion" class="panel-group">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title"> <a href="#collapseB1" data-toggle="collapse"> Ad details </a> </h4>
                  </div>
                  <div class="panel-collapse collapse in" id="collapseB1">
                    <div class="panel-body">
                      <form class="search-form" method="post">
                      
                        <div class="form-group">
                          <label class="control-label">Job Title</label>
                          <input name="adtitleedit" placeholder="Ad title" class="form-control input-md" value="<?php echo $row['adname']; ?>" type="text">
                        </div>
                        <div class="form-group">
                          <label for="desc" class="control-label">Job Description</label>
                          <textarea class="form-control" rows="10" id="textarea" name="addescredit"> <?php echo base64_decode($row['addesc']); ?></textarea>
                        </div>
                        <div class="form-group">
                          <label class="control-label">Web URL</label>
                          <input type="text" name="adurledit" class="form-control"  value="<?php echo $row['adurl']; ?>" placeholder="www.website.com/job_url">
                        </div>
                          <div class="form-group">
                          <label class="control-label">Application Email</label>
                          <input type="text" name="ademailedit" class="form-control" value="<?php echo $row['ademail']; ?>" placeholder="eg. job@website.com">
                        </div>
                          <div class="form-group">
                          <label class="control-label">Due Date</label>
                          <input name="duedateedit" placeholder="duedate" class="form-control" value="<?php echo $row['duedate']; ?>" type="datetime">
                        </div>
                          <div class="form-group">
                          <label class="control-label">Job Location</label>
                          <input type="text" class="form-control" name="jlocationedit"  value="<?php echo $row['jlocation']; ?>"  placeholder="City, Country">
                        </div>
                        
                        <div class="form-group">
                            <input type="submit" class="btn btn-common" name="edit-ad-btn" value="Update Details"/>
                        </div>
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
     <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="loader/js/vendor/jquery-1.9.1.min.js"><\/script>')</script>
	<script src="loader/js/main.js"></script>
  </body>
</html>
