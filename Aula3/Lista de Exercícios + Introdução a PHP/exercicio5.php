<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercicio 5/ Verificar se dois números formam um número amigo (soma dos divisores de um é igual ao outro).</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</head>

<body>
    <h1 style="position: relative; left:10px">Verificar se dois números formam um número amigo (soma dos divisores de um é igual ao outro).</h1>
    <form method="POST" action="exercicio5.php" class="m-3">
        <fieldset>
            <input type="text" id="num1" class="form-control" name="num1" required>
            <br>
            <input type="text" id="num2" class="form-control" name="num2" required>
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
    $num2 = isset($_POST['num2']) ? (int)$_POST['num2'] : 0;

    function somaDivisores($n) {
        $soma = 0;
        for ($i = 1; $i < $n; $i++) {
            if ($n % $i == 0) {
                $soma += $i;
            }
        }
        return $soma;
    }

    if (somaDivisores($num1) == $num2 && somaDivisores($num2) == $num1) {
        echo "<p style='position: relative; left:10px'>Os números $num1 e $num2 são amigos.</p>";
    } else {
        echo "<p style='position: relative; left:10px'>Os números $num1 e $num2 não são amigos.</p>";
    }
}

?>