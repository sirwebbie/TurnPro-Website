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

	
	<script>
			document.getElementById('AccntAlias').focus();
			document.getElementById('AccntAlias').select();
	</script>
	
	


<?php
	include('Links.php');
	applicateLinks();


    $debugger = false;

    // session variables
    $userID = $_SESSION['userID'];
    $user = $_SESSION['user']  ;
    $pwd = $_SESSION['pwd'] ;
    $level = $_SESSION['level'] ;


if($debugger){
    echo "the userID is: $userID <br>";
    echo "the username is: $user <br>";
    echo "the user's password is: $pwd <br>";
    echo "the WorkLevel is: $level <br>";
                  }

	$AccountAlias = $_SESSION['AccountAlias'];
    ?>
	
	<h1>Applicate</h1>
    <form action='Applicate2.php' method='post'>
      <p><label>AccountAlias:</label><input type='text' name='AccountAlias' id="AccntAlias" class='auto' value="<? echo $AccountAlias; ?>"></p>
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

	
	
	<?
	  		 // check to see if the form from applicate2 has been submitted. if so insert that record into the database.
			  if($_POST['submitted']=='yes')
			  {
			   			echo "ready to begin submittion<br>";
						
						$insertQ = "INSERT INTO Application SET ";			
						
						$AcctID = $_POST['AcctID'];		 	 				$insertQ.= "AcctID = '$AcctID', ";
						$Chara = $_POST['Chara'];		 	 				$insertQ.= "Chara = '$Chara', ";
						$Filamentous = $_POST['Filamentous']; 				$insertQ.= "Filamentous = '$Filamentous', ";
						$Planktonic = $_POST['Planktonic'];					$insertQ.= "Planktonic = '$Planktonic', ";
						$Oscillatoria = $_POST['Oscillatoria'];				$insertQ.= "Oscillatoria = '$Oscillatoria', ";
						$XTRGal = $_POST['XTRGal'];		 	 				$insertQ.= "XTRGal = '$XTRGal', ";
						$XTRBP = $_POST['XTRBP'];		 	 				$insertQ.= "XTRBP = '$XTRBP', ";
						$CuPowder = $_POST['CuPowder'];		 				$insertQ.= "CuPowder = '$CuPowder', ";
						$CuGranules = $_POST['CuGranules'];					$insertQ.= "CuGranules = '$CuGranules', ";
						$Komene = $_POST['Komene'];		 	 				$insertQ.= "Komene = '$Komene', ";
						$SeClearGal = $_POST['SeClearGal'];					$insertQ.= "SeClearGal = '$SeClearGal', ";
						$SeClearOz = $_POST['SeClearOz'];		 	 		$insertQ.= "SeClearOz = '$SeClearOz', ";
						$HydrotholOz = $_POST['HydrotholOz'];		 	 	$insertQ.= "HydrotholOz = '$HydrotholOz', ";
						$Coontail = $_POST['Coontail'];		 	 			$insertQ.= "Coontail = '$Coontail', ";
						$Naiad = $_POST['Naiad'];		 	 				$insertQ.= "Naiad = '$Naiad', ";
						$Bladderwarts = $_POST['Bladderwarts'];				$insertQ.= "Bladderwarts = '$Bladderwarts', ";
						$Elodea = $_POST['Elodea'];		 	 				$insertQ.= "Elodea = '$Elodea', ";
						$Hydrilla = $_POST['Hydrilla'];		 	 			$insertQ.= "Hydrilla = '$Hydrilla', ";
						$Watermilfoil = $_POST['Watermilfoil'];		 	 	$insertQ.= "Watermilfoil = '$Watermilfoil', ";
						$Widgeon = $_POST['Widgeon'];	 	 				$insertQ.= "Widgeon = '$Widgeon', ";
						$Other = $_POST['Other'];		 	 				$insertQ.= "Other = '$Other', ";
						$AquatholGal = $_POST['AquatholGal'];				$insertQ.= "AquatholGal = '$AquatholGal', ";
						$AquatholOz = $_POST['AquatholOz'];					$insertQ.= "AquatholOz = '$AquatholOz', ";
						$AquatholGran = $_POST['AquatholGran'];				$insertQ.= "AquatholGran = '$AquatholGran', ";
						$SonarGen = $_POST['SonarGen'];		 				$insertQ.= "SonarGen = '$SonarGen', ";
						$SonarOne = $_POST['SonarOne'];		 	 			$insertQ.= "SonarOne = '$SonarOne', ";
						$Primrose = $_POST['Primrose'];		 				$insertQ.= "Primrose = '$Primrose', ";
						$Watermeal = $_POST['Watermeal'];	 				$insertQ.= "Watermeal = '$Watermeal', ";
						$Duckweed = $_POST['Duckweed'];		 				$insertQ.= "Duckweed = '$Duckweed', ";
						$PlatoonGal = $_POST['PlatoonGal'];	 				$insertQ.= "PlatoonGal = '$PlatoonGal', ";
						$PlatoonBP = $_POST['PlatoonBP'];					$insertQ.= "PlatoonBP = '$PlatoonBP', ";
						$Navigate = $_POST['Navigate'];		 				$insertQ.= "Navigate = '$Navigate', ";
						$TreatAlgae = $_POST['TreatAlgae'];	 				$insertQ.= "TreatAlgae = '$TreatAlgae', ";
						$TreatPondweed = $_POST['TreatPondweed'];			$insertQ.= "TreatPondweed = '$TreatPondweed', ";
						$TreatPrimrose = $_POST['TreatPrimrose'];			$insertQ.= "TreatPrimrose = '$TreatPrimrose', ";
						$AddDye = $_POST['AddDye'];		 	 				$insertQ.= "AddDye = '$AddDye', ";
						$CustNotes = $_POST['CustNotes'];		 			$insertQ.= "CustNotes = '$CustNotes', ";
						$MyNotes = $_POST['MyNotes'];		 	 			$insertQ.= "MyNotes = '$MyNotes' ";
					
					
					echo $insertQ;
					
					
					
					
					
					
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
	   					   // End connect Database **********************************************************
					
					
					
					
			$result_insert = mysqli_query($link,$insertQ);
			
			echo "<h1> Your record has been updated</h1>";
						
						
			  }
			  
	?>
	<script>
			document.getElementById('AccntAlias').focus();
			document.getElementById('AccntAlias').select();
	</script>
	
  </body>
</html>
