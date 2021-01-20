<?php
//error_reporting(0);
session_start();
require_once '../class.user.php';
    // First we execute our common code to connection to the database and start the session
  //$person=$_SESSION['userSession'];
 // At the top of the page we check to see whether the user is logged in or not
  $loc="";
$user_jobs = new USER();
if($user_jobs->is_logged_in()=="")
{
	$user_jobs->redirect('../login?browse-jobs');
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
   <title>Browse Jobs</title>

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
    <script type="text/javascript">
$(document).ready(function() {
 fetchjobs(); filterjobs();  
});
function filterjobs(){
$('#jsearchform').submit(function(e){
var loadindiv=$("#loadingdiv");
 var resultdiv=$("#resultdiv");
$("#loadingdiv").show();
e.preventDefault();
$.ajax({
type: "POST",
url: "fetch_jobs?type=filter",
data:$("#jsearchform").serialize(),
success: function(json)
{
console.log(json);
var job=JSON.parse(json);
var result="<div class='inner-box'><div class='usearadmin'><h3><center><a href='#'> <span id='jobno'>"+job.length+"</span> JOB SEARCH RESULTS FOUND</a></center></h3></div></div>";
for(var i=0;i<job.length;i++){
result+="<div class='adds-wrapper'><div class='item-list'><!--<div class='col-sm-2 no-padding photobox'><div class='add-image'><a href='#'><img src='assets/img/item/img-1.jpg' alt=''></a><span class='photo-count'><i class='fa fa-camera'></i>2</span></div></div>--><div class='col-sm-7 add-desc-box'><div class='add-details'><h5 class='add-title'><a href='ad-details.php?id="+job[i]['adid']+"'>"+job[i]["adname"]+"</a></h5><div class='info'><span class='ad-type'> CATEGORY</span> "+job[i]['adcategory']+"</div><div class='info'><span class='ad-type'><i class='fa fa-map-marker'></i></span><span>  "+job[i]['jlocation']+" </span></div><div class='item_desc'><a href='ad-details.php?id="+job[i]['adid']+"'> "+atob(job[i]['addesc']).slice(0,200)+"</a></div></div></div><div class='col-sm-4 text-right'><div class='info'><span class='ad-type'><i class='fa fa-clock'></i> POSTED ON</span>"+job[i]['dtpostd']+"</div><div class='info'><span class='ad-type'><i class='fa fa-basket'></i> DEADLINE</span>"+job[i]['duedate']+"</div><a href='ad-details.php?id="+job[i]['adid']+"' class='btn btn-common btn-sm'><i class='fa fa-pin'></i><span>APPLY JOB</span></a></div></div></div>";
}

resultdiv.html(result);
$("#loadingdiv").hide();

},
error: function(results)
{
//console.log(results);
}
});
});
}
function fetchjobs(){
var loadindiv=$("#loadingdiv");
 var resultdiv=$("#resultdiv");
$("#loadingdiv").show();
$.ajax({
url:"fetch_jobs?type=all",
success:function(json){
//console.log(json);
var job=JSON.parse(json);
var result="<div class='inner-box'><div class='usearadmin'><h3><center><a href='#'> <span id='jobno'>"+job.length+"</span> JOB SEARCH RESULTS FOUND</a></center></h3></div></div>";
for(var i=0;i<job.length;i++){
result+="<div class='adds-wrapper'><div class='item-list'><!--<div class='col-sm-2 no-padding photobox'><div class='add-image'><a href='#'><img src='assets/img/item/img-1.jpg' alt=''></a><span class='photo-count'><i class='fa fa-camera'></i>2</span></div></div>--><div class='col-sm-7 add-desc-box'><div class='add-details'><h5 class='add-title'><a href='ad-details.php?id="+job[i]['adid']+"'>"+job[i]["adname"]+"</a></h5><div class='info'><span class='ad-type'> CATEGORY</span> "+job[i]['adcategory']+"</div><div class='info'><span class='ad-type'><i class='fa fa-map-marker'></i></span><span>  "+job[i]['jlocation']+" </span></div><div class='item_desc'><a href='ad-details.php?id="+job[i]['adid']+"'> "+atob(job[i]['addesc']).slice(0,200)+"</a></div></div></div><div class='col-sm-4 text-right'><div class='info'><span class='ad-type'><i class='fa fa-clock'></i> POSTED ON</span>"+job[i]['dtpostd']+"</div><div class='info'><span class='ad-type'><i class='fa fa-basket'></i> DEADLINE</span>"+job[i]['duedate']+"</div><a href='ad-details.php?id="+job[i]['adid']+"' class='btn btn-common btn-sm'><i class='fa fa-pin'></i><span>APPLY JOB</span></a></div></div></div>";
}

resultdiv.html(result);
$("#loadingdiv").hide();



}
}); 
}
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
           <div class="col-sm-3 page-sideabr">
           <aside>
           <div class="inner-box">
                <div class="user-panel-sidebar">
                <!--collapse box-->
                <div class="collapse-box">
                    <h5 class="collapset-title no-border"><i class="fa fa-search"></i>FILTER JOB SEARCH <a aria-expanded="true" class="pull-right" data-toggle="collapse" href="#myfilter"><i class="fa fa-angle-down"></i></a></h5>
                    <div aria-expanded="true" id="myfilter" class="panel-collapse collapse in">
                      <form id="jsearchform" method="post">
                      <ul class="acc-list">
                       
                        <li class="active">
                          <div class="form-group">
                          <label class="filter-label">JOB KEYWORD:</label>
                          <input class="form-control" id="searchkey" name="searchkey" placeholder="e.g. clerk" type="text">
                        </div>
                        </li>
                        <li class="active">
                          <div class="form-group">
                          <label class="filter-label">JOB CATEGORY:</label>
                          <input class="form-control" id="searchcat" name="searchcat" placeholder="e.g. office" type="text">
                        </div>
                        </li>
                        <li class="active">
                          <div class="form-group">
                          <label class="filter-label">HIRING ORGANIZATION:</label>
                          <input class="form-control" id="searchorg" name="searchorg" placeholder="e.g. Safaricom LTD" type="text">
                        </div>
                        </li>
                        <li class="active">
                          <div class="form-group">
                          <label class="filter-label">JOB TYPE:</label>
                          <select class="form-control" name="searchtype" id="jtype">
                          <option value="all">ALL TYPES</option>
                          <option value="Job">JOB</option>
                          <option value="Internship">INTERNSHIP</option>
                          <option value="Volunteer">VOLUNTEER</option>
                          </select>
                          
                        </div>
                        </li>
                        <li class="active">
                          <div class="form-group">
                          <label class="filter-label">JOB PERMIT:</label>
                          <select class="form-control" name="searchpermit" id="jpermit">
                          <option value="all">ALL PERMITS</option>
                          <option value="Part Time">PART TIME JOBS</option>
                          <option value="Full Time">FULL TIME JOBS</option>
                          <option value="Contract">CONTRACT JOBS</option>
                          </select>
                         
                        </div>
                        </li>
                        <li class="active">
                          <div class="form-group">
                          <label class="filter-label">LOCATION:</label>
                          <input class="form-control" id="searchloc" name="searchloc" placeholder="e.g. kenya" type="text">
                        </div>
                        </li>
                        <li class="active">
                        <div class="form-group search">
                         <button class="btn btn-success btn-reset" id="resetsearch" name="resetsearch" type="submit"><i class="fa fa-search"></i>  SEARCH JOB</button>
                        </div>
                        </li>
                        <li class="active">
                        
                          <div class="form-group">
                          
                          <button class="btn btn-danger  btn-reset" id="resetsearch" name="resetsearch" type="reset"><i class="fa fa-cut"></i>RESET FILTER</button>
                        </div>
                        </li>
                      </ul>
                      </form>
                    </div>
                  </div>
                  <!--end of collapse box-->
                <!--collapse box-->
                <div class="collapse-box">
                    <h5 class="collapset-title no-border">DASHBOARD <a aria-expanded="true" class="pull-right" data-toggle="collapse" href="#myhome"><i class="fa fa-angle-down"></i></a></h5>
                    <div aria-expanded="true" id="myhome" class="panel-collapse collapse in">
                      <ul class="acc-list">
                        <li class="active">
                          <a href="index.php"><i class="fa fa-home"></i> Go to Dashboard</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <!--end of collapse box-->
                 
                </div>
           </div>
           </aside>
           </div>
            <!-- Product filter Start -->
          
          
          <!--start of col-->
          <div class="col-sm-9 page-content">
          <div id="loadingdiv"><center><div><img src="../pagination/ajax-loader.gif"/></div><div><p>Please Wait. Fetching Jobs..</p></div></center></div>
          <!--copy this-->
          <div id="resultdiv"></div>  
          <div class="adds-wrapper">

            </div>
          </div>
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
