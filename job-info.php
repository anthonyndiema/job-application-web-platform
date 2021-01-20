<?php
session_start();
$job__id=$_GET['jobid'];$jobcat=str_replace('-',' ',$_GET['jcat']);
$adname=$_GET['jname'];
require_once 'class.user.php';
$user_jobinfo= new USER();
$msg="";
if(empty($job__id))
{
	$user_jobinfo->redirect('jobs.php');
}

$stmt = $user_jobinfo->runQuery("SELECT * FROM advert WHERE adid=:oid");
$stmt->execute(array(":oid"=>$job__id));
$rowjdet = $stmt->fetch(PDO::FETCH_ASSOC);
$stmt3 = $user_jobinfo->runQuery("UPDATE advert SET adview=adview+1 where adid=:adid");
$stmt3->execute(array(":adid"=>$job__id));
if(isset($_POST["submtapp"])){
$fname=$_POST["seeker_fname"];
$lname=$_POST["seeker_lname"];
$email=$_POST["seeker_email"];
$pno=$_POST["seeker_pno"];
$password=$_POST["seeker_password"];
//$resume=$_FILES['seeker_resume'];
        if($_FILES['mFile']['error'])
	{
		//File upload error encountered
		
               header("location:upload error!");
	}
$UploadDirectory="../../../../resumes/";
	$FileName			= $_FILES['mFile']['name']; //uploaded file name
	$FileTitle			= "resume"; // file title
	$ImageExt			= substr($FileName, strrpos($FileName, '.')); //file extension
	$FileType			= $_FILES['mFile']['type']; //file type
	$FileSize			= $_FILES['mFile']["size"]; //file size
        $RandNumber   		= rand(0, 9999999999); //Random number to make each filename unique.
	$uploaded_date		= date("Y-m-d H:i:s");
	$allowedext=array('doc','docx','ppt','pptx','zip','rar','pdf');
        $extension=end(explode(".", $FileName));
        if(!in_array($extension,$allowedext)){
         
$msg = "
		      <div class='alert alert-danger'>
				<button class='close' data-dismiss='alert'>&times;</button>
					<strong>Sorry !</strong>  The file type ".$extension." ".$_FILES['mFile']["tmp_name"]." is not allowed
			  </div>
			  ";
        }
	$NewFileName = $FileTitle."_".$RandNumber."_".$ImageExt;
	$stmt = $user_jobinfo->runQuery("SELECT * FROM users WHERE email=:email_id");
$stmt->execute(array(":email_id"=>$email));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
	$stmt10 = $user_jobinfo->runQuery("SELECT * FROM files WHERE user_id=:id");
$stmt10->execute(array(":id"=>$row['id']));
$row10 = $stmt10->fetch(PDO::FETCH_ASSOC);
        /*if(move_uploaded_file($_FILES['mFile']["tmp_name"],$UploadDirectory.$NewFileName ))
           {
   }
else{
$msg = "<div class='alert alert-danger'>button class='close' data-dismiss='alert'>&times;</button>
					<strong>Failed!</strong>  Application Failed!
			  </div>
			  ";
}
	         $msg.= "<div class='alert alert-danger'><button class='close' data-dismiss='alert'>&times;</button><strong>Sorry!</strong>  <br/>You have already submitted an application for this job<br/>
	         
			  </div>
			  ";
*/
 
   if($stmt->rowCount() > 0)
	         {
	         if($stmt10->rowCount()>0){
	         $msg.= "<div class='alert alert-danger'><button class='close' data-dismiss='alert'>&times;</button><strong>Sorry!</strong>  <br/>You have already submitted an application for this job<br/>
	         
			  </div>
			  ";
	         }
	         else{
	         if(move_uploaded_file($_FILES['mFile']["tmp_name"],$UploadDirectory.$NewFileName ))
   {
   $stmtx = $user_jobinfo->runQuery("INSERT INTO files(user_id,f_name,upload_dt) VALUES(:user_id,:f_name,:upload_dt)");
$stmtx->execute(array(":user_id"=>$row['id'],":f_name"=>$NewFileName,":upload_dt"=>$uploaded_date)); 
$msg.= "<div class='alert alert-success'><button class='close' data-dismiss='alert'>&times;</button><strong>Thank you for submitting the application!</strong>  <br/>You will receive feedback once it is approved<br/>You can <a href='../../../login.php'>Log In</a> to view your application status
			  </div>
			  ";
   }
else{
$msg = "<div class='alert alert-danger'>button class='close' data-dismiss='alert'>&times;</button>
					<strong>Failed!</strong>  Application Failed!
			  </div>
			  ";
}
	         }
		 
			  
	          }
            else{
            if($stmt10->rowCount()>0){
	         $msg.= "<div class='alert alert-danger'><button class='close' data-dismiss='alert'>&times;</button><strong>Sorry!</strong>  <br/>You have already submitted an application for this job<br/>
	         
			  </div>
			  ";
	         }
	         else{
	         
	         if(move_uploaded_file($_FILES['mFile']["tmp_name"],$UploadDirectory.$NewFileName ))
           {
           if($user_jobinfo->addseeker($fname,$lname,$email,$pno,$password)){
         $id=$user_jobinfo->lasdID();
         $stmtx = $user_jobinfo->runQuery("INSERT INTO files(user_id,f_name,upload_dt) VALUES(:user_id,:f_name,:upload_dt)");
         $stmtx->execute(array(":user_id"=>$id,":f_name"=>$NewFileName,":upload_dt"=>$uploaded_date)); 
        $msg.= "<div class='alert alert-success'><button class='close' data-dismiss='alert'>&times;</button><strong>Thank you                         for submitting the application!</strong>  <br/>You will receive feedback once it is approved<br/>Your account has also been              created and you can view your application by <a href='../../../login.php' style='color:black;'><strong>Logging In</strong></a>
			  </div>
			  ";
			  }
			  else{
			  $msg = "<div class='alert alert-danger'>button class='close' data-dismiss='alert'>&times;</button>
					<strong>Failed!</strong>  Application Failed!
			  </div>
			  ";
			  }
   }
else{
$msg = "<div class='alert alert-danger'>button class='close' data-dismiss='alert'>&times;</button>
					<strong>Failed!</strong>  Application Failed!
			  </div>
			  ";
}
	         }
            
        
             }

}
?>
<!DOCTYPE html>
<html lang="en-US"   itemscope itemtype="http://schema.org/Article">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
     <meta name="keywords" content="idawn,<?php echo htmlentities($rowjdet["skills"]);?>">
     <link rel="canonical" href="http://www.idawn.co.ke/jobs/<?php echo $_GET['jcat']."/".$_GET['jobid']."/".$_GET['jname']."/0";?>">
    <meta name="description" content="<?php echo htmlentities($rowjdet["adname"])." ".htmlentities($rowjdet["jobtype"])." in ".htmlentities($rowjdet["jlocation"]);?> - <?php echo substr(base64_decode($rowjdet['addesc']),0,200);?>">
   <title><?php echo htmlentities($rowjdet["adname"])." ".htmlentities($rowjdet["jobtype"])." in ".htmlentities($rowjdet["jlocation"]);?></title>
