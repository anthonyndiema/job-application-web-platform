<?php
//error_reporting(0);
session_start();
require_once '../class.user.php';
$person=$_SESSION['userSession'];
    // First we execute our common code to connection to the database and start the session
  //$person=$_SESSION['userSession'];
 // At the top of the page we check to see whether the user is logged in or not
  $loc="";
$user_jobs = new USER();
if($user_jobs->is_logged_in()=="")
{
	$user_jobs->redirect('../login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <link rel="apple-touch-icon" sizes="180x180" href="../apple-touch-icon.png">
     <link rel="icon" type="image/png" sizes="32x32" href="../favicon-32x32.png">
     <link rel="icon" type="image/png" sizes="16x16" href="../favicon-16x16.png">
     <link rel="manifest" href="../site.webmanifest">
     <link rel="mask-icon" href="../safari-pinned-tab.svg" color="#ff99f6">
     <meta name="msapplication-TileColor" content="#ff99f6">
     <meta name="theme-color" content="#ff99f6">
    <meta name="keywords" content="">
    <meta name="description" content="">
   <title>Edit your CV</title>

    
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
   <link rel="stylesheet" href="../assets/css/jquery-confirm.css" type="text/css">
      <!-- Animate CSS -->
    <link rel="stylesheet" href="../assets/extras/animate.css" type="text/css">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="../assets/extras/owl.carousel.css" type="text/css">
    <link rel="stylesheet" href="../assets/extras/owl.theme.css" type="text/css">
    <link rel="stylesheet" href="../assets/extras/settings.css" type="text/css">
    <!-- Responsive CSS Styles -->
    <link rel="stylesheet" href="../assets/css/responsive.css" type="text/css">
    <link rel="stylesheet"
          href="../demo/libs/bundled.css">
    <script src="../demo/libs/bundled.js"></script>
        <!-- Bootstrap Select -->
    <link rel="stylesheet" href="../assets/css/bootstrap-select.min.css">  
<script type="text/javascript" src="../pagination/js/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="../assets/js/jquery-confirm.js"></script>
   
 <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-9085745333411810",
    enable_page_level_ads: true
  });
 
