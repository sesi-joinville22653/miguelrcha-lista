<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercicio 11/ Verificar se uma palavra é um palíndromo (ex: “arara”).</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</head>

<body>
    <h1 style="position: relative; left:10px">Verificar se uma palavra é um palíndromo (ex: “arara”).</h1>
    <form method="POST" action="exercicio11.php" class="m-3">
        <fieldset>
            <input type="text" id="str" class="form-control" name="str" required>
            <br>
            <button type="submit" class="btn btn-primary">Verifique aqui</button>
        </fieldset>
    </form>
</body>
<style>
    body {
        margin: 20px;
    }

    #str {
        width: 250px;
    }
</style>

</html>

<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $str = isset($_POST['str']) ? $_POST['str'] : '';

    function isPalindromo($str) {
        $str = preg_replace('/[^a-zA-Z0-9]/', '', strtolower($str));
        return $str === strrev($str);
    }

    echo "<p style='position: relative; left:10px'>A palavra <strong>'$str'</strong> " . (isPalindromo($str) ? "é" : "não é") . " um palíndromo.</p>";

}

?>