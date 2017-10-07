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
        echo"youare in";
        echo "<br> the user is $user <br>";
        // Provides extra visual weight and identifies the primary action in a set of buttons
    echo '<a href="NewAccount.php" class="btn btn-primary active" role="button" aria-pressed="true">New Account</a>';
    echo '<a href="ModifyAccount.php" class="btn btn-primary active" role="button" aria-pressed="true">View / Modify Account</a>';
    echo '<a href="AcctListAlias.php" class="btn btn-primary active" role="button" aria-pressed="true">Accounts by Alias</a>';
    echo '<a href="AcctListName.php" class="btn btn-primary active" role="button" aria-pressed="true">Accounts by Name</a>';

        //create link buttons to different areas.

        // link to New Account

        // linke to view / modify an account (including applicator assignment)

        // link for account list by Alias

        // link for account list by account




    }
    else {
    {echo "You are not authorized";}
    }

    ?>


<form name="manageForm" method="post" action="Manage.php">

  <fieldset>

    <legend>Account details</legend>
        Number of Ponds       <input type="text" name="pondNum">
        <br> Location         <input type="text" name="loc"><br>
        Account Alias(unique) <input type="text" name="AcctAlias"><br>
        Account Name(can repeat)          <input type="text" name="Acct"><br>
        Phone                 <input type="text" name="ph0"> Email<input type="text" name="eml0"><br>
  </fieldset>
  <fieldset>
    <legend>Contact List</legend>
    <table>
        <tr> <td>First Name</td><td>Last Name</td><td>Phone</td><td>Email</td></tr>
        <tr>
            <td><input type="text" name="Fname1"></td>
            <td><input type="text" name="Lname1"></td>
            <td><input type="text" name="ph1"></td>
            <td><input type="text" name="eml1"></td>
        </tr>
        <tr>
            <td><input type="text" name="Fname2"></td>
            <td><input type="text" name="Lname2"></td>
            <td><input type="text" name="ph2"></td>
            <td><input type="text" name="eml2"></td>
        </tr>
        <tr>
            <td><input type="text" name="Fname3"></td>
            <td><input type="text" name="Lname3"></td>
            <td><input type="text" name="ph3"></td>
            <td><input type="text" name="eml3"></td>
        </tr>
        <tr>
            <td><input type="text" name="Fname4"></td>
            <td><input type="text" name="Lnam4"></td>
            <td><input type="text" name="ph4"></td>
            <td><input type="text" name="eml4"></td>
        </tr>
        <tr>
            <td><input type="text" name="Fname5"></td>
            <td><input type="text" name="Lname5"></td>
            <td><input type="text" name="ph5"></td>
            <td><input type="text" name="eml5"></td>
        </tr>
        <tr>
            <td><input type="text" name="Fname6"></td>
            <td><input type="text" name="Lname6"></td>
            <td><input type="text" name="ph6"></td>
            <td><input type="text" name="eml6"></td>
        </tr>
    </table>

  </fieldset>

    <input type="submit" value="Enter Customer">
</form>
    <?php
    $debugger = true;

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

      try {

            # MS SQL Server and Sybase with PDO_DBLIB
            //$DBH = new PDO("mssql:host=$host;dbname=$dbname, $user, $pass");
            $DBH = new PDO("sybase:host=$hostname;dbname=$database, $username, $password");

            # MySQL with PDO_MYSQL
            //$DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

            # SQLite Database
            //$DBH = new PDO("sqlite:my/database/path/database.db");
          }
      catch(PDOException $e)
          {
              echo $e->getMessage();
          }





      // see if post has been made
          if (!empty($_POST))
          {
            $AcctAlias = $_POST['AcctAlias'];

            // if alias does not exist, enter in new informaiont

            # creating the statement
            $STH = $DBH->query('SELECT AccountAlias from Accounts');

            # setting the fetch mode
            $STH->setFetchMode(PDO::FETCH_OBJ);

            # showing the results
            while($row = $STH->fetch())
              {
                echo $row->AccountAlias . "\n";
              }


            # else
            #  {
            #    echo This Account Alias already exists;
            #  }



          }
          # end of if !empty post

    ?>


  </body>
</html>
