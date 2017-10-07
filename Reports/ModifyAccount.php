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
	$AccountAlias =$_SESSION['AccountAlias']= $_POST['AccountAlias'];


if($debugger){
    echo "the userID is: $userID <br>";
    echo "the username is: $user <br>";
    echo "the user's password is: $pwd <br>";
    echo "the WorkLevel is: $level <br>";
                  }


    ?>
	<h1>Modify Accounts</h1>
    <form action='ModifyAccount2.php' method='post'>
      <p><label>AccountAlias:</label><input type='text' name='AccountAlias' value='<? echo $AccountAlias; ?>' class='auto'></p>
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

	
	<?php
		 if ($_POST['submitted']=='yes')
		 {
		 
		  	 //ENTER YOUR DATABASE CONNECTION INFO BELOW:
              $hostname="db696287767.db.1and1.com";
              $database="db696287767";
              $username="dbo696287767";
              $password="only1TP!";

              //DO NOT EDIT BELOW THIS LINE
              $link = mysqli_connect($hostname, $username, $password);
			  
			  $db_selected = mysqli_select_db($link, $database);
			  
			  
			  
			  
		  	// update record with new information
			//echo "alright you are here to update<br><br>";



				 //********** need to make sure each of these below is in the form for updateing ********

			
			$sql_update = "UPDATE Accounts SET";
			$pnum = $_POST['pondNum'];			$sql_update.= " pondNum = '$pnum', ";
			$loc = $_POST['loc'];					$sql_update.= " loc = '$loc', ";
			$AccountName = $_POST['AccountName'];	$sql_update.= " AccountName = '$AccountName', ";
			$AccountAlias = $_POST['AccountAlias'];	$sql_update.= " AccountAlias = '$AccountAlias', ";
			$ph0 = $_POST['ph0'];					$sql_update.= " ph0 = '$ph0', ";
			$eml0 = $_POST['eml0'];					$sql_update.= " eml0 = '$eml0', ";
			$Fname1 = $_POST['Fname1'];				$sql_update.= " Fname1 = '$Fname1', ";
			$Lname1 = $_POST['Lname1'];				$sql_update.= " Lname1 = '$Lname1', ";
			$ph1 = $_POST['ph1'];					$sql_update.= " ph1 = '$ph1', ";
			$eml1 = $_POST['eml1'];					$sql_update.= " eml1 = '$eml1', ";
			$Fname2 = $_POST['Fname2'];				$sql_update.= " Fname2 = '$Fname2', ";
			$Fname3 = $_POST['Fname3'];				$sql_update.= " Fname3 = '$Fname3', ";
			$Fname4 = $_POST['Fname4'];				$sql_update.= " Fname4 = '$Fname4', ";
			$Fname5 = $_POST['Fname5'];				$sql_update.= " Fname5 = '$Fname5', ";
			$Fname6 = $_POST['Fname6'];				$sql_update.= " Fname6 = '$Fname6', ";
			$Lname2 = $_POST['Lname2'];				$sql_update.= " Lname2 = '$Lname2', ";
			$Lname3 = $_POST['Lname3'];				$sql_update.= " Lname3 = '$Lname3', ";
			$Lname4 = $_POST['Lname4'];				$sql_update.= " Lname4 = '$Lname4', ";
			$Lname5 = $_POST['Lname5'];				$sql_update.= " Lname5 = '$Lname5', ";
			$Lname6 = $_POST['Lname6'];				$sql_update.= " Lname6 = '$Lname6', ";
			$ph2 = $_POST['ph2'];					$sql_update.= " ph2 = '$ph2', ";
			$ph3 = $_POST['ph3'];					$sql_update.= " ph3 = '$ph3', ";
			$ph4 = $_POST['ph4'];					$sql_update.= " ph4 = '$ph4', ";
			$ph5 = $_POST['ph5'];					$sql_update.= " ph5 = '$ph5', ";
			$ph6 = $_POST['ph6'];					$sql_update.= " ph6 = '$ph6', ";
			$eml2 = $_POST['eml2'];					$sql_update.= " eml2 = '$eml2', ";
			$eml3 = $_POST['eml3'];					$sql_update.= " eml3 = '$eml3', ";
			$eml4 = $_POST['eml4'];					$sql_update.= " eml4 = '$eml4', ";
			$eml5 = $_POST['eml5'];					$sql_update.= " eml5 = '$eml5', ";
			$eml6 = $_POST['eml6'];					$sql_update.= " eml6 = '$eml6', ";  			  		 		
			$ApplicatorID = $_POST['ApplicatorID'];	$sql_update.= " ApplicatorID = $ApplicatorID, ";
			$StreetAddress = $_POST['StreetAddress'];$sql_update.= " StreetAddress = '$StreetAddress', ";
			$City = $_POST['City'];					$sql_update.= " City = '$City', ";
			$State = $_POST['State'];				$sql_update.= " State = '$State', ";
			$Zip = $_POST['Zip'];					$sql_update.= " Zip = '$Zip', ";
			$BusAddress = $_POST['BusAddress'];		$sql_update.= " BusAddress = '$BusAddress', ";
			$BusCity = $_POST['BusCity'];			$sql_update.= " BusCity = '$BusCity', ";
			$BusState = $_POST['BusState'];			$sql_update.= " BusState = '$BusState', ";
			$BusZip = $_POST['BusZip'];				$sql_update.= " BusZip = '$BusZip', ";
			$Organization = $_POST['Organization'];	$sql_update.= " Organization = '$Organization', ";
			$Notes = $_POST['Notes'];				$sql_update.= " Notes = '$Notes', ";
			$WebPage = $_POST['WebPage'];			$sql_update.= " WebPage = '$WebPage', ";		  	   			
			$Category = $_POST['Category'];			$sql_update.= " Category = '$Category'";		  	   			

			
			
			$AcctID = $_POST['AcctID'];			$sql_update.=" WHERE AcctID=$AcctID;";

echo $sql_update;
			$result_update = mysqli_query($link,$sql_update);
			
			echo "<h1> Your record has been updated</h1>";
		 }
		 
		 
		 
	?>
	
	
	
  </body>
</html>
