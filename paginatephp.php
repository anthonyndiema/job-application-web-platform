$db_username        = 'idawncok_root'; //database username
$db_password        = '1993Ndiema1993'; //dataabse password
$db_name            = 'idawncok_test_db'; //database name
$db_host            = 'localhost'; //hostname or IP
$item_per_page      = 5; //item to display per page

$mysqli = new mysqli($db_host, $db_username, $db_password, $db_name);
//Output any connection error
if ($mysqli->connect_error) {
    die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
}


//Get page number from Ajax
if(isset($_POST["page"])){
    $page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
    if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
}else{
    $page_number = 1; //if there's no page number, set it to 1
}

//get total number of records from database
$results = $mysqli_conn->query("SELECT COUNT(*) FROM paginate");
$get_total_rows = $results->fetch_row(); //hold total records in variable
//break records into pages
$total_pages = ceil($get_total_rows[0]/$item_per_page);

//position of records
$page_position = (($page_number-1) * $item_per_page);

//Limit our results within a specified range. 
$results = $mysqli->prepare("SELECT id, name, message FROM paginate ORDER BY id ASC LIMIT $page_position, $item_per_page");
$results->execute(); //Execute prepared Query
$results->bind_result($id, $name, $message); //bind variables to prepared statement

//Display records fetched from database.
echo '<ul class="contents">';
while($results->fetch()){ //fetch values
    echo '<li>';
    echo  $id. '. <strong>' .$name.'</strong> &mdash; '.$message;
    echo '</li>';
}
echo '</ul>';

echo '<div align="center">';
// To generate links, we call the pagination function here. 
echo paginate_function($item_per_page, $page_number, $get_total_rows[0], $total_pages);
echo '</div>';