</script>
<script type="text/javascript">
$(document).ready(function(){
$("#ccs").click(function(){
if(this.checked){

}
});
$('#profback2').show();
$('#persdet2').hide();
$('#profile2').hide();
$('#acadqual2').hide();
$('#workexp2').hide();
$('#achievresp2').hide();
$('#semworkshop2').hide();
$('#hobbies2').hide();
$('#referees2').hide();
submitreferee();fetchreferees("invalid");submitqualification();fetchqualifications("invalid");submitworkinfo();fetchworkinfo("invalid");savebginfo();savepersonalinfo();submitworkshops();fetchworkshops("invalid");savehobby();fetchhobbies("invalid");saveprof();fetchuserinfo();saveaward();fetchawards("invalid");test();editwork();editreferee();editac();editworkshop();edithobby();editaward();checkcvprogress();updatecvprogress(0,"referees",0);
$('#profback').click(function(){
$('#profback2').show();
$('#persdet2').hide();
$('#profile2').hide();
$('#acadqual2').hide();
$('#workexp2').hide();
$('#achievresp2').hide();
$('#semworkshop2').hide();
$('#hobbies2').hide();
$('#referees2').hide();
$('html,body').animate({scrollTop:$('#profback2').offset().top},'slow');
});
$('#persdet').click(function(){
$('#persdet2').show();
$('#profback2').hide();
$('#profile2').hide();
$('#acadqual2').hide();
$('#workexp2').hide();
$('#achievresp2').hide();
$('#semworkshop2').hide();
$('#hobbies2').hide();
$('#referees2').hide();

$('html,body').animate({scrollTop:$('#persdet2').offset().top},'slow');
});
$('#profile').click(function(){
$('#profile2').show();
$('#persdet2').hide();
$('#profback2').hide();
$('#acadqual2').hide();
$('#workexp2').hide();
$('#achievresp2').hide();
$('#semworkshop2').hide();
$('#hobbies2').hide();
$('#referees2').hide();

$('html,body').animate({scrollTop:$('#profile2').offset().top},'slow');
});
$('#acadqual').click(function(){
$('#acadqual2').show();


$('#persdet2').hide();
$('#profile2').hide();
$('#profback2').hide();
$('#workexp2').hide();
$('#achievresp2').hide();
$('#semworkshop2').hide();
$('#hobbies2').hide();
$('#referees2').hide();
$('html,body').animate({scrollTop:$('#acadqual2').offset().top},'slow');
});
$('#workexp').click(function(){
$('#workexp2').show();
$('#persdet2').hide();
$('#profile2').hide();
$('#acadqual2').hide();
$('#profback2').hide();
$('#achievresp2').hide();
$('#semworkshop2').hide();
$('#hobbies2').hide();
$('#referees2').hide();
$('html,body').animate({scrollTop:$('#workexp2').offset().top},'slow');
});
$('#achievresp').click(function(){
$('#achievresp2').show();
$('#persdet2').hide();
$('#profile2').hide();
$('#acadqual2').hide();
$('#workexp2').hide();
$('#profback2').hide();
$('#semworkshop2').hide();
$('#hobbies2').hide();
$('#referees2').hide();
$('html,body').animate({scrollTop:$('#achievresp2').offset().top},'slow');
});
$('#semworkshop').click(function(){
$('#semworkshop2').show();
$('#persdet2').hide();
$('#profile2').hide();
$('#acadqual2').hide();
$('#workexp2').hide();
$('#achievresp2').hide();
$('#profback2').hide();
$('#hobbies2').hide();
$('#referees2').hide();
$('html,body').animate({scrollTop:$('#semworkshop2').offset().top},'slow');
});
$('#hobbies').click(function(){
$('#hobbies2').show();
$('#persdet2').hide();
$('#profile2').hide();
$('#acadqual2').hide();
$('#workexp2').hide();
$('#achievresp2').hide();
$('#semworkshop2').hide();
$('#profback2').hide();
$('#referees2').hide();
$('html,body').animate({scrollTop:$('#hobbies2').offset().top},'slow');
});
$('#referees').click(function(){
$('#referees2').show();
$('#persdet2').hide();
$('#profile2').hide();
$('#acadqual2').hide();
$('#workexp2').hide();
$('#achievresp2').hide();
$('#semworkshop2').hide();
$('#hobbies2').hide();
$('#profback2').hide();
$('html,body').animate({scrollTop:$('#desplayrefr').offset().top},'slow');
});
});
</script>
<script type="text/javascript">
function fetchuserinfo(){
$.ajax({
url:'fetch_userinfo',
success:function(json){
var user=JSON.parse(json);
$('#fnamein').val(user[0]['fname']);
$('#lnamein').val(user[0]['lname']);
$('#telnoin').val(user[0]['telephone']);
$('#addrin').val(user[0]['address']);
$('#postin').val(user[0]['postalcode']);
$('#townin').val(user[0]['town']);
$('#fname_in').val(user[0]['fname']);
$('#lname_in').val(user[0]['lname']);
$('#sname_in').val(user[0]['sname']);
$('#lang_in').val(user[0]['languages']);
$('#dob_in').val(user[0]['dob']);
$('#profem_in').val(user[0]['profemail']);
$('#gender_in').val(user[0]['gender']);
$('#nationality_in').val(user[0]['nationality']);
$('#civic_in').val(user[0]['civicstat']);
$('#religion_in').val(user[0]['religion']);
$('#abouttxt').val(user[0]['about']);
},
error:function(e){
console.log(e);
}
});
}
function fetchreferees(e){
var refereesTable=$(".newreferees");
$.ajax({
url:'fetch_referees?id='+e,
success:function(json){
var referee=JSON.parse(json);
var result="";
for(var i=0;i<referee.length;i++){
result+="<tr id='addedrowref"+referee[i]['id']+"'><td>"+referee[i]['refereenm']+"</td><td>"+referee[i]['workr']+"</td><td>"+referee[i]['organization']+"</td><td>"+referee[i]['contaddr']+"</td><td>"+referee[i]['contpno']+"</td><td>"+referee[i]['emailaddr']+"</td><td><button type='submit' data-page='"+referee[i]['id']+"' class='btn btn-edit' id='editreferee'><i class='fa fa-pencil'></i></button> <button  id='deletereferee' data-page='"+referee[i]['id']+"' class='btn btn-danger'><i class='fa fa-trash'></i></button></td></tr>";
}
refereesTable.append(result);
}
});
}
function editreferee(){
 $("#refereepanel").on("click", "table tr td #editreferee", function (e) {
     e.preventDefault();
     var cid = $(this).attr("data-page");
     var currentRow=$('#addedrowref'+cid);
    // var role=currentRow.find("td:eq(0)").text();
 $.confirm({
                                        title: 'Please Edit Referees',
                                        theme: 'supervan',
                                        closeIcon: true,
                                        animation: 'scale',
                                        type:'orange',
                                        content: '' +
                                        '<form action="" class="formName">' +
                                        '<input type="hidden" value='+cid+' class="id form-control">' +
                                        '<div class="form-group">' +
                                        '<label>Referee Name (<span class="required">*</span>):</label>' +
                                        '<input type="text" placeholder="name" value="'+currentRow.find("td:eq(0)").text()+'" class="rnm form-control" required />' +
                                        '</div>' +
                                        '<div class="form-group">' +
                                        '<label>Work (<span class="required">*</span>):</label>' +
                                        '<input type="text" placeholder="work" value="'+currentRow.find("td:eq(1)").text()+'" class="work form-control" required />' +
                                        '</div>' +
                                        '<div class="form-group">' +
                                        '<label>Organization (<span class="required">*</span>):</label>' +
                                        '<input type="text" placeholder="organization" value="'+currentRow.find("td:eq(2)").text()+'" class="org form-control" required />' +
                                        '</div>' +
                                        '<div class="form-group">' +
                                        '<label>Contact Address (<span class="required">*</span>):</label>' +
                                        '<input type="text" placeholder="address" value="'+currentRow.find("td:eq(3)").text()+'" class="addr form-control" required />' +
                                        '</div>' +
                                        '<div class="form-group">' +
                                        '<label>Phone Number (<span class="required">*</span>):</label>' +
                                        '<input type="text" placeholder="address" value="'+currentRow.find("td:eq(4)").text()+'" class="pno form-control" required />' +
                                        '</div>' +
                                        '<div class="form-group">' +
                                        '<label>Email Address:</label>' +
                                        '<input type="email" placeholder="email address" value="'+currentRow.find("td:eq(5)").text()+'" class="eml form-control" required />' +
                                        '</div>' +
                                        '</form>',
                                        buttons: {
                                            formSubmit: {
                                                text: 'SAVE',
                                                btnClass: 'btn-blue',
                                                action: function () {
                                                
                                                var id=this.$content.find('.id').val();
                                                var rnm=this.$content.find('.rnm').val();
                                                var work=this.$content.find('.work').val();
                                                var org=this.$content.find('.org').val();
                                                var addr=this.$content.find('.addr').val();
                                                var pno=this.$content.find('.pno').val();
                                                var eml=this.$content.find('.eml').val();
                                                // (<span class="required">*</span>)
                                                if (!rnm||!work||!org||!addr||!pno) {
                                                        $.alert('please fill all required fields indicated by <span class="required">*</span>');
                                                        return false;
                                                }
                                                   
                                                $.ajax({
                                                type:'GET',
                                                url:'update_referee?i='+id+'&rnm='+rnm+'&work='+work+'&org='+org+'&addr='+addr+'&pno='+pno+'&eml='+eml,
                                                success:function(json){
                                                currentRow.find("td:eq(0)").text(rnm);
                                                currentRow.find("td:eq(1)").text(work);
                                                currentRow.find("td:eq(2)").text(org);
                                                currentRow.find("td:eq(3)").text(addr);
                                                currentRow.find("td:eq(4)").text(pno);
                                                currentRow.find("td:eq(4)").text(eml);
                                               $.alert('Changes made successfully');
                                               
                                                }
                                                });
                                                  
                                                }
                                            },
                                            cancel: function () {
                                                //close
                                            },
                                        },
                                        onContentReady: function () {
                                            // you can bind to the form
                                            var jc = this;
                                            this.$content.find('form').on('submit', function (e) { // if the user submits the form by pressing enter in the field.
                                                e.preventDefault();
                                                jc.$$formSubmit.trigger('click'); // reference the button and click it
                                            });
                                        }
                                    });
  
 });
}
function submitworkshops(){
var displayr=$("#workshoploading");
$('#workshopform').submit(function(e){
e.preventDefault();
$.ajax({
type: "POST",
url: "add_update_workshop",
data:$("#workshopform").serialize(),
success: function(results)
{
console.log(results);
fetchworkshops(results);
$.confirm({
        title: 'Success!',
        autoClose: 'okAction|5000',
        content: 'You have added 1 workshop/seminar/training!',
        escapeKey: 'okAction',
        buttons:{
        okAction: {
        text: 'Dismiss',
        action: function () {
        
        }
        }
        }
    });
$('#workshopform').trigger("reset");
},
error: function(results)
{
console.log(results);
displayr.html(results);
}
});
});
}
function fetchworkinfo(e){
var workinfoTable=$(".newworkinfo");

$.ajax({
url:'fetch_workinfo?id='+e,
success:function(json){
var workinfo=JSON.parse(json);
var result="";
for(var i=0;i<workinfo.length;i++){
result+="<tr id='addedrow"+workinfo[i]['workid']+"'><td >"+workinfo[i]['roleplayed']+"</td><td>"+workinfo[i]['organization']+"</td><td>"+workinfo[i]['start_date']+"</td><td>"+workinfo[i]['end_date']+"</td><td>"+workinfo[i]['responsibilities']+"</td><td><button type='submit' data-page='"+workinfo[i]['workid']+"' class='btn btn-edit' id='editwork'><i class='fa fa-pencil'></i></button> <button  id='deletework' data-page='"+workinfo[i]['workid']+"' class='btn btn-danger'><i class='fa fa-trash'></i></button></td></tr>";
}
workinfoTable.append(result);}
});
}
function editwork(){
 $("#workpanel").on("click", "table tr td #editwork", function (e) {
     e.preventDefault();
     var cid = $(this).attr("data-page");
     var currentRow=$('#addedrow'+cid);
    // var role=currentRow.find("td:eq(0)").text();
  var msg="<div class='form-group><input type='text' class='form-control' name='roleplayed' id='roleplayed' value='helloo'/></div><div class='form-group><input type='text' class='form-control' name='roleplayed' id='roleplayed' value='helloo'/></div>";   
     $.confirm({
                                        title: 'Please Edit Work Experience',
                                        theme: 'supervan',
                                        closeIcon: true,
                                        animation: 'scale',
                                        type:'orange',
                                        content: '' +
                                        '<form action="" class="formName">' +
                                        '<input type="hidden" value='+cid+' class="id form-control">' +
                                        '<div class="form-group">' +
                                        '<label>Role Played (<span class="required">*</span>):</label>' +
                                        '<input type="text" placeholder="role played" value="'+currentRow.find("td:eq(0)").text()+'" class="role form-control" required />' +
                                        '</div>' +
                                        '<div class="form-group">' +
                                        '<label>Organization (<span class="required">*</span>):</label>' +
                                        '<input type="text" placeholder="organization" value="'+currentRow.find("td:eq(1)").text()+'" class="org form-control" required />' +
                                        '</div>' +
                                        '<div class="form-group">' +
                                        '<label>Date Begun (<span class="required">*</span>):</label>' +
                                        '<input type="date" placeholder="date begun" value='+currentRow.find("td:eq(2)").text()+' class="sdt form-control" required />' +
                                        '</div>' +
                                        '<div class="form-group">' +
                                        '<label>Date Completed (<span class="required">*</span>):</label>' +
                                        '<input type="date" placeholder="date completed" value='+currentRow.find("td:eq(3)").text()+' class="edt form-control" required />' +
                                        '</div>' +
                                        '<div class="form-group">' +
                                        '<label>Responsibilities (<span class="required">*</span>):</label>' +
                                        '<textarea type="text" placeholder="responsibilities"  class="respo form-control" required>'+currentRow.find("td:eq(4)").text()+'</textarea>' +
                                        '</div>' +
                                        '</form>',
                                        buttons: {
                                            formSubmit: {
                                                text: 'SAVE',
                                                btnClass: 'btn-blue',
                                                action: function () {
                                                var id=this.$content.find('.id').val();
                                                var role=this.$content.find('.role').val();
                                                var org=this.$content.find('.org').val();
                                                var sdt=this.$content.find('.sdt').val();
                                                var edt=this.$content.find('.edt').val();
                                                var respo=this.$content.find('.respo').val();
                                                if (!role||!org||!sdt||!edt||!respo) {
                                                        $.alert('please fill all required fields indicated by <span class="required">*</span>');
                                                        return false;
                                                }
                                                $.ajax({
                                                type:'GET',
                                                url:'update_work2?i='+id+'&r='+role+'&o='+org+'&sdt='+sdt+'&edt='+edt+'&respo='+respo,
                                                success:function(json){
                                                currentRow.find("td:eq(0)").text(role);
                                                currentRow.find("td:eq(1)").text(org);
                                                currentRow.find("td:eq(2)").text(sdt);
                                                currentRow.find("td:eq(3)").text(edt);
                                                currentRow.find("td:eq(4)").text(respo);
                                               $.alert('Changes made successfully');
                                                }
                                                });
                                                 
                                                }
                                            },
                                            cancel: function () {
                                                //close
                                            },
                                        },
                                        onContentReady: function () {
                                            // you can bind to the form
                                            var jc = this;
                                            this.$content.find('form').on('submit', function (e) { // if the user submits the form by pressing enter in the field.
                                                e.preventDefault();
                                                jc.$$formSubmit.trigger('click'); // reference the button and click it
                                            });
                                        }
                                    });
  
 });
}
function downloadcv(){
$.ajax({
type:'GET',
url:"check-cv-completion",
success:function(result){
var res=JSON.parse(result);
var rate=res[0]["rate"];
if(rate!=100){
$.alert("Please complete cv efore downloading");
}
else{
$(location).attr('href',"http://tony/jobboard2/opportunity-dashboard/download");
}
},
error:function(result){
}
});

}
//workpanel table tr
function test(){
 $("#workpanel").on("click", "table tr td #deletework", function (e) {
 
     e.preventDefault();
     var cid = $(this).attr("data-page");
         $.confirm({
         title:'Are you sure you want to proceed?',
         content:'',
         theme:'modern',
         
        buttons: {
            Delete: {
            text:'Delete',
            
            action:function(){
            $.ajax({
  url:"deletework?id="+cid,
  success:function(json){
  $('#addedrow'+cid).remove();
  
  }
  });
            }
            },
            Cancel: function(){}
        }
    }); 
 });
  $("#workshoppanel").on("click", "table tr td #deleteworkshop", function (e) {
 
     e.preventDefault();
     var cid = $(this).attr("data-page");
         $.confirm({
         title:'Are you sure you want to proceed?',
         content:'',
         theme:'modern',
         
        buttons: {
            Delete: {
            text:'Delete',
            
            action:function(){
            $.ajax({
  url:"deleteworkshop?id="+cid,
  success:function(json){
  $('#addedrows2'+cid).remove();
  
  }
  });
            }
            },
            Cancel: function(){}
        }
    }); 
 });
  $("#refereepanel").on("click", "table tr td #deletereferee", function (e) {
 
     e.preventDefault();
     var cid = $(this).attr("data-page");
         $.confirm({
         title:'Are you sure you want to proceed?',
         content:'',
         theme:'modern',
         
        buttons: {
            Delete: {
            text:'Delete',
            
            action:function(){
            $.ajax({
  url:"deletereferee?id="+cid,
  success:function(json){
  updatecvprogress(-10,"referees",parseInt($("#refereesxx").val())-1);
  $('#addedrowref'+cid).remove();
  
  }
  });
            }
            },
            Cancel: function(){}
        }
    }); 
 });
  $("#acpanel").on("click", "table tr td #deleteac", function (e) {
 
     e.preventDefault();
     var cid = $(this).attr("data-page");
         $.confirm({
         title:'Are you sure you want to proceed?',
         content:'',
         theme:'modern',
         
        buttons: {
            Delete: {
            text:'Delete',
            
            action:function(){
            $.ajax({
  url:"deleteac?id="+cid,
  success:function(json){
  var qualification=parseInt($("#qualification").val());
  if(qualification>=3)
  {
  updatecvprogress(0,"qualification",qualification-1);
  }
  else{
  updatecvprogress(-10,"qualification",qualification-1);
  }
  $('#addedrow'+cid).remove();
  
  }
  });
            }
            },
            Cancel: function(){}
        }
    }); 
 });
  $("#awardpanel").on("click", "table tr td #deleteaward", function (e) {
 
     e.preventDefault();
     var cid = $(this).attr("data-page");
         $.confirm({
         title:'Are you sure you want to proceed?',
         content:'',
         theme:'modern',
         
        buttons: {
            Delete: {
            text:'Delete',
            
            action:function(){
            $.ajax({
  url:"deleteaward?id="+cid,
  success:function(json){
  $('#addedrows'+cid).remove();
  
  }
  });
            }
            },
            Cancel: function(){}
        }
    }); 
 });
  $("#hobbypanel").on("click", "table tr td #deletehobby", function (e) {
 
     e.preventDefault();
     var cid = $(this).attr("data-page");
         $.confirm({
         title:'Are you sure you want to proceed?',
         content:'',
         theme:'modern',
         
        buttons: {
            Delete: {
            text:'Delete',
            
            action:function(){
            $.ajax({
  url:"deletehobby?id="+cid,
  success:function(json){
  $('#addedrow'+cid).remove();
  
  }
  });
            }
            },
            Cancel: function(){}
        }
    }); 
 });
}

