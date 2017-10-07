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

    <script>
        function submitForm(action)
        {
            document.getElementById('LoginForm').action = action;
            document.getElementById('LoginForm').submit();
        }
    </script>


  </head>
  <body>


    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>


 <div class="container text-center">
   <div class="row">
        <form name="LoginForm" id="LoginForm" method="post" action="index.php">
        <div class="col"></div>
        <div class="col">

            <div class="container-fluid row text-center"> <div class="col"><h1> TurnPro Reports</h1></div></div>

			<?
			      $debugger = true;

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
			
			?>
			
			
            <div class="container-fluid row text-sm-center">
              <div class="col text-center">Username: <input type="text" name="user" onfocus="this.select();" 
			  	   			  						 		onmouseup="return false;"  value="<? echo $user; ?>"></div>
              <div class="col text-center">Password: <input type="text" name="password" onfocus="this.select();" 
			  	   			  						 		onmouseup="return false;"  value="<? echo $pwd; ?>"></div>
            </div>

            <div class="container-fluid row text-sm-center">
                  <div class="col text-right"><input type="submit" name = "action" value="Manage"></div>
                  <div class="col text-center"><input type="submit" name = "action"  value="Applicate"></div>
                  <div class="col text-left"><input type="submit" name = "action"  value="Analyze"></div>
            </div>
        </div>

        <div class="col">

            <?php
          

            $debugger = true;


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


              // see if post has been made
                  if (!empty($_POST))
                  {
                    $user = $_POST['user'];
                    $pwd = $_POST['password'];

                    $query = "SELECT COUNT(*) FROM WS WHERE user ='$user' and BINARY pwd ='$pwd'";
                    $result = mysqli_query($link,$query);
                    //echo "<br>the result is $result <br>";

                    $row = mysqli_fetch_row($result);
                    if($debugger){echo "the count is: $row[0] <br>";}



                    if($row[0]==1)
                    {
                        $query = "SELECT * FROM WS WHERE user ='$user' and pwd ='$pwd'";
                        $result = mysqli_query($link,$query);

                        $row = mysqli_fetch_row($result);
                        if($debugger){
                        echo "the userID is: $row[0] <br>";
                        echo "the username is: $row[1] <br>";
                        echo "the user's password is: $row[2] <br>";
                        echo "the WorkLevel is: $row[3] <br>";
                                      }


                        $_SESSION['user'] = $user;
                        $_SESSION['pwd']= $pwd;
                        $_SESSION['level']= $row[3];
                        $_SESSION['userID'] = $row[0];
						$_SESSION['userName'] = $row[4];
						
                        if($debugger)
                            {echo "<br>he this is session user:". $_SESSION['user'];}

                        if($debugger){echo $_POST['action']." is the action<br>";}


                        if ($_POST['action']=="Applicate" && $row[3]>=1)
                            {
                              echo '<script type="text/javascript">',
                                    'submitForm("Applicate.php")',
                                    '</script>'
                                    ;
                            }
                        elseif ($_POST['action']=="Manage" && $row[3]>=2)
                          {
                              echo '<script type="text/javascript">',
                              'submitForm("Manage.php")',
                              '</script>'
                               ;
                          }
                      elseif ($_POST['action']=="Analyze" && $row[3]==3)
                          {
                              echo '<script type="text/javascript">',
                               'submitForm("Analyze.php")',
                               '</script>'
                                ;
                          }
                      else
                          {
                          echo "you are not authorized for this action ";
                          }

                      }
else {
  echo "You are not registered with this username and password";
}
                  }

              // if post has been made, store user name

              // also start session variable

              // redirect to desired page


             ?>


        </div>


    </form>

</div>

  </body>
</html>
