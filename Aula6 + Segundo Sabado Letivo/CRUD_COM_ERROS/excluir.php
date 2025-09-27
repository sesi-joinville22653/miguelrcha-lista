<?php
// Exclusão com risco de SQL Injection e sem confirmação
include("conexao.php");


$id = isset($_GET["id"]) ? $_GET["id"] : null;

if ($id === null) {
    die("ID não especificado.");
}

$sql = "DELETE FROM usuarios WHERE id = $id";
mysqli_query($conn, $sql);

header("Location: index.php");
?>