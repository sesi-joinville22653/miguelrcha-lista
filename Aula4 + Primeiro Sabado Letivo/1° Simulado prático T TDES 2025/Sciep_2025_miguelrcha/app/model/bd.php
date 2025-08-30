<?php
$host = "localhost"; // Padronizar
$username = "root"; // Padronizar
$password = "root"; // Padronizar 
$dbname = "sciep_2025_miguelrcha"; // Padronizar | {CREATE DATABASE sciep_2025_miguelrcha};

$conn = new mysqli($host, $username, $password, $dbname); // Cria a conexão para o MySQL

if ($conn->connect_error) { // Verifica se houve erro na conexão
    die("Error! Connection failed: " . $conn->connect_error);
}

$conn->set_charset("utf8"); // Define o conjunto de caracteres para UTF-8

?>
  