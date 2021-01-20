<?php
//error_reporting(0);
session_start();
require_once ('class.user.php');//require "configure.php";
$fjob=new USER();
$sql="SELECT DISTINCT `advert`.`jlocation` FROM advert";
$stmt=$fjob->runQuery($sql);
$stmt->execute();
$row = $stmt->fetchAll(PDO::FETCH_ASSOC);
$msg="";

function make_thumb($src,$dest,$desired_width){
$source_image=imagecreatefromjpeg($src);
$width=imagesx($source_image);
$height=imagesy($source_image);
$desired_height=floor($height*($desired_width/$width));
$virtual_image=imagecreatetruecolor($desired_width,$desired_height);
imagecopyresampled($virtual_image,$source_image,0,0,0,0,$desired_width,$desired_height,$width,$height);
imagejpeg($virtual_image,$dest);
}
//$src="blogimages/blogimg_3517617280_.jpg";
//$dest="blogimages/newimg2.png";
//$desired_width="40";
//make_thumb($src,$dest,$desired_width);
?>
<!DOCTYPE html>
<html amp lang="en">
  <head>
    <meta charset="UTF-8">
    <link rel="canonical" hef="/jobs-board-kenya.php">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,minimum-scale=1, initial-scale=1">    
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="keywords" content="idawn,recent jobs in nakuru <?php echo date('Y');?>,recent jobs in nairobi <?php echo date('Y');?>,recent jobs in kenya <?php echo date('Y');?>,free job ads in kenya,tour driver jobs in kenya <?php echo date('Y');?>,executive jobs in kenya,agribusiness job vacancies in kenya,current county government jobs,part time jobs in kenya for students,internship opportunities in nairobi kenya <?php echo date('Y');?>,part time jobs kenya,agribusiness jobs in kenya <?php echo date('Y');?>,IT and Computer Science jobs in Kenya,sales and marketing jobs in kenya,ngo jobs in kenya,security jobs in kenya">
    <meta name="description" content="Jobs Board Kenya - Jobs Advertisement Website - Advertise Jobs Vacancy - Find the Right Candidates for the Job. Find legitimate jobs in kenya. No scam. Find the Latest Jobs in Kenya <?php echo date('Y');?>. Find all jobs in counties within Kenyan Boundaries. Latest Jobs, Internships and Volunteer Programs in Nairobi, Nakuru, Mombasa and Kenya in General. Get exclusive access to the latest jobs in Kenya in your email by subscribing to our newsletter">
    
    
        <meta prefix="og: http://ogp.me/ns#" property="og:title" content="Jobs Board Kenya - Jobs Advertisement Website - Advertise Jobs Vacancy - Find the Right Candidates for the Job in Kenya - #1 jobs site in kenya">
    <meta prefix="og: http://ogp.me/ns#" property="og:description" content="Jobs Board Kenya - Jobs Advertisement Website - Advertise Jobs Vacancy - Find the Right Candidates for the Job. Find legitimate jobs in kenya. No scam. Find the Latest Jobs in Kenya <?php echo date('Y');?>. Find all jobs in counties within Kenyan Boundaries. Latest Jobs, Internships and Volunteer Programs in Nairobi, Nakuru, Mombasa and Kenya in General. Get exclusive access to the latest jobs in Kenya in your email by subscribing to our newsletter">
    <meta prefix="og: http://ogp.me/ns#" property="og:image" content="http://www.idawn.co.ke/blogimages/intro.jpg">
    <meta prefix="og: http://ogp.me/ns#" property="og:url" content="http://www.idawn.co.ke/jobs-board-kenya">
    <!--open data graphs-->
    <meta property="og:locale" content="en_US" />
