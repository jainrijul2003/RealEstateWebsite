<?php

ini_set("display_errors","1");
ini_set("display_startup_errors","1");
error_reporting(E_ALL);
$property_name =$_POST['property_name'];
$price =$_POST['price'];
$deposit =$_POST['deposit'];
$address=$_POST['address'];
$offer=$_POST['offer'];
$type=$_POST['type'];
$status=$_POST['status'];
$furnished=$_POST['furnished'];
$bhk=$_POST['bhk'];
$description=$_POST['description'];
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
 $sql = "INSERT INTO property (property_name,price,deposit,address,offer,type,status,furnished,bhk,description)
 VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
 
 $stmt = mysqli_stmt_init($conn);
 if ( ! mysqli_stmt_prepare ($stmt, $sql)) {
 die (mysqli_error ($conn));
 
 }
 
 mysqli_stmt_bind_param($stmt, "ssssssssss",
$property_name, 
$price,
$deposit, 
$address,
$offer,
$type,
$status,
$furnished,
$bhk,
$description
);
 mysqli_stmt_execute ($stmt) ;
 header("Location: https://forms.gle/Wu1MrwJ7R1MG4owJA"); 
  ;

 ?>