<?php

//ENTER YOUR DATABASE CONNECTION INFO BELOW:
$server="db696287767.db.1and1.com";
$database="db696287767";
$user="dbo696287767";
$password="only1TP!";

$mysqli = new MySQLi($server,$user,$password,$database);
0

require 'conf.inc.php';
/* prevent direct access to this page */
$isAjax = isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND
strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
if(!$isAjax) {
  $user_error = 'Access denied - direct call is not allowed...';
  trigger_error($user_error, E_USER_ERROR);
}
ini_set('display_errors',1);

/* if the 'term' variable is not sent with the request, exit */
if ( !isset($_REQUEST['term']) ) {
	exit;
}


/* Connect to database and set charset to UTF-8 */
if($mysqli->connect_error) {
  echo 'Database connection failed...' . 'Error: ' . $mysqli->connect_errno . ' ' . $mysqli->connect_error;
  exit;
} else {
  $mysqli->set_charset('utf8');
}

/* retrieve the search term that autocomplete sends */
$term = trim(strip_tags($_GET['term']));
/* replace multiple spaces with one */
$term = preg_replace('/\s+/', ' ', $term);

$a_json = array();
$a_json_row = array();

$a_json_invalid = array(array("id" => "#", "value" => $term, "label" => "Only letters and digits are permitted..."));
$json_invalid = json_encode($a_json_invalid);

/* SECURITY HOLE *************************************************************** */
/* allow space, any unicode letter and digit, underscore and dash                */
if(preg_match("/[^\040\pL\pN_-]/u", $term)) {
  print $json_invalid;
  exit;
}
/* ***************************************************************************** */

if ($data = $mysqli->query("SELECT * FROM Accounts WHERE AccountAlias LIKE '%$term%' ORDER BY AccountAlias")) {
	while($row = mysqli_fetch_array($data)) {
		$AcctAlias = htmlentities(stripslashes($row['AccountAlias']));
		$AcctID= htmlentities(stripslashes($row['AcctID']));
		$a_json_row["id"] = $AcctID;
		$a_json_row["value"] = $AcctAlias;
		$a_json_row["label"] = $AcctAlias;
		array_push($a_json, $a_json_row);
	}
}

/* jQuery wants JSON data */
echo json_encode($a_json);
flush();

$mysqli->close();


 ?>