<meta itemprop="name" content="<?php echo htmlentities($rowjdet["adname"])." ".htmlentities($rowjdet["jobtype"])." in ".htmlentities($rowjdet["jlocation"]);?>"/>
    <meta itemprop="description" content="<?php echo htmlentities($rowjdet["adname"])." ".htmlentities($rowjdet["jobtype"])." in ".htmlentities($rowjdet["jlocation"]);?> - <?php echo substr(base64_decode($rowjdet['addesc']),0,200);?>"/>
    <meta itemprop="image" content="http://www.idawn.co.ke/img/job.png"/>
    <!--meta tags-->
    <?php
    $delim=",";$i=0;
    $text= $rowjdet['skills'];
$tag=explode($delim,$text);
foreach($tag as $tags){
$i=$i++;
if(!empty($tags)){
print_r("<meta property='article:tag' content='$tags' />");
}
}
?>
   
    <!-- twitter card data-->
     <meta name="twitter:card" content="summary"/>
    <meta name="twitter:site" content="@idawnke"/>
    <meta name="twitter:title" content="<?php echo htmlentities($rowjdet["adname"])." ".htmlentities($rowjdet["jobtype"])." in ".htmlentities($rowjdet["jlocation"]);?>"/>
    <meta name="twitter:description" content="<?php echo htmlentities($rowjdet["adname"])." ".htmlentities($rowjdet["jobtype"])." in ".htmlentities($rowjdet["jlocation"]);?> - <?php echo substr(base64_decode($rowjdet['addesc']),0,200);?>"/>
    <meta name="twitter:image" content="http://www.idawn.co.ke/assets/img/job.png"/>
    <meta name="twitter:creator" content="@anthonyndm"/>
    
    <!--open data graph-->
    <meta property="fb:app_id" content="1993947866908994"/>
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
<meta property="og:title" content="<?php echo htmlentities($rowjdet["adname"])." ".htmlentities($rowjdet["jobtype"])." in ".htmlentities($rowjdet["jlocation"]);?>"/>
    <meta property="og:description" content="<?php echo htmlentities($rowjdet["adname"])." ".htmlentities($rowjdet["jobtype"])." in ".htmlentities($rowjdet["jlocation"]);?> - <?php echo substr(base64_decode($rowjdet['addesc']),0,200);?>"/>
    <meta property="og:image" content="http://www.idawn.co.ke/img/job.png"/>
    <meta property="og:image:width" content="500" />
    <meta property="og:image:height" content="300" />
    <meta property="og:image:type" content="image/png" />
    <meta property="og:url" content="http://www.idawn.co.ke/jobs/<?php echo $_GET['jcat']."/".$_GET['jobid']."/".$_GET['jname']."/0";?>"/>
    <meta property="og:site_name" content="idawn" />
    <meta property="og:updated_time" content="2018-09-27T12:26:35+03:00" />
    <meta property="article:published-time" content="2018-09-27T12:26:35+03:00"/>
    <meta property="article:modified-time" content="2018-09-27T12:26:35+03:00"/>

     <!-- Favicon -->
     <link rel="shortcut icon" href="../../../../assets/img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../../../assets/css/bootstrap.min.css" type="text/css">    
    <link rel="stylesheet" href="../../../../assets/css/jasny-bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../../../../assets/css/jasny-bootstrap.min.css" type="text/css">
    <!-- Material CSS -->
    <link rel="stylesheet" href="../../../../assets/css/material-kit.css" type="text/css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="../../../../assets/css/font-awesome.min.css" type="text/css">
        <!-- Line Icons CSS -->
    <link rel="stylesheet" href="../../../../assets/fonts/line-icons/line-icons.css" type="text/css">
    <!-- Line Icons CSS -->
    <link rel="stylesheet" href="../../../../assets/fonts/line-icons/line-icons.css" type="text/css">
    <!-- Main Styles -->
    <link rel="stylesheet" href="../../../../assets/css/main.css" type="text/css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="../../../../assets/extras/animate.css" type="text/css">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="../../../../assets/extras/owl.carousel.css" type="text/css">
    <link rel="stylesheet" href="../../../../assets/extras/owl.theme.css" type="text/css">
    <link rel="stylesheet" href="../../../../assets/extras/settings.css" type="text/css">
    <!-- Responsive CSS Styles -->
    <link rel="stylesheet" href="../../../../assets/css/responsive.css" type="text/css">
        <!-- Bootstrap Select -->
    <link rel="stylesheet" href="../../../../assets/css/bootstrap-select.min.css">  
  <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
  <ins class="adsbygoogle"
  style="display:block"
  data-ad-format="fluid"
  data-ad-layout-key="-ed+5p-2-bb+pw"
  data-ad-client="ca-pub-9085745333411810"
  data-ad-slot="5470503391"></ins>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({});
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
            <a class="navbar-brand logo" href="../../../../index.php"><img src="../../../../assets/img/logo.png" alt=""></a>
          </div>
          <!-- brand and toggle menu for mobile End -->

          <!-- Navbar Start -->
          <div class="collapse navbar-collapse" id="navbar">
            <ul class="nav navbar-nav navbar-right">
              <li><a href="../../../../index.php">HOME</a></li>
              <li><a href="../../../../job-listings.php" class="active">JOBS</a></li>
                <li><a href="../../../../post-advert.php">POST JOB</a></li>
                <li><a href="../../../../blog.php">OUR BLOG</a></li>
              <li><a href="../../../../signup.php"><i class=></i>SIGN UP</a></li>
              <li><a href="../../../../login.php"><i class="fa fa-sign-in"></i> LOGIN</a></li>
            </ul>
          </div>
          <!-- Navbar End -->
        </div>
      </nav>
      <!-- Off Canvas Navigation -->
      
    </div>
    <!-- Header Section End -->

    <!-- Start Content -->
    <div id="content" class="disp2">
      <div class="container">
        <div class="row">
          <!-- Product Info Start -->
          
            <div class="col-xs-12 page-content">
              <div class="inner-box ads-details-wrapper">
              <h2><center><?php echo $rowjdet['adname']; ?></center></h2>
                <p class="item-intro"><center><span class="poster">Job Posted on <span class="date"> <?php echo $rowjdet['dtpostd']; ?></span> from <span class="location"><?php echo $rowjdet['jlocation']; ?></span></center></p>
                
              </div>

              <div class="Ads-Details">
              
                <h2 class="title-2" ><strong>Job Description</strong></h2>
                  <div class="row">
                  <div class="ads-details-info col-md-8">
