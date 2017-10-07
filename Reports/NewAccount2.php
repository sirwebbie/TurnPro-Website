<?php session_start(); ?>
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
      fieldset {border: green 1px solid; margin: 5px; padding: 5px}
    </style>


    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

  </head>
  <body>


    <!-- jQuery first, then Tether, then Bootstrap JS. -->

    <?php
	include('Links.php');
	manageLinks();
	
	// session variables
    $userID = $_SESSION['userID'];
    $user = $_SESSION['user']  ;
    $pwd = $_SESSION['pwd'] ;
    $level = $_SESSION['level'] ;
	
	$debugger = false;

    if($debugger)
    {
      echo "the userID is: $userID <br>";
      echo "the username is: $user <br>";
      echo "the user's password is: $pwd <br>";
      echo "the WorkLevel is: $level <br>";
    }
	
   
  
      

echo "<br><br>";
  
	   // connect database*****************************************************************
	         //ENTER YOUR DATABASE CONNECTION INFO BELOW:
      $hostname="db696287767.db.1and1.com";
      $database="db696287767";
      $username="dbo696287767";
      $password="only1TP!";

      //DO NOT EDIT BELOW THIS LINE
      $link = mysqli_connect($hostname, $username, $password);
      if (!$link) {
      die('Connection failed: ' . mysqli_error());
      }
      else{
         if($debugger)
         {echo "Connection to MySQL server " .$hostname . " successful!
      " . PHP_EOL;}
      }

      $db_selected = mysqli_select_db($link, $database);
      if (!$db_selected) {
        die ('Can\'t select database: ' . mysqli_error());
      }
      else {
        if($debugger){echo '<br><br>Database ' . $database . ' successfully selected!<br>';}
      }
	  //*******************************************************************************************
	  
	   
	   // check to see if curent Alias exists******************************************************
	   $AccountAlias = $_POST['AccountAlias'];
	   //echo "<br><br> AccountAlias is $AccountAlias ...on line #".__line__."<br><br>";

	   /////////////////////need to connect to table
	   
	   
	   $checkQuery = "SELECT COUNT(*) FROM Accounts WHERE AccountAlias = '$AccountAlias'";
	   $checkResult = mysqli_query($link,$checkQuery);
	   $checkRow = mysqli_fetch_row($checkResult);
	   //echo "<br><br> checkRow[0] is... $checkRow[0] ...on line #".__line__."<br><br>";
	   
	   
	   if($checkRow[0]>0)
	   {
	   		   // if it does not exist, send that information to the next page and include the new alias in the new form(hidden)
			   echo "This account already exists; try another alias<br>";
			  
			   
	   }
	   else
	   {
	   	   // if yes, clear the post, say that record exists and rewrite the form	
		   	  //echo "This name is available...";
			  //////////////////// New form goes here ///////////////////////
			  
			  			  $AccountAlias = $_POST['AccountAlias']; 

			  
			  echo' <form name="newForm" method="post" action="NewAccount3.php">';
		  	  echo'     <input type="hidden" name="submitted" value="yes"></input>';
		  	  echo'     <input type="hidden" name="AcctID" />';
  		  	  echo'     <input type="hidden" name="AccountAlias" value="'.$AccountAlias.'" />';

			  echo'		  <fieldset>';
			  
			  
			  
			  
			  echo"		  	<legend> <h1>$AccountAlias</h1></legend>";
			  echo'<table>';
			  echo'<tr><th>Applicator</th><th>Category</th><th>Number of Ponds</th><th>Location</th></tr>';
			  echo'<tr>';
			  echo'   	<td><select name="ApplicatorID">';
			  echo'			<option value="0">Unassigned</option>';
			  echo'			<option value="1">Jason Webber</option>';
			  echo'			<option value="2">Sam Barnes</option>';
			  echo'			<option value="3">Matt Pierce</option>';
			  echo'			<option value="4">Austin Johnson</option>';
			  echo'			<option value="5">Mitch Lockhart</option>';
			  echo'			<option value="6">Adam Johnson</option>';
			  echo'			<option value="7">Josh May</option>';
			  echo'			<option value="8">Justin Howard</option>';
			  echo'			<option value="9">John Turner</option>';
			  echo'			</select>';
			  echo'		</td>';
			  echo'		<td>';
			  echo'			<select name="Category">';
			  echo'					<option value="0">Unassigned</option>';
			  echo'					<option value="1">Prospect</option>';
			  echo'					<option value="2">New</option>';
			  echo'					<option value="3">Returning</option>';
			  echo'			</select>';
			  echo'		</td>';
			  echo'		<td><input type="text" name="pondNum"">';
			  echo'		<td><input type="text" name="loc"></td>';
			  echo'	</tr>';
			  echo'	</table>';
			  echo'<br>';
			  echo'<table>';
			  echo'	   <tr><th></th><th>Street</th><th>City</th><th>State</th><th>Zip</th></tr>';
			  echo'	   <tr>';
			  echo'   		<th>Pond Address</th>';
			  echo'	   		<td><input type="text" name="StreetAddress"/></td>';
			  echo'	  		<td><input type="text" name="City" size="10" /></td>';
			  echo'   		<td><input type="text"  name="State" size="2" /></td>';
			  echo'	   		<td><input type="text"  name="Zip" size="5" /></td>';
			  echo'	   </tr>';
			  echo'	   <tr>';
			  echo'	   		<th>Account Address</th>';
			  echo'	   		<td><input type="text"  name="BusAddress" /></td>';
			  echo'	  		<td><input type="text"  name="BusCity" size="10"  /></td>';
			  echo'	   		<td><input type="text" name="BusState" size="2"  /></td>';
			  echo'	   		<td><input type="text"  name="BusZip" size="5"  /></td>';
			  echo'		</tr>';
			  echo'</table>';
			  echo'<br>';
			  echo'<table>';
			  echo'	   <tr><th>Name(can repeat)</th><th>Phone</th><th>Email</th></tr>';
			  echo'	   <tr>';
			  echo'	   		 <td><input type="text" name="AccountName"/></td>';
			  echo'   		 <td><input type="text" name="ph0"  size="15" /></td>';
			  echo'	   		 <td><input type="text" name="eml0"  size="" /></td>';
			  echo'	   </tr>';
			  echo'</table>';
		
               
   
echo'  </fieldset>';
echo'  <fieldset>';
echo'    <legend>Contact List</legend>';
echo'    <table>';
echo'        <tr> <td>First Name</td><td>Last Name</td><td>Phone</td><td>Email</td></tr>';
echo'        <tr>';
echo'            <td><input type="text" name="Fname1"></td>';
echo'            <td><input type="text" name="Lname1"></td>';
echo'            <td><input type="text" name="ph1"></td>';
echo'            <td><input type="text" name="eml1"></td>';
echo'        </tr>';
echo'        <tr>';
echo'            <td><input type="text" name="Fname2"></td>';
echo'            <td><input type="text" name="Lname2"></td>';
echo'            <td><input type="text" name="ph2"></td>';
echo'            <td><input type="text" name="eml2"></td>';
echo'        </tr>';
echo'        <tr>';
echo'            <td><input type="text" name="Fname3"></td>';
echo'            <td><input type="text" name="Lname3"></td>';
echo'            <td><input type="text" name="ph3"></td>';
echo'            <td><input type="text" name="eml3"></td>';
echo'        </tr>';
echo'        <tr>';
echo'            <td><input type="text" name="Fname4"></td>';
echo'            <td><input type="text" name="Lnam4"></td>';
echo'            <td><input type="text" name="ph4"></td>';
echo'            <td><input type="text" name="eml4"></td>';
echo'        </tr>';
echo'        <tr>';
echo'            <td><input type="text" name="Fname5" ></td>';
echo'            <td><input type="text" name="Lname5" ></td>';
echo'            <td><input type="text" name="ph5" ></td>';
echo'            <td><input type="text" name="eml5" ></td>';
echo'        </tr>';
echo'        <tr>';
echo'            <td><input type="text" name="Fname6"> </td>';
echo'            <td><input type="text" name="Lname6" ></td>';
echo'            <td><input type="text" name="ph6"></td>';
echo'            <td><input type="text" name="eml6"></td>';
echo'        </tr>';
echo'    </table>';

echo'  </fieldset>';

  
echo'  <h3>Notes</h3>';
echo'  <textarea name="Notes" rows="4" cols="75"></textarea><br>';
  
echo'  			<table>';
echo'			   <tr><th>Web Page</th><td><input type="text" name="WebPage"</td></tr>';  	
echo'			</table>';
  
  
echo'    <input type="submit" value="Update Account">';
echo'</form>';
			  
			  
			  //////////////////// End new form /////////////////////////////   
	   }

	   //******************************************************************************************
	   


    ?>


  </body>
</html>
