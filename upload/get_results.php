<?php

  if(isset($_POST['getresult']))
  {
    mysql_connect('localhost','root','1993Ndiema1993');
    mysql_select_db('jobboard');

    $no = $_POST['getresult'];
    $select = mysql_query("select name from student limit $no,10");
    while($row = mysql_fetch_array($select))
    {
      echo "<p class='rows'>".$row['name']."</p>";
    }
    exit();
  }
  
?>
