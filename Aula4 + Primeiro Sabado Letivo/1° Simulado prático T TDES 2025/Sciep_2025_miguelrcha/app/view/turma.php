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
    <?php
        echo "<h1>Olá, $nome_professor! </h1>";
    ?>

        <h2>Turma - SAEP</h2>

        <button type="submit" class="btn btn-primary" name="criar_turma">Cadastrar Turma</button>
        <button type="submit" class="btn btn-primary" name="criar_turma">Visualizar Turma</button>
        <button type="submit" class="btn btn-primary" name="criar_turma">Atualizar Turma</button>
        <button type="submit" class="btn btn-danger" name="criar_turma">Deletar Turma</button>
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>

</body>


</html>