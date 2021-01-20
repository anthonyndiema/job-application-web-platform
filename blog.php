
<?php
session_start();
require_once 'class.user.php';
$blog = new USER();

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="keywords" content="idawn,idawn.co.ke,idawn blog,applicant tracking systems,recruiting agencies,curriculum vitae,proposal letter,public relations,interview preparation">
    <meta name="description" content="idawn - Our Blog">
   <title>idawn - Our Blog</title>

     <!-- Favicon -->
     <link rel="shortcut icon" href="assets/img/favicon.png">
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

 <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-9085745333411810",
    enable_page_level_ads: true
  });
</script>

  <script type="text/javascript" src="../pagination/js/jquery-1.11.2.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
        
	$("#recentresults").load( "../pagination/fetch_blog_pages2"); //load initial records
	$("#recentresults").on( "click", ".pagination a", function (e){
		e.preventDefault();
		$(".loading-div").show(); //show loading element
		var page = $(this).attr("data-page"); //get page number from link
		$("#results").load("../pagination/fetch_blog_pages2",{"page":page}, function(){ //get content from PHP page
			$(".loading-div").hide(); //once done, hide loading element
		});
		
	});
	
	
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
            <a class="navbar-brand logo" href="../index.php"><img src="../assets/img/logo.png" alt=""></a>
          </div>
          <!-- brand and toggle menu for mobile End -->

         <!-- Navbar Start -->
          <div class="collapse navbar-collapse" id="navbar">
            <ul class="nav navbar-nav navbar-right">
                <?php
                if($blog->is_logged_in()=="")
{
                    echo '<li><a href="../index.php">HOME</a></li>
                <li><a href="../jobs.php">JOBS</a></li>
                <li><a href="../post-advert.php">POST JOB</a></li>
                 <li><a href="#" class="active">OUR BLOG</a></li>
                <li><a href="../signup.php"><i class="fa fa-registered"></i>SIGN UP</a></li>
              <li><a href="../login.php"><i class="fa fa-sign-in"></i> LOGIN</a></li>';
}
else{
    echo '<li><a href="manage-ads.php"><i class="fa fa-briefcase"></i> MANAGE</a></li>
                <li><a href="post-advert.php" class="active"><i class="lnr lnr-plus-circle"></i> POST JOB</a></li>
             <li><a href="profile.php"> <i class="fa fa-user"></i> PROFILE</a></li>
              <li><a href="#" class="active">OUR BLOG</a></li>
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
 <!-- Page Header Start -->
    <div class="page-header disp4">
      <div class="container">
        <div class="row">         
          <div class="col-md-12">
            <h1 class="page-title">IDAWN BLOG</h1>
          </div>
        </div>
      </div>
    </div>
    <!-- Page Header End --> 
   <!-- Start Content -->
    <div id="content">
      <div class="container">
        <div class="row">
          <div class="col-md-8">           

         
            <?php
require "configure.php";           // All database details will be included here 

$page_name="../blog"; //If you use this code with a different page ( or file ) name then change this 
$start=$_GET['start'];
if(strlen($start) > 0 and !is_numeric($start)){
echo "Data Error";
exit;
}


$eu = ($start - 0); 
$limit = 25;                                 // No of records to be shown per page.
$this1 = $eu + $limit; 
$back = $eu - $limit; 
$next = $eu + $limit; 


/////////////// Total number of records in our table. We will use this to break the pages///////
$nume = $dbo->query("SELECT COUNT(*) FROM blogpost")->fetchColumn();
/////// The variable nume above will store the total number of records in the table////

/////////// Now let us print the table headers ////////////////

//echo "<TABLE class='t1'>";
//echo  "<tr><th>ID</th><th>Name</th><th>Class</th><th>Mark</th></tr>";

////////////// Now let us start executing the query with variables $eu and $limit  set at the top of the page///////////
$query=" SELECT * FROM blogpost order by blogdate desc  limit $eu, $limit ";


?> 
<?php


	foreach ($dbo->query($query) as $row) {
	$link="../";

echo " <!-- Start Post -->
            <div class='blog-post' itemscope itemtype='http://schema.org/Article'>
            
              <!-- Post thumb -->
              <div class='post-thumb'>
              <meta itemprop='image' content='http://idawn.co.ke/blogimages/".$row['blogimage']."'>
                <a href='#'><img src='../blogimages/".$row['blogimage']."' alt='' height='300' width='800'></a>
                <div class='hover-wrap'>
                </div>
              </div>
              <!-- End Post post-thumb -->

              <!-- Post Content -->
              <div class='post-content>                     
                <h1 class='post-title' itemprop='name'><a itemprop='url' href='".$link.$row['blogurl']."'>".$row['blogtitle']."</a></h1>
                <span itemprop='headline' content='How to Choose the Best Applicant Tracking System'></span>
                <div class='meta'>
                  <span class='meta-part' itemprop='author' itemscope itemtype='http://schema.org/Person'><a href='#'><i class='fa fa-user'></i> <span itemprop='name'>".$row['blogauthor']."</span></a></span>
                  <span class='meta-part' itemprop='datePublished' content='".$row['blogdate']."'><a href='#'><i class='fa fa-clock-o'></i> ".(new DateTime($row['blogdate']))->format('j F Y')."</a></span>
                  <span itemprop='publisher' itemscope itemtype='http://schema.org/Organization'>
                  <span itemprop='name' style='display:none;'>idawn</span>
<span style='display:none;' itemprop='logo' itemscope itemtype='http://schema.org/ImageObject'>
<img itemprop='url' src='../assets/img/logo.png' alt='idawn'/>
<meta itemprop='width' content='600'>
<meta itemprop='height' content='100'>
</span>
                  </span>
                  <span itemprop='dateModified' content='2018-7-17'>
</span>
<span itemprop='mainEntityOfPage' content='http://www.idawn.co.ke/our-blog/How-to-Choose-the-Best-Applicant-Tracking-System'>
</span>
                  
                  <span itemprop='aggregateRating' itemscope itemtype='http://schema.org/AggregateRating'>
                  <span itemprop='ratingValue' content='3.5'></span>, 
<span itemprop='bestRating' content='5'></span> 
<span itemprop='worstRating' content='1'></span> 
<span itemprop='reviewCount' content='11'></span>
                  </span>
                  <!--<span class='meta-part'><a href='#'><i class='fa fa-comment'></i> Comments 0</a></span>-->                  
                </div>
                <p itemprop='description' itemprop='description'><span itemprop='articleSection'>".$row['blogdesc']."</span>…
                <span itemprop='articlebody' content='".$row['blogdesc']."'></span>
                </p>
                <a itemprop='url' href='../".$row['blogurl']."' class='btn btn-common btn-rm'>Read More</a>
              </div>
              <!-- Post Content -->
            </div>
            <!-- End Post -->";
	}


?>

<div class="pagination-bar">
 <?php

/////////////////////////////// 
if($nume > $limit ){ // Let us display bottom links if sufficient records are there for paging

/////////////// Start the bottom links with Prev and next link with page numbers /////////////////
echo "<tfoot>
                <tr>
                  <th colspan='5'><br/><br/><center><ul class='pagination'>   ";
//// if our variable $back is equal to 0 or more then only we will display the link to move back ////////

if($back >=0) { 
    
print "<li><a href='$page_name/$back' aria-label='Previous'><span aria-hidden='true'>PREVIOUS</span></a></li>"; 
} 
//////////////// Let us display the page links at  center. We will not display the current page as a link ///////////
//echo "<td  width='30%'>";
$i=0;
$l=1;
for($i=0;$i < $nume;$i=$i+$limit){
if($i <> $eu){
echo " <li><a href='$page_name/$i'>$l</a></li> ";
}
else {
  echo "<li class='active'><a href='#'>$l <span class='sr-only'>(current)</span></a></li>";
    
}        /// Current page is not displayed as link and given font color red
$l=$l+1;
}


//echo "</li>";
///////////// If we are not in the last page then Next link will be displayed. Here we check that /////
if($this1 < $nume) { 
   
print "<li><a href='$page_name/$next' aria-label='Next'><span aria-hidden='true'>NEXT</span></a>";} 
echo "</li><li></ul></center></th>
                  
                </tr>
                </tfoot>";

}// end of if checking sufficient records are there to display bottom navigational link. 
   ?>          
            
            
            
            

          </div>
          </div>

          <!--Sidebar-->
          <aside id="sidebar" class="col-md-4 right-sidebar">
            
          
            <!-- Popular Posts widget -->
            <div class="widget widget-popular-posts" id="recentresults">
              
               
                
              
            </div>

            <!-- Tag Media -->
            <div class="widget tag">
              <div class="widget-title">
                <h4>Tags</h4>
              </div>
              
              <a href="#"> Applicant Tracking Systems</a>
              <a href="#"> Recruiting Agencies</a>
              <a href="#"> Curriculum Vitae</a> 
              <a href="#"> Proposal Letter</a>                                 
              <a href="#"> Public Relations</a>
              <a href="#"> Interview Preparation</a>
            </div> 


          </aside>
          <!--End sidebar-->

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
<!--
<script src="jquery-flexdatalist-2.2.4/jquery.flexdatalist.js"></script> 
<script src="jquery-flexdatalist-2.2.4/jquery.flexdatalist.min.js"></script>  
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
    <script src="../assets/js/bootstrap-select.min.js"></script>-->
  </body>
</html>
