<?php
//error_reporting(0);
session_start();
require_once '../class.user.php';
$user = new USER();
if($user->is_logged_in()=="")
{
	$user->redirect('../login?download');
}
$person=$_SESSION['userSession'];
$stmt = $user->runQuery("select * from users where email=:person");
$stmt8=$user->runquery("SELECT * from users left outer join award on users.email=award.usremail where email=:person");
$stmt8->execute(array(":person"=>$person));
$row8=$stmt8->fetchAll(PDO::FETCH_ASSOC);

$stmt7=$user->runquery("SELECT * from users left outer join workshoptbl on users.email=workshoptbl.usremail where email=:person");
$stmt7->execute(array(":person"=>$person));
$row7=$stmt7->fetchAll(PDO::FETCH_ASSOC);
$stmt6=$user->runquery("SELECT * from users left outer join hobbies on users.email=hobbies.usremail where email=:person");
$stmt6->execute(array(":person"=>$person));
$row6=$stmt6->fetchAll(PDO::FETCH_ASSOC);
$stmt1=$user->runquery("SELECT * from users left join academicqual on users.email=academicqual.useremail where email=:person");
$stmt2=$user->runquery("SELECT * from users left join workdetails  on users.email=workdetails.useremail  where email=:person");
$stmt5=$user->runquery("SELECT * from users left outer join referees on users.email=referees.useremail where email=:person");
$stmt5->execute(array(":person"=>$person));
$row5=$stmt5->fetchAll(PDO::FETCH_ASSOC);
$stmt2->execute(array(":person"=>$person));
$row4=$stmt2->fetchAll(PDO::FETCH_ASSOC);
$stmt1->execute(array(":person"=>$person));
$row1=$stmt1->fetchAll(PDO::FETCH_ASSOC);
$stmt->execute(array(":person"=>$person));
$row=$stmt->fetchAll(PDO::FETCH_ASSOC);


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
   <title>Download CV</title>

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
<script type="text/javascript" src="../js/xepOnline.jqPlugin.js"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-33686729-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-33686729-1');
</script>
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
              <li><a href="#"  class="active">DASHBOARD</a></li>
              <li><a href="edit-curriculum-vitae.php">EDIT CURRICULUM VITAE</a></li>
                <li><a href="job-applications.php">JOB APPLICATIONS</a></li>
                <li><a href="browse-jobs.php">BROWSE JOBS</a></li>
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
            <div id="cvpg">
            <div class="inner-box">
              <h3 class="title-2">curriculum vitae</h3>
              
               <h3 class="title-2">personal details</h3>
               <?php
              foreach($row as $row){
              echo '<p><b>NAME: </b>'.$row['fname'].' '.$row['lname'].' '.$row['sname'].'</p>';
              echo '<p><b>ADDRESS: </b>P.O. BOX '.$row['address'].' - '.$row['postalcode'].' '.$row['town'].'</p>';
              echo '<p><b>EMAIL: </b>'.$row['email'].'</p>';
              echo '<p><b>TEL: </b>'.$row['telephone'].'</p>';
              echo '<p><b>DATE OF BIRTH: </b>'.$row['dob'].'</p>';
              echo '<p><b>MARITAL STATUS: </b>'.$row['civicstat'].'</p>';
              echo '<p><b>NATIONALITY: </b>'.$row['nationality'].'</p>';
              echo '<p><b>LANGUAGE: </b>'.$row['languages'].'</p>';
              break;
              }
               ?>
              <h3 class="title-2">background information</h3>
              <?php
              foreach($row as $row2){
              echo '<p>'.$row['about'].'</p>';
             break;
              }
               ?>
                <h3 class="title-2">academic qualification</h3>
              <?php
              foreach($row1 as $row3):
              echo '<p><b>Institution: </b>'.$row3['institution'].' , '.$row3['start_date'].' to '.$row3['end_date'].'</p>';
             echo '<p><b>Qualification: </b>'.$row3['courseinfo'].'('.$row3['qualification'].')</p>';
             
              endforeach;
              if($stmt2->rowCount() < 0){
               ?>
                <h3 class="title-2">work experience</h3>
              <?php
              foreach($row4 as $row4){
              echo '<p><b>'.$row4['roleplayed'].' - '.$row4['organization'].'('.$row4['start_date'].' to '.$row4['end_date'].')</b></p>';
             echo '<p>'.$row4['responsibilities'].'</p>';
             
              }
              }
              
              if($stmt8->rowCount()<0){
               ?>
               <h3 class="title-2">awards & achievements</h3>
              <?php
              foreach($row8 as $row8){
              echo '<p>'.$row8['award'].'('.$row8['date'].')</p>';
             
              }
              }
              if($stmt7->rowCount()<0){
               ?>
               <h3 class="title-2">workshops/seminars attended</h3>
              <?php
              foreach($row7 as $row7){
              echo '<p><b>'.$row7['theme'].'('.$row7['datestart'].'-'.$row7['dateend'].')</b></p><p><b>Skills:</b>'.$row7['skills'].'</p>';
             
              }
              }
              if($stmt6->rowCount()>0){
               ?>
               <h3 class="title-2">hobbies</h3>
              <?php
              foreach($row6 as $row6){
              echo '<p>'.$row6['hobby'].'</p>';
             }
              }
               ?>
               <h3 class="title-2">referees</h3>
              <?php
              foreach($row5 as $row5){
              echo '<div class='."col-sm-4".'><p><b>NAME: </b>'.$row5['refereenm'].'</p><p><b>ROLE: </b>'.$row5['workr'].' - '.$row5['organization'].'</p><p><b>TEL: </b>'.$row5['contpno'].'</p><p><b>EMAIL:</b> '.$row5['emailaddr'].'</p><p><b>ADDRESS: </b>'.$row5['contaddr'].'</p></div>';
             
             
              }
               ?>
             
            
              </div>
            </div>  
          
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
    <div class="download-cv">
      <a class="btn btn-success" href="#" onclick="return xepOnline.Formatter.Format('cvpg', {render:'download',filename:'cv',pageWidth:'216mm',pageHeight:'279mm',namespaces:['xmlns:ng=&quot;http://www.idawn.co.ke&quot;'],cssStyle:[{fontSize:'12px'},{color:'#000000'}]});"><i class="fa fa-download"></i>PDF</a>
      
      
    </div>
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
