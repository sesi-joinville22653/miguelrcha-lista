<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercicio 20/ Simular um formulário de login: comparar usuário e senha com valores fixos.</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</head>

<body>
    <h1 style="position: relative; left:20px">Simular um formulário de login: comparar usuário e senha com valores fixos.</h1>
    <form method="POST" action="exercicio20.php" class="m-3">
        <fieldset>
            <input type="text" id="username" class="form-control" name="username" required>
            <br>
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

    #username, #password {
        width: 250px;
    }
</style>

</html>

<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = isset($_POST['username']) ? (String)$_POST['username'] : 0;
    $password = isset($_POST['password']) ? (String)$_POST['password'] : 0;

    function verificarLogin($username, $password) {
        $usuarioValido = "valor";
        $senhaValida = "valor";
        return $username === $usuarioValido && $password === $senhaValida;
    }

    echo "<p style='position: relative; left:20px'>" . (verificarLogin($username, $password) ? "Login efetuado com sucesso" : "Tente Novamente.") . ".</p>";
}

?>