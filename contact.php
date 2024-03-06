<?php

ini_set("display_errors","1");
ini_set("display_startup_errors","1");
error_reporting(E_ALL);
$name =$_POST['name'];
$email =$_POST['email'];
$number =$_POST['number'];
$message=$_POST['message'];
$host = "localhost";
$dbname = "real estate";
$username = "root";
$password ="";
$conn = mysqli_connect(hostname: $host,
                         username: $username, 
                         password: $password, 
                         database: $dbname) ;

if (mysqli_connect_errno()) {
    die("Connection error: " . mysqli_connect_error ());
 }
 $sql = "INSERT INTO contact2 (name,email,phone_number,query)
 VALUES (?, ?, ?, ?)";
 
 $stmt = mysqli_stmt_init($conn);
 if ( ! mysqli_stmt_prepare ($stmt, $sql)) {
 die (mysqli_error ($conn));
 
 }
 
 mysqli_stmt_bind_param($stmt, "ssss",
 $name,
 $email,
 $number,
 $message);
 mysqli_stmt_execute ($stmt) ;
 echo "Record saved." ;

 ?>
 