<?php
//error_reporting(0);
session_start();
$jobpermit=str_replace('-',' ',$_GET['jpermit']);
require_once 'class.user.php';
    // First we execute our common code to connection to the database and start the session
  //$person=$_SESSION['userSession'];
 // At the top of the page we check to see whether the user is logged in or not
  
$user_jobs = new USER();
if(isset($_POST["s-buttn"])){
   $scategory=str_replace(' ','-',$_POST['scategory']);$loc_s=str_replace(' ','-',$_POST["s_loc"]);
    $jtype_s=str_replace(' ','-',$_POST["jtype_s"]);$jpermit_s=str_replace(' ','-',$_POST["jpermit_s"]);
if(empty($loc_s)){
$loc_s="ky";
$user_jobs->redirect("../../../jobs/".$jpermit_s."/".$scategory."/".$jtype_s."/in/".$loc_s."/0");
}
else{
    $user_jobs->redirect("../../jobs/../".$jpermit_s."/".$scategory."/".$jtype_s."/in/".$loc_s."/0");
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
     <meta name="keywords" content="idawn,IT,information technology,computer science,banking,accounting,CPA,certified,professional,finance,commerce,admin,clerical,health,care,engineering,construction,building,hospitality,transportation,retail,sales,marketing,human resource,government,labour,science,technology,biotechnology,executive,quality assurace,supply chain,grocery,agriculture,farming,electrical,civil,broadcasting,journalism,inventory,installation,maintenance,repair,training,job,contract,volunteer,graduate,program,part time,full time,kenya,nairobi,nakuru,kisumu,mombasa,Salary Scale">
    <meta name="description" content="<?php echo $_GET['jpermit'];?> jobs,internships and volunteer programs in kenya and beyond">
   <title><?php echo $_GET['jpermit']; ?> Jobs,Internship,Volunteer programs in kenya and beyond</title>

     <!-- Favicon -->
    <link rel="shortcut icon" href="../../../assets/img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../../assets/css/bootstrap.min.css" type="text/css">    
    <link rel="stylesheet" href="../../../assets/css/jasny-bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../../../assets/css/jasny-bootstrap.min.css" type="text/css">
    <!-- Material CSS -->
    <link rel="stylesheet" href="../../../assets/css/material-kit.css" type="text/css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="../../../assets/css/font-awesome.min.css" type="text/css">
        <!-- Line Icons CSS -->
    <link rel="stylesheet" href="../../../assets/fonts/line-icons/line-icons.css" type="text/css">
    <!-- Line Icons CSS -->
    <link rel="stylesheet" href="../../../assets/fonts/line-icons/line-icons.css" type="text/css">
    <!-- Main Styles -->
    <link rel="stylesheet" href="../../../assets/css/main.css" type="text/css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="../../../assets/extras/animate.css" type="text/css">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="../../../assets/extras/owl.carousel.css" type="text/css">
    <link rel="stylesheet" href="../../../assets/extras/owl.theme.css" type="text/css">
    <link rel="stylesheet" href="../../../assets/extras/settings.css" type="text/css">
    <!-- Responsive CSS Styles -->
    <link rel="stylesheet" href="../../../assets/css/responsive.css" type="text/css">
        <!-- Bootstrap Select -->
    <link rel="stylesheet" href="../../../assets/css/bootstrap-select.min.css">  
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
           <a class="navbar-brand logo" href="../../../index.php"><img src="../../../assets/img/logo.png" alt=""></a>
          </div>
          <!-- brand and toggle menu for mobile End -->
<!-- Navbar Start -->
          <div class="collapse navbar-collapse" id="navbar">
            <ul class="nav navbar-nav navbar-right">
              <li><a href="../../../index.php">HOME</a></li>
              <li><a href="../../../job-listings.php" class="active">JOBS</a></li>
                <li><a href="../../../post-advert.php">POST JOB</a></li>
                <li><a href="../../../blog-topics.php">OUR BLOG</a></li>
              <li><a href="../../../signup.php"><i class="fa fa-registered"></i>SIGN UP</a></li>
              <li><a href="../../../login.php"><i class="fa fa-sign-in"></i> LOGIN</a></li>
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
        <div class="search-inner">
           <!-- Start Search box -->
<div class="row search-bar" id="search-bar2">
              <div class="advanced-search">
                <form class="search-form" id="search_form" method="post">
<div class="col-md-2 col-sm-4 search-col">
                    <div class="input-group-addon search-category-container">
                        <select name="jpermit_s"class="form-control" required="required" placeholder="choose permit">
<option value="all" selected="selected">All Permits</option>                        
<option value="Part Time">Part Time</option>
                        <option value="Full Time">Full Time</option>
                        <option value="Contract">Contract</option>
</select>
                    </div>
                  </div>
                <div class="col-md-2 col-sm-4 search-col">
                    <div class="input-group-addon search-category-container">
                        <select name="scategory" id="category-group" class="form-control" required="required">
<option value="all" selected="selected">All Categories</option>   
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


                  </div>
 
                  

                   <div class="col-md-2 col-sm-4 search-col">
                    <div class="input-group-addon search-category-container">
                        <select name="jtype_s"class="form-control" required="required">
<option value="all" selected="selected">All Types</option>    
                        <option value="Job">Job</option>
                        <option value="Internship">Internship</option>
                        <option value="Volunteer">Volunteer Program</option>
</select>
                    </div>
                  </div>

<div class="col-md-3 col-sm-4 search-col">
                    <div class="input-group-addon search-category-container">
                        <label>
                            <input list="browsers" class="form-control" name="s_loc" placeholder="type location">
<datalist id="browsers">
<?php
    $con=mysql_connect('localhost','idawncok_root','1993Ndiema1993');
    $db=mysql_select_db("idawncok_jobboard",$con);
    $q=mysql_query("SELECT `jlocation` FROM `advert`");
    while($res=mysql_fetch_row($q))
    {
        $x=$res[0];
        echo "<option value='$x'>$x";
    }
?>
</datalist>
                        </label>
                      
                    </div>


                  </div>
                  <div class="col-md-3 col-sm-6 search-col">
                      <button type="submit" name="s-buttn" class="btn btn-common btn-search btn-block"><strong> <i class="fa fa-search"></i>Search Job</strong></button>


<div id="showit"></div>

                  </div>
                </form>
              </div>
            </div>
            <!-- End Search box -->
                    </div>
      </div>
    </div>
    <!-- Search wrapper End -->  

    <!-- Main container Start -->  
    <div class="main-container">
      <div class="container">
        <div class="row">

          <div class="col-sm-9 page-content">
            <!-- Product filter Start -->
            <div class="product-filter">
              
              <div class="short-name">
                  <h4><?php echo str_replace('-',' ',$jobpermit); ?> Jobs,Internship,Volunteers</h4>
                
              </div>
              <div class="Show-item">
                
              </div>
            </div>
            <!-- Product filter End -->

            <!-- Adds wrapper Start -->
           <div class="adds-wrapper">
<input type="hidden" id="jpermit" value='<?php echo str_replace(' ','-',$jobpermit);?>'/>
<div class="loading-div"></div>




<?php
require "configure.php";           // All database details will be included here 

$page_name="../../../jobs/permit/".str_replace(' ','-',$jobpermit); //If you use this code with a different page ( or file ) name then change this 
$start=$_GET['start'];
if(strlen($start) > 0 and !is_numeric($start)){
echo "Data Error";
exit;
}


$eu = ($start - 0); 
$limit = 50;                                 // No of records to be shown per page.
$this1 = $eu + $limit; 
$back = $eu - $limit; 
$next = $eu + $limit; 


/////////////// Total number of records in our table. We will use this to break the pages///////
$nume = $dbo->query("select count(adid) from advert where jobpermit='str_replace('-',' ',$jobpermit)' and status='active'")->fetchColumn();
/////// The variable nume above will store the total number of records in the table////

/////////// Now let us print the table headers ////////////////

//echo "<TABLE class='t1'>";
//echo  "<tr><th>ID</th><th>Name</th><th>Class</th><th>Mark</th></tr>";

////////////// Now let us start executing the query with variables $eu and $limit  set at the top of the page///////////
$query=" select * from advert  where jobpermit='str_replace('-',' ',$jobpermit)' and status='active' order by dtpostd desc  limit $eu, $limit ";


?> 
<?php

echo "<div class='item-list'>There are $nume jobs Available</div>";
	foreach ($dbo->query($query) as $row) {
	$link="../../../".str_replace(' ','-',"jobs/".$row['adcategory']."/".$row['adid']."/".$row['adname'])."/0";
$delim=",";
$text= $row['skills'];
$tag=explode($delim,$text);
$i=0;
$addesc=base64_decode($row['addesc']);
		echo "<div itemscope itemtype='http://schema.org/JobPosting'  class='item-list'>
		 <div class='col-sm-12'>
                <div class='col-sm-9 add-desc-box'>
                <div class='add-details'>
                    <h5 class='add-title'><a itemprop='sameAs' href='".$link."'><span itemprop='title'>".$row['adname']."</span></a></h5>
                    
                    <div class='info'>
                      <span class='date'>
                      <strong>HIRING ORGANIZATION: </strong><i class='fa fa-house'></i>
                        <span itemprop='hiringOrganization'>".$row['company']."</span><br/>
                      <strong>POSTED ON: </strong><i class='fa fa-clock'></i>
                        <span itemprop='datePosted' content='".$row['dtpostd']."'>".$row['dtpostd']."</span><br/>
                        <strong>EXPIRES ON: </strong><i class='fa fa-clock'></i>
                        <span itemprop='validThrough' content='".$row['duedate']."'>".$row['duedate']."
                      </span> <BR/>
                      <strong>CATEGORY: </strong><span itemprop='employmentType'  class='category'>".$row['adcategory']."</span> <BR/><span itemprop='salaryCurrency'></span><span itemprop='baseSalary'></span>
                      <span itemprop='jobLocation' itemscope itemtype='http://schema.org/Place'><span itemprop='address' itemscope itemtype='http://schema.org/PostalAddress' class='item-location'>
                      <i class='fa fa-map-marker'></i>&nbsp; &nbsp; <span itemprop='addressLocality'>".$row['jlocation']."</span>
                      <span itemprop='streetAddress' content=''></span> 
                      <span itemprop='postalCode' content=''></span> 
                      <span itemprop='addressRegion' content=''></span> 
                      </span>
                      </span>
                    </div></div></div><div class='col-sm-3 text-right  price-box'>
                  <a itemprop='sameAs' href='".$link."' class='btn-border'> <i class='fa fa-apply'></i> <span>APPLY JOB</span> </a> 
                  
                </div></div>
                    
                
                    <div class='col-sm-12'>
                    <div class='item_desc'>
                      <a itemprop='sameAs' href='".$link."'><span>
                      <meta itemprop='description' content='".substr($addesc,0,200)."'>
                      ".substr($addesc,0,200)."<strong>...More Details</span></strong></a>
                    </div><div class='col-sm-12'>";
foreach($tag as $tags){
$i=$i++;
if(!empty($tags)){
print_r("<span id='taglist'><span class='tag'><a><i>".$tags."</i></a></span></span>");
}
}
                 echo"</div>
                </div>
                
              </div>
                ";
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
            <!-- End Pagination -->










            </div>
            <!-- Adds wrapper End -->
            
          

            <div class="post-promo text-center">
              <h2>Would you like to have employees fill open positions in your organization? </h2>
              <h5>It is free to post a job. It takes less than 2 Minutes  !</h5>
              <a href="../../../post-advert.php" class="btn btn-post btn-danger">Post Job for Free </a>
            </div>
          </div>
            
                         <div class="col-sm-3 page-sidebar">
            <aside>
              <div class="inner-box">
                <div class="categories">
                  <div class="widget-title">
                    <i class="fa fa-align-justify"></i>
                    <h4>Job Categories</h4>
                  </div>
                  <div class="categories-list">
                    
                       <?php
                                      $con=mysqli_connect('localhost','idawncok_root','1993Ndiema1993','idawncok_jobboard');
                                                    if(!$con){
                                                        die('Could not connect'.  mysqli_errno());
                                                    }
                                                    $sql = "SELECT * FROM advert where adcategory='IT and Telecommunication' and status='active'";
                                                    $sql1 = "SELECT * FROM advert where adcategory='Banking' and status='active'";
                                                    $sql2 = "SELECT * FROM advert where adcategory='Accounting' and status='active'";
                                                    $sql3 = "SELECT * FROM advert where adcategory='Finance' and status='active'";
                                                    $sql4 = "SELECT * FROM advert where adcategory='Admin and Clerical' and status='active'";
                                                    $sql5 = "SELECT * FROM advert where adcategory='Health Care' and status='active'";
                                                    $sql6 = "SELECT * FROM advert where adcategory='Engineering' and status='active'";
                                                    $sql7 = "SELECT * FROM advert where adcategory='Construction' and status='active'";
                                                    $sql8 = "SELECT * FROM advert where adcategory='Hopitality' and status='active'";
                                                    $sql9 = "SELECT * FROM advert where adcategory='Transportation' and status='active'";
                                                    $sql10 = "SELECT * FROM advert where adcategory='Retails, Sales and Marketing' and status='active'";
                                                    $sql11 = "SELECT * FROM advert where adcategory='Human Resource' and status='active'";
                                                    $sql12 = "SELECT * FROM advert where adcategory='Government' and status='active'";
                                                    $sql13 = "SELECT * FROM advert where adcategory='General Labor' and status='active'";
                                                    $sql14 = "SELECT * FROM advert where adcategory='Science and Biotechnology' and status='active'";
                                                    $sql15 = "SELECT * FROM advert where adcategory='Executive'  and status='active'";
                                                    $sql16 = "SELECT * FROM advert where adcategory='Quality Assurance'  and status='active'";
                                                    $sql17 = "SELECT * FROM advert where adcategory='Supply Chain'  and status='active'";
                                                    $sql18 = "SELECT * FROM advert where adcategory='Grocery and Farming'  and status='active'";
                                                    $sql19 = "SELECT * FROM advert where adcategory='Inventory'  and status='active'";
                                                    $sql20 = "SELECT * FROM advert where adcategory='Legal and Legal Admin'  and status='active'";
                                                    $sql21 = "SELECT * FROM advert where adcategory='Broadcasting-Journalism'  and status='active'";
                                                    $sql22 = "SELECT * FROM advert where adcategory='Installation, Maintenance and Repair'  and status='active'";
                                                    $sql23= "SELECT * FROM advert where adcategory='Training'  and status='active'";
                                                    $sql24= "SELECT * FROM advert where adcategory='Other'  and status='active'";
                                                    
                                                    if($result=mysqli_query($con,$sql)){
                                                        $result=mysqli_query($con,$sql);
                                                        $count=mysqli_num_rows($result);
                                                        
                                                        $result=mysqli_query($con,$sql1);
                                                        $count1=mysqli_num_rows($result);
                                                        
                                                        $result=mysqli_query($con,$sql2);
                                                        $count2=mysqli_num_rows($result);
                                                        $result=mysqli_query($con,$sql3);
                                                        $count3=mysqli_num_rows($result);
                                                        
                                                        $result=mysqli_query($con,$sql4);
                                                        $count4=mysqli_num_rows($result);
                                                        
                                                        $result=mysqli_query($con,$sql5);
                                                        $count5=mysqli_num_rows($result);
                                                        
                                                        $result=mysqli_query($con,$sql6);
                                                        $count6=mysqli_num_rows($result);
                                                        
                                                        $result=mysqli_query($con,$sql7);
                                                        $count7=mysqli_num_rows($result);
                                                        $result=mysqli_query($con,$sql8);
                                                        $count8=mysqli_num_rows($result);
                                                        $result=mysqli_query($con,$sql9);
                                                        $count9=mysqli_num_rows($result);
                                                        $result=mysqli_query($con,$sql10);
                                                        $count10=mysqli_num_rows($result);
                                                        $result=mysqli_query($con,$sql11);
                                                        $count11=mysqli_num_rows($result);
                                                        $result=mysqli_query($con,$sql12);
                                                        $count12=mysqli_num_rows($result);
                                                        $result=mysqli_query($con,$sql13);
                                                        $count13=mysqli_num_rows($result);
                                                        $result=mysqli_query($con,$sql14);
                                                        $count14=mysqli_num_rows($result);
                                                        $result=mysqli_query($con,$sql15);
                                                        $count15=mysqli_num_rows($result);
                                                        $result=mysqli_query($con,$sql16);
                                                        $count16=mysqli_num_rows($result);
                                                        $result=mysqli_query($con,$sql17);
                                                        $count17=mysqli_num_rows($result);
                                                        $result=mysqli_query($con,$sql18);
                                                        $count18=mysqli_num_rows($result);
                                                        $result=mysqli_query($con,$sql19);
                                                        $count19=mysqli_num_rows($result);
                                                        $result=mysqli_query($con,$sql20);
                                                        $count20=mysqli_num_rows($result);
                                                        $result=mysqli_query($con,$sql21);
                                                        $count21=mysqli_num_rows($result);
                                                        $result=mysqli_query($con,$sql22);
                                                        $count22=mysqli_num_rows($result);
                                                        $result=mysqli_query($con,$sql23);
                                                        $count23=mysqli_num_rows($result);
                                                        $result=mysqli_query($con,$sql24);
                                                        $count24=mysqli_num_rows($result);
                                                       
                                                        
                                                    }
                                                        ?>
                          <table class="table table-bordered table-hover">
                          <tr><td><a href="../../../jobs/IT-and-Telecommunication/0">IT and Telecommunication</a></td><td><?php echo $count; ?></td></tr>
                              <tr><td><a href="../../../jobs/Banking/0">Banking</a></td><td><?php echo $count1; ?></td></tr>
                          <tr><td><a href="../../../jobs/Accounting/0">Accounting</a></td><td><?php echo $count2; ?></td></tr>
                          <tr><td><a href="../../../jobs/Finance/0">Finance</a></td><td><?php echo $count3; ?></td></tr>
                          <tr><td><a href="../../../jobs/Admin-and-Clerical/0">Admin and Clerical</a></td><td><?php echo $count4; ?></td></tr>
                          <tr><td><a href="../../../jobs/Health-Care/0">Health Care</a></td><td><?php echo $count5; ?></td></tr>
                          <tr><td><a href="../../../jobs/Engineering/0">Engineering</a></td><td><?php echo $count6; ?></td></tr>
                          <tr><td><a href="../../../jobs/Construction/0">Construction</a></td><td><?php echo $count7; ?></td></tr>
                          <tr><td><a href="../../../jobs/Hospitality/0">Hospitality</a></td><td><?php echo $count8; ?></td></tr>
                          <tr><td><a href="../../../jobs/Transportation/0">Transportation</a></td><td><?php echo $count9; ?></td></tr>
                          <tr><td><a href="../../../jobs/Retails,-Sales-and-Marketing/0">Retails, Sales and Marketing</a></td><td><?php echo $count10; ?></td></tr>
                          <tr><td><a href="../../../jobs/Human-Resource/0">Human Resource</a></td><td><?php echo $count11; ?></td></tr>
                          <tr><td><a href="../../../jobs/Government/0">Government</a></td><td><?php echo $count12; ?></td></tr>
                          <tr><td><a href="../../../jobs/General-Labor/0">General Labor</a></td><td><?php echo $count13; ?></td></tr>
                          <tr><td><a href="../../../jobs/Science-and-Biotechnology/0">Science and Biotechnology</a></td><td><?php echo $count14; ?></td></tr>
                          <tr><td><a href="../../../jobs/Executive/0">Executive</a></td><td><?php echo $count15; ?></td></tr>
                          <tr><td><a href="../../../jobs/Quality-Assurance-(QA)/0">Quality Assurance (QA)</a></td><td><?php echo $count16; ?></td></tr>
                          <tr><td><a href="../../../jobs/Supply-Chain/0">Supply Chain</a></td><td><?php echo $count17; ?></td></tr>
                          <tr><td><a href="../../../jobs/Grocery-and-Farming/0">Grocery and Farming</a></td><td><?php echo $count18; ?></td></tr>
                          <tr><td><a href="../../../jobs/Inventory/0">Inventory</a></td><td><?php echo $count18; ?></td></tr>
                          <tr><td><a href="../../../jobs/Legal-and-Legal-Admin/0">Legal and Legal Admin</a></td><td><?php echo $count19; ?></td></tr>
                          <tr><td><a href="../../../jobs/Broadcasting-Journalism/0">Broadcasting-Journalism</a></td><td><?php echo $count20; ?></td></tr>
                           <tr><td><a href="../../../jobs/Inventory/0">Inventory</a></td><td><?php echo $count21; ?></td></tr>
                          <tr><td><a href="../../../jobs/Installation,-Maintenance-and-Repair/0">Installation, Maintenance and Repair</a></td><td><?php echo $count22; ?></td></tr>
                          <tr><td><a href="../../../jobs/Training/0">Training</a></td><td><?php echo $count23; ?></td></tr>
                          <tr><td><a href="../../../jobs/Other/0">Other</a></td><td><?php echo $count24; ?></td></tr>
                          </table>
                         
                      
                  </div>
                </div>
              </div>

              <div class="inner-box">
                  <div class="widget-title">
                    
                    <h4>Job Types</h4>
                  </div>
                  <div class="categories-list">
                    
                       <?php
                            $con=mysqli_connect('localhost','idawncok_root','1993Ndiema1993','idawncok_jobboard');
                                                    if(!$con){
                                                        die('Could not connect'.  mysqli_errno());
                                                    }
                                                    $sql = "SELECT * FROM advert where jobtype='Volunteer' and status='active'";
                                                    $sql2 = "SELECT * FROM advert where jobtype='Job' and status='active'";
                                                    $sql3 = "SELECT * FROM advert where jobtype='Internship' and status='active'";
                                                   
                                                    if($result=mysqli_query($con,$sql)){
                                                        $result=mysqli_query($con,$sql);
                                                        $count=mysqli_num_rows($result);
                                                        
                                                        $result=mysqli_query($con,$sql2);
                                                        $count2=mysqli_num_rows($result);
                                                        
                                                        $result=mysqli_query($con,$sql3);
                                                        $count3=mysqli_num_rows($result);
                                                        
                                                       
                                                    }
                                                        ?>
                          <table class="table table-bordered table-hover">
                              <tr><td><a href="../../../jobs/type/Volunteer/0">Volunteer Jobs</a></td><td><?php echo $count; ?></td></tr>
                              <tr><td><a href="../../../jobs/type/Job/0"> Jobs</a></td><td><?php echo $count2; ?></td></tr>
                          <tr><td><a href="../../../jobs/type/Internship/0">Internship</a></td><td><?php echo $count3; ?></td></tr>
                          </table>
                         
                      
                  </div>
                
              </div>
                
                <div class="inner-box">
                  <div class="widget-title">
                    
                    <h4>Job Permits</h4>
                  </div>
                  <div class="categories-list">
                    
                       <?php
                         $con=mysqli_connect('localhost','idawncok_root','1993Ndiema1993','idawncok_jobboard');
                                                    if(!$con){
                                                        die('Could not connect'.  mysqli_errno());
                                                    }
                                                    $sql = "SELECT * FROM advert where jobpermit='Part Time' and status='active'";
                                                    $sql2 = "SELECT * FROM advert where jobpermit='Full Time' and status='active'";
                                                    $sql3 = "SELECT * FROM advert where jobpermit='Contract' and status='active'";
                                                    
                                                    if($result=mysqli_query($con,$sql)){
                                                        $result=mysqli_query($con,$sql);
                                                        $count=mysqli_num_rows($result);
                                                        
                                                        $result=mysqli_query($con,$sql2);
                                                        $count2=mysqli_num_rows($result);
                                                        
                                                        $result=mysqli_query($con,$sql3);
                                                        $count3=mysqli_num_rows($result);
                                                        
                                                        
                                                    }
                                                        ?>
                          <table class="table table-bordered table-hover">
                              <tr><td><a href="../../../jobs/permit/Part-Time/0">Part Time Jobs</a></td><td><?php echo $count; ?></td></tr>
                          <tr><td><a href="../../../jobs/permit/Full-Time/0">Full Time Jobs</a></td><td><?php echo $count2; ?></td></tr>
                              <tr><td><a href="../../../jobs/permit/Contract/0">Contract Jobs</a></td><td><?php echo $count3; ?></td></tr>
                          </table>
                         
                      
                  </div>
                
              </div>
                

              
            </aside>
          </div>
            
        </div>
      </div>
    </div>
    <!-- Main container End -->  
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
    <script type="text/javascript" src="../../../assets/js/jquery-min.js"></script>      
    <script type="text/javascript" src="../../../assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../../../assets/js/material.min.js"></script>
    <script type="text/javascript" src="../../../assets/js/material-kit.js"></script>
    <script type="text/javascript" src="../../../assets/js/jquery.parallax.js"></script>
    <script type="text/javascript" src="../../../assets/js/owl.carousel.min.js"></script>
    <script type="text/javascript" src="../../../assets/js/wow.js"></script>
    <script type="text/javascript" src="../../../assets/js/main.js"></script>
    <script type="text/javascript" src="../../../assets/js/jquery.counterup.min.js"></script>
    <script type="text/javascript" src="../../../assets/js/waypoints.min.js"></script>
    <script type="text/javascript" src="../../../assets/js/jasny-bootstrap.min.js"></script>
    <script type="text/javascript" src="../../../assets/js/form-validator.min.js"></script>
    <script type="text/javascript" src="../../../assets/js/contact-form-script.js"></script>    
    <script type="text/javascript" src="../../../assets/js/jquery.themepunch.revolution.min.js"></script>
    <script type="text/javascript" src="../../../assets/js/jquery.themepunch.tools.min.js"></script>
    <script src="../../../assets/js/bootstrap-select.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="loader/js/vendor/jquery-1.9.1.min.js"><\/script>')</script>
	<script src="loader/js/main.js"></script>
  </body>
</html>
