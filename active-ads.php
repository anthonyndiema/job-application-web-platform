<?php
error_reporting(0);
session_start();
require_once 'class.user.php';//require "configure.php";
$active_ads = new USER();
//All database details will be included here 
if($active_ads->is_logged_in()=="")
{
	$active_ads->redirect('login.php');
}
 $person=$_SESSION['userSession'];
 $curremail=$person;
if(isset($_POST["del-job-btn"])){
    $adid_s=$_POST["adid_s"];
     $stmt = $active_ads->runQuery("DELETE FROM advert WHERE adid=:adid");
$stmt->execute(array(":adid"=>$adid_s));
$active_ads->redirect("active-ads.php");
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
    <meta name="description" content="active adverts">
   <title>active adverts</title>

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
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-9085745333411810",
    enable_page_level_ads: true
  });
</script>
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

    <!-- Start Content -->
    <div id="content"  class="disp3">
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
              <h2 class="title-2">Active Job Adverts</h2>
              <div class="table-responsive">
                 <?Php
require "configure.php";           // All database details will be included here 

$page_name="active-ads.php"; //If you use this code with a different page ( or file ) name then change this 
$start=$_GET['start'];
if(strlen($start) > 0 and !is_numeric($start)){
echo "Data Error";
exit;
}


$eu = ($start - 0); 
$limit = 10;                                 // No of records to be shown per page.
$this1 = $eu + $limit; 
$back = $eu - $limit; 
$next = $eu + $limit; 


/////////////// Total number of records in our table. We will use this to break the pages///////
$nume = $dbo->query("select count(adid) from advert where useremail='".$person."' and status='active'")->fetchColumn();
/////// The variable nume above will store the total number of records in the table////

/////////// Now let us print the table headers ////////////////

//echo "<TABLE class='t1'>";
//echo  "<tr><th>ID</th><th>Name</th><th>Class</th><th>Mark</th></tr>";

////////////// Now let us start executing the query with variables $eu and $limit  set at the top of the page///////////
$query=" select * from advert  where useremail='".$person."' and status='active'  limit $eu, $limit ";