<meta property="og:type" content="article" />
<meta property="og:title" content="Jobs Board Kenya - Jobs Advertisement Website - Advertise Jobs Vacancy - Find the Right Candidates for the Job in Kenya - #1 jobs site in kenya">
    <meta property="og:description" content="Jobs Board Kenya - Jobs Advertisement Website - Advertise Jobs Vacancy - Find the Right Candidates for the Job. Find legitimate jobs in kenya. No scam. Find the Latest Jobs in Kenya <?php echo date('Y');?>. Find all jobs in counties within Kenyan Boundaries. Latest Jobs, Internships and Volunteer Programs in Nairobi, Nakuru, Mombasa and Kenya in General. Get exclusive access to the latest jobs in Kenya in your email by subscribing to our newsletter">
    <meta property="og:image" content="http://www.idawn.co.ke/blogimages/intro.jpg">
    <meta property="og:image:alt" content="Jobs Board Kenya" />
    <meta property="og:url" content="http://www.idawn.co.ke/our-blog/How-to-choose-the-best-applicant-tracking-systems">
    <meta property="og:site_name" content="Jobs Board Kenya - Jobs Advertisement Website - Advertise Jobs Vacancy - Find the Right Candidates for the Job. Find legitimate jobs in kenya. No scam. Find the Latest Jobs in Kenya <?php echo date('Y');?>. Find all jobs in counties within Kenyan Boundaries. Latest Jobs, Internships and Volunteer Programs in Nairobi, Nakuru, Mombasa and Kenya in General" />
    <meta property="article:tag" content="recent jobs in nakuru <?php echo date('Y');?>" />
    <meta property="article:tag" content="IT and Computer Science jobs in Kenya" />
    <meta property="article:tag" content="sales and marketing jobs in kenya" />
    <meta property="article:tag" content="ngo jobs in kenya" />
     <meta property="article:tag" content="security jobs in kenya" />
<meta property="article:tag" content="recent jobs in nairobi <?php echo date('Y');?>" />
<meta property="article:tag" content="recent jobs in kenya <?php echo date('Y');?>" />
<meta property="article:tag" content="free job ads in kenya" />
<meta property="article:tag" content="tour driver jobs in kenya <?php echo date('Y');?>" />
<meta property="article:tag" content="executive jobs in kenya" />
<meta property="article:tag" content="agribusiness job vacancies in kenya" />
<meta property="article:tag" content="current county government jobs" />
<meta property="article:tag" content="part time jobs in kenya for students" />
<meta property="article:tag" content="internship opportunities in nairobi kenya <?php echo date('Y');?>" />
<meta property="article:tag" content=" part time jobs kenya" />
<meta property="article:tag" content=" idawn kenya" />
<meta property="article:tag" content="agribusiness jobs in kenya <?php echo date('Y');?>" />
<meta property="article:section" content="Idawn is the #1 jobs board in kenya for all recent job listings. WEmployers can post a job for free throuh our portal and hire candidates. There are 10000+ jobs for all professionals. Also read throuh our articles and learn, get entertained and stay happy!! Best regards in your job search from iDawn Team!" />
<meta property="article:published_time" content="2018-05-29T15:12:23+03:00" />
<meta property="article:modified_time" content="2018-06-15T12:26:35+03:00" />
<meta property="og:updated_time" content="2018-07-15T12:26:35+03:00" />
    <!--end open graphs-->
     <!--open data graphs-->
     <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@idawnke">
    <meta name="twitter:title" content="Jobs Board Kenya - Jobs Advertisement Website - Advertise Jobs Vacancy - Find the Right Candidates for the Job in Kenya - #1 jobs site in kenya">
    <meta name="twitter:description" content="Jobs Board Kenya - Jobs Advertisement Website - Advertise Jobs Vacancy - Find the Right Candidates for the Job. Find legitimate jobs in kenya. No scam. Find the Latest Jobs in Kenya <?php echo date('Y');?>. Find all jobs in counties within Kenyan Boundaries. Latest Jobs, Internships and Volunteer Programs in Nairobi, Nakuru, Mombasa and Kenya in General. Get exclusive access to the latest jobs in Kenya in your email by subscribing to our newsletter">
    <meta name="twitter:image" content="http://www.idawn.co.ke/blogimages/intro.jpg">
    <meta name="twitter:creator" content="@anthonyndm">
    <!--end open graphs-->
    
    
    
    
   <title>Jobs Board Kenya - Jobs Advertisement Website - Advertise Jobs Vacancy - Find the Right Candidates for the Job in Kenya</title>

    <!-- Bootstrap CSS -->
      <!-- Favicon -->
     <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
     <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
     <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
     <link rel="manifest" href="site.webmanifest">
     <link rel="mask-icon" href="safari-pinned-tab.svg" color="#ff99f6">
     <meta name="msapplication-TileColor" content="#ff99f6">
     <meta name="theme-color" content="#ff99f6">
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
    <script type="text/javascript" src="pagination/js/jquery-1.11.2.min.js"></script>
    <script  type='text/javascript' src='//platform-api.sharethis.com/js/sharethis.js#property=5bbef82cabccec00115cc023&product=inline-share-buttons' async='async'></script>
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-9085745333411810",
    enable_page_level_ads: true
  });
