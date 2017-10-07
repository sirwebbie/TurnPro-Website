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
  </head>
  <body>


    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>


<?php
	include('Links.php');
	manageLinks();
	
    $debugger = false;

    // session variables
    $userID = $_SESSION['userID'];
    $user = $_SESSION['user']  ;
    $pwd = $_SESSION['pwd'] ;
    $level = $_SESSION['level'] ;
	$userName = $_SESSION['userName'];


if($debugger){
    echo "the userID is: $userID <br>";
    echo "the username is: $user <br>";
    echo "the user's password is: $pwd <br>";
    echo "the WorkLevel is: $level <br>";
                  }


    ?>
   

	
	<?php
	
		       
	
		 if (!empty($_POST))
		 {
		  $acctAlias = $_POST['AccountAlias'];
		  			  if($debugger){ echo "the account is $acctAlias";}
		  
		   //ENTER YOUR DATABASE CONNECTION INFO BELOW:
              $hostname="db696287767.db.1and1.com";
              $database="db696287767";
              $username="dbo696287767";
              $password="only1TP!";

              //DO NOT EDIT BELOW THIS LINE
              $link = mysqli_connect($hostname, $username, $password);
              if (!$link) 
			  	 {
              	  die('Connection failed: ' . mysqli_error());
              	 }
              else
			  	 {
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
			  
			  
			  # select the record from the database and populate form below
			  $query2 = "SELECT * FROM Accounts WHERE AccountAlias='$acctAlias'";
			  if($debugger){echo "$query2 is query2<br><br>";}
			  $result2 = mysqli_query($link,$query2);
			  $row2 = mysqli_fetch_row($result2);
			  if($debugger){
			   echo "row2[0] is $row2[0], $row2[3], $row2[4]...<br><br>";
			  	   		   }
			if($debugger){
			  foreach ($row2 as &$value)
			  		  {
					   echo "$value , ";
					  }
					  echo"<br><br>";
		  			  }
					  
					  
			if($debugger){
				echo "$row2[0], ";
				echo "$row2[3], ";
				echo "$row2[4] is the account alias<br>";			
			
			}		  
					
					
			// Associative array
			
	  $query4 = "SELECT * FROM Accounts WHERE AccountAlias='$acctAlias'";
	  $result4 = mysqli_query($link,$query2);
			
$row4=mysqli_fetch_row($result4);
if($debugger){printf ("%s (%s)\n",$row4["AcctID"],$row4["AccountName"]);}



// ************ Use the line below in the form population *************** //
if($debugger){echo '<br><br>'.$row4["AcctID"].','.$row4["AccountName"].','.$row4["AccountAlias"].', hello<br><br>';}
					
					
					  
					  
		 }
	
	?>
	
	<form name="manageForm" method="post" action="ModifyAccount.php">
		  <input type="hidden" name="submitted" value="yes"></input>
		  <input type="hidden" name="AcctID" value="<? echo $row4[0]; ?>" />
  <fieldset>

    <legend>Account details <h1><? echo"$row4[3]";?></h1></legend>
				
				
				<?
				//****************************************************
				  //uses this section to grab appliator name so it can be auto selected in the form below.
				  
				//$userID
				//userName
				?>
				
					
		<table>
			   <tr><th>Applicator</th><th>Category</th><th>Number of Ponds</th><th>Location</th></tr>
			   <tr>
			   	   	<td><select name="ApplicatorID">
									<option value="0" <? if($row4[31]==0) echo' selected ="selected"';  ?>>Unassigned</option>		  
									<option value="1" <? if($row4[31]==1) echo' selected ="selected"';  ?>>Jason Webber</option>
									<option value="2" <? if($row4[31]==2) echo' selected ="selected"';  ?>>Sam Barnes</option>
									<option value="3" <? if($row4[31]==3) echo' selected ="selected"';  ?>>Matt Pierce</option>
									<option value="4" <? if($row4[31]==4) echo' selected ="selected"';  ?>>Austin Johnson</option>
									<option value="5" <? if($row4[31]==5) echo' selected ="selected"';  ?>>Mitch Lockhart</option>
									<option value="6" <? if($row4[31]==6) echo' selected ="selected"';  ?>>Adam Johnson</option>
									<option value="7" <? if($row4[31]==7) echo' selected ="selected"';  ?>>Josh May</option>
									<option value="8" <? if($row4[31]==8) echo' selected ="selected"';  ?>>Justin Howard</option>
									<option value="9" <? if($row4[31]==9) echo' selected ="selected"';  ?>>John Turner</option>
						</select>
					</td>
					<td>
						<select name="Category">
									<option value="0" <? if($row4[43]==0) echo' selected ="selected"';  ?>>Unassigned</option>		  
									<option value="1" <? if($row4[43]==1) echo' selected ="selected"';  ?>>Prospect</option>
									<option value="2" <? if($row4[43]==2) echo' selected ="selected"';  ?>>New</option>
									<option value="3" <? if($row4[43]==3) echo' selected ="selected"';  ?>>Returning</option>
						</select>
					</td>	
			   		<td><input type="text" name="pondNum" value="<?php echo $row4[1] ?>">
					<td><input type="text" name="loc" value="<? echo $row4[2] ?>"></td>
				</tr>
		</table>
	<br>
		<table>
			   <tr><th></th><th>Street</th><th>City</th><th>State</th><th>Zip</th></tr>
			   <tr>
			   	   		<th>Pond Address</th>
				   		<td><input type="text" name="StreetAddress" value="<? echo $row4[32]; ?>" /></td>
				  		<td><input type="text" name="City" value="<? echo $row4[33]; ?>" size="10" /></td>
				   		<td><input type="text"  name="State" value="<? echo $row4[34]; ?>" size="2" /></td>
				   		<td><input type="text"  name="Zip" value="<? echo $row4[35]; ?>" size="5" /></td>
			   </tr>
			   <tr>
				   		<th>Account Address</th>
				   		<td><input type="text"  name="BusAddress" value="<? echo $row4[36]; ?>" /></td>
				  		<td><input type="text"  name="BusCity" value="<? echo $row4[37]; ?>" size="10"  /></td>
				   		<td><input type="text" name="BusState" value="<? echo $row4[38]; ?>" size="2"  /></td>
				   		<td><input type="text"  name="BusZip" value="<? echo $row4[39]; ?>" size="5"  /></td>
				</tr>

		</table>
		
		
		
		<br>
		<table>
			   <tr><th>Alias(unique)</th><th>Name(can repeat)</th><th>Phone</th><th>Email</th></tr>
			   <tr>
				   		<td><input type="text" name="AccountAlias" value="<? echo $row4[4]; ?>" /></td>
				  		<td><input type="text" name="AccountName" value="<? echo $row4[3]; ?>" size="" /></td>
				   		<td><input type="text" name="ph0" value="<? echo $row4[5]; ?>" size="15" /></td>
				   		<td><input type="text" name="eml0" value="<? echo $row4[6]; ?>" size="" /></td>
			   </tr>
				   	

		</table>
		
               
   
  </fieldset>
  <fieldset>
    <legend>Contact List</legend>
    <table>
        <tr> <td>First Name</td><td>Last Name</td><td>Phone</td><td>Email</td></tr>
        <tr>
            <td><input type="text" name="Fname1" value="<? echo $row4[7] ?>"></td>
            <td><input type="text" name="Lname1" value="<? echo $row4[8] ?>"></td>
            <td><input type="text" name="ph1" value="<? echo $row4[9] ?>"></td>
            <td><input type="text" name="eml1" value="<? echo $row4[10] ?>"></td>
        </tr>
        <tr>
            <td><input type="text" name="Fname2" value="<? echo $row4[11] ?>"></td>
            <td><input type="text" name="Lname2" value="<? echo $row4[12] ?>"></td>
            <td><input type="text" name="ph2" value="<? echo $row4[13] ?>"></td>
            <td><input type="text" name="eml2" value="<? echo $row4[14] ?>"></td>
        </tr>
        <tr>
            <td><input type="text" name="Fname3" value="<? echo $row4[15] ?>"></td>
            <td><input type="text" name="Lname3" value="<? echo $row4[16] ?>"></td>
            <td><input type="text" name="ph3" value="<? echo $row4[17] ?>"></td>
            <td><input type="text" name="eml3" value="<? echo $row4[18] ?>"></td>
        </tr>
        <tr>
            <td><input type="text" name="Fname4" value="<? echo $row4[19] ?>"></td>
            <td><input type="text" name="Lnam4" value="<? echo $row4[20] ?>"></td>
            <td><input type="text" name="ph4" value="<? echo $row4[21] ?>"></td>
            <td><input type="text" name="eml4" value="<? echo $row4[22] ?>"></td>
        </tr>
        <tr>
            <td><input type="text" name="Fname5" value="<? echo $row4[23] ?>"></td>
            <td><input type="text" name="Lname5" value="<? echo $row4[24] ?>"></td>
            <td><input type="text" name="ph5" value="<? echo $row4[25] ?>"></td>
            <td><input type="text" name="eml5" value="<? echo $row4[26] ?>"></td>
        </tr>
        <tr>
            <td><input type="text" name="Fname6" value="<? echo $row4[27] ?>"></td>
            <td><input type="text" name="Lname6" value="<? echo $row4[28] ?>"></td>
            <td><input type="text" name="ph6" value="<? echo $row4[29] ?>"></td>
            <td><input type="text" name="eml6" value="<? echo $row4[30] ?>"></td>
        </tr>
    </table>

  </fieldset>

  
  <h3>Notes</h3>
  <textarea name="Notes" rows="4" cols="75"><? echo $row4[41]; ?></textarea><br>
  
  			<table>
			   <tr><th>Web Page</th><td><input type="text" name="WebPage" value="<? echo $row4[42]; ?>" /></td></tr>  	
			</table>
  
  
    <input type="submit" value="Update Account">
</form>
	
  </body>
</html>