function fetchworkshops(e){
var workshoptable=$(".workshoptable");

$.ajax({
url:'fetch_workshops?id='+e,
success:function(json){
//alert(json);
var workshop=JSON.parse(json);
var result="";
for(var i=0;i<workshop.length;i++){
result+="<tr id='addedrows2"+workshop[i]['id']+"'><td>"+workshop[i]['theme']+"</td><td>"+workshop[i]['datestart']+"</td><td>"+workshop[i]['dateend']+"</td><td>"+workshop[i]['skills']+"</td><td><button type='submit' data-page='"+workshop[i]['id']+"' class='btn btn-edit' id='editworkshop'><i class='fa fa-pencil'></i></button> <button  id='deleteworkshop' data-page='"+workshop[i]['id']+"' class='btn btn-danger'><i class='fa fa-trash'></i></button></td></tr>";
}
workshoptable.append(result);
}
});
}
function editworkshop(){
 $("#workshoppanel").on("click", "table tr td #editworkshop", function (e) {
     e.preventDefault();
     var cid = $(this).attr("data-page");
     var currentRow=$('#addedrows2'+cid);
    // var role=currentRow.find("td:eq(0)").text();
  var msg="<div class='form-group><input type='text' class='form-control' name='roleplayed' id='roleplayed' value='helloo'/></div><div class='form-group><input type='text' class='form-control' name='roleplayed' id='roleplayed' value='helloo'/></div>";   
     $.confirm({
                                        title: 'Please Edit Work Shop',
                                        theme: 'supervan',
                                        closeIcon: true,
                                        animation: 'scale',
                                        type:'orange',
                                        content: '' +
                                        '<form action="" class="formName">' +
                                        '<input type="hidden" value='+cid+' class="id form-control">' +
                                        '<div class="form-group">' +
                                        '<label>Theme (<span class="required">*</span>):</label>' +
                                        '<input type="text" placeholder="theme" value="'+currentRow.find("td:eq(0)").text()+'" class="theme form-control" required />' +
                                        '</div>' +
                                        '<div class="form-group">' +
                                        '<label>Date Begun (<span class="required">*</span>):</label>' +
                                        '<input type="date" placeholder="date begun" value='+currentRow.find("td:eq(1)").text()+' class="sdt form-control" required />' +
                                        '</div>' +
                                        '<div class="form-group">' +
                                        '<label>Date Completed:</label>' +
                                        '<input type="date" placeholder="date completed" value='+currentRow.find("td:eq(2)").text()+' class="edt form-control" required />' +
                                        '</div>' +
                                        '<div class="form-group">' +
                                        '<label>Skills (<span class="required">*</span>):</label>' +
                                        '<input type="text" placeholder="skills" value="'+currentRow.find("td:eq(3)").text()+'" class="skills form-control" required />' +
                                        '</div>' +
                                        '</form>',
                                        buttons: {
                                            formSubmit: {
                                                text: 'SAVE',
                                                btnClass: 'btn-blue',
                                                action: function () {
                                                var id=this.$content.find('.id').val();
                                                var theme=this.$content.find('.theme').val();
                                                var sdt=this.$content.find('.sdt').val();
                                                var edt=this.$content.find('.edt').val();
                                                var skills=this.$content.find('.skills').val();
                                                //  (<span class="required">*</span>)
                                                if (!theme||!sdt||!skills) {
                                                        $.alert('please fill all required fields indicated by <span class="required">*</span>');
                                                        return false;
                                                }
                                                $.ajax({
                                                type:'GET',
                                                url:'update_workshop?i='+id+'&theme='+theme+'&sdt='+sdt+'&edt='+edt+'&skills='+skills,
                                                success:function(json){
                                                currentRow.find("td:eq(0)").text(theme);
                                                currentRow.find("td:eq(1)").text(sdt);
                                                currentRow.find("td:eq(2)").text(edt);
                                                currentRow.find("td:eq(3)").text(skills);
                                               $.alert('Changes made successfully');
                                                }
                                                });
                                                 
                                                }
                                            },
                                            cancel: function () {
                                                //close
                                            },
                                        },
                                        onContentReady: function () {
                                            // you can bind to the form
                                            var jc = this;
                                            this.$content.find('form').on('submit', function (e) { // if the user submits the form by pressing enter in the field.
                                                e.preventDefault();
                                                jc.$$formSubmit.trigger('click'); // reference the button and click it
                                            });
                                        }
                                    });
  
 });
}
 function fetchqualifications(e){
var refereesTable=$(".newqualification");

$.ajax({
url:'fetch_qualifications?id='+e,
success:function(json){
//alert(json);
var referee=JSON.parse(json);
var result="";
for(var i=0;i<referee.length;i++){
result+="<tr id='addedrow"+referee[i]['acid']+"'><td>"+referee[i]['institution']+"</td><td>"+referee[i]['courseinfo']+"</td><td>"+referee[i]['start_date']+"</td><td>"+referee[i]['end_date']+"</td><td>"+referee[i]['qualification']+"</td><td>"+referee[i]['skills']+"</td><td><button type='submit' data-page='"+referee[i]['acid']+"' class='btn btn-edit' id='editac'><i class='fa fa-pencil'></i></button> <button  id='deleteac' data-page='"+referee[i]['acid']+"' class='btn btn-danger'><i class='fa fa-trash'></i></button></td></tr>";
}
refereesTable.append(result);
}
});
}
function editac(){
 $("#acpanel").on("click", "table tr td #editac", function (e) {
     e.preventDefault();
     var cid = $(this).attr("data-page");
     var currentRow=$('#addedrow'+cid);
   
  var msg="<div class='form-group><input type='text' class='form-control' name='roleplayed' id='roleplayed' value='helloo'/></div><div class='form-group><input type='text' class='form-control' name='roleplayed' id='roleplayed' value='helloo'/></div>";   
     $.confirm({
                                        title: 'Please Edit Academic Qualification',
                                        theme: 'supervan',
                                        closeIcon: true,
                                        animation: 'scale',
                                        type:'orange',
                                        content: '' +
                                        '<form action="" class="formName">' +
                                        '<input type="hidden" value='+cid+' class="id form-control">' +
                                        '<div class="form-group">' +
                                        //inst,course,sdt,edt,qual,skills
                                        '<label>Institution  (<span class="required">*</span>):</label>' +
                                        '<input type="text" placeholder="institution" value="'+currentRow.find("td:eq(0)").text()+'" class="inst form-control" required />' +
                                        '</div>' +
                                        '<div class="form-group">' +
                                        '<label>Course Studied  (<span class="required">*</span>):</label>' +
                                        '<input type="text" placeholder="course" value="'+currentRow.find("td:eq(1)").text()+'" class="course form-control" required />' +
                                        '</div>' +
                                        '<div class="form-group">' +
                                        '<label>Commence Date  (<span class="required">*</span>):</label>' +
                                        '<input type="date" placeholder="date begun" value='+currentRow.find("td:eq(2)").text()+' class="sdt form-control" required />' +
                                        '</div>' +
                                        '<div class="form-group">' +
                                        '<label>Graduation Date:</label>' +
                                        '<input type="date" placeholder="date completed" value='+currentRow.find("td:eq(3)").text()+' class="edt form-control" required />' +
                                        '</div>' +
                                        '<div class="form-group">' +
                                        '<label>Qualification  (<span class="required">*</span>):</label>' +
                                        '<input type="text" placeholder="e.g attained KCSE grade B" value="'+currentRow.find("td:eq(4)").text()+'" class="qual form-control" required />' +
                                        '</div>' +
                                        '<div class="form-group">' +
                                        '<label>Skills:</label>' +
                                        '<input type="text" placeholder="skills" value="'+currentRow.find("td:eq(5)").text()+'" class="skills form-control" required />' +
                                        '</div>' +
                                        '</form>',
                                        buttons: {
                                            formSubmit: {
                                                text: 'SAVE',
                                                btnClass: 'btn-blue',
                                                action: function () {
                                                var id=this.$content.find('.id').val();
                                                var inst=this.$content.find('.inst').val();
                                                var course=this.$content.find('.course').val();
                                                var sdt=this.$content.find('.sdt').val();
                                                var edt=this.$content.find('.edt').val();
                                                var qual=this.$content.find('.qual').val();
                                                var skills=this.$content.find('.skills').val();
                                                 //  (<span class="required">*</span>)
                                                if (!inst||!course||!sdt||!qual) {
                                                        $.alert('please fill all required fields indicated by <span class="required">*</span>');
                                                        return false;
                                                }
                                                $.ajax({
                                                type:'GET',
                                                url:'update_ac?i='+id+'&inst='+inst+'&course='+course+'&sdt='+sdt+'&edt='+edt+'&qual='+qual+'&skills='+skills,
                                                success:function(json){
                                                currentRow.find("td:eq(0)").text(inst);
                                                currentRow.find("td:eq(1)").text(course);
                                                currentRow.find("td:eq(2)").text(sdt);
                                                currentRow.find("td:eq(3)").text(edt);
                                                currentRow.find("td:eq(4)").text(qual);
                                                currentRow.find("td:eq(5)").text(skills);
                                               $.alert('Changes made successfully');
                                                }
                                                });
                                                  /*  var role = this.$content.find('.role').val();
                                                    if (!role) {
                                                        $.alert('provide a valid role');
                                                        return false;
                                                    }
                                                    $.alert('Your role was ' + role);*/
                                                }
                                            },
                                            cancel: function () {
                                                //close
                                            },
                                        },
                                        onContentReady: function () {
                                            // you can bind to the form
                                            var jc = this;
                                            this.$content.find('form').on('submit', function (e) { // if the user submits the form by pressing enter in the field.
                                                e.preventDefault();
                                                jc.$$formSubmit.trigger('click'); // reference the button and click it
                                            });
                                        }
                                    });
  
 });
}
 function submitqualification(){

 var displayr=$("#desplayqual");
$('#qualform').submit(function(e){
e.preventDefault();
var qualification=parseInt($("#qualification").val());
 $.ajax({
 type: "POST",
 url: "add_update_qualification",
 data:$("#qualform").serialize(),
 success: function(results)
 {
 if(qualification<=1){
 qualification+=1;
 updatecvprogress(10,"qualification",qualification);
 }
 else{
 qualification+=1;
 updatecvprogress(0,"qualification",qualification);
 }
 console.log(results);
 fetchqualifications(results);
$.confirm({
        title: 'Success!',
        autoClose: 'okAction|5000',
        content: 'You have added 1 academic qualification!',
        escapeKey: 'okAction',
        buttons:{
        okAction: {
        text: 'Dismiss',
        action: function () {
        
        }
        }
        }
    });
 $('#qualform').trigger("reset");

 },
 error: function(results)
 {
 
 console.log(results);
 
 displayr.html(results);

 }
 });
});
 }

