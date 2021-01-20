<?php
//error_reporting(0);
session_start();
require_once 'class.user.php';
$user_postad = new USER();

if(isset($_POST['btn-postad']))
{//totals
$adcat=trim($_POST['adcategory']);
$howto=trim($_POST['howtoapply']);
$how_to_submit_email="";$ademail="";
$how_to_submit_upload="";
$how_to_submit_call="";$adtel="";
$how_to_submit_link="";$adurl="";
$how_to_submit_hardcopy="";

if($howto=="upload"){
$how_to_submit_upload=$_POST["how_to_submit_upload"];
}
elseif($howto=="email"){
$how_to_submit_email=$_POST["how_to_submit_email"];$ademail=$_POST["ademail"];
}
elseif($howto=="telephone"){
$how_to_submit_call=$_POST["how_to_submit_call"];$adtel=$_POST["adtel"];
}
elseif($howto=="url"){
$how_to_submit_link=$_POST["how_to_submit_link"];$adurl=$_POST["adurl"];
}
elseif($howto=="letter"){
$how_to_submit_hardcopy=$_POST["how_to_submit_hardcopy"];
}
else{
echo "cannot be empty";
}

$adtitle=trim($_POST['adtitle']);
$addescr= base64_encode(trim($_POST['addescr']));
$jobtype=trim($_POST['jobtype']);
$jobpermit=trim($_POST['jobpermit']);
$stats='Y';
$skill=$_POST["skill"];
$postedon=date("Y-m-d H:i:sa");
$duedate=trim($_POST['duedate']);
$fname=trim($_POST['fname']);
$lname=trim($_POST['lname']);
$email=trim($_POST['email']);
$company=trim($_POST['compname']);
$pno=trim($_POST['phoneno']);
$location=trim($_POST['location']);
$upass=trim($_POST['pwordadv']);
$code = md5(uniqid(rand()));
$usrtype=trim("Employer");
$stmt = $user_postad->runQuery("SELECT * FROM users WHERE email=:email_id");
	$stmt->execute(array(":email_id"=>$email));
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	
	if($stmt->rowCount() > 0)
	{
		//email already exists----only post advert
          if($user_postad->post_advert_new($email,$adcat,$adtitle,$addescr,$skill,$adurl,$ademail,$jobtype,$jobpermit,$duedate,$postedon,$location,$howto,$how_to_submit_email,$how_to_submit_upload,$how_to_submit_link,$how_to_submit_call,$how_to_submit_hardcopy,$adtel,$company)){
              			$id = $user_postad->lasdID();		
$user_postad->redirect("under-review.php?advertid=".$id."&usreml=".$email);
          }
	else
		{
            $msg = "
		      <div class='alert alert-danger'>
				<button class='close' data-dismiss='alert'>&times;</button>
					<strong>Sorry !</strong> Unfortunate error has occured. Please Retry...email already exists----only post advert
			  </div>
			  ";
			//echo "Sorry , Unfortunate error has occured. Please Retry...email already exists----only post advert";
		}	
	}
	else
	{
		//email does not exist----post adverts and register
            if($user_postad->registerusr2($company,$usrtype,$fname,$lname,$pno,$email,$upass,$code,$stats))
		{			
			if($user_postad->post_advert_new($email,$adcat,$adtitle,$addescr,$skill,$adurl,$ademail,$jobtype,$jobpermit,$duedate,$postedon,$location,$howto,$how_to_submit_email,$how_to_submit_upload,$how_to_submit_link,$how_to_submit_call,$how_to_submit_hardcopy,$adtel,$company)){
                            			$id = $user_postad->lasdID();		
$user_postad->redirect("under-review.php?advertid=".$id."&usreml=".$email);
                        }
                        else
		{
                             $msg = "
		      <div class='alert alert-danger'>
				<button class='close' data-dismiss='alert'>&times;</button>
					<strong>Sorry !</strong> Unfortunate error has occured. Please Retry...email does not exist----post adverts and register
			  </div>
			  ";
			
		}
		}
		else
		{
			echo "Sorry , Unfortunate error has occured. Please Retry...";
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
    <meta name="keywords" content="idawn,idawn.co.ke,advertise,job,post,free,kenya,advertising sites,jobs listing">
    <meta name="description" content="Post a job for free in Kenya - Advertise job vacancy">
   <title>Post a job for free in Kenya - Advertise job vacancy</title>

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
<link href="plugin/jquerysctipttop.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="plugin/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
<link href="plugin/jquery.flexdatalist.css" rel="stylesheet" type="text/css">
<script src="plugin/jquery-1.12.1.min.js"></script>
<script src="plugin/jquery.flexdatalist.js"></script>
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
                <?php
                if($user_postad->is_logged_in()=="")
{
                    echo '<li><a href="index.php">HOME</a></li>
                <li><a href="job-listings.php">JOBS</a></li>
                <li><a href="post-advert.php" class="active">POST JOB</a></li>
                <li><a href="blog-topics.php">OUR BLOG</a></li>
                <li><a href="signup.php"><i class="fa fa-registered"></i>SIGN UP</a></li>
              <li><a href="login.php"><i class="fa fa-sign-in"></i> LOGIN</a></li>';
}
else{
    echo '<li><a href="manage-ads.php"><i class="fa fa-briefcase"></i> MANAGE</a></li>
                <li><a href="post-advert.php" class="active"><i class="lnr lnr-plus-circle"></i> POST JOB</a></li>
             <li><a href="profile.php"> <i class="fa fa-user"></i> PROFILE</a></li>
             <li><a href="blog-topics.php">OUR BLOG</a></li>
              <li><a href="logout.php"><i class="fa fa-sign-out"></i> SIGN OUT</a></li>';
}
                ?>
             
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
                POST A JOB FOR FREE - KENYA
              </h2>
                <div>
               <?php if(isset($msg)) echo $msg;  ?></div>
                <form class="form-ad" method="post">
                    <div class="form-group">
                        <label class="control-label">Category</label>
                        <select name="adcategory" id="category-group" class="form-control" required="required">
                            <option value="0" selected="selected" disabled="disabled"> Select a category... </option>
                    <option value="IT and Telecommunication" style="background-color:#E9E9E9;font-weight:bold;">IT and Telecommunication</option>
                     <option value="Banking" style="background-color:#E9E9E9;font-weight:bold;" >Banking</option>
                      <option value="Accounting" style="background-color:#E9E9E9;font-weight:bold;" >Accounting</option>
                       <option value="Finance" style="background-color:#E9E9E9;font-weight:bold;" >Finance</option>
                        <option value="Admin and Clerical" style="background-color:#E9E9E9;font-weight:bold;" >Admin And Clerical</option>
                         <option value="Health Care" style="background-color:#E9E9E9;font-weight:bold;" >Health Care</option>
                          <option value="Engineering" style="background-color:#E9E9E9;font-weight:bold;" >Engineering</option>
                          <option value="Construction" style="background-color:#E9E9E9;font-weight:bold;" >Construction</option>
                            <option value="Hospitality" style="background-color:#E9E9E9;font-weight:bold;" >Hospitality</option>
                             <option value="Transportation" style="background-color:#E9E9E9;font-weight:bold;" >Transportation</option>
                              <option value="Retails, Sales and Marketing" style="background-color:#E9E9E9;font-weight:bold;" >Retail, Sales and Marketing</option>
                               <option value="Human Resource" style="background-color:#E9E9E9;font-weight:bold;" >Human Resource</option>
                                <option value="Government" style="background-color:#E9E9E9;font-weight:bold;">Government</option>
                                 <option value="General Labor" style="background-color:#E9E9E9;font-weight:bold;">General Labor</option>
                                  <option value="Science and Biotechnology" style="background-color:#E9E9E9;font-weight:bold;">Science and Biotechnology</option>
                                   <option value="Executive" style="background-color:#E9E9E9;font-weight:bold;">Executive</option>
                                    <option value="Quality Assurance" style="background-color:#E9E9E9;font-weight:bold;">Quality Assurance</option>
                                     <option value="Supply Chain" style="background-color:#E9E9E9;font-weight:bold;">Supply Chain</option>
                                      <option value="Grocery and Farming" style="background-color:#E9E9E9;font-weight:bold;">Grocery and Farming</option>
                                       <option value="Inventory" style="background-color:#E9E9E9;font-weight:bold;">Inventory</option>
                                        <option value="Legal and Legal Admin" style="background-color:#E9E9E9;font-weight:bold;">Legal and Legal Admin</option>
                                         <option value="Broadcasting-Journalism" style="background-color:#E9E9E9;font-weight:bold;">Broadcasting-Journalism</option>
                                          <option value="Inventory" style="background-color:#E9E9E9;font-weight:bold;">Inventory</option>
                                           <option value="Installation, Maintenance and Repair" style="background-color:#E9E9E9;font-weight:bold;">Installation, Maintenance and Repair</option>
                                            <option value="Training" style="background-color:#E9E9E9;font-weight:bold;">Training</option>
                                             <option value="Other" style="background-color:#E9E9E9;font-weight:bold;">Other Category</option>
                  </select>
                    </div>
               <div class="form-group">
                  <label class="control-label">Job Type</label>
                  <select name="jobtype" id="type-group" class="form-control" required="required">
                      <option value="0" selected="selected" disabled="disabled"> Select Job Type... </option>
                    <option value="Volunteer" style="background-color:#E9E9E9;font-weight:bold;">Volunteer</option>
                    <option value="Job" style="background-color:#E9E9E9;font-weight:bold;">Job</option>
                    <option value="Internship" style="background-color:#E9E9E9;font-weight:bold;">Internship</option>
                  </select>
                </div>
                    <div class="form-group">
                  <label class="control-label">Job Permit</label>
                  <select name="jobpermit" id="type-group" class="form-control" required="required">
                      <option value="0" selected="selected" disabled="disabled"> Select Job Permit... </option>
                    <option value="Part Time" style="background-color:#E9E9E9;font-weight:bold;">Full Time</option>
                    <option value="Full Time" style="background-color:#E9E9E9;font-weight:bold;">Part Time</option>
                    <option value="Contract" style="background-color:#E9E9E9;font-weight:bold;">Contract</option>
                  </select>
                </div>
                <div class="form-group">
                  <label class="control-label">Job Title</label>
                  <input name="adtitle" placeholder="Ad title" class="form-control input-md" required="" type="text" required="required">
                  <span class="help-block">Provide the title of the job </span>
                </div>
                <div class="form-group">
                  <label class="control-label" for="textarea">Job Description</label>
                  <textarea class="form-control" rows="10" id="textarea" name="addescr" required="required"></textarea>
                </div>  
                  <div>
                  <label class='control-label' for='skills'>Skills Required for the Job:</label>
                  
                  <input type='text'
       placeholder='type skills and press enter'
       class='flexdatalist form-control input-md'
       data-min-length='1'
       data-searchContain='true'
       multiple='multiple'
       list='skills'
       name='skill'
required='required'>
       <datalist id="skills">
   
</datalist>


            </div>    
                <div class="form-group">
                  <label class="control-label" for="textarea">How to Apply</label>  
<select name="howtoapply" id="howtoapply" class="form-control" required="required">
                  <option value="0" selected="selected" disabled="disabled"> Select Application Method To Be Used by Job Seeker... </option>
                    <option value="upload" style="background-color:#E9E9E9;font-weight:bold;">Upload CV to IDawn Website</option>
                    <option value="email" style="background-color:#E9E9E9;font-weight:bold;">Send Email </option>
                    <option value="telephone" style="background-color:#E9E9E9;font-weight:bold;">Make Telephone Call</option>
                    <option value="url" style="background-color:#E9E9E9;font-weight:bold;">Redirect To External URL</option>
<option value="letter" style="background-color:#E9E9E9;font-weight:bold;">Submit Hard Copy Application Letter</option>
                  </select>          
                 <!--begin inline-->
                    <div class="form-group" id="upload_inline">                  
                      <div class="input-group">                        
                         <span class="input-group-addon">Optional Message:</span>
                         <textarea name="how_to_submit_upload" class="form-control" placeholder="Type Optional 'How To Apply' Message"></textarea>
                       
                      </div>
                    </div>
                   <!--end of inline-->
<div class="form-inline" id="email_inline"><!--begin inline-->
                    <div class="form-group">                  
                      <div class="input-group">                        
                         <span class="input-group-addon">Optional Message:</span>
                        <textarea name="how_to_submit_email" class="form-control" placeholder="Type Optional 'How To Send Email' Message"></textarea>
                       
                      </div>
                    </div>
                    <div class="form-group">
                      <p class="form-control-static" style="padding: 5px 10px;">or</p>
                    </div>
                    <div class="form-group">                  
                      <div class="input-group">                        
                         <span class="input-group-addon">Application Email:</span>
                         <input type="email" name="ademail" class="form-control" placeholder="andrew@gmail.com">
                       
                      </div>
                    </div>
                  </div><!--end of inline-->

<div class="form-inline" id="call_inline"><!--begin inline-->
                    <div class="form-group">                  
                      <div class="input-group">                        
                         <span class="input-group-addon">Optional Message:</span>
                         <textarea name="how_to_submit_call" class="form-control" placeholder="Type Optional 'How To Call' Message"></textarea>
                       
                      </div>
                    </div>
                    <div class="form-group">
                      <p class="form-control-static" style="padding: 5px 10px;">or</p>
                    </div>
                    <div class="form-group">                  
                      <div class="input-group">                        
                         <span class="input-group-addon">Official Tel Number:</span>
                         <input type="tel" name="adtel" class="form-control" placeholder="+2547XXXXXXXX">
                       
                      </div>
                    </div>
                  </div><!--end of inline-->

<div class="form-inline" id="link_inline"><!--begin inline-->
                    <div class="form-group">                  
                      <div class="input-group">                        
                         <span class="input-group-addon">Optional Message:</span>
                         <textarea name="how_to_submit_link" class="form-control" placeholder="Type Optional 'How To Apply' Message"></textarea>
                       
                      </div>
                    </div>
                    <div class="form-group">
                      <p class="form-control-static" style="padding: 5px 10px;">or</p>
                    </div>
                    <div class="form-group">                  
                      <div class="input-group">                        
                         <span class="input-group-addon">External Url:</span>
                         <input type="url" name="adurl" class="form-control" placeholder="www.website.com/job_url">
                       
                      </div>
                    </div>
                  </div><!--end of inline-->

                    <div class="form-group" id="hardcopy_inline">                  
                      <div class="input-group">                        
                         <span class="input-group-addon">'How To Apply' Message:</span>
                         <textarea name="how_to_submit_hardcopy" class="form-control"></textarea>
                       
                      </div>
                    </div>
                   



                </div>
                  <div class="form-group">
                      
                          <label class="control-label">Due Date</label>
                          <input  type="date" min="<?php echo date("Y-m-d"); ?>" name="duedate" class="form-control" required="required">
                  
                  </div>
                    <div class="form-group">
                  <label class="control-label" for="textarea">Job Location</label>
                  <input type="text" class="form-control" required="required" name="location"  placeholder="City, Country">
                </div>
                    
                <?php
                if(!$user_postad->is_logged_in()){
                    echo "
<h2 class='title-2'>
                  Provide Your Personal Information
                </h2>
                                  
<div class='form-group'>
                  <label class='control-label'>First Name</label>
                  <input type='text' class='form-control' name='fname' placeholder='e.g. Andrew' >
                </div>
                  <div class='form-group'>
                  <label class='control-label' for='textarea'>Last Name</label>
                  <input type='text' class='form-control' name='lname' placeholder='e.g. Musyoka' >
                </div>
                 <div class='form-group'>
                  <label class='control-label' for='textarea'>Company/Organization Name</label>
                  <input type='text' class='form-control' name='compname' placeholder='e.g. Safaricom Limited'>
                </div>
                <div class='form-group'>
                  <label class='control-label' for='textarea'>Phone Number</label>
                  <input type='tel' class='form-control' name='phoneno' placeholder='e.g. +254703356821'>
                  
                </div> 
                  <div class='form-group'>
                  <label class='control-label' for='textarea'>Email</label>
                  <input type='email' class='form-control' name='email' placeholder='e.g. andrem@gmail.com' required='required' >
            </div> 
                  <div class='form-group'>
                  <label class='control-label' for='textarea'>Password</label>
                  <input type='password' class='form-control' name='pwordadv' placeholder='type password...'>
                </div>
<!--<div class='form-group'><div class='well'>
<div class='checkbox'>
                   <label><input checked='checked' type='checkbox'> Sign Up for Newsletter</label>
                   </div>
                    <div class='checkbox'>
                      <label><input type='checkbox' required='required'> I agree to the <a href='terms.html'>Terms of Use</a></label>
                    </div>
</div>--></div>
";
}
else{
    echo "<div class='form-group'>
                  
                <input type='hidden' class='form-control' name='email' required='required' value='".$_SESSION['userSession']."' >
                </div>                        
";
}
                ?>
               <div class="form-group">
                  <div class="well">
                   
                      <input type="submit" name="btn-postad" class="btn btn-success btn-rn" value="Post Job"/>
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
  <script type="text/javascript">
$(document).ready(function() {
$("#upload_inline").hide();
$("#email_inline").hide();
$("#call_inline").hide();
$("#link_inline").hide();
$("#hardcopy_inline").hide();
$("#howtoapply").change(function(){
var howto=$("#howtoapply").val();
if(howto=="upload"){
$("#upload_inline").show();
$("#email_inline").hide();
$("#call_inline").hide();
$("#link_inline").hide();
$("#hardcopy_inline").hide();

}
if(howto=="email"){
$("#upload_inline").hide();
$("#email_inline").show();
$("#call_inline").hide();
$("#link_inline").hide();
$("#hardcopy_inline").hide();
}
if(howto=="telephone"){
$("#upload_inline").hide();
$("#email_inline").hide();
$("#call_inline").show();
$("#link_inline").hide();
$("#hardcopy_inline").hide();
}
if(howto=="url"){
$("#upload_inline").hide();
$("#email_inline").hide();
$("#call_inline").hide();
$("#link_inline").show();
$("#hardcopy_inline").hide();
}
if(howto=="letter"){
$("#upload_inline").hide();
$("#email_inline").hide();
$("#call_inline").hide();
$("#link_inline").hide();
$("#hardcopy_inline").show();
}
});
//{
       // 
//alert(howtoapply);
//}
});
</script>
    <!-- Main JS  -->
<!--
<script src="jquery-flexdatalist-2.2.4/jquery.flexdatalist.js"></script> 
<script src="jquery-flexdatalist-2.2.4/jquery.flexdatalist.min.js"></script>  
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
    <script src="assets/js/bootstrap-select.min.js"></script>-->
  </body>
</html>
