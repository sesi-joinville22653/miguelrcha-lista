<?php
require_once '../model/bd.php';

// Pegar o nome de quem acesosu o login com Ola, nome_professor
session_start();

if (!isset($_SESSION["email"])) {
    header('Location: login.php');
    exit;
}

// pegar o nome do professor logado
$email = $_SESSION["email"];
$stmt = $conn->prepare("SELECT nome_professor FROM professor WHERE email_professor = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$resultado = $stmt->get_result();
$dados = $resultado->fetch_assoc();
$nome_professor = $dados["nome_professor"];
// Exibe o nome do professor logado
?>

<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <title>Turma - SAEP</title>
</head>

<body>

    <div class="container">
        <br>
        <?php
        echo "<h1>Olá, $nome_professor! </h1>";
        ?>

        <h2>Início - SAEP</h2>

        <a href="cadastrar.php"><button type="submit" class="btn btn-primary" name="criar_turma">Cadastrar</button></a>
        <a href="visualizar.php"><button type="submit" class="btn btn-primary" name="criar_turma">Visualizar</button></a>
        <a href="atualizar.php"><button type="submit" class="btn btn-primary" name="criar_turma">Atualizar </button></a>
        <a href="deletar.php"><button type="submit" class="btn btn-danger" name="criar_turma">Deletar </button></a>
        <a href="logout.php" class="btn btn-danger">Logout</a>
        <br><br>

        <h2>Turma - SAEP</h2>

        <!-- Formulário para cadastrar turma -->

        <button type="submit" class="btn btn-primary" name="login">Cadastrar Turma</button>
    </div>

</body>


</html>