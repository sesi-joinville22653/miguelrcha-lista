<?php

require_once '../model/bd.php'; // Inclui o arquivo de conexão com o banco de dados

session_start(); // Inicia a sessão

if (isset($_SESSION["email"])) { // Verifica se o usuário já está logado
    header('Location: turma.php'); // Redireciona para a página inicial
    exit;
}

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") { // Verifica se o formulário foi enviado
    if (isset($_POST["login"])) { // Verifica se o botão de login foi clicado
        $email = trim($_POST["email"] ?? ""); // Pega o email do formulário
        $password = trim($_POST["password"] ?? ""); // Pega a senha do formulário

        $stmt = $conn->prepare("SELECT * FROM professor WHERE email_professor = ? AND password_professor = ?"); // Prepara a consulta SQL
        $stmt->bind_param("ss", $email, $password); // ss = string, string, vincula os parâmetros
        $stmt->execute(); // Executa a consulta
        $resultado = $stmt->get_result(); // Pega o resultado da consulta

        if ($resultado->num_rows === 1) { // Verifica se encontrou um usuário
            $dados = $resultado->fetch_assoc(); // Pega os dados do usuário

            $_SESSION["email"] = $dados["email_professor"]; // Armazena o email na sessão
            $_SESSION["name"] = $dados["nome_professor"]; // Armazena o nome na sessão
            header('Location: turma.php'); // Redireciona para a página inicial
            exit;
        } else {
            $error = "Email ou senha inválidos."; // Mensagem de erro
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <title>Login - SAEP</title>
</head>

<body>
    <h2>Login - SAEP</h2>

    <form method="POST" action="login.php" class="m-3"> <!-- Formulário de login feito com bootstrap -->
        <fieldset>
            <div class="mb-2">
                <label for="disabledTextInput" class="form-label">Email:</label>
                <input type="email" id="email" class="form-control" name="email" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <div class="input-group">
                    <input type="password" id="password" class="form-control" name="password" required>
                    <button class="btn btn-outline-secondary" type="button" id="togglePassword" tabindex="-1">
                        <span id="eyeIcon">&#128065;</span>
                    </button>
                </div>
            </div>

            <div class="mb-2">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="disabledFieldsetCheck">
                    <label class="form-check-label" for="disabledFieldsetCheck">
                        Manter-me conectado
                    </label>
                </div>
            </div>

            <button type="submit" class="btn btn-primary" name="login">Login</button>
            <a href="cadastro.php" class="btn btn-link">Cadastre-se aqui</a>
            <?php
            if ($error) {
                echo '<div class="alert alert-danger mt-3" role="alert">' . htmlspecialchars($error) . '</div>';
            }
            ?>
        </fieldset>
    </form>
</body>
<style>
    body {
        margin: 20px;
    }
</style>
<script>
    const passwordInput = document.getElementById('password');
    const togglePassword = document.getElementById('togglePassword');
    const eyeIcon = document.getElementById('eyeIcon');

    togglePassword.addEventListener('click', function() {
        const type = passwordInput.type === 'password' ? 'text' : 'password';
        passwordInput.type = type;
        // Alterna o ícone (olho aberto/fechado)
        eyeIcon.textContent = type === 'password' ? '\u{1F441}' : '\u{1F441}\u{200D}\u{1F5E8}';
    });
</script>

</html>