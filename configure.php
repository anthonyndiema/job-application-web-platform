
<?Php
//'localhost','smarxqqg_smartwr','5BHq37uXyPae','smarxqqg_smartwriting'
$dbhost_name = "localhost";
$database = "idawncok_jobboard";// database name
$username = "idawncok_root"; // user name
$password = "1993Ndiema1993"; // password 

//////// Do not Edit below /////////
try {
$dbo = new PDO('mysql:host=localhost;dbname='.$database, $username, $password);
} catch (PDOException $e) {
print "Error!: " . $e->getMessage() . "<br/>";
die();
}
?> 
