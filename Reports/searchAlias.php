<?php session_start(); 

    $userID = $_SESSION['userID'];
    $user = $_SESSION['user']  ;
    $pwd = $_SESSION['pwd'] ;
    $level = $_SESSION['level'] ;

//ENTER YOUR DATABASE CONNECTION INFO BELOW:
$hostname="db696287767.db.1and1.com";
$database="db696287767";
$username="dbo696287767";
$password="only1TP!";


define('DB_SERVER', $hostname);
define('DB_USER', $username);
define('DB_PASSWORD', $password);
define('DB_NAME', $database);


if (isset($_GET['term'])){
	$return_arr = array();

	try {
	    $conn = new PDO("mysql:host=".DB_SERVER.";port=3306;dbname=".DB_NAME, DB_USER, DB_PASSWORD);
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

		$sql7 = "SELECT AccountAlias FROM Accounts WHERE ";
		if ($level <= 2){$sql7.=" ApplicatorID = $usreID ";}
		$sql7.= "AccountAlias LIKE :term";
	    $stmt = $conn->prepare($sql7);
	    $stmt->execute(array('term' => '%'.$_GET['term'].'%'));

	    while($row = $stmt->fetch()) {
	        $return_arr[] =  $row['AccountAlias'];
	    }

	} catch(PDOException $e) {
	    echo 'ERROR: ' . $e->getMessage();
	}


    /* Toss back results as json encoded array. */
    echo json_encode($return_arr);
}


?>