</script>
<script type="text/javascript"> 
$(document).ready(function() {
$('#searchJobs2').click(function(){
 var show=$("#showResults");
 $('html,body').animate({scrollTop:$('#focusme').offset().top},'slow');
 show.html("<span style='text-align:center;color:green;padding:10% 10% 10% 10%;'>Loading Job Results</span>");
 var key=$('#keyword').val();
 var loc=$('#town_pcode').val();
 $.ajax({
 type: "GET",
 url: "fetchJobs?key="+key+"&loc="+loc,
 data:{key:key,
 loc:loc
 },
 success: function(results2)
 {
 var results=JSON.parse(results2);
 var no_=results.length;
 var output="<div><h2 style='color:#e21ee9;text-decoration:none;'><center>"+no_+" JOB AD(s) RESULTS FOUND</center></h2></div>";
 for(var i=0;i<no_;i++){
 var link="jobs/"+results[i]["adcategory"]+"/"+results[i]["adid"]+"/"+results[i]["adname"]+"/0";
 link=link.replace(" ","-");
 output+="<div class='item-list'><div class='col-sm-9 add-desc-box'><div class='add-details'><h5><a href='"+link+"'>"+results[i]['adname']+"</a></h5><div class='info'><div class='col-sm-4'><span class='date'><strong>Hiring Organization: </strong><span>"+results[i]['company']+"</span><br/><strong>Job Posted On: </strong><span>"+results[i]['dtpostd']+"</span><br/><strong>Job Advert Valid Until: </strong><span>"+results[i]['duedate']+"</span><br/></span></div><div class='col-sm-5'><span class='date'><strong>Job Category: </strong><span>"+results[i]['adcategory']+"</span><br/><strong>Job Posted From: </strong><span>"+results[i]['jlocation']+"</span><br/></span></div></div></div></div><div class='col-sm-9'><div class='item-desc'><a href='"+link+"'><span>"+atob(results[i]['addesc']).slice(0,400)+"...More Details</span></a></div></div></div></div></div></div>";
 }

 show.html(output);
 }
 });
 });
$('#subscribe-button').click(function(){
var displayResources = $('#display-resources');
var email=$("#subscribe-email").val();

displayResources.html('<p style="color:green;text-align:center;">We are storing you email into our database.....</p>');

$.ajax({
 type: "POST",
 url: "subscribe?email="+email,
 data:{email:email
 },
 success: function(result2)
 {
 
  displayResources.html(result2);
$("#subscribe-email").val("");
 }

 });//ajax

 });//click
       
});//function
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
            <a class="navbar-brand logo" href="#"><img src="assets/img/logo.png" alt="" width=1000px /></a>
          </div>
          <!-- brand and toggle menu for mobile End -->

          <!-- Navbar Start -->
          <div class="collapse navbar-collapse" id="navbar">
            <ul class="nav navbar-nav navbar-right">
               
                <li><a class="btn btn-menu btn-post" href="post-advert.php"><u>ADVERTISE JOB OPENING </u></a></li>
                <li><a href="job-listings.php"><i class="fa fa-search"></i>BROWSE JOBS</a></li>
                <li><a href="login.php"><i class="fa fa-sign-in"></i>MY ACCOUNT</a></li>
            </ul>
          </div>
          <!-- Navbar End -->
        </div>
      </nav>

    </div>
    <!-- Header Section End -->
    <div class="row intro-emp" id="disp3">
    <div><h3>Are you an employer? <a href="post-advert.php"> <u>advertise job openings for <strong>free</strong> in Kenya <?php echo date("Y");?> </u></a></h3></div>
    </div>
    <section class="row begin-search">
    <div><h1>Begin Your Search for Amazing Opportunities Today</h1>
       <h3>Browse and apply jobs from the best employers in Kenya. We link job seekers to the best opportunities in both growing and reputable organizations countrywide.</h3>
       <p><a href="jobs/0" class="btn btn-common2"><i class="fa fa-search"></i>Browse Latest Free Jobs Ads in Kenya <?php echo date("Y"); ?></a></p></div>
    </section>
    <div class="row intro-form">
    <div class="search-in-bar">
    <div class="row">
              <div class="advanced-search col-md-12">
                <div class="col-md-2 col-sm-6 search-col ht">
                     <p>Looking For</p>
                    </div>
                    <div class="col-md-3 col-sm-6 search-col ht">
                     <input class="form-control" id="keyword" name="town_pcode" value="" placeholder="job keyword" type="text">
                    </div>  
                  <div class="col-md-1 col-sm-6 search-col ht">
                     <p>In</p>
                    </div>
                  <div class="col-md-3 col-sm-6 search-col ht">
                     <input class="form-control" id="town_pcode" name='town_pcode' value="" placeholder="town or country" type="text">
                       
                  </div>
                  
                 <div class="col-md-3 col-sm-6 search-col ht">
                    <a class="submit btn btn-success" id="searchJobs2">search jobs</a>
                    
                       
                  </div>
                 
                  </div>
                  </div>
    </div>
    </div>
    <div class="class='col-sm-9 page-content" id='focusme'>
    <div class="adds-wrapper">
    <div id="showResults"></div>
    </div>
    </div>
