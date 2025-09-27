<?php
$host = "localhost"; 
$username = "root"; 
$password = "root"; 
$dbname = "crud_exemplo"; 

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) { 
    die("Error! Connection failed: " . $conn->connect_error);
}

$conn->set_charset("utf8"); 

?>
  