<?php

$delim=",";
$text= htmlentities($rowjdet['skills']);
$tag=explode($delim,$text);
$i=0;
foreach($tag as $tags){
$i=$i++;
if(!empty($tags)){
print_r("<span id='taglist'><span class='tag'><a><i>".$tags."</i></a></span></span>");
}
}


?>

                     <span class="main-desc"> <p><?php echo base64_decode($rowjdet['addesc']); ?></p><span>

</div>

                  
                  <div class="col-md-4">
                    
                    <aside class="panel panel-body panel-details">
                      <ul>
                      <li>
                        <p class=" no-margin "><strong>Hiring Organization:</strong><span> <?php echo $rowjdet['company']; ?></span></p>
                        </li>
                        <li>
                        <p class=" no-margin "><strong>Job Category:</strong><span> <?php echo $rowjdet['adcategory']; ?></span></p>
                        </li>
                        <li>
                        <p class="no-margin"><strong>Job Type:</strong> <span><?php echo $rowjdet['jobtype']; ?></span></p>
                        </li>
                        <li>
                        <p class="no-margin"><strong>Permit:</strong> <span><?php echo $rowjdet['jobpermit']; ?></span></p>
                        </li>
                        <li>
                        <p class=" no-margin "><strong>Location:</strong><span> <?php echo $rowjdet['jlocation']; ?></span></p>
                        </li>
                        <li>
                        
                        <p class="no-margin"><strong>Active Until:</strong><span> <?php echo $rowjdet['duedate']; ?></span></p>
                        </li>
                      </ul>
                    </aside>

                   
                  </div><!--END OF COL-MD-4-->

