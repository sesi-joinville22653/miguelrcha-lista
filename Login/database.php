<?php
$servidor = 'localhost';
$banco = 'php_miguel';
$usuario = 'root';
$senha = '';

try {
    $pdo = new PDO("mysql:host=$servidor; dbname=$banco; charset=utf8", $usuario, $senha);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    die("ERROR! Failed to access to database: " . $e->getMessage());
}
?>