<!--<section class="disp3" id="intro"><div><h3>Are you an employer? <a href="post-advert.php"> <u>advertise job openings for <strong>free</strong> in Kenya <?php echo date("Y");?> </u></a></h3></div></section>-->
    <!-- Main Slider Section -->
    <!--<section>
      <div class="tp-banner-container">
        <div class="tp-banner-head">
       <img src="assets/img/slider/start-banner.jpg" id="bgimg"/>
       <div class="tp-banner-head-form">
        Start Search box 
       
            <div class="row search-bar">
              <div class="advanced-search">
                <form class="search-form" id="src_form" name="src_form">
                <div class="col-md-2 col-sm-3 search-col ht">
                     <p>I am searching for</p>
                  </div>
                    <div class="col-md-3 col-sm-5 search-col ht">
                     <input class="form-control" id="keyword" name="town_pcode" value="" placeholder="job keyword" type="text">
                      
                  </div>
                    <div class="col-md-2 col-sm-2 search-col ht3">
                     <p>job in </p>
                  </div>
                  <div class="col-md-3 col-sm-6 search-col ht">
                     <input class="form-control" id="town_pcode" name='town_pcode' value="" placeholder="town or country" type="text">
                       <i class="fa fa-map-marker"></i>
                  </div>
                  <div class="col-md-2 col-sm-3 search-col ht2">
                     <a href="#" class="btn-head btn-success">display jobs</a>
                       
                  </div>
                 
                  </form>
                  </div>
                  </div>
                 
       </div>
        
       <div  class="tp-banner">
       <div class="head-ttl"><h1>Begin Your Search for Amazing Opportunities Today</h1>
       <h3>Browse and apply jobs from the best employers in Kenya. We link job seekers to the best opportunities in both growing and reputable organizations countrywide.</h3>
       <p><a href="jobs/0" class="btn btn-common2"><i class="fa fa-search"></i>Browse Jobs in Kenya <?php echo date("Y"); ?></a></p></div>
       <div class="head-subttl"></div>
       <div class="browsebtn"></div>
       </div>
        </div>
      </div>
    </section>-->
    <!-- Main Slider Section End-->  

    <div class="wrapper">      
      <section class="grid-category">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="box-title no-border">
                <div class="inner">
                    <h3 class="section-title"><span><strong>Browse Jobs</strong> by</span> Category</h3>   
                  <a href="jobs.php" class="sell-your-item"><i class="fa fa-th-large"></i> View all jobs 
                  </a>
                </div>
              </div>
            </div>
            <div class="col-md-12">              
              <div class="col-md-2 col-sm-3 col-xs-6 f-category wow fadeIn" data-wow-delay="0s">
                <a href="jobs/Accounting/0">
                  <div class="icon-img">
                    <img src="assets/img/category/cat1.png" class="img-responsive" alt="Accounting Jobs">
                  </div>
                  <h6>Accounting Jobs</h6> 
                </a>
              </div>
              <div class="col-md-2 col-sm-3 col-xs-6 f-category wow fadeIn" data-wow-delay="0.2s">
                <a href="jobs/Construction/0">
                  <div class="icon-img">
                      <img src="assets/img/category/cat2.png" class="img-responsive" alt="Construction Jobs">
                  </div>
                  <h6>Construction Jobs</h6> 
                </a>
              </div>
              <div class="col-md-2 col-sm-3 col-xs-6 f-category wow fadeIn" data-wow-delay="0.4s">
                <a href="jobs/Health-Care/0">
                  <div class="icon-img">
                    <img src="assets/img/category/cat3.png" class="img-responsive" alt="Health Care Jobs">
                  </div>
                  <h6>Health Care Jobs</h6> 
                </a>
              </div>
              <div class="col-md-2 col-sm-3 col-xs-6 f-category wow fadeIn" data-wow-delay="0.6s">
                <a href="jobs/Engineering/0">
                  <div class="icon-img">
                    <img src="assets/img/category/cat4.png" class="img-responsive" alt="Engineering Jobs">
                  </div>
                  <h6>Engineering Jobs</h6> 
                </a>
              </div>
              <div class="col-md-2 col-sm-3 col-xs-6 f-category wow fadeIn" data-wow-delay="0.8s">
                <a href="jobs/Hospitality/0">
                  <div class="icon-img">
                    <img src="assets/img/category/cat5.png" class="img-responsive" alt="Hospitality Jobs">
                  </div>
                  <h6>Hospitality Jobs</h6> 
                </a>
              </div>
              <div class="col-md-2 col-sm-3 col-xs-6 f-category wow fadeIn" data-wow-delay="1s">
                <a href="jobs/Science-and-Biotechnology/0">
                  <div class="icon-img">
                    <img src="assets/img/category/cat6.png" class="img-responsive" alt="Science and Bio-Technology Jobs">
                  </div> 
                  <h6>Science and Bio-Technology Jobs</h6> 
                </a>
              </div>
              <div class="col-md-2 col-sm-3 col-xs-6 f-category wow fadeIn" data-wow-delay="1.2s">
                <a href="jobs/Broadcasting-Journalism/0">
                  <div class="icon-img">
                    <img src="assets/img/category/cat7.png" class="img-responsive" alt="Journalism Jobs">
                  </div>
                  <h6>Journalism Jobs</h6> 
                </a>
              </div>
              <div class="col-md-2 col-sm-3 col-xs-6 f-category wow fadeIn" data-wow-delay="1.4s">
                <a href="jobs/Government/0">
                  <div class="icon-img">
                    <img src="assets/img/category/cat8.png" class="img-responsive" alt="Government Jobs">
                  </div>
                  <h6>County Government Jobs</h6>
                </a>
              </div>
              <div class="col-md-2 col-sm-3 col-xs-6 f-category  wow fadeIn" data-wow-delay="1.6s">
                <a href="jobs/IT-and-Telecommunication/0">
                  <div class="icon-img">
                    <img src="assets/img/category/cat9.png" class="img-responsive" alt="IT & Telecommunications Jobs">
                  </div>
                  <h6>IT And Telecommunications Jobs</h6> 
                </a>
              </div>
              <div class="col-md-2 col-sm-3 col-xs-6 f-category wow fadeIn" data-wow-delay="1.8s">
                <a href="jobs/Retails,-Sales-and-Marketing/0">
                  <div class="icon-img">
                    <img src="assets/img/category/cat10.png" class="img-responsive" alt="Retails, Sales & Marketing Jobs">
                  </div>
                  <h6>Retails, Sales & Marketing Jobs</h6> 
                </a>
              </div>
              <div class="col-md-2 col-sm-3 col-xs-6 f-category wow fadeIn" data-wow-delay="2s">
                <a href="jobs/Transportation/0">
                  <div class="icon-img">
                    <img src="assets/img/category/cat11.png" class="img-responsive" alt="Transportation Jobs">
                  </div>
                  <h6>Transportation & Tour Driver Jobs</h6> 
                </a>
              </div>
              <div class="col-md-2 col-sm-3 col-xs-6 f-category wow fadeIn" data-wow-delay="2.2s">
                <a href="jobs/Training/0">
                  <div class="icon-img">
                    <img src="assets/img/category/cat12.png" class="img-responsive" alt="Training Jobs">
                  </div>
                  <h6>Agribusiness and Agriculture Jobs</h6> 
                </a>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
   

    <!-- Counter Section Start -->
    <section id="counter">
      <div class="container">
        <div class="row">
            <center>
          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="counting wow fadeInDownQuick" data-wow-delay=".5s">
              <div class="icon">
                <span>
                  <i class="lnr lnr-briefcase"></i>
                </span>
              </div>
              <div class="desc">
                <h3 class="counter">9453</h3>
                <p>Daily Jobs</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="counting wow fadeInDownQuick" data-wow-delay="1s">
              <div class="icon">
                <span>
                  <i class="lnr lnr-location"></i>
                </span>
              </div>
              <div class="desc">
                <h3 class="counter">1250</h3>
                <p>Locations</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="counting wow fadeInDownQuick" data-wow-delay="1.5s">
              <div class="icon">
                <span>
                  <i class="fa fa-users"></i>
                </span>
              </div>
              <div class="desc">
                <h3 class="counter">33453</h3>
                <p>Regular Visitors</p>
              </div>
            </div>
          </div>
        </center>
        </div>
      </div>
    </section>
    
    
    <!-- Location Section Start -->
      <section class="location">
        <div class="container">
          <div class="row localtion-list">
            <div class="col-md-6 col-sm-6 col-xs-12 wow fadeInLeft" data-wow-delay="0.5s">
              <h3 class="title-2"><i class="fa fa-envelope"></i> Receive the Latest Job Updates</h3>
            
              <p>Subscribe to our 10,000+ channel list to receive the latest job updates, articles and more</p>
              <div class="subscribe">
                  <p id="display-resources"> <?php echo $msg; ?></p>
                  <form method="post" name="subscribe-form">
                <input class="form-control" id="subscribe-email" placeholder="Email Address"/>
                <a id="subscribe-button" class="btn btn-common">Subscribe</a>
                  </form>
              </div>
            
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 wow fadeInRight" data-wow-delay="1s">
              <h3 class="title-2"><i class="fa fa-search"></i> QUICK JOB SEARCH</h3>
              <ul class="cat-list col-sm-4">
                <li> <a href="jobs/0">Recent Jobs in Nairobi, Kenya <?php echo date("Y");?></a></li>
                <li> <a href="jobs/0">Recent Graduate Jobs in Kenya <?php echo date("Y");?></a></li>
                <li> <a href="jobs/0">Government Jobs <?php echo date("Y");?></a></li>
                <li> <a href="jobs/type/Internship/0">Internship Opportunities in Nairobi Kenya</a></li>
                <li> <a href="jobs/0">NGO Jobs in kenya</a></li>
                <li> <a href="jobs/0">Security Jobs in Kenya</a></li>
              </ul>
              <ul class="cat-list col-sm-4">
                <li> <a href="jobs/Accounting/0">Accounting Jobs in Kenya</a></li>
                <li> <a href="jobs/Human-Resource/0">Human Resource Jobs in Kenya</a></li>
                <li> <a href="jobs/permit/Part-Time/0">Part Time Jobs in Kenya</a></li>
                <li> <a href="jobs/0">Research Writing Jobs in Kenya</a></li>
                <li><a href="jobs/all/job/in/nakuru/0">recent jobs in nakuru <?php echo date('Y');?></a></li>
                <li> <a href="jobs/IT-and-Telecommunication/0">ICT and Computer Science Jobs in Kenya</a></li>
                <li> <a href="jobs/sales-and-marketing/0">Sales and Marketing Jobs in Kenya</a></li>

              </ul>
              <ul class="cat-list col-sm-4">
                <li> <a href="jobs/permit/Part-Time/0">Part Time Jobs For Students in Kenya</a></li>
                <li> <a href="jobs/0">Executive Jobs in Kenya <?php echo date('Y');?></a></li>
                <li> <a href="jobs/0">Banking, Finance and Accounting Jobs</a></li>
                <li> <a href="jobs/0">Nursing and Clinical Medicine Jobs</a></li>
                <li> <a href="jobs/0">Part Time Jobs in Eldoret <?php echo date("Y");?></a></li>
                <li> <a href="jobs/0">Teaching Jobs in Eldoret <?php echo date("Y");?> </a></li>
              </ul>
            </div>
          </div>
        </div>
      </section>
      <!-- Location Section End -->
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

    <!-- Start Loader -->
   <!-- <div id="loader">
      <div class="sk-folding-cube">
        <div class="sk-cube1 sk-cube"></div>
        <div class="sk-cube2 sk-cube"></div>
        <div class="sk-cube4 sk-cube"></div>
        <div class="sk-cube3 sk-cube"></div>
      </div>
    </div>   --> 
      
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
