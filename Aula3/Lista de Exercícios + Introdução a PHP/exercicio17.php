<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercicio 17/ Receber uma data (dia, mês, ano) e validar se é uma data válida.</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</head>

<body>
    <h1 style="position: relative; left:10px">Receber uma data (dia, mês, ano) e validar se é uma data válida.</h1>
    <form method="POST" action="exercicio17.php" class="m-3">
        <fieldset>
            <input type="text" id="d" class="form-control" name="d" required>
            <br>
            <input type="text" id="m" class="form-control" name="m" required>
            <br>
            <input type="text" id="y" class="form-control" name="y" required>
            <br>
            <button type="submit" class="btn btn-primary">Verifique aqui</button>
        </fieldset>
    </form>
</body>
<style>
    body {
        margin: 20px;
    }

    #d, #m, #y {
        width: 250px;
    }
</style>

</html>

<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $d = isset($_POST['d']) ? (int)$_POST['d'] : 0;
    $m = isset($_POST['m']) ? (int)$_POST['m'] : 0;
    $y = isset($_POST['y']) ? (int)$_POST['y'] : 0;

    function validarData($d, $m, $y) {
        return checkdate($m, $d, $y);
    }

    echo "<p style='position: relative; left:10px'>A data $d/$m/$y " . (validarData($d, $m, $y) ? "é" : "não é") . " válida.</p>";
}

?>