function submitworkinfo(){

var displayr=$("#desplaywork");
$('#workform').submit(function(e){
e.preventDefault();
 $.ajax({
 type: "POST",
 url: "add_update_work",
 data:$("#workform").serialize(),
 success: function(results)
 {
 console.log(results);
 fetchworkinfo(results);
     $.confirm({
        title: 'Success!',
        autoClose: 'okAction|5000',
        content: 'You have added 1 job experience!',
        escapeKey: 'okAction',
        buttons:{
        okAction: {
        text: 'Dismiss',
        action: function () {
        
        }
        }
        }
    });
 $('#workform').trigger("reset");

 },
 error: function(results)
 {
 
 console.log(results);
 
 displayr.html(results);

 }
 });
});
}
 
 function saveprof(){
 var displayr=$("#aboutprogress");
 $('#aboutform').submit(function(e){
 e.preventDefault();
 var profile=$("#profile").val();
 var prf=$();
 $.ajax({
 type: "POST",
 url: "update_profile",
 data:$("#aboutform").serialize(),
 success: function(results)
 {
 if(profile==""){
 updatecvprogress(10,"profile","yes");
 }
 $.confirm({
        title: 'Success!',
        autoClose: 'okAction|5000',
        content: 'You have edited your profile information!',
        escapeKey: 'okAction',
        buttons:{
        okAction: {
        text: 'Dismiss',
        action: function () {
        
        }
        }
        }
    });
 },
 error: function(results)
 {
 
 console.log(results);
 displayr.html(results);
 
 }
 });
 });
 }
