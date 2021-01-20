<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="load_style.css">
  <script type="text/javascript" src="jquery.js"></script>
  <script type="text/javascript">
    $(window).scroll(function ()
    {
	  if($(document).height() <= $(window).scrollTop() + $(window).height())
	  {
		loadmore();
	  }
    });

    function loadmore()
    {
      var val = document.getElementById("row_no").value;
      $.ajax({
      type: 'post',
      url: 'get_results.php',
      data: {
       getresult:val
      },
      success: function (response) {
	  var content = document.getElementById("all_rows");
      content.innerHTML = content.innerHTML+response;

      // We increase the value by 10 because we limit the results by 10
      document.getElementById("row_no").value = Number(val)+10;
      }
      });
    }
</script>
  
</head>

<body>
  
  <h1>Load Results From Database On Page Scroll Using jQuery,Ajax And PHP</h1>
  <div id="all_rows">
    <?php

      mysql_connect('localhost','root','1993Ndiema1993');
      mysql_select_db('jobboard');
      $select=mysql_query("select name from student limit 0,10");
      while($row=mysql_fetch_array($select))
      {
  	    echo "<p class='rows'>".$row['name']."</p>";
      }
    ?>
  </div>
  <input type="hidden" id="row_no" value="10">

</body>
</html>
