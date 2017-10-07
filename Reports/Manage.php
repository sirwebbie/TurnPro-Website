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

    if($debugger)
    {
      echo "the userID is: $userID <br>";
      echo "the username is: $user <br>";
      echo "the user's password is: $pwd <br>";
      echo "the WorkLevel is: $level <br>";
    }

      // insert information into customer tables

      // tell user that the information has been entered.

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

if(!empty($user))
    {
        if($debugger){echo"youare in";
        echo "<br> the user is $user <br>";}
		
		
        // Provides extra visual weight and identifies the primary action in a set of buttons
	
	

	
		
		

        

        /*
		  	 I need to list the accounts in 7 columns
		
		
		*/
		  	 $sql5 = "SELECT count(*) FROM `Accounts` WHERE 1";


		


    }
else {
    {echo "You are not authorized";}
}

    ?>


  </body>
</html>
