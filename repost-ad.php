<?php
error_reporting(0);
session_start();
$ad_id=$_GET['ad_id'];
require_once 'class.user.php';
$edit_job = new USER();
$msg="";

if(!$edit_job->is_logged_in())
{
	$edit_job->redirect('login.php');
}
//
 //newpasstx,newpassconfirm,btnupdateypassword
$usremail=$_SESSION['userSession'];
         $curremail=$usremail;
       $stmtzz = $edit_job->runQuery("SELECT * FROM advert WHERE adid=:ad_id");
	$stmtzz->execute(array(":ad_id"=>$ad_id));
	$row = $stmtzz->fetch(PDO::FETCH_ASSOC);
        
if(isset($_POST['edit-ad-btn']))
{
	
        $duedate = trim($_POST['duedaterepost']);
        
            $statuss="active";
        
	
	if($stmtzz->rowCount() > 0)
	{
            $adid=$row['adid'];
	if($edit_job->repostad($duedate,$ad_id,$statuss)){
            
         $msg = "<div class='alert alert-success'>
						<button class='close' data-dismiss='alert'>&times;</button>
						<i class='fa fa-check'></i>Your job advert has sucessfully been reposted.
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
        $edit_job->redirect('repost-ad.php?ad_id='.$ad_id);}/**/
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
    <meta name="keywords" content="idawn,engineering jobs, hospitality jobs, IT Jobs, Telecommunication Jobs, Contracts, Full time jobs, Legal Jobs, Legal Admin Jobs, Salary Scale">
<meta name="description" content="idawn - repost your advert">
   <title>idawn  - repost your advert</title>

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
      
    <!-- Header Section End -->







    <!-- Start Content -->
    <div id="content">
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
               <h3><?php echo $msg; ?></h3>
              </div>
            </div>
            <div class="inner-box">
              <div class="welcome-msg">
                <h3 class="page-sub-header2 clearfix no-padding">Repost Job </h3>
               </div>
              <div id="accordion" class="panel-group">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title"> <a href="#collapseB1" data-toggle="collapse"> Please provide the new deadline date of advert </a> </h4>
                  </div>
                  <div class="panel-collapse collapse in" id="collapseB1">
                    <div class="panel-body">
                      <form class="search-form" method="post">
                      
                         <div class="form-group">
                          <label class="control-label">Deadline Date of Advert:</label>
                          <input  type="date" name="duedaterepost" placeholder="duedate" class="form-control" min="<?php echo date('Y-m-d'); ?>">
                        </div>
                          
                        
                        <div class="form-group">
                            <input type="submit" class="btn btn-common" name="edit-ad-btn" value="Repost Job"/>
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
                  <center> <p><a href="www.idawn.co.ke"><b>www.idawn.co.ke</a> &copy; <?php echo date('Y');?>: All copyrights reserved
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
