<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercicio 19/ Receber uma senha e verificar se ela é forte (mín. 8 caracteres, com número e letra).</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</head>

<body>
    <h1 style="position: relative; left:10px">Receber uma senha e verificar se ela é forte (mín. 8 caracteres, com número e letra).</h1>
    <form method="POST" action="exercicio19.php" class="m-3">
        <fieldset>
            <input type="text" id="password" class="form-control" name="password" required>
            <br>
            <button type="submit" class="btn btn-primary">Verifique aqui</button>
        </fieldset>
    </form>
</body>
<style>
    body {
        margin: 20px;
    }

    #password {
        width: 250px;
    }
</style>

</html>

<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $password = isset($_POST['password']) ? (String)$_POST['password'] : 0;

    function verificarSenhaForte($password) {
        $temLetra = preg_match('/[a-zA-Z]/', $password); // Verificar se a senha contém pelo menos uma letra
        $temNumero = preg_match('/[0-9]/', $password); // Verificar se a senha contém pelo menos um número
        return strlen($password) >= 8 && $temLetra && $temNumero; // Verificar se a senha tem pelo menos 8 caracteres, uma letra e um número
    }

    echo "<p style='position: relative; left:10px'>A senha '$password' " . (verificarSenhaForte($password) ? "é" : "não é") . " forte.</p>";
}

?>