?>                         
                <table class="table table-striped table-bordered add-manage-table">
                  <thead>
                    <tr>
                      <th>Job</th>
                      <th>Category</th>
                      <th>Description</th>
                      <th>More Info</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                                  <?php
                                  
                   if($nume==0)
                   {
                       echo '<tr><td colspan="7" style="color:red;"><center>There are no Active Job Adverts</center></td></tr>';
                   }
                   else{
                   foreach ($dbo->query($query) as $row) {
    $adname=$row['adname'];$adid=$row['adid'];
        $duedate=$row['duedate'];$jloc=$row['jlocation'];
        $addesc=base64_decode($row['addesc']);$adcategory=$row['adcategory'];
        $link="job-info.php?jobid=".$adid;
   echo "<tr>
                      <td class='add-img-selector'>
                        <div class='checkbox'>
                          <label><a href='preview-ad.php?ad_id=".$row["adid"]."'>".
                            $row["adname"]
                         ."</a> </label>
                        </div>
                      </td>
                      <td class='add-details-td'>
                       
                          
                          <p><strong>Job Category:</strong>".$row["adcategory"]."</p>
                          <p><strong>Job Type:</strong>".$row["jobtype"]."</p>
                          <p><strong>Job Permit:</strong>".$row["jobpermit"]."</p>
                       
                      </td>
                      <td class='ads-details-td'>
                        <a href='preview-ad.php?ad_id=".$row["adid"]."'>
                          ".
                            base64_decode(substr($row["addesc"],0,100))
                         ."
                        </a>
                      </td>
                      <td class='ads-details-td'>
                        <p> <strong> Posted On </strong>:
                        ".$row["dtpostd"]."</p>
                        <p> <strong> Valid Until </strong>:
                        ".$row["duedate"]." </p>
                        <p> <strong> Job Location </strong>:
                        ".$row["jlocation"]."</p>
                        
                      </td>
                      
                      <td class='action-td'>
                      
                        <p><a class='btn btn-primary btn-xs' href='edit-ad.php?ad_id=".$row["adid"]."'><i class='fa fa-pencil-square-o'></i> Edit</a></p>                       
                    <form class='del-fform' method='post'><p><input type='hidden' name='adid_s' value='".$row["adid"]."'/><input type='submit' class='btn btn-danger btn-xs' name='del-job-btn' value='Delete'></p><br/><br/>
                        </form> 
                        <p><a href='http://www.facebook.com/sharer/sharer.php?s=100&p[title]=".$adname."&p[summary]=".substr($addesc,0,100)."&p[url]=http://www.smartwriting.us/jobs/".$link."' class='btn btn-info btn-sm'><i class='fa fa-facebook'></i>
                  <span>Share</span></a> 
                  <a href='https://twitter.com/intent/tweet?text=".$adname."%20in%20".$jloc."%20 at%20http://www.smartwriting.us/jobs/".$link."' class='btn btn-primary btn-sm'><i class='fa fa-twitter'></i>
                  <span>Share</span></a>
                  
        <a href=' https://www.linkedin.com/shareArticle?mini=true&url=http://www.smartwriting.us/jobs/".$link."&title=".$adname."%20in%20".$jloc."&summary=".substr($addesc,0,100)."' class='btn btn-success btn-sm'><i class='fa fa-linkedin'></i>
                  <span>LinkedIn Share</span></a> 
                  <a href=' https://plus.google.com/share?url=http://www.smartwriting.us/jobs/".$link."&title=".$adname."%20in%20".$jloc."&content=".substr($addesc,0,100)."' class='btn btn-danger btn-sm'><i class='fa fa-google-plus'></i>
                  <span>Google+ Share</span></a> </p>
                
                    
                         </td>
                    </tr>";
                       /*echo "<tr>
                        <td>".$row['orderID']."</td>
                        <td>".$row['orderttl']."</td>
                        <td><center>$ ".$row['pricing']."</center></td>
                        <td>".$row['noofpages']."</td>
                        <td>".$row['spacing']."</td>
                        <td>".
date('Y-m-d H:i:s', $newtimestamp)."</td>
                        <td><a href='preview.php?jobid=".$row['orderID']."'><button class='btn btn-success' >Preview </button></a></td>
                    </tr>";*/

}
                   }

?>
                      
                   
                    
                  </tbody>
                                        <?php

/////////////////////////////// 
if($nume > $limit ){ // Let us display bottom links if sufficient records are there for paging

/////////////// Start the bottom links with Prev and next link with page numbers /////////////////
echo "<tfoot>
                <tr>
                  <th colspan='5'><ul class='pagination'>";
//// if our variable $back is equal to 0 or more then only we will display the link to move back ////////

if($back >=0) { 
    
print "<li><a href='$page_name?start=$back' aria-label='Previous'><span aria-hidden='true'>&DoubleLeftArrow;</span></a></li>"; 
} 
//////////////// Let us display the page links at  center. We will not display the current page as a link ///////////
//echo "<td  width='30%'>";
$i=0;
$l=1;
for($i=0;$i < $nume;$i=$i+$limit){
if($i <> $eu){
echo " <li><a href='$page_name?start=$i'>$l</a></li> ";
}
else {
  echo "<li class='active'><a href='#'>$l <span class='sr-only'>(current)</span></a></li>";
    
}        /// Current page is not displayed as link and given font color red
$l=$l+1;
}


//echo "</li>";
///////////// If we are not in the last page then Next link will be displayed. Here we check that /////
if($this1 < $nume) { 
   
print "<li><a href='$page_name?start=$next' aria-label='Next'><span aria-hidden='true'>&DoubleRightArrow;</span></a>";} 
echo "</li><li></ul></th>
                  
                </tr>
                </tfoot>";

}// end of if checking sufficient records are there to display bottom navigational link. 
   ?>
                </table>
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
                <a class="twitter" target="_blank" href="https://www.twitter.com/idawnke"><i class="fa fa-twitter"></i></a></center>
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
