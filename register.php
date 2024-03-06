<?php
ini_set("display_errors","1");
ini_set("display_startup_errors","1");
error_reporting(E_ALL);

if (empty($_POST["name"])) {
    die("Name is required");
}

if ( ! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    die("Valid email is required");
}

if (strlen($_POST["pass"]) < 8) {
    die("Password must be at least 8 characters");
}

if ( ! preg_match("/[a-z]/i", $_POST["pass"])) {
    die("Password must contain at least one letter");
}

if ( ! preg_match("/[0-9]/", $_POST["pass"])) {
    die("Password must contain at least one number");
}

if ($_POST["pass"] !== $_POST["c_pass"]) {
    die("Passwords must match");
}

$password_hash = password_hash($_POST["pass"], PASSWORD_DEFAULT);

$name =$_POST['name'];
$email =$_POST['email'];
$password_hash =$_POST['pass'];
$host = "localhost";
$dbname = "login";
$username = "root";
$password ="";
$conn = mysqli_connect(hostname: $host,
                         username: $username, 
                         password: $password, 
                         database: $dbname) ;

if (mysqli_connect_errno()) {
    die("Connection error: " . mysqli_connect_error ());
 }
$sql = "INSERT INTO user (name,email,password_hash)
VALUES (?, ?, ?)";

$stmt = mysqli_stmt_init($conn);

$stmt->prepare ($sql);

if (! $stmt->prepare($sql)) {
   die("SQL error: " . $mysqli->error);
}

$stmt->bind_param ("sss",
$_POST["name"],
$_POST["email"], 
$password_hash);

if ($stmt->execute()) {

   header("Location: login.html");
   exit;
   
} else {
   
   if ($mysqli->errno === 1062) {
       die("email already taken");
   } else {
       die($mysqli->error . " " . $mysqli->errno);
   }
}