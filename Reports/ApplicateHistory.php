<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="TP.css" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
	
	<style>
	th,td {font-size:12px; color:black }
	
	
	</style>
	
	
  </head>
  <body>


    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>


<?php

	include('Links.php');
	applicateLinks();

	
	 if(!empty($_POST))
      {
      //Add item to datbase
       $AccountAlias = $_POST['AccountAlias'];
	  }

    ?>
	
	<h1>View Application History</h1>
    <form action='ApplicateHistory.php' method='post'>
      <p><label>AccountAlias:</label><input type='text' name='AccountAlias' class='auto' value="<? echo $AccountAlias; ?>"></p>
	  	  <input type="submit" />
    </form>

	
	
	
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>
    <script type="text/javascript">
    $(function() {

    //autocomplete
    $(".auto").autocomplete({
      source: "searchAlias.php",
      minLength: 1
    });

    });
    </script>

	
	
	
	<script>
			document.getElementById('AccntAlias').focus();
			document.getElementById('AccntAlias').select();
	</script>
	<?

      $hostname="db696287767.db.1and1.com";
      $database="db696287767";
      $username="dbo696287767";
      $password="only1TP!";

      //DO NOT EDIT BELOW THIS LINE
      $link = mysqli_connect($hostname, $username, $password);
	  $db_selected = mysqli_select_db($link, $database);
	  
      if(!empty($_POST))
      {
      //Add item to datbase
	   $AcctIDQuery = "SELECT AcctID FROM Accounts WHERE AccountAlias = '$AccountAlias'";
	   $AcctIDresult = mysqli_query($link,$AcctIDQuery);
	   $AcctIDrow = mysqli_fetch_row($AcctIDresult);
	   $AcctID = $AcctIDrow[0];
	   echo $AcctID;
	   
	   
	   
       $queryOut = "SELECT * FROM Application WHERE AcctID ='$AcctID' ORDER BY TimeStamp DESC ";
	   $result_out = mysqli_query($link,$queryOut);


      }
       
       ?>
	   
	   <table class="table table-striped ">
  <thead>
    <tr>
      <th class='text-center' >timestamp</th>
      <th class='text-center' >Chara</th>
      <th class='text-center' >Fila</th>
      <th class='text-center' >Plank</th>
	  <th class='text-center' >Oscil</th>
	  <th class='text-center' >XTRGal</th>
	  <th class='text-center' >XTRBP</th>
	  <th class='text-center' >CuPowd</th>
	  <th class='text-center' >CuCryst</th>
	  <th class='text-center' >Komene</th>
	  <th class='text-center' >SeClearGal</th>
	  <th class='text-center' >SeClearOz</th>
	  <th class='text-center' >HydrotholOz</th>
	  <th class='text-center' >Coontail</th>
	  <th class='text-center' >Naiad</th>
	  <th class='text-center' >Bladderwarts</th>
	  <th class='text-center' >Elodea</th>
	  <th class='text-center' >Hydrilla</th>
	  <th class='text-center' >Watermilfoil</th>
	  <th class='text-center' >Widgeon</th>
	  <th class='text-center' >Other</th>
	  <th class='text-center' >AquatholG</th>
	  <th class='text-center' >AquatholOz</th>
	  <th class='text-center' >AquatholGran</th>
	  <th class='text-center' >SonarGen</th>
	  <th class='text-center' >SonarOne</th>
	  <th class='text-center' >Primrose</th>
	  <th class='text-center' >Watermeal</th>
	  <th class='text-center' >Duckweed</th>
	  <th class='text-center' >PlatoonGal</th>
	  <th class='text-center' >PlatoonBP</th>
	  <th class='text-center' >Navigate</th>
	  <th class='text-center' >TreatAlgae</th>
	  <th class='text-center' >TreatPondWeed</th>
	  <th class='text-center' >TreatPrim</th>
	  <th class='text-center' >AddDye</th>
	  <th class='text-center' >CustNotes</th>
	  <th class='text-center' >MyNotes</th>
    </tr>
  </thead>
  <tbody>
  
  <?
  while ($row = mysqli_fetch_row($result_out))
     {
	 
	 $date=date_create($row[1]);
     $newdate =  date_format($date,"D M d, Y @ h:i a");
	 
	 
        echo" <tr>";
      	echo" 	  <td class='text-center' scope='row'>$newdate</td>";
      	echo"     <td class='text-center' >$row[2]</td>";
      	echo"     <td class='text-center' >$row[3]</td>";
      	echo"     <td class='text-center' >$row[4]</td>";
		echo"     <td class='text-center' >$row[5]</td>";
		echo"     <td class='text-center' >"; if($row[6] !=0)echo $row[6]; echo"</td>";
		echo"     <td class='text-center' >"; if($row[7] !=0)echo $row[7]; echo"</td>";
		echo"     <td class='text-center' >"; if($row[8] !=0)echo $row[8]; echo"</td>";
		echo"     <td class='text-center' >"; if($row[9] !=0)echo $row[9]; echo"</td>";
		echo"     <td class='text-center' >"; if($row[10] !=0)echo $row[10]; echo"</td>";
		echo"     <td class='text-center' >"; if($row[11] !=0)echo $row[11]; echo"</td>";
		echo"     <td class='text-center' >"; if($row[12] !=0)echo $row[12]; echo"</td>";
		echo"     <td class='text-center' >"; if($row[13] !=0)echo $row[13]; echo"</td>";
		echo"     <td class='text-center' >$row[14]</td>";
		echo"     <td class='text-center' >$row[15]</td>";
		echo"     <td class='text-center' >$row[16]</td>";
		echo"     <td class='text-center' >$row[17]</td>";
		echo"     <td class='text-center' >$row[18]</td>";
		echo"     <td class='text-center' >$row[19]</td>";
		echo"     <td class='text-center' >$row[20]</td>";
		echo"     <td class='text-center' >$row[21]</td>";
		echo"     <td class='text-center' >"; if($row[22] !=0)echo $row[13]; echo"</td>";
		echo"     <td class='text-center' >"; if($row[23] !=0)echo $row[13]; echo"</td>";
		echo"     <td class='text-center' >"; if($row[24] !=0)echo $row[13]; echo"</td>";
		echo"     <td class='text-center' >"; if($row[25] !=0)echo $row[13]; echo"</td>";
		echo"     <td class='text-center' >"; if($row[26] !=0)echo $row[13]; echo"</td>";
		echo"     <td class='text-center' >$row[27]</td>";
		echo"     <td class='text-center' >$row[28]</td>";
		echo"     <td class='text-center' >$row[29]</td>";
		echo"     <td class='text-center' >"; if($row[30] !=0)echo $row[13]; echo"</td>";
		echo"     <td class='text-center' >"; if($row[31] !=0)echo $row[13]; echo"</td>";
		echo"     <td class='text-center' >"; if($row[32] !=0)echo $row[13]; echo"</td>";
		echo"     <td class='text-center' >$row[33]</td>";
		echo"     <td class='text-center' >$row[34]</td>";
		echo"     <td class='text-center' >$row[35]</td>";
		echo"     <td class='text-center' >$row[36]</td>";
		echo"     <td class='text-center' >$row[37]</td>";
		echo"     <td class='text-center' >$row[38]</td>";
      	echo" </tr>";
	 }
  ?>  
  </tbody>
</table>
	   
       

  </body>
</html>
