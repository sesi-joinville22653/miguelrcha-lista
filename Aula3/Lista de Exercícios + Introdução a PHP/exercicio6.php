<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercicio 6 / Exibir todos os divisores de um número.</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</head>

<body>
    <h1 style="position: relative; left:10px"> Exibir todos os divisores de um número.</h1>
    <form method="POST" action="exercicio6.php" class="m-3">
        <fieldset>
            <input type="text" id="num1" class="form-control" name="num1" required>
            <br>
            <!--<input type="text" id="num2" class="form-control" name="num2" required>
            <br>-->
            <button type="submit" class="btn btn-primary">Verifique aqui</button>
        </fieldset>
    </form>
</body>
<style>
    body {
        margin: 20px;
    }

    #num1 {
        width: 250px;
    }
</style>

</html>

<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $num1 = isset($_POST['num1']) ? (int)$_POST['num1'] : 0;

    function encontrarDivisores($num1)
    { // Crindo uma função para encontrar os divisores
        $divisores = []; // Array para armazenar os divisores
        for ($i = 1; $i <= $num1; $i++) { // Loop para verificar todos os números de 1 até o número informado
            if ($num1 % $i === 0) {
                $divisores[] = $i; // Armazena o divisor no array
            }
        }
        return $divisores; // Retorna o array de divisores
    }

    $divisores = encontrarDivisores($num1); // Chamando a função para encontrar os divisores
    echo "<p style='position: relative; left:10px'>Os divisores de " . $num1 . " são: " . implode(", ", $divisores); // implode junta os elementos do array em uma string separada por vírgulas.

}

?>