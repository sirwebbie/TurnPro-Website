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


 <div class="container text-center">
   <div class="row">
        <form name="LoginForm" method="post" action="index.php">
        <div class="col"></div>
        <div class="col">

            <div class="container-fluid row text-center"> <div class="col"><h1> TurnPro Reports</h1></div></div>

            <div class="container-fluid row text-sm-center">
              <div class="col text-center">Username: <input type="text" name="user" onfocus="this.select();" onmouseup="return false;"  value=""></div>
              <div class="col text-center">Password: <input type="text" name="password" onfocus="this.select();" onmouseup="return false;"  value=""></div>
            </div>

            <div class="container-fluid row text-sm-center">
                  <div class="col text-right"><input type="submit" value="Manage"></div>
                  <div class="col text-center"><input type="submit" value="Applicate"></div>
                  <div class="col text-left"><input type="submit" value="Analyze"></div>
            </div>
        </div>

        <div class="col">

            <?php

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
                 echo "Connection to MySQL server " .$hostname . " successful!
              " . PHP_EOL;
              }

              $db_selected = mysqli_select_db($link, $database);
              if (!$db_selected) {
                die ('Can\'t select database: ' . mysqli_error());
              }
              else {
                echo '<br><br>Database ' . $database . ' successfully selected!<br>';
              }



                  $sql = "SHOW TABLES FROM $database";

                  echo "<br>$sql";
                  echo "<br>hello <br>";
                  $result = mysqli_query($link, $sql);
                  //echo "this is result $result <br>";


                  if (!$result) {
                      echo "DB Error, could not list tables\n";
                      echo 'MySQL Error: ' . mysqli_error();
                      exit;
                  }

                  while ($row = mysqli_fetch_row($result)) {
                      echo "Table: $row[0]\n";
                  }

                //  mysql_free_result($result);



             ?>


        </div>


    </form>

</div>

  </body>
</html>
