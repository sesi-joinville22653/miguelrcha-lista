<?php
$mensagem = 'Hello, world!';

echo '<h1 align=center>' . $mensagem . '</h1>';

for ($i = 0; $i < 5; $i++) {
    echo 'Contagem' . $i . '</br>';
}

$x = isset($_POST['x']) ? htmlspecialchars($_POST['x']) : '';
$y = isset($_POST['y']) ? htmlspecialchars($_POST['y']) : '';
$sinal = isset($_POST['sinal']) ? htmlspecialchars($_POST['sinal']) : '';

if ($sinal == '+') {
    echo '<strong>Soma: ' . $x + $y;
} else if ($sinal == '-') {
    echo '<strong>Subtração: ' . $x - $y;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</head>

<body>
    <h1>Calculadora</h1>
    <form method="POST" action="index.php" class="m-3">
        <fieldset>
            <input type="text" id="x" class="form-control" name="x" required>
            <input type="text" id="sinal" class="form-control" placeholder="+/-" name="sinal" required>
            <input type="text" id="y" class="form-control" name="y" required>
            <br>
            <button type="submit" class="btn btn-primary">Calcular</button>
        </fieldset>
    </form>

</body>
    <style>

        * {
            justify-content: center;
            justify-self: center;
        }

        #sinal, #x, #y {
            width: 250px;
        }
    </style>
</html>