<div class="row">
      <div class="ads-details-info col-md-12">
<h2 class="title-2"><strong>HOW TO APPLY</strong></h2>
<div><?php if($msg!=""){echo $msg;} ?></div>
<?php if($rowjdet['how_to']=="upload") {?>
<h5><strong>Please fill in your details and upload CV/resume to apply</strong><br/><hr/></h5>
<div id="display-resources"> </div>
<form  enctype="multipart/form-data" method="post">
<div class="form-group">
                  <label class="control-label">First Name:</label>
                  <input name="seeker_fname" placeholder="First Name" class="form-control input-md" type="text">
                </div>
<div class="form-group">
                  <label class="control-label">Last Name:</label>
                  <input name="seeker_lname" placeholder="Last Name" class="form-control input-md" type="text">
                </div>
<div class="form-group">
                  <label class="control-label">Phone No:</label>
                  <input name="seeker_pno" placeholder="+254XXXXXXXX" class="form-control input-md" type="text">
                </div>
<div class="form-group">
                  <label class="control-label">Email:</label>
                  <input name="seeker_email" placeholder="Email" class="form-control input-md" type="text">
                </div>

<div class="form-group">
                  <label class="control-label">Password:</label>
                  <input name="seeker_password" class="form-control input-md" type="password">
                </div>
<div class="">
                  <label class="control-label">Upload CV/Resume</label>
                  <input class="form-control" type="file" name="mFile" id="mFile">
                </div>
<div class="form-group">
      <input name="submtapp" id="submtapp" class="btn btn-success" type="submit" value="SUBMIT APPLICATION">
</div>
</form>
<?php }?> 
<?php if($rowjdet['how_to']=="email") {?>
<h5><strong>Applicants are required to submit application via email provided below.</strong><br/><hr/></h5>
<p><?php echo $rowjdet['submit_email']; ?></p><p><strong><i class="fa fa-box">&nbsp;</i>Email: </strong><?php echo $rowjdet['ademail'];?></p>
<?php }?> 
<?php if($rowjdet['how_to']=="telephone") {?>
<h5><strong>Applicants are requested to make telephone call to the organization.</strong><br/><hr/></h5>
<p><?php echo $rowjdet['submit_call']; ?></p><p><strong><i class="fa fa-phone">&nbsp;</i>Call: </strong><?php echo $rowjdet['adtel'];?></p>
<?php }?> 
<?php if($rowjdet['how_to']=="url") {?>
<h5><strong>Please use the link below to submit application</strong><br/><hr/></h5>
<p><?php echo $rowjdet['submit_link']; ?></p><p><strong><i class="fa fa-link">&nbsp;</i>Follow The Link: </strong><a href="<?php echo$rowjdet['adurl'];?>"><?php echo$rowjdet['adurl'];?></a></p>

<?php }?> 
<?php if($rowjdet['how_to']=="letter") {?>
<h5><strong>Applicants are requested to submit hardcopy application to the organization.</strong><br/><hr/></h5>
<p><?php echo $rowjdet['submit_hardcopy']; ?></p></div></div>

<?php }?>              
</div>
</div>
                </div>
              </div>
               
            <!-- Adds wrapper Start -->
           <div class="adds-wrapper">
