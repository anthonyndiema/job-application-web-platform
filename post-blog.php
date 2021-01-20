<?php
//error_reporting(0);
session_start();
require_once 'class.user.php';
$user_postblog = new USER();
$msg="";
$UploadDirectory="blogimages/";
if(isset($_POST["btn-postblog"])){
$blogtitle=$_POST["blogtitle"];
$FileName			= $_FILES['blogimage']['name']; //uploaded file name
	$FileTitle			= str_replace(' ','-',$blogtitle); // file title
	 $RandNumber   		= rand(0, 9999999999);
	$ImageExt			= substr($FileName, strrpos($FileName, '.')); //file extension
$NewFileName = $FileTitle.$ImageExt;

$blogurl="our-blog/".str_replace(' ','-',$blogtitle).".php";
$blogdesc=$_POST["blogdesc"];
$blogauthor=$_POST["blogauthor"];
$blogdate=date("Y-m-d H:i:s");

if(move_uploaded_file($_FILES['blogimage']["tmp_name"],$UploadDirectory.$NewFileName ))
{
$image=$_FILES["blogimage"]["tmp_name"];
$imageContent=addslashes(file_get_contents($image));
if($user_postblog->postblog($blogtitle,$blogurl,$blogdesc,$blogauthor,$NewFileName,$blogdate)){
 $msg = "
		      <div class='alert alert-success'>
				<button class='close' data-dismiss='alert'>&times;</button>
					<strong>Congratulations!</strong>blog post added successfully
			  </div>
			  ";
}
}
else{
 $msg = "
		      <div class='alert alert-danger'>
				<button class='close' data-dismiss='alert'>&times;</button>
					<strong>Sorry !</strong>Unable to add blog post
			  </div>
			  ";
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
   
   <title>idawn - Post a blog</title>

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
               <li><a href="index.php">HOME</a></li>
                <li><a href="job-listings.php">JOBS</a></li>
                <li><a href="post-advert.php" class="active">POST JOB</a></li>
                <li><a href="blog.php">OUR BLOG</a></li>
                <li><a href="signup.php"><i class="fa fa-registered"></i>SIGN UP</a></li>
              <li><a href="login.php"><i class="fa fa-sign-in"></i> LOGIN</a></li>

             
            </ul>
          </div>
          <!-- Navbar End -->
        </div>
      </nav>
      
      
    </div>
    <!-- Header Section End -->

    <!-- Content section Start --> 
    <section id="content" class="disp3">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-9 col-md-offset-2">
            <div class="page-ads box">
              <h2 class="title-2">
                ADD A BLOG POST
              </h2>
                <div>
                <div><?php echo $msg; ?></div>
                <form class="form-blog" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                  <label class="control-label">Blog Post Title</label>
                  <input name="blogtitle" placeholder="blog title" class="form-control input-md" type="text" required="required">
                  <span class="help-block">Provide the title of the blog </span>
                </div> 
                  <div class="form-group">
                  <label class="control-label">Author</label>
                  <input name="blogauthor" placeholder="author" class="form-control input-md" type="text" required="required">
                  <span class="help-block">Provide the author of the blog </span>
                </div>  
                  <!--<div class="form-group">
                  <label class="control-label">Blog Post Url</label>
                  <input name="blogurl" placeholder="blog url" class="form-control input-md" required="" type="text" required="required">
                  <span class="help-block">Provide the url of the blog </span>
                </div>-->
                
                  <div class="form-group">
                  <label class="control-label">Blog Post Description</label>
                  <textarea name="blogdesc" placeholder="blog post description" class="form-control input-md" ></textarea>
                  <span class="help-block">Provide the description of the blog </span>
                </div> 
                  <div>
                  <label class="control-label">Image:</label>
                  <input type="file" name="blogimage" />
                  <span class="help-block">Provide the image of the blog </span>
                </div>  
                 <div class="form-group">
                  <div class="well">
                   
                      <input type="submit" name="btn-postblog" class="btn btn-success btn-rn" value="Post Blog"/>
                  </div> 
                </div>                            
              </form>
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
