<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercicio 15/ Calcular IMC a partir do peso e altura e exibir a categoria</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</head>

<body>
    <h1 style="position: relative; left:10px">Calcular IMC a partir do peso e altura e exibir a categoria</h1>
    <form method="POST" action="exercicio15.php" class="m-3">
        <fieldset>
            <input type="text" id="kg" class="form-control" name="kg" placeholder="Peso:" required>
            <br>
            <input type="text" id="alt" class="form-control" name="alt" placeholder="Altura:" required>
            <br>
            <button type="submit" class="btn btn-primary">Verifique aqui</button>
        </fieldset>
    </form>
</body>
<style>
    body {
        margin: 20px;
    }

    #kg, #alt {
        width: 250px;
    }
</style>

</html>

<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $kg = isset($_POST['kg']) ? (int)$_POST['kg'] : 0;
    $alt = isset($_POST['kg']) ? (float)$_POST['alt'] : 0;

    $imc = $kg / ($alt * $alt);

    if($imc < 18.5) {
        $cat = "Abaixo do peso";
    } elseif ($imc < 24.9) {
        $cat = "Peso normal";
    } elseif ($imc < 29.9) {
        $cat = "Sobrepeso";
    } elseif ($imc < 34.9) {
        $cat = "Obesidade grau 1";
    } elseif ($imc < 39.9) {
        $cat = "Obesidade grau 2";
    } else {
        $cat = "Obesidade grau 3";
    }

    echo "<p style='position: relative; left:10px'>Seu IMC é " . number_format($imc, 2) . " e sua categoria é: $cat.</p>"; // number_format formata o número com 2 casas decimais
}

?>