//desplaypersonalinfo,personalinfoform
function savepersonalinfo(){

var displayr=$("#desplaypersonalinfo");
$('#personalinfoform').submit(function(e){
e.preventDefault();
var personal=$('#personal').val();
 $.ajax({
 type: "POST",
 url: "update_personalinfo",
 data:$("#personalinfoform").serialize(),
 success: function(results)
 {
 console.log(results);
 if(personal==""){
 updatecvprogress(20,"personal","yes");
 }
$.confirm({
        title: 'Success!',
        autoClose: 'okAction|5000',
        content: 'You have edited your personal information!',
        escapeKey: 'okAction',
        buttons:{
        okAction: {
        text: 'Dismiss',
        action: function () {
        
        }
        }
        }
    });

 },
 error: function(results)
 {
 
 console.log(results);
 
 displayr.html(results);

 }
 });
});
}

function updatecvprogress(value,type,status){
$.ajax({
type:'GET',
url:"update_cvcomp?rate="+value+"&type="+type+"&status="+status,

success:function(result){
checkcvprogress();
}
});
}

function checkcvprogress(){
var displayrate=$("#displaycvrate");
displayrate.html("<i class='fa fa-download'></i> DOWNLOAD CV");
$.ajax({
type:'GET',
url:"check-cv-completion",
success:function(result){
console.log(result);
var res=JSON.parse(result);
var rt=res[0]["rate"];
$("#background").val(res[0]["background"]);
$("#personal").val(res[0]["personal"]);
$("#refereesxx").val(res[0]["referees"]);
$("#profile").val(res[0]["profile"]);
$("#qualification").val(res[0]["qualification"]);
displayrate.html("<i class='fa fa-download'></i> DOWNLOAD CV ("+rt+" % complete)");
}
});
}

function savebginfo(){

var displayr=$("#desplaybg");
$('#bginfoform').submit(function(e){

e.preventDefault();
var backgroundxx=$('#background').val();
 $.ajax({
 type: "POST",
 url: "update_bginfo",
 data:$("#bginfoform").serialize(),
 success: function(results)
 {
 if(backgroundxx==""){
 updatecvprogress(20,"background","yes");
 }	
 
 
 console.log(results);
 $.confirm({
        title: 'Success!',
        autoClose: 'okAction|5000',
        content: 'You have edited your background information!',
        escapeKey: 'okAction',
        buttons:{
        okAction: {
        text: 'Dismiss',
        action: function () {
        
        }
        }
        }
    });
 },
 error: function(results)
 {
 
 console.log(results);
 
 displayr.html(results);

 }
 });
});
}
 //awardprogress,awardtable,awardform,award,awarddate
 
 function fetchawards(e){
 var awardTable=$(".awardtable");

$.ajax({
url:'fetch_awards?id='+e,
success:function(json){
//alert(json);
var award=JSON.parse(json);
var result="";
for(var i=0;i<award.length;i++){
result+="<tr id='addedrows"+award[i]['id']+"'><td>"+award[i]['award']+"</td><td>"+award[i]['date']+"</td><td><button type='submit' data-page='"+award[i]['id']+"' class='btn btn-edit' id='editaward'><i class='fa fa-pencil'></i></button> <button  id='deleteaward' data-page='"+award[i]['id']+"' class='btn btn-danger'><i class='fa fa-trash'></i></button></td></tr>";
}
awardTable.append(result);
}
});
 }
