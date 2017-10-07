<? session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="generator" content="CoffeeCup HTML Editor (www.coffeecup.com)">
    <meta name="dcterms.created" content="Fri, 06 Oct 2017 02:23:07 GMT">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title></title>
	
	    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="TP.css" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

    
    <!--[if IE]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>
  <body>
  hellooo
  <?
  include('Links.php');
	applicateLinks();
  ?>
      <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  
  <br>
  <br>
<form method="post" action="blog.php">
<div class="container">
	 <div class="row">
	 	  <div class="col-1">Subject</div>
		  <div class="col-3"><input type="text" name="Subject" id="subj" /></div>
		  <div class="col-1">Details</div>
		  <div class="col-5"><textarea cols="50" rows="4" name="UpdatedItem"></textarea></div>
	 	  <div class="col-1"><input type="submit" value="add entry to blog" /></div>
	 
	 </div>
</div>
</form>



<?


      $hostname="db696287767.db.1and1.com";
      $database="db696287767";
      $username="dbo696287767";
      $password="only1TP!";

      //DO NOT EDIT BELOW THIS LINE
      $link = mysqli_connect($hostname, $username, $password);
	  $db_selected = mysqli_select_db($link, $database);
	
	
	function redirect($url, $statusCode = 303)
        {
           header('Location: ' . $url, true, $statusCode);
           die();
        }
	  
if(!empty($_POST))
{
   //Add item to datbase
   $Subject = $_POST['Subject'];
   $UpdatedItem = $_POST['UpdatedItem'];
   $queryIn = "INSERT INTO BlogUpdate SET Subject = '$Subject', UpdatedItem = '$UpdatedItem' ";
   $result_insert = mysqli_query($link,$queryIn);
  
   //empty postArray so no duplicate records
   Redirect('http://turnproreports.com/blog.php', false);
}
 
 $queryOut = "SELECT * FROM BlogUpdate ORDER BY TS DESC";
 $result_out = mysqli_query($link,$queryOut);
 ?>
 <div class="container">
 	  <div class="row"><div class="col-12"><h1 class="text-center">blog history</h1></div></div>
 	  <div class="row">
	  	   <div class="col-1"></div>
		   <div class="col-10">
 <table class="table table-striped ">
 		<tr><th>Timestamp</th><th>Subject</th><th width="280">Details</th></tr>
		
		<?
		while ($row = mysqli_fetch_row($result_out))
			  {
			  
			   $date=date_create($row[0]);
     $newdate =  date_format($date,"D M d, Y @ h:i a");
			  
			   	echo "<tr>";
				echo "<td>$newdate</td>";
				echo "<td>$row[1]</td>";
				echo "<td>$row[2]</td>";
				echo "</tr>";
			  
			  
			  }
		
		
		
		
		?> 
 
 
 </table>
 		 </div><!-- end of col 2 -->
		 <div class="col-1"></div><!-- end of col3 -->
 </div><!-- end of row -->
</div>
	<script>
			document.getElementById('subj').focus();
			document.getElementById('subj').select();
	</script>

  </body>
</html>