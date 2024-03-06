<?php 
ini_set("display_errors", "1");
ini_set("display_startup_errors", "1");
error_reporting(E_ALL);

$host = "localhost";
$dbname = "login";
$username = "root";
$password = "";

$mysqli = mysqli_connect($host, $username, $password, $dbname);

if (mysqli_connect_errno()) {
    die("Connection error: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $email = $mysqli->real_escape_string($_POST["email"]);

    $sql = sprintf("SELECT * FROM user WHERE email = '%s'", $email);
    
    $result = $mysqli->query($sql);

    if ($result) {
        $user = $result->fetch_assoc();
        
        if ($user && password_verify($_POST["pass"], $user["password_hash"])) {
            die("Login successful");
        }  else {
            header("Location: home.html");
            // echo 'wrong password';
            exit();
        }
    } else {
        die("Query error: " . $mysqli->error);
    }
}



//  ini_set("display_errors","1");
//  ini_set("display_startup_errors","1");
//  error_reporting(E_ALL);						 
//  						 $host = "localhost";
//  						 $dbname = "login";
//  						 $username = "root";
//  						 $password ="";						 
//  $mysqli = mysqli_connect(hostname: $host,
//                           username: $username, 
//                           password: $password, 
//                           database: $dbname) ;						 
//  if (mysqli_connect_errno()) {
//      die("Connection error: " . mysqli_connect_error ());
//  }
//  if($_SERVER[ "REQUEST_METHOD" ]==="POST" ) {
//  $mysqli = mysqli_connect(hostname: $host,
//                           username: $username, 
//                           password: $password, 
//                           database: $dbname) ;
//  if (mysqli_connect_errno()) {
//      die("Connection error: " . mysqli_connect_error ());
//  }
//  }	
//  	$sql = sprintf("SELECT * FROM user
//                      WHERE email = '%s'",
//                     $mysqli->real_escape_string($_POST["email"]));
//      $result = $mysqli->query($sql);
//      $user = $result->fetch_assoc();
//  	if($user){
//  		if(password_verify($_POST["pass"],$user["password_hash"])){
//  			die ("login successful");
//  		}
//  	}
// 	 
?>