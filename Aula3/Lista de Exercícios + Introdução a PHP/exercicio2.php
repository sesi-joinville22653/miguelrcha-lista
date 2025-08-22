<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercicio 2 / Calcular a tabuada de um número informado.</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</head>

<body>
    <h1 style="position: relative; left:10px">Calcular a tabuada de um número informado.</h1>
    <form method="POST" action="exercicio2.php" class="m-3">
        <fieldset>
            <input type="text" id="num1" class="form-control" name="num1" required>
            <br>
            <button type="submit" class="btn btn-primary">Verifique aqui</button>
        </fieldset>
    </form>
</body>
    <style>
        body {
            margin: 20px;
        }

        #num1, #num2 {
            width: 250px;
        }
    </style>
</html>

<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $num1 = isset($_POST['num1']) ? (int)$_POST['num1'] : 0;

    for($i=0; $i <= 10; $i++) {
        $resultado = $num1 * $i;
        echo "<p> $num1 x $i = $resultado</p>";
    }
}

?>