<input type="hidden" id="jobidd" value="<?php echo $job__id;?>"/>
<input type="hidden" id="jobcat" value="<?php echo str_replace(' ','-',$jobcat);?>"/>
<div class="loading-div"></div>





<?php
require "configure.php";           // All database details will be included here 

$page_name="../../../../jobs/".str_replace(' ','-',$jobcat)."/".$job__id."/".str_replace(' ','-',$adname); //If you use this code with a different page ( or file ) name then change this 
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
$nume = $dbo->query("select count(*) from advert where adcategory='str_replace('-',' ',$jobcat)' and adid!=$job__id and status='active'")->fetchColumn();
/////// The variable nume above will store the total number of records in the table////

/////////// Now let us print the table headers ////////////////

//echo "<TABLE class='t1'>";
//echo  "<tr><th>ID</th><th>Name</th><th>Class</th><th>Mark</th></tr>";

////////////// Now let us start executing the query with variables $eu and $limit  set at the top of the page///////////
$query=" select * from advert  where adcategory='str_replace('-',' ',$jobcat)' and  adid!=$job__id and status='active' order by dtpostd desc  limit $eu, $limit ";


?> 
<?php

echo "<div class='item-list'>There are $nume similar jobs Available</div>";
	foreach ($dbo->query($query) as $row) {
	$link="../../../../".str_replace(' ','-',"jobs/".$row['adcategory']."/".$row['adid']."/".$row['adname']."/0");
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
              <a href="../../../../post-advert.php" class="btn btn-post btn-danger">Post Job for Free </a>
            </div> 
                
               
          </div>  
              
              
              

            
          </div>
          <!-- Product Info End -->
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
    <script type="text/javascript" src="../../../../assets/js/jquery-min.js"></script>      
    <script type="text/javascript" src="../../../../assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../../../../assets/js/material.min.js"></script>
    <script type="text/javascript" src="../../../../assets/js/material-kit.js"></script>
    <script type="text/javascript" src="../../../../assets/js/jquery.parallax.js"></script>
    <script type="text/javascript" src="../../../../assets/js/owl.carousel.min.js"></script>
    <script type="text/javascript" src="../../../../assets/js/wow.js"></script>
    <script type="text/javascript" src="../../../../assets/js/main.js"></script>
    <script type="text/javascript" src="../../../../assets/js/jquery.counterup.min.js"></script>
    <script type="text/javascript" src="../../../../assets/js/waypoints.min.js"></script>
    <script type="text/javascript" src="../../../../assets/js/jasny-bootstrap.min.js"></script>
    <script type="text/javascript" src="../../../../assets/js/form-validator.min.js"></script>
    <script type="text/javascript" src="../../../../assets/js/contact-form-script.js"></script>    
    <script type="text/javascript" src="../../../../assets/js/jquery.themepunch.revolution.min.js"></script>
    <script type="text/javascript" src="../../../../assets/js/jquery.themepunch.tools.min.js"></script>
    <script src="../../../../assets/js/bootstrap-select.min.js"></script>
  </body>
</html>
