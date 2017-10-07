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
	applicateLinks();
	// session variables
    $userID = $_SESSION['userID'];
    $user = $_SESSION['user']  ;
    $pwd = $_SESSION['pwd'] ;
    $level = $_SESSION['level'] ;
	$_SESSION['AccountAlias']= $_POST['AccountAlias'];

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


	   $AccountAlias = $_POST['AccountAlias'];

?>

		Applicate for: <? echo $AccountAlias; ?>
			 <?
			   // need to grab the AcocuntID for this Alias and put it as the value below
			   //////////////////////////////////////////////////////////////////////////
			   $idQuery = "SELECT AcctID FROM Accounts WHERE AccountAlias = '$AccountAlias'";
			   $idResult = mysqli_query($link,$idQuery);
			   $idRow = mysqli_fetch_row($idResult);
			   $AcctID = $idRow[0];
			  // echo "The account ID is $AcctID on line ".__line__."<br><br>";




			 ?>

			 <!-- I changed the action below from Applicate.php to TestPDFReport2.php -->
			  <form name="ApplicateForm2" method="post" action="TestPDFReport2.php">
			  		<input type="hidden" value="<? echo $AcctID; ?>" name="AcctID" />
					<input type="hidden" value="<? echo $AccountAlias ; ?>" name="AccountAlias" />
					<input type="hidden" value="yes" name="submitted" />

		<div class="container-fluid"><!-- Beginning of Agae of container -->  
			<div class="row">
                   <div class="col">Algae's</div>
             </div>
             <div class="row">
                   <div class="col">Chara</div><div class="col"><input type="checkbox" name="Chara" value="Y" /></div>
             </div>
             <div class="row">
                    <div class="col">Filamentous</div><div class="col"><input type="checkbox" name="Filamentous" value="Y" /></div>
             </div>
			 <div class="row">
                    <div class="col">Planktonic</div><div class="col"><input type="checkbox" name="Planktonic" value="Y" /></div>
             </div>
			 <div class="row">
                    <div class="col">Oscillatoria</div><div class="col"><input type="checkbox" name="Oscillatoria" value="Y" /></div>
             </div>
        </div>	<!-- End of Agae container -->


		<div class="container"><!-- Beginning of Treatment of container -->
			<div class="row">
                   <div class="col">Treatment</div>
             </div>
             <div class="row">
                   <div class="col">XTR </div>
				   <div class="col"><input type="text" name="XTRGal" size="3" />Gal</div>

				   <div class="col">XTR Backpack</div>
				   <div class="col"><input type="text" name="XTRBPGal" size="3" />Gal</div>

             </div>
             <div class="row">
                    <div class="col">CuSO4 (powder)</div><div class="col"><input type="text" size="2" name="CuPowder"/>LBS.</div>
   					<div class="col">CuSO4 (granules)</div><div class="col"><input type="text" size="2" name="CuGranules"/>LBS.</div>
             </div>

        </div>	<!-- End of Treatment container -->


		<div class="container"><!-- Beginning of Underwater of container -->
			<div class="row">
                   <div class="col">Underwater</div>
             </div>
             <div class="row">
                   <div class="col">Coontail</div><div class="col"><input type="checkbox" name="Coontail" value="Y" /></div>
             </div>
             <div class="row">
                    <div class="col">Naiad</div><div class="col"><input type="checkbox" name="Naiad" value="Y" /></div>
             </div>
			 <div class="row">
                    <div class="col">Bladderwarts</div><div class="col"><input type="checkbox" name="Bladderwarts" value="Y" /></div>
             </div>
			 <div class="row">
                    <div class="col">Elodea</div><div class="col"><input type="checkbox" name="Elodea" value="Y" /></div>
             </div>
			 <div class="row">
                    <div class="col">Hydrilla</div><div class="col"><input type="checkbox" name="Hydrilla" value="Y" /></div>
             </div>
			 <div class="row">
                    <div class="col">Watermilfoil</div><div class="col"><input type="checkbox" name="Watermilfoil" value="Y" /></div>
             </div>
			 <div class="row">
                    <div class="col">Widgeon Grass</div><div class="col"><input type="checkbox" name="Widgeon" value="Y" /></div>
             </div>
			 <div class="row">
                    <div class="col">Other</div><div class="col"><input type="checkbox" name="Other" value="Y" /></div>
             </div>
        </div>	<!-- End of Underwater container -->

		<div class="container"><!-- Beginning of Underwater Treatment of container -->
			<div class="row">
                   <div class="col">Treatment</div>
             </div>
             <div class="row">
                   <div class="col">Sonar Genesis </div>
				   <div class="col"><input type="text" name="SonarGen" size="3" />Oz</div>

				   <div class="col">Sonar One</div>
				   <div class="col"><input type="text" name="SonarOne" size="3" />LBS.</div>

             </div>
             <div class="row">
                    <div class="col">Aquathol</div><div class="col"><input type="text" size="4" name="Aquathol"/>Gal</div>
   					<div class="col">SuperK Aquathol (Granules)</div><div class="col"><input type="text" size="4" name="SuperKGran"/>LBS.</div>
             </div>
        </div>	<!-- End of UnderwaterTreatment container -->


			<div class="container"><!-- Beginning of Floatin of container -->
			<div class="row">
                   <div class="col">Underwater</div>
             </div>
             <div class="row">
                   <div class="col">Primrose</div><div class="col"><input type="checkbox" name="Primrose" value="Y" /></div>
             </div>
             <div class="row">
                    <div class="col">Watermeal</div><div class="col"><input type="checkbox" name="Watermeal" value="Y" /></div>
             </div>
			 <div class="row">
                    <div class="col">Duckweed</div><div class="col"><input type="checkbox" name="Duckweed" value="Y" /></div>
             </div>

        </div>	<!-- End of Floating container -->


		<div class="container"><!-- Beginning of Floating Treatment of container -->
			<div class="row">
                   <div class="col">Treatment</div>
             </div>
             <div class="row">
                   <div class="col">Platoon </div>
				   <div class="col"><input type="text" name="Platoon" size="3" />Gal.</div>

				   <div class="col">Navigate</div>
				   <div class="col"><input type="text" name="Navigate" size="3" />LBS.</div>

             </div>

        </div>	<!-- End of Floating Treatment container -->












	<div class="container"><!-- Beginning of Canned notes container -->
		<div class="row">       <div class="col">Canned notes to customer</div>          </div>
		<div class="row"><div class="col"><input type="checkbox" name="TreatAlgae" value="Y" /></div><div class="col">Treated for Algae</div></div>
		<div class="row"><div class="col"><input type="checkbox" name="TreatPondweed" value="Y" /></div><div class="col">Treated for Pondweed</div></div>
		<div class="row"><div class="col"><input type="checkbox" name="TreatPrimrose" value="Y" /></div><div class="col">Treated for Primrose</div></div>
		<div class="row"><div class="col"><input type="checkbox" name="AddDye" value="Y" /></div><div class="col">Added Dye</div></div>
   </div>	<!-- End of Canned notes container -->



	<div class="container"><!-- Beginning of Customer notes container -->
		<div class="row">       <div class="col">Other notes to customer</div>          </div>
		<div class="row">		<div class="col"><textarea name="CustNotes"></textarea></div></div>
   </div>	<!-- End of Customer notes container -->


   	<div class="container"><!-- Beginning of Self notes container -->
		<div class="row">       <div class="col">My Notes to Me</div>          </div>
		<div class="row">		<div class="col"><textarea name="MyNotes"></textarea></div></div>
   </div>	<!-- End of Customer notes container -->


			  <input type="submit" value="Enter Application Record" />

			  </form>

		<br><br>
		<h1>History</h1>
		<table>
			   <tr><th>Date</th>   				</tr>

		</table>


  </body>
</html>