function editaward(){
 $("#awardpanel").on("click", "table tr td #editaward", function (e) {
     e.preventDefault();
     var cid = $(this).attr("data-page");
     var currentRow=$('#addedrows'+cid);
    $.confirm({
                                        title: 'Please Edit Award',
                                        theme: 'supervan',
                                        closeIcon: true,
                                        animation: 'scale',
                                        type:'orange',
                                        content: '' +
                                        '<form action="" class="formName">' +
                                        '<input type="hidden" value='+cid+' class="id form-control">' +
                                        '<div class="form-group">' +
                                        //inst,course,sdt,edt,qual,skills
                                        '<label>Award  (<span class="required">*</span>):</label>' +
                                        '<input type="text" placeholder="Award/Achievement" value="'+currentRow.find("td:eq(0)").text()+'" class="award form-control" required />' +
                                        '</div>' +
                                        '<div class="form-group">' +
                                        '<label>Award Date  (<span class="required">*</span>):</label>' +
                                        '<input type="date" placeholder="date" value="'+currentRow.find("td:eq(1)").text()+'" class="dt form-control" required />' +
                                        '</div>' +
                                        
                                        '</form>',
                                        buttons: {
                                            formSubmit: {
                                                text: 'SAVE',
                                                btnClass: 'btn-blue',
                                                action: function () {
                                                var id=this.$content.find('.id').val();
                                                var award=this.$content.find('.award').val();
                                                var dt=this.$content.find('.dt').val();
                                                //  (<span class="required">*</span>)
                                                if (!award||!dt) {
                                                  $.alert('please fill all required fields indicated by <span class="required">*</span>');
                                                  return false;
                                                }
                                                $.ajax({
                                                type:'GET',
                                                url:'update_award?i='+id+'&award='+award+'&dt='+dt,
                                                success:function(json){
                                                currentRow.find("td:eq(0)").text(award);
                                                currentRow.find("td:eq(1)").text(dt);
                                               $.alert('Changes made successfully');
                                                }
                                                });
                                                 
                                                }
                                            },
                                            cancel: function () {
                                                //close
                                            },
                                        },
                                        onContentReady: function () {
                                            // you can bind to the form
                                            var jc = this;
                                            this.$content.find('form').on('submit', function (e) { // if the user submits the form by pressing enter in the field.
                                                e.preventDefault();
                                                jc.$$formSubmit.trigger('click'); // reference the button and click it
                                            });
                                        }
                                    });
  
 });
}
function fetchhobbies(e){
var hobbyTable=$(".hobbytable");

$.ajax({
url:'fetch_hobbies?id='+e,
success:function(json){
//alert(json);
var hobby=JSON.parse(json);
var result="";
for(var i=0;i<hobby.length;i++){
result+="<tr id='addedrow"+hobby[i]['id']+"'><td>"+hobby[i]['hobby']+"</td><td><button type='submit' data-page='"+hobby[i]['id']+"' class='btn btn-edit' id='edithobby'><i class='fa fa-pencil'></i></button> <button  id='deletehobby' data-page='"+hobby[i]['id']+"' class='btn btn-danger'><i class='fa fa-trash'></i></button></td></tr>";
}
hobbyTable.append(result);
}
});
}
function edithobby(){
 $("#hobbypanel").on("click", "table tr td #edithobby", function (e) {
     e.preventDefault();
     var cid = $(this).attr("data-page");
     var currentRow=$('#addedrow'+cid);
    // var role=currentRow.find("td:eq(0)").text();
  var msg="<div class='form-group><input type='text' class='form-control' name='roleplayed' id='roleplayed' value='helloo'/></div><div class='form-group><input type='text' class='form-control' name='roleplayed' id='roleplayed' value='helloo'/></div>";   
     $.confirm({
                                        title: 'Edit Your Hobby',
                                        theme: 'supervan',
                                        closeIcon: true,
                                        animation: 'scale',
                                        type:'orange',
                                        content: '' +
                                        '<form action="" class="formName">' +
                                        '<input type="hidden" value='+cid+' class="id form-control">' +
                                        '<div class="form-group">' +
                                        //inst,course,sdt,edt,qual,skills
                                        '<label>Hobby (<span class="required">*</span>):</label>' +
                                        '<input type="text" placeholder="hobby" value="'+currentRow.find("td:eq(0)").text()+'" class="hobby form-control" required />' +
                                        '</div>' +
                                        
                                        '</form>',
                                        buttons: {
                                            formSubmit: {
                                                text: 'SAVE',
                                                btnClass: 'btn-blue',
                                                action: function () {
                                                var id=this.$content.find('.id').val();
                                                var hobby=this.$content.find('.hobby').val();
                                                  if (!hobby) {
                                                  $.alert('please fill all required fields indicated by <span class="required">*</span>');
                                                  return false;
                                                }
                                                $.ajax({
                                                type:'GET',
                                                url:'update_hobby?i='+id+'&hobby='+hobby,
                                                success:function(json){
                                                currentRow.find("td:eq(0)").text(hobby);
                                               $.alert('Changes made successfully');
                                                }
                                                });
                                                }
                                            },
                                            cancel: function () {
                                                //close
                                            },
                                        },
                                        onContentReady: function () {
                                            // you can bind to the form
                                            var jc = this;
                                            this.$content.find('form').on('submit', function (e) { // if the user submits the form by pressing enter in the field.
                                                e.preventDefault();
                                                jc.$$formSubmit.trigger('click'); // reference the button and click it
                                            });
                                        }
                                    });
  
 });
}
 function saveaward(){
 var displayr=$("#awardprogress");
$('#awardform').submit(function(e){
e.preventDefault();
 $.ajax({
 type: "POST",
 url: "add_award",
 data:$("#awardform").serialize(),
 success: function(results)
 {
 console.log(results);
 fetchawards(results);
 $.confirm({
        title: 'Success!',
        autoClose: 'okAction|5000',
        content: 'You have added 1 achievement!',
        escapeKey: 'okAction',
        buttons:{
        okAction: {
        text: 'Dismiss',
        action: function () {
        
        }
        }
        }
    });
 $('#awardform').trigger("reset");
 },
 error: function(results)
 {
 console.log(results);
 displayr.html(results);
 }
 });
});
 }
