<?php
define('LOG_FILE', '.ipn_results.log');

define('SSL_P_URL', 'https://www.paypal.com/cgi-bin/webscr');
define('SSL_SAND_URL','https://www.sandbox.paypal.com/cgi-bin/webscr');
require_once 'dbconfig.php';

class USER
{	
private $ipn_status;                // holds the last status
	public $admin_mail; 				// receive the ipn status report pre transaction
	public $paypal_mail;				// paypal account, if set, class need to verify receiver
	public $txn_id;						// array: if the txn_id array existed, class need to verified the txn_id duplicate
	public $ipn_log;                    // bool: log IPN results to text file?
	private $ipn_response;              // holds the IPN response from paypal   
	public $ipn_data = array();         // array contains the POST values for IPN
	private $fields = array();          // array holds the fields to submit to paypal
	private $ipn_debug; 
	private $conn;
	
	public function __construct()
	{
		$database = new Database();
		$db = $database->dbConnection();
		$this->conn = $db;
                $this->ipn_status = '';
		$this->admin_mail = null;
		$this->paypal_mail = null;
		$this->txn_id = null;
		$this->tax = null;
		$this->ipn_log = true;
		$this->ipn_response = '';
		$this->ipn_debug = false;
    }
	
	public function runQuery($sql)
	{
		$stmt = $this->conn->prepare($sql);
		return $stmt;
	}
	
