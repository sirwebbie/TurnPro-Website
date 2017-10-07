<?php

$loggedIn = false;

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
   echo "Connection to MySQL server " .$hostname . " successful!<br>
" . PHP_EOL;
}

$db_selected = mysqli_select_db($link, $database);

$user = $_POST['user'];
$pwd = $_POST['password'];
echo "<br><br> the user is $user<br><br>";

$query = "SELECT COUNT(*) FROM WS WHERE user ='$user' and pwd ='$pwd'";
$result = mysqli_query($link,$query);
//echo "<br>the result is $result <br>";

$row = mysqli_fetch_row($result);
echo "the count is: $row[0] <br>";

//echo $user;
if($row[0]==1)
{
echo"you logged in; yay!";

// put in form for application here.
}
else {
  {echo "you are not a user";}
}


?>