function savehobby(){
var displayr=$("#hobbyprogress");
$('#hobbyform').submit(function(e){
e.preventDefault();
 $.ajax({
 type: "POST",
 url: "add_hobby",
 data:$("#hobbyform").serialize(),
 success: function(results)
 {
 console.log(results);
 fetchhobbies(results);
 $.confirm({
        title: 'Success!',
        autoClose: 'okAction|5000',
        content: 'You have added 1 hobby!',
        escapeKey: 'okAction',
        buttons:{
        okAction: {
        text: 'Dismiss',
        action: function () {
        
        }
        }
        }
    });
 $('#hobbyform').trigger("reset");
 },
 error: function(results)
 {
 console.log(results);
 displayr.html(results);
 }
 });
});
}
function submitreferee(){
var displayr=$("#desplayrefr");
$('#savereferee').submit(function(e){
e.preventDefault();
var referees=parseInt($("#refereesxx").val());
if(referees<=2){
 $.ajax({
 type: "POST",
 url: "add_update_referee",
 data:$("#savereferee").serialize(),
 success: function(results)
 {
 console.log(results);

 fetchreferees(results);
 $.confirm({
        title: 'Success!',
        autoClose: 'okAction|5000',
        content: 'You have added 1 referee!',
        escapeKey: 'okAction',
        buttons:{
        okAction: {
        text: 'Dismiss',
        action: function () {
        
        }
        }
        }
    });
    
 $('#savereferee').trigger("reset");
if(referees==0){
 updatecvprogress(10,"referees",1);
 
} 
else if(referees==1){
updatecvprogress(10,"referees",referees+1);
 }
else if(referees==2){
updatecvprogress(10,"referees",referees+1);
 }
 },
 error: function(results)
 {
 
 console.log(results);
 
 displayr.html(results);

 }
 });}
 else{$.alert("Error! Maximum referee limit has been reached");}
});
}
</script>
  </head>

  <body> 
 
     
    <!-- Header Section Start -->
    <div class="header">    
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
              <li><a href="#" class="active">EDIT CURRICULUM VITAE</a></li>
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
           <div class="inner-box">
              <div class="usearadmin">
               <center><h3><a href="#"><!--<img class="userimg" src="assets/img/user.jpg" alt="">--> EDIT YOUR CV</a></h3></center>
              </div>
            </div>
           <div class="col-sm-3 page-sideabr">
           <aside>
           <div class="inner-box">
                <div class="user-panel-sidebar">
                <!--collapse box-->
                <div class="collapse-box">
                    <h5 class="collapset-title no-border">DOWNLOAD CV <a aria-expanded="true" class="pull-right" data-toggle="collapse" href="#myhome"><i class="fa fa-angle-down"></i></a></h5>
                    <div aria-expanded="true" id="myhome" class="panel-collapse collapse in">
                      <ul class="acc-list">
                        
                        <li class="active">
                          <a onclick="downloadcv();"  id="displaycvrate"><i class="fa fa-download"></i> DOWNLOAD CV</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <!--end of collapse box-->
                  <!--collapse box-->
                <div class="collapse-box">
                    <h5 class="collapset-title no-border">EDIT CV <a aria-expanded="true" class="pull-right" data-toggle="collapse" href="#cvedit"><i class="fa fa-angle-down"></i></a></h5>
                    <div aria-expanded="true" id="cvedit" class="panel-collapse collapse in">
                      <ul class="acc-list">
                        <li class="actives">
                          <a id="profback">Professional Background</a>
                        </li>
                        <li class="actives">
                          <a  id="persdet">Personal Details</a>
                        </li>
                        <li class="actives">
                          <a  id="profile">Profile</a>
                        </li>
                        <li class="actives">
                          <a  id="acadqual">Academic Qualification</a>
                        </li>
                        <li class="actives">
                          <a  id="workexp">Work Experience</a>
                        </li>
                        <li class="actives">
                          <a id="achievresp">Achievements & Responsibilities</a>
                        </li>
                        <li class="actives">
                          <a id="semworkshop">Seminars,Workshops & Conferences Attended</a>
                        </li>
                        
                        <li class="actives">
                          <a id="hobbies">Hobbies</a>
                        </li>
                        
                        <li class="actives">
                          <a id="referees">Referees</a>
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
          
          
          
          <div class="col-sm-9 page-content">
            
            <div id="profback2">
              <div class="welcome-msg">
                <h3 class="page-sub-header2 clearfix no-padding">Edit Your Professional Background</h3>
               <!-- <span class="page-sub-header-sub small">You last logged in at: 01-03-2017 12:40 AM [UK time (GMT + 6:00hrs)]</span> -->
              </div>
              <div id="accordion" class="panel-group">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title"> <a href="#collapseB1" data-toggle="collapse"> Please fill the form below </a> </h4>
                  </div>
                  <div class="panel-collapse collapse in" id="collapseB1">
                    <div class="panel-body">
                    <div id="desplaybg"></div>
                    <input type="hidden" id="background"/>
                      <form id="bginfoform" method="post">
                        <div class="form-group">
                        
                          <label class="control-label">First Name:</label>
                          <input class="form-control" id="fnamein" name="fnamein" placeholder="type first name" required="required" type="text">
                        </div>
                        <div class="form-group">
                          <label class="control-label">Last name:</label>
                          <input class="form-control" id="lnamein" name="lnamein" placeholder="type last name" required="required" type="text">
                        </div>
                       <div class="form-group">
                          <label class="control-label">Telephone/Mobile Number:</label>
                          <input class="form-control" id="telnoin" name="telnoin" placeholder="type tel no." required="required" type="tel">
                        </div>
                        <div class="form-group">
                          <label class="control-label">Address</label>
                          <input class="form-control" id="addrin" name="addrin" placeholder="type address" required="required" type="text">
                        </div>
                        <div class="form-group">
                          <label for="Phone" class="control-label">Zip/Postal Code</label>
                          <input class="form-control" id="postin" name="postin" placeholder="e.g 20100" required="required" type="number">
                        </div>
                        <div class="form-group">
                          <label class="control-label">Town</label>
                          <input class="form-control" id="townin" name="townin" placeholder="e.g. Nairobi"  required="required" type="text">
                        </div>
                       
                        <div class="form-group">
                          <button type="submit" name="savebginfobtn" class="btn btn-common">SAVE BACKGROUND INFORMATION</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                
              </div>
              </div>
              
              
              
              
              <div id="persdet2">
              <div class="welcome-msg">
                <h3 class="page-sub-header2 clearfix no-padding">Edit Personal Information</h3>
               <!-- <span class="page-sub-header-sub small">You last logged in at: 01-03-2017 12:40 AM [UK time (GMT + 6:00hrs)]</span> -->
              </div>
              <div id="accordion" class="panel-group">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title"> <a href="#collapseB1" data-toggle="collapse"> Please fill the form below </a> </h4>
                  </div>
                  <div class="panel-collapse collapse in" id="collapseB1">
                    <div class="panel-body">
                    
                    <div id="desplaypersonalinfo"></div>
                      <form id="personalinfoform" method="post">
                       <input type="hidden" id="personal"/>
                       <div class="form-group">
                          <label class="control-label">Sur Name</label>
                          <input class="form-control" id="sname_in" name="sname_in" placeholder="type sur name"  required="required" type="text">
                        </div>
                        <div class="form-group">
                          <label class="control-label">Languages (optional)</label>
                          <input class="form-control" id="lang_in" name="lang_in" placeholder="type languages spoken" type="text">
                        </div>
                        
                        <div class="form-group">
                          <label class="control-label">Religion (optional)</label>
                          <input class="form-control" id="religion_in" name="religion_in" placeholder="type religion" type="text">
                        </div>
                        <div class="form-group">
                          <label class="control-label">Date of Birth</label>
                          <input class="form-control" id="dob_in" name="dob_in" placeholder="type date of birth"  required="required" type="date">
                        </div>
                        <div class="form-group">
                          <label class="control-label">Email</label>
                          <input class="form-control" id="profem_in" name="profem_in" placeholder="type email"  required="required" type="email">
                        </div>
                        <div class="form-group">
                          <label class="control-label">Gender</label>
                          <select class="form-control" id="gender_in" name="gender_in" required="required">
                          <option value="">Select Gender</option>
                          <option value="male">MALE</option>
                          <option value="female">FEMALE</option>
                          </select>
                          
                        </div>
                        <div class="form-group">
                          <label for="Phone" class="control-label">Nationality</label>
                          <input class="form-control" id="nationality_in" name="nationality_in" placeholder="type nationality" type="text" required="required">
                        </div>
                        <div class="form-group">
                        <label class="control-label">Civic Status (<i>Optional</i>)</label>
                          <select class="form-control" id="civic_in" name="civic_in">
                          <option value="single">SINGLE</option>
                          <option value="married">MARRIED</option>
                          <option value="divorced">DIVORCED</option>
                          <option value="separated">SEPARATED</option>
                          <option value="widowed">WIDOWED</option>
                          </select>
                         
                        </div>
                        
                        <div class="form-group">
                          <button type="submit" class="btn btn-common">UPDATE PERSONAL INFORMATION</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                
              </div>
              </div>
              
              
              
              
              <div id="profile2">
              <div class="welcome-msg">
                <h3 class="page-sub-header2 clearfix no-padding">Edit Profile Details</h3>
               <!-- <span class="page-sub-header-sub small">You last logged in at: 01-03-2017 12:40 AM [UK time (GMT + 6:00hrs)]</span> -->
              </div>
              <div id="accordion" class="panel-group">
                <div class="panel panel-default">
                  <div class="panel-collapse collapse in" id="collapseB1">
                  
                    <div id="aboutprogress"></div>
                    <table class="abouttable table table-search2 table-responsive">
                    <tr class="search-header"><th colspan="2">PROFESSIONAL PROFILE:</th></tr>
                    <form id="aboutform" method="post">
                    <tr>
                    
                    <td><div class="form-group">
                          <input type="hidden" id="profile"/>
                          <textarea class="form-control" id="abouttxt" name="abouttxt" placeholder="e.g. I am Self motivated, goal-oriented, high achiever, innovative, organized,  etc. My objective/vision is to..." type="text" required="required"></textarea>
                        </div></td>
                    <td><button  type="submit" class="btn btn-common btn-about"><i class="fa fa-pencil"></i>SAVE</button></td>
                    
                    </tr>
                    </form>
                    
                    </table>
                      
                  </div>
                </div>
                
              </div>
              </div>
              
              
              
              
              <div class="inner-box" id="acadqual2">
              <div class="welcome-msg">
                <h3 class="page-sub-header2 clearfix no-padding">Edit Academic Qualification</h3>
               <!-- <span class="page-sub-header-sub small">You last logged in at: 01-03-2017 12:40 AM [UK time (GMT + 6:00hrs)]</span> -->
              </div>
              <div id="accordion" class="panel-group">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title"> <a href="#collapseB1" data-toggle="collapse"> Please fill the form below </a> </h4>
                  </div>
                  <div id="acpanel" class="panel-collapse collapse in" id="collapseB1">
                    <div id="desplayqual"></div>
                    <table class="newqualification table table-search2 table-responsive">
                    
                    <tr>
                    <th>INSTITUTION</th><th>COURSE STUDIED</th><th>START DATE</th><th>END DATE</th><th>QUALIFICATIONS</th><th>SKILLS LEARNT</th>
                    </tr>
                   
                    <form id="qualform" method="post">
                    <tr>
                    <td><div class="form-group">
                        <input type="hidden" id="qualification"/> 
                          <input class="form-control" name="instinput" placeholder="institution" type="text">
                        </div></td>
                        <td><div class="form-group">
                          
                          <input class="form-control" name="courseinput" placeholder="course studied" type="text">
                        </div></td>
                        <td><div class="form-group">
                          
                          <input class="form-control" name="startinput" placeholder="<?php echo date("Y-m-d");?>" type="date">
                        </div></td>
                        <td><div class="form-group">
                          
                          <input class="form-control" name="endinput" placeholder="<?php echo date("Y-m-d");?>" type="date">
                          <input type="checkbox" name="currentstudy" id="currentstudy"/><span style="cursor:pointer;" id="ccs"name="ccs">I am currently Studying</span>
                        </div></td>
                        <td><div class="form-group">
                          <input class="form-control" name="qualinput" placeholder="qualification" type="text">
                        </div></td>
                        <td><div class="form-group">
                        
                          <input class="form-control" name="skillsinput" placeholder="skills" type="text">
                        </div></td>
                        <td><div class="form-group">
                        
                          <button type="submit" class="btn btn-common" id="savequalbtn">Save/Update</button>
                        </div></td>
                    </tr>
                    </form>
                    </table>
                  </div>
                </div>
                
              </div>
              </div>
              
              
              
              
              <div id="workexp2">
              <div class="welcome-msg">
                <h3 class="page-sub-header2 clearfix no-padding">Edit Work Experience</h3>
               <!-- <span class="page-sub-header-sub small">You last logged in at: 01-03-2017 12:40 AM [UK time (GMT + 6:00hrs)]</span> -->
              </div>
              <div id="accordion" class="panel-group">
                <div class="panel panel-default">
              
                  <div class="panel-heading">
                    <h4 class="panel-title"> <a href="#collapseB1" data-toggle="collapse"> Please fill the form below </a> </h4>
                    </div>
                  <div id="workpanel" class="panel-collapse collapse in" id="collapseB1">
                   
                    <div id="desplaywork"></div>
                    <table class="newworkinfo table table-search2 table-responsive">
                    
                    <tr>
                    <th>ROLE PLAYED</th><th>ORGANIZATION</th><th>START DATE</th><th>END DATE</th><th>RESPONSIBILITIES</th>
                    </tr>
                   
                    <tr>
                     <form id='workform' method="post">
                    <td><div class="form-group">
                          <input class="form-control" name="roleworkinput" placeholder="role played" type="text" required="required">
                        </div></td>
                    <td><div class="form-group">
                          <input class="form-control" name="compworkinput" placeholder="company/organization" type="text" required="required">
                        </div></td>
                    <td><div class="form-group">
                          <input class="form-control" name="startworkinput" placeholder="start date" type="date" required="required">
                        </div></td>
                    <td><div class="form-group">
                          <input class="form-control" name="endworkinput" placeholder="end date" type="date" required="required">
                        </div></td>
                    <td><div class="form-group">
                          <textarea class="form-control" type="text" name="responstext" cols="10" rows="1" placeholder="responsibilities" required="required"></textarea>
                        </div></td>
                    <td><div class="form-group">
                          <button type="submit" class="btn btn-common" id="saveworkbtn">Save/Update</button>
                        </div></td>
                         </form>
                    </tr>
                   
                    </table>
                  </div>
                </div>
                
              </div>
              </div>
              
              
              
              
              <div id="achievresp2">
              <div class="welcome-msg">
                <h3 class="page-sub-header2 clearfix no-padding">Edit Your Achievements and Responsibilities</h3>
               <!-- <span class="page-sub-header-sub small">You last logged in at: 01-03-2017 12:40 AM [UK time (GMT + 6:00hrs)]</span> -->
              </div>
              <div id="accordion" class="panel-group">
                <div class="panel panel-default">
                 
                  <div id="awardpanel" class="panel-collapse collapse in" id="collapseB1">
                     <div id="awardprogress"></div>
                    <table class="awardtable table table-search2 table-responsive">
                    <tr class="search-header"><th colspan="3">ACHIEVEMENTS, RESPONSIBILITIES AND AWARDS:</th></tr>
                    
                    <tr>
                    <form id="awardform" method="post">
                    <td><div class="form-group">
                          
                          <input class="form-control" name="award" placeholder="award acquired" type="text" required="required"/>
                        </div></td>
                        <td><div class="form-group">
                          
                          <input class="form-control" name="awarddate" placeholder="date acquired" type="date" required="required"/>
                        </div></td>
                    <td><button  type="submit" class="btn btn-common"><i class="fa fa-pencil"></i>SAVE</button></td>
                    </form>
                    </tr>
                    
                    
                    </table>
                  </div>
                </div>
                
              </div>
              </div>
              
              
              <div id="semworkshop2">
              <div class="welcome-msg">
                <h3 class="page-sub-header2 clearfix no-padding">Edit Seminars, Workshops & Conferences Attended</h3>
               <!-- <span class="page-sub-header-sub small">You last logged in at: 01-03-2017 12:40 AM [UK time (GMT + 6:00hrs)]</span> -->
              </div>
              <div id="accordion" class="panel-group">
                <div class="panel panel-default">
                  
                  <div id="workshoppanel" class="panel-collapse collapse in" id="collapseB1">
                    
                    <div id="workshoploading"></div>
                    <table class="workshoptable table table-search2 table-responsive">
                    <tr class="search-header">
                    <th>Workshop Theme</th><th>Date Begun</th><th>End Date</th><th>Skills Learnt</th><th>Action</th>
                    </tr>
                    
                    <tr>
                    <form id="workshopform" method="post">
                    <td><div class="form-group">
                          <input class="form-control" name="wtheme" placeholder="type workshop theme" type="text" required="required">
                        </div>
                        </td>
                    <td><div class="form-group">
                          <input class="form-control" name="wsdate" value="date begun" type="date" required="required">
                        </div>
                        </td>
                    <td><div class="form-group">
                          <input class="form-control" name="wedate" value="date ended" type="date" required="required">
                        </div>
                        </td>
                    <td><div class="form-group">
                          <input class="form-control" name="wskills" placeholder="type skills learnt" type="text" required="required">
                        </div></td>
                    <td><div class="form-group">
                          <button type="submit" class="btn btn-common">Add</button>
                        </div></td>
                    </form>
                    </tr>
                    
                    </table>
                  </div>
                </div>
                
              </div>
              </div>
              
              
              <div id="hobbies2">
              <div class="welcome-msg">
                <h3 class="page-sub-header2 clearfix no-padding">Add Your Hobbies</h3>
               <!-- <span class="page-sub-header-sub small">You last logged in at: 01-03-2017 12:40 AM [UK time (GMT + 6:00hrs)]</span> -->
              </div>
              <div id="accordion" class="panel-group">
                <div class="panel panel-default">
                 
                  <div id="hobbypanel" class="panel-collapse collapse in" id="collapseB1">
                   
                    <div id="hobbyprogress"></div>
                    <table class="hobbytable table table-search2 table-responsive">
                    <tr class="search-header"><th colspan="2">ADD HOBBY:</th></tr>
                    
                    <tr>
                    <form id="hobbyform" method="post">
                    <td><div class="form-group">
                          
                          <input class="form-control" name="hobby" placeholder="type hobby" type="text" required="required">
                        </div></td>
                    <td><button  type="submit" class="btn btn-common">ADD HOBBY</button></td>
                    </form>
                    </tr>
                    
                    
                    </table>
                      
                  </div>
                </div>
                
              </div>
              </div>
              <div id="referees2">
              <div class="welcome-msg">
                <h3 class="page-sub-header2 clearfix no-padding">Add/Edit Your Referees</h3>
               <!-- <span class="page-sub-header-sub small">You last logged in at: 01-03-2017 12:40 AM [UK time (GMT + 6:00hrs)]</span> -->
              </div>
              <div id="accordion" class="panel-group">
                <div class="panel panel-default">
                 
                  <div id="refereepanel" class="panel-collapse collapse in" id="collapseB1">

                    <div id="desplayrefr"></div>
                    <table class="newreferees table table-search2 table-responsive">
                    <tr class="search-header">
                    <th>Referee Name</th><th>Role/Work</th><th>Organization</th><th>PostalAddress</th><th>PhoneNo.</th><th>Contact Email</th><th>Action</th>
                    </tr>
                    <tr>
                    <form id="savereferee" method="post">
                    <td><div class="form-group">
                      <input type="hidden" id="refereesxx"/>   
                          <input class="form-control" name="refname" placeholder="e.g John Dee" type="text">
                        </div></td>
                    <td><div class="form-group">
                          
                          <input class="form-control" name="refwork" placeholder="e.g. Senior Manager" type="text">
                        </div></td>
                    <td><div class="form-group">
                         
                          <input class="form-control" name="reforganization" placeholder="e.g. Safaricom LTD" type="text">
                        </div></td>
                    <td> <div class="form-group">
                          
                          <input class="form-control" name="refaddress" placeholder="e.g. 51-20100 Nakuru" type="text">
                        </div></td>
                    <td> <div class="form-group">
                          
                          <input class="form-control" name="refphone" placeholder="+2547XXXXXX" type="tel">
                        </div></td>
                    <td><div class="form-group">
                         
                          <input class="form-control" name="refemail" placeholder="123@gmail.com" type="email">
                        </div></td>
                    <td><div class="form-group">
                          <button type="submit" class="btn btn-common" id="saverefereebtn">Save/Update</button>
                        </div></td>
                        </form>
                    </tr>
                    
                    </table>
                     
                    
                  </div>
                </div>
                
              </div>
              </div>
              
              
              
              
              
              
              </div>
              
              
              
              
            <!-- Product filter End -->

          
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
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-33686729-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-33686729-1');
</script>
    <!--<script type="text/javascript" src="../assets/js/jquery-min.js"></script>      
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