	public function lasdID()
	{
		$stmt = $this->conn->lastInsertId();
		return $stmt;
	}
        public function updatepersonalinfo($txfname,$txlname,$txuseremail,$txusername,$txphoneno,$userid){
           try
		{							
			
                        $stmt = $this->conn->prepare("UPDATE tbl_users set firstname=:firstname,lastname=:lastname,phoneno=:phoneno,userEmail=:userEmail,userName=:userName where userID=:userid");
			$stmt->bindparam(":firstname",$txfname);
                        $stmt->bindparam(":lastname",$txlname);
                        $stmt->bindparam(":phoneno",$txphoneno);
                        $stmt->bindparam(":userEmail",$txuseremail);
                        $stmt->bindparam(":userName",$txusername);
                       $stmt->bindparam(":userid",$userid);
			$stmt->execute();	
			return $stmt;
		}
		catch(PDOException $ex)
		{
			echo $ex->getMessage();
		} 
        }
        public function updateemppersonalinfo($txfname,$txlname,$txuseremail,$txusername,$txphoneno,$userid){
           try
		{							
			
                        $stmt = $this->conn->prepare("UPDATE users set fname=:firstname,lname=:lastname,telephone=:phoneno,email=:userEmail,username=:userName where id=:userid");
			$stmt->bindparam(":firstname",$txfname);
                        $stmt->bindparam(":lastname",$txlname);
                        $stmt->bindparam(":phoneno",$txphoneno);
                        $stmt->bindparam(":userEmail",$txuseremail);
                        $stmt->bindparam(":userName",$txusername);
                       $stmt->bindparam(":userid",$userid);
			$stmt->execute();	
			return $stmt;
		}
		catch(PDOException $ex)
		{
			echo $ex->getMessage();
		} 
        }
        public function bidorder($ordid,$ordeml,$ordstat){
            try
		{							
			
                        $stmt = $this->conn->prepare("UPDATE tbl_orders set status=:ordstat, writer=:ordeml where orderID=:ordid");
			$stmt->bindparam(":ordstat",$ordstat);
                        $stmt->bindparam(":ordeml",$ordeml);
                        $stmt->bindparam(":ordid",$ordid);
			$stmt->execute();	
			return $stmt;
		}
		catch(PDOException $ex)
		{
			echo $ex->getMessage();
		}
        }
	public function placeorder($ordttl,$urgency,$ordcat,$doctype_x,$numberOfSources,$ordaclevel,$ordnop,$ordspac,$ordprice,$ordstyle,$ordinst,$userEmail,$dtposted,$paymentstat)
	{
		try
		{							
			
                        $stmt = $this->conn->prepare("INSERT INTO tbl_orders(sources,doctype_x,urgency,orderttl,ordercat,orderinst,noofpages,spacing,style,pricing,dtposted,userEmail,aclevel,paystatus) 
			                                             VALUES(:sources,:doctype_x,:urgency,:orderttl,:ordercat,:orderinst,:noofpages,:spacing,:style,:pricing,:dtposted,:userEmail,:aclevel,:paystatus)");
			$stmt->bindparam(":sources",$numberOfSources);
                        $stmt->bindparam(":doctype_x",$doctype_x);
                        $stmt->bindparam(":urgency",$urgency);
                        $stmt->bindparam(":orderttl",$ordttl);
			$stmt->bindparam(":ordercat",$ordcat);
			$stmt->bindparam(":orderinst",$ordinst);
			$stmt->bindparam(":noofpages",$ordnop);
                        $stmt->bindparam(":spacing",$ordspac);
                        $stmt->bindparam(":style",$ordstyle);
                        $stmt->bindparam(":pricing",$ordprice);
                        $stmt->bindparam(":dtposted",$dtposted);
                        $stmt->bindparam(":userEmail",$userEmail);
                        $stmt->bindparam(":aclevel",$ordaclevel);
                        $stmt->bindparam(":paystatus",$paymentstat);
			$stmt->execute();	
			return $stmt;
		}
		catch(PDOException $ex)
		{
			echo $ex->getMessage();
		}
	}
        
        /*paypall payment code*/
        
        
        public function add_field($field, $value) {
		$this->fields["$field"] = $value;
	}

public function submit_paypal_post() {

		$paypal_url = ($_GET['sandbox'] == 1) ? SSL_SAND_URL : SSL_P_URL;
		echo "<html>\n";
		echo "<head><title>Processing Payment...</title></head>\n";
		echo "<body onLoad=\"document.forms['paypal_form'].submit();\">\n";
		echo "<center><h2>Please wait, your order is being processed and you";
		echo " will be redirected to the paypal website.</h2></center>\n";
		echo "<form method=\"post\" name=\"paypal_form\" ";
		echo "action=\"".$paypal_url."\">\n";
		if (isset($this->paypal_mail))echo "<input type=\"hidden\" name=\"business\" value=\"$this->paypal_mail\"/>\n";
		foreach ($this->fields as $name => $value) {
			echo "<input type=\"hidden\" name=\"$name\" value=\"$value\"/>\n";
		}
		echo "<center><br/><br/>If you are not automatically redirected to ";
		echo "paypal within 5 seconds...<br/><br/>\n";
		echo "<input type=\"submit\" value=\"Click Here\"></center>\n";
		
		echo "</form>\n";
		echo "</body></html>\n";
	}
   
/**
 * validate the	IPN
 * 
 * @return bool IPN validation result
 */
	public function validate_ipn() {
		
		$hostname = gethostbyaddr ( $_SERVER ['REMOTE_ADDR'] );
		if (! preg_match ( '/paypal\.com$/', $hostname )) {
			$this->ipn_status = 'Validation post isn\'t from PayPal';
			$this->log_ipn_results ( false );
			return false;
		}
		
		if (isset($this->paypal_mail) && strtolower ( $_POST['receiver_email'] ) != strtolower(trim( $this->paypal_mail ))) {
			$this->ipn_status = "Receiver Email Not Match";
			$this->log_ipn_results ( false );
			return false;
		}
		
		if (isset($this->txn_id)&& in_array($_POST['txn_id'],$this->txn_id)) {
			$this->ipn_status = "txn_id have a duplicate";
			$this->log_ipn_results ( false );
			return false;
		}

		// parse the paypal URL
		$paypal_url = ($_POST['test_ipn'] == 1) ? SSL_SAND_URL : SSL_P_URL;
		$url_parsed = parse_url($paypal_url);        
		
		// generate the post string from the _POST vars aswell as load the
		// _POST vars into an arry so we can play with them from the calling
		// script.
		$post_string = '';    
		foreach ($_POST as $field=>$value) { 
			$this->ipn_data["$field"] = $value;
			$post_string .= $field.'='.urlencode(stripslashes($value)).'&'; 
		}
		$post_string.="cmd=_notify-validate"; // append ipn command
		
		// open the connection to paypal
		if (isset($_POST['test_ipn']) )
			$fp = fsockopen ( 'ssl://www.sandbox.paypal.com', "443", $err_num, $err_str, 60 );
		else
			$fp = fsockopen ( 'ssl://www.paypal.com', "443", $err_num, $err_str, 60 );
 
		if(!$fp) {
			// could not open the connection.  If loggin is on, the error message
			// will be in the log.
			$this->ipn_status = "fsockopen error no. $err_num: $err_str";
			$this->log_ipn_results(false);       
			return false;
		} else { 
			// Post the data back to paypal
			fputs($fp, "POST $url_parsed[path] HTTP/1.1\r\n"); 
			fputs($fp, "Host: $url_parsed[host]\r\n"); 
			fputs($fp, "Content-type: application/x-www-form-urlencoded\r\n"); 
			fputs($fp, "Content-length: ".strlen($post_string)."\r\n"); 
			fputs($fp, "Connection: close\r\n\r\n"); 
			fputs($fp, $post_string . "\r\n\r\n"); 
		
			// loop through the response from the server and append to variable
			while(!feof($fp)) { 
		   	$this->ipn_response .= fgets($fp, 1024); 
		   } 
		  fclose($fp); // close connection
		}
		
		// Invalid IPN transaction.  Check the $ipn_status and log for details.
		if (! eregi("VERIFIED",$this->ipn_response)) {
			$this->ipn_status = 'IPN Validation Failed';
			$this->log_ipn_results(false);   
			return false;
		} else {
			$this->ipn_status = "IPN VERIFIED";
			$this->log_ipn_results(true); 
			return true;
		}
	} 
   
	private function log_ipn_results($success) {
		$hostname = gethostbyaddr ( $_SERVER ['REMOTE_ADDR'] );
		// Timestamp
		$text = '[' . date ( 'm/d/Y g:i A' ) . '] - ';
		// Success or failure being logged?
		if ($success)
			$this->ipn_status = $text . 'SUCCESS:' . $this->ipn_status . "!\n";
		else
			$this->ipn_status = $text . 'FAIL: ' . $this->ipn_status . "!\n";
			// Log the POST variables
		$this->ipn_status .= "[From:" . $hostname . "|" . $_SERVER ['REMOTE_ADDR'] . "]IPN POST Vars Received By Paypal_IPN Response API:\n";
		foreach ( $this->ipn_data as $key => $value ) {
			$this->ipn_status .= "$key=$value \n";
		}
		// Log the response from the paypal server
		$this->ipn_status .= "IPN Response from Paypal Server:\n" . $this->ipn_response;
		$this->write_to_log ();
	}
	
	private function write_to_log() {
		if (! $this->ipn_log)
			return; // is logging turned off?

		// Write to log
		$fp = fopen ( LOG_FILE , 'a' );
		fwrite ( $fp, $this->ipn_status . "\n\n" );
		fclose ( $fp ); // close file
		chmod ( LOG_FILE , 0600 );
	}

	public function send_report($subject) {
		$body .= "from " . $this->ipn_data ['payer_email'] . " on " . date ( 'm/d/Y' );
		$body .= " at " . date ( 'g:i A' ) . "\n\nDetails:\n" . $this->ipn_status;
		mail ( $this->admin_mail, $subject, $body );
	}

	public function print_report(){
		$find [] = "\n";
		$replace [] = '<br/>';
		$html_content = str_replace ( $find, $replace, $this->ipn_status );
		echo $html_content;
	}
	
	public function dump_fields() {
 
		// Used for debugging, this function will output all the field/value pairs
		// that are currently defined in the instance of the class using the
		// add_field() function.
		echo "<h3>paypal_class->dump_fields() Output:</h3>";
		echo "<table width=\"95%\" border=\"1\" cellpadding=\"2\" cellspacing=\"0\">
            <tr>
               <td bgcolor=\"black\"><b><font color=\"white\">Field Name</font></b></td>
               <td bgcolor=\"black\"><b><font color=\"white\">Value</font></b></td>
            </tr>"; 
		ksort($this->fields);
		foreach ($this->fields as $key => $value) {echo "<tr><td>$key</td><td>".urldecode($value)."&nbsp;</td></tr>";}
		echo "</table><br>"; 
	}

	private function debug($msg) {
		
		if (! $this->ipn_debug)
			return;
		
		$today = date ( "Y-m-d H:i:s " );
		$myFile = ".ipn_debugs.log";
		$fh = fopen ( $myFile, 'a' ) or die ( "Can't open debug file. Please manually create the 'debug.log' file and make it writable." );
		$ua_simple = preg_replace ( "/(.*)\s\(.*/", "\\1", $_SERVER ['HTTP_USER_AGENT'] );
		fwrite ( $fh, $today . " [from: " . $_SERVER ['REMOTE_ADDR'] . "|$ua_simple] - " . $msg . "\n" );
		fclose ( $fh );
		chmod ( $myFile, 0600 );
	}
        public function saveaward($usremail,$award,$date){
        try{
        $stmt=$this->conn->prepare("INSERT INTO award(usremail,award,date) values(:usremail,:award,:date)");
        $stmt->bindparam(":award",$award);
        $stmt->bindparam(":usremail",$usremail);
        $stmt->bindparam(":date",$date);
        $stmt->execute();	
			return $stmt;
        }
        catch(PDOException $ex){
        echo $ex->getMessage();
        }
        }
        public function updateprof($useremail,$about){
        try{
        $stmt=$this->conn->prepare("UPDATE users set about=:about where email=:useremail");
        $stmt->bindparam(":about",$about);
        $stmt->bindparam(":useremail",$useremail);
        $stmt->execute();	
			return $stmt;
        }
        catch(PDOException $ex){
        echo $ex->getMessage();
        }
        }
        public function updateaddet($adname,$addesc,$adurl,$ademail,$duedate,$jlocation,$adid){
           try
		{							
			
                        $stmt = $this->conn->prepare("UPDATE advert set adname=:adname,addesc=:addesc,adurl=:adurl,ademail=:ademail,duedate=:duedate,jlocation=:jlocation where adid=:adid");
			$stmt->bindparam(":adname",$adname);
                        $stmt->bindparam(":addesc",$addesc);
                        $stmt->bindparam(":adurl",$adurl);
                        $stmt->bindparam(":ademail",$ademail);
                        $stmt->bindparam(":duedate",$duedate);
                       $stmt->bindparam(":jlocation",$jlocation);
                       $stmt->bindparam(":adid",$adid);
			$stmt->execute();	
			return $stmt;
		}
		catch(PDOException $ex)
		{
			echo $ex->getMessage();
		} 
        }
        public function updatepersonal2info($useremail,$sname,$languages,$dob,$profemail,$gender,$nationality,$civicstat,$religion){
        $sql="UPDATE users SET sname=:sname,languages=:languages,dob=:dob,profemail=:profemail,gender=:gender,nationality=:nationality,civicstat=:civicstat,religion=:religion where email=:useremail";
        try{
        $stmt = $this->conn->prepare($sql);
			$stmt->bindparam(":useremail",$useremail);
                       $stmt->bindparam(":sname",$sname);
                       $stmt->bindparam(":languages",$languages);
                       $stmt->bindparam(":dob",$dob);
                       $stmt->bindparam(":profemail",$profemail);
                       $stmt->bindparam(":gender",$gender);
                       $stmt->bindparam(":nationality",$nationality);
                       $stmt->bindparam(":civicstat",$civicstat);
                       $stmt->bindparam(":religion",$religion);
                       
			$stmt->execute();	
			return $stmt;
        }
        catch(PDOException $ex){echo $ex->getMessage();}
        }
        public function updateprofsetting($useremail,$fname,$lname,$sname,$telephone){
        $sql="UPDATE users SET fname=:fname,lname=:lname,sname=:sname,telephone=:telephone where email=:useremail";
        try{
        $stmt = $this->conn->prepare($sql);
			$stmt->bindparam(":useremail",$useremail);
			$stmt->bindparam(":fname",$fname);
			$stmt->bindparam(":lname",$lname);
			$stmt->bindparam(":sname",$sname);
			$stmt->bindparam(":telephone",$telephone);
                       
			$stmt->execute();	
			return $stmt;
        }
        catch(PDOException $ex){echo $ex->getMessage();}
        }
        public function updatepassword($newpass,$useremail){
        $sql="UPDATE users SET password=:password where email=:useremail";
        try{
        $stmt = $this->conn->prepare($sql);
			$stmt->bindparam(":useremail",$useremail);
                       $stmt->bindparam(":password",md5($newpass));
                       
			$stmt->execute();	
			return $stmt;
        }
        catch(PDOException $ex){echo $ex->getMessage();}
        }
        public function updatebginfo($useremail,$fname,$lname,$telephone,$address,$postalcode,$town){
        $sql="UPDATE users SET fname=:fname,lname=:lname,telephone=:telephone,address=:address,postalcode=:postalcode,town=:town where email=:useremail";
        try{
        $stmt = $this->conn->prepare($sql);
			$stmt->bindparam(":useremail",$useremail);
                       $stmt->bindparam(":fname",$fname);
                       $stmt->bindparam(":lname",$lname);
                       $stmt->bindparam(":telephone",$telephone);
                       $stmt->bindparam(":address",$address);
                       $stmt->bindparam(":postalcode",$postalcode);
                       $stmt->bindparam(":town",$town);
			$stmt->execute();	
			return $stmt;
        }
        catch(PDOException $ex){echo $ex->getMessage();}
        
        }
        public function savereferee($useremail,$refereenm,$workr,$organization,$contactaddr,$contpno,$emailaddr)
        {
        $sql="INSERT INTO referees(useremail,refereenm,workr,organization,contaddr,contpno,emailaddr) values (:useremail,:refereenm,:workr,:organization,:contaddr,:contpno,:emailaddr)";
        try{
        $stmt = $this->conn->prepare($sql);
			$stmt->bindparam(":useremail",$useremail);
                       $stmt->bindparam(":refereenm",$refereenm);
                       $stmt->bindparam(":workr",$workr);
                       $stmt->bindparam(":organization",$organization);
                       $stmt->bindparam(":contaddr",$contactaddr);
                       $stmt->bindparam(":contpno",$contpno);
                       $stmt->bindparam(":emailaddr",$emailaddr);
			$stmt->execute();	
			return $stmt;
        }
        catch(PDOException $ex){echo $ex->getMessage();}
        
        }
        public function savehobby($usremail,$hobby){
         $sql="INSERT INTO hobbies(usremail,hobby) values (:usremail,:hobby)";
        try{
        $stmt = $this->conn->prepare($sql);
			$stmt->bindparam(":usremail",$usremail);
                       $stmt->bindparam(":hobby",$hobby);
			$stmt->execute();	
			return $stmt;
        }
        catch(PDOException $ex){echo $ex->getMessage();}
        }
        public function saveworkshop($usremail,$theme,$datestart,$dateend,$skills){
        $sql="INSERT INTO workshoptbl(usremail,theme,datestart,dateend,skills) values (:usremail,:theme,:datestart,:dateend,:skills)";
        try{
        $stmt = $this->conn->prepare($sql);
			$stmt->bindparam(":usremail",$usremail);
                       $stmt->bindparam(":theme",$theme);
                       $stmt->bindparam(":datestart",$datestart);
                       $stmt->bindparam(":dateend",$dateend);
                       $stmt->bindparam(":skills",$skills);
			$stmt->execute();	
			return $stmt;
        }
        catch(PDOException $ex){echo $ex->getMessage();}
        }
         public function saveworkinfo($useremail,$roleplayed,$organization,$start_date,$end_date,$responsibilities)
        {
        $sql="INSERT INTO workdetails(useremail,roleplayed,organization,start_date,end_date,responsibilities) values (:useremail,:roleplayed,:organization,:start_date,:end_date,:responsibilities)";
        try{
        $stmt = $this->conn->prepare($sql);
			$stmt->bindparam(":useremail",$useremail);
                       $stmt->bindparam(":roleplayed",$roleplayed);
                       $stmt->bindparam(":organization",$organization);
                       $stmt->bindparam(":start_date",$start_date);
                       $stmt->bindparam(":end_date",$end_date);
                       $stmt->bindparam(":responsibilities",$responsibilities);
			$stmt->execute();	
			return $stmt;
        }
        catch(PDOException $ex){echo $ex->getMessage();}
        
        }
        
        
        public function savequalification($useremail,$institution,$courseinfo,$start_date,$end_date,$qualification,$skills)
        {
        $sql="INSERT INTO academicqual(useremail,institution,courseinfo,start_date,end_date,qualification,skills) values (:useremail,:institution,:courseinfo,:start_date,:end_date,:qualification,:skills)";
        try{
        $stmt = $this->conn->prepare($sql);
			$stmt->bindparam(":useremail",$useremail);
                       $stmt->bindparam(":institution",$institution);
                       $stmt->bindparam(":courseinfo",$courseinfo);
                       $stmt->bindparam(":start_date",$start_date);
                       $stmt->bindparam(":end_date",$end_date);
                       $stmt->bindparam(":qualification",$qualification);
                       $stmt->bindparam(":skills",$skills);
			$stmt->execute();	
			return $stmt;
        }
        catch(PDOException $ex){echo $ex->getMessage();}
        
        }
        public function repostad($duedate,$ad_id,$statuss){
           try
		{							
			
                        $stmt = $this->conn->prepare("UPDATE advert set duedate=:duedate, status=:status where adid=:adid");
			$stmt->bindparam(":duedate",$duedate);
                       $stmt->bindparam(":status",$statuss);
                       $stmt->bindparam(":adid",$ad_id);
			$stmt->execute();	
			return $stmt;
		}
		catch(PDOException $ex)
		{
			echo $ex->getMessage();
		} 
        }
        
        
        
        /*paypal payment code*/
        
        public function post_advert_new($email,$adcat,$adtitle,$addescr,$skill,$adurl,$ademail,$jobtype,$jobpermit,$duedate,$postedon,$location,$howto,$how_to_submit_email,$how_to_submit_upload,$how_to_submit_link,$how_to_submit_call,$how_to_submit_hardcopy,$adtel,$company)
        {
            try
		{							
			$stmt = $this->conn->prepare("INSERT INTO advert (useremail,adcategory,adname, addesc,skills,adurl,ademail,jobtype,jobpermit, duedate, dtpostd,jlocation,how_to,submit_email,submit_upload,submit_link,submit_call,submit_hardcopy,adtel,company) VALUES (
               	:useremail,:adcategory, :adname, :addesc,:skill,:adurl,:ademail,:jobtype,:jobpermit, :duedate, :dtpostd,:jlocation,
:howto,:how_to_submit_email,:how_to_submit_upload,:how_to_submit_link,
:how_to_submit_call,:how_to_submit_hardcopy,:adtel,:company)");
			$stmt->bindparam(":useremail",$email);
                        $stmt->bindparam(":adcategory",$adcat);
                        $stmt->bindparam(":adurl",$adurl);
                        $stmt->bindparam(":ademail",$ademail);
                        $stmt->bindparam(":jobtype",$jobtype);
                        $stmt->bindparam(":jobpermit",$jobpermit);
                        $stmt->bindparam(":adname",$adtitle);
                        $stmt->bindparam(":addesc",$addescr);
                        $stmt->bindparam(":skill",$skill);
                        $stmt->bindparam(":duedate",$duedate);
			$stmt->bindparam(":dtpostd",$postedon);
                        $stmt->bindparam(":jlocation",$location);
$stmt->bindparam(":howto",$howto);
$stmt->bindparam(":how_to_submit_email",$how_to_submit_email);
$stmt->bindparam(":how_to_submit_upload",$how_to_submit_upload);
$stmt->bindparam(":how_to_submit_link",$how_to_submit_link);
$stmt->bindparam(":how_to_submit_call",$how_to_submit_call);
$stmt->bindparam(":how_to_submit_hardcopy",$how_to_submit_hardcopy);
$stmt->bindparam(":adtel",$adtel);
$stmt->bindparam(":company",$company);
			$stmt->execute();	
			return $stmt;
		}
		catch(PDOException $ex)
		{
			echo $ex->getMessage();
		}
        }
public function registerusr2($company,$usrtype,$fname,$lname,$pno,$email,$upass,$code,$stats)
{
try
		{							
			$password = md5($upass);
			$stmt = $this->conn->prepare("INSERT INTO users(company,telephone,userstatus,usrtype,fname,lname,email,password,tokencode) 
			                                             VALUES(:company,:pno,:userstatus,:usrtype,:fname,:lname,:user_mail, :user_pass, :active_code)");
			                                             $stmt->bindparam(":company",$company);
			                                             $stmt->bindparam(":pno",$pno);
			$stmt->bindparam(":userstatus",$stats);
                       
                        $stmt->bindparam(":usrtype",$usrtype);
                        $stmt->bindparam(":fname",$fname);
                        $stmt->bindparam(":lname",$lname);
                       

			$stmt->bindparam(":user_mail",$email);
			$stmt->bindparam(":user_pass",$password);
			$stmt->bindparam(":active_code",$code);
			$stmt->execute();	
			return $stmt;
		}
		catch(PDOException $ex)
		{
			echo $ex->getMessage();
		}
}
	public function registerusr($usrtype,$company,$fname,$lname,$email,$upass,$code,$stats)
	{
		try
		{							
			$password = md5($upass);
			$stmt = $this->conn->prepare("INSERT INTO users(userstatus,usrtype,company,fname,lname,email,password,tokencode) 
			                                             VALUES(:userstatus,:usrtype,:company,:fname,:lname,:user_mail, :user_pass, :active_code)");
			$stmt->bindparam(":userstatus",$stats);
                       
                        $stmt->bindparam(":usrtype",$usrtype);
                        $stmt->bindparam(":company",$company);
                        $stmt->bindparam(":fname",$fname);
                        $stmt->bindparam(":lname",$lname);
                       

			$stmt->bindparam(":user_mail",$email);
			$stmt->bindparam(":user_pass",$password);
			$stmt->bindparam(":active_code",$code);
			$stmt->execute();	
			return $stmt;
		}
		catch(PDOException $ex)
		{
			echo $ex->getMessage();
		}
	}
        
public function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}
public function get_client_ip1() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

public function detect_city($ip) {
        
        $default = 'UNKNOWN';

        if (!is_string($ip) || strlen($ip) < 1 || $ip == '127.0.0.1' || $ip == 'localhost')
            $ip = '8.8.8.8';

        $curlopt_useragent = 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.9.2) Gecko/20100115 Firefox/3.6 (.NET CLR 3.5.30729)';
        
        $url = 'http://ipinfodb.com/ip_locator.php?ip=' . urlencode($ip);
        $ch = curl_init();
        
        $curl_opt = array(
            CURLOPT_FOLLOWLOCATION  => 1,
            CURLOPT_HEADER      => 0,
            CURLOPT_RETURNTRANSFER  => 1,
            CURLOPT_USERAGENT   => $curlopt_useragent,
            CURLOPT_URL       => $url,
            CURLOPT_TIMEOUT         => 1,
            CURLOPT_REFERER         => 'http://' . $_SERVER['HTTP_HOST'],
        );
        
        curl_setopt_array($ch, $curl_opt);
        
        $content = curl_exec($ch);
        
        if (!is_null($curl_info)) {
            $curl_info = curl_getinfo($ch);
        }
        
        curl_close($ch);
        
        if ( preg_match('{<li>City : ([^<]*)</li>}i', $content, $regs) )  {
            $city = $regs[1];
        }
        if ( preg_match('{<li>State/Province : ([^<]*)</li>}i', $content, $regs) )  {
            $state = $regs[1];
        }

        if( $city!='' && $state!='' ){
          $location = $city . ', ' . $state;
          return $location;
        }else{
          return $default; 
        }
        
}
	public function postblog($blogtitle,$blogurl,$blogdesc,$blogauthor,$NewFileName,$blogdate){
	try{
	$stmt = $this->conn->prepare("INSERT INTO blogpost(blogtitle,blogurl,blogdesc,blogauthor,blogimage,blogdate) VALUES(:blogtitle,:blogurl,:blogdesc,:blogauthor,:NewFileName,:blogdate)");
            $stmt->bindparam(":blogtitle",$blogtitle);
            $stmt->bindparam(":blogurl",$blogurl);
            $stmt->bindparam(":blogdesc",$blogdesc);
            $stmt->bindparam(":blogauthor",$blogauthor);
            $stmt->bindparam(":NewFileName",$NewFileName);
            $stmt->bindparam(":blogdate",$blogdate);             
$stmt->execute(); 
return $stmt;
}
catch (PDOException $ex){
echo $ex->getMessage();
}
	}
	
	
	public function addseeker($fname,$lname,$email,$pno,$password){
	try{
$tokencode=md5(uniqid(rand()));
$password = md5($password);
$u="Job Seeker";$s="Y";
            $stmt = $this->conn->prepare("INSERT INTO users(usrtype,fname,lname,telephone,password,email,userstatus,tokencode) VALUES(:usrtype,:fname,:lname,:telephone,:password,:email,:userstatus,:tokencode)");
            $stmt->bindparam(":usrtype",$u);
            $stmt->bindparam(":fname",$fname);
            $stmt->bindparam(":lname",$lname);
            $stmt->bindparam(":email",$email);
            $stmt->bindparam(":telephone",$pno);
            $stmt->bindparam(":password",$password);
            $stmt->bindparam(":userstatus",$s);
            $stmt->bindparam(":tokencode",$tokencode);
                        
$stmt->execute(); 
return $stmt;
}
catch (PDOException $ex){
echo $ex->getMessage();
}
} 
	public function login($email,$upass)
	{
		try
		{
			$stmt = $this->conn->prepare("SELECT * FROM users WHERE email=:email_id");
			$stmt->execute(array(":email_id"=>$email));
			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
			
			if($stmt->rowCount() == 1)
			{
				if($userRow['userstatus']=="Y")
				{
					if($userRow['password']==md5($upass))
					{
						$_SESSION['userSession'] = $userRow['email'];
						return true;
					}
					else
					{
						header("Location: login.php?error");
						exit;
					}
				}
				else
				{
					header("Location: login.php?inactive");
					exit;
				}	
			}
			else
			{
				header("Location: login.php?error");
				exit;
			}		
		}
		catch(PDOException $ex)
		{
			echo $ex->getMessage();
		}
	}
	
	
	public function is_logged_in()
	{
		if(isset($_SESSION['userSession']))
		{
			return true;
		}
	}
	
	public function redirect($url)
	{
		header("Location: $url");
	}
	
	public function logout()
	{
		session_destroy();
		$_SESSION['userSession'] = false;
	}
	
	function send_mail($email,$message,$subject)
	{						
		require_once('mailer/class.phpmailer.php');
		$mail = new PHPMailer();
		$mail->IsSMTP(); 
		$mail->SMTPDebug  = 0;                     
		$mail->SMTPAuth   = true;                  
		$mail->SMTPSecure = "ssl";                 
		$mail->Host       = "smtp.gmail.com";      
		$mail->Port       = 465;             
		$mail->AddAddress($email);
		$mail->Username="your_gmail_id_here@gmail.com";  
		$mail->Password="your_gmail_password_here";            
		$mail->SetFrom('your_gmail_id_here@gmail.com','Coding Cage');
		$mail->AddReplyTo("your_gmail_id_here@gmail.com","Coding Cage");
		$mail->Subject    = $subject;
		$mail->MsgHTML($message);
		$mail->Send();
	}	
}
