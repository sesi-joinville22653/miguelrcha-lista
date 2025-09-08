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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <title>Cadastrar Item - SAEP</title>
</head>

<body>
    <div class="container">
        <br>
        <h2>Cadastrar Item - SAEP</h2>
        <?php echo "Cadastrando item na conta de <strong>" . $nome_professor . "</strong> em turma " ?>
        <br>
        <form action="cadastrar.php" method="POST">
            <div class="mb-3">
                <label for="descricao_atividade" class="form-label">Descrição da Atividade:</label>
                <input type="text" class="form-control" id="descricao_atividade" name="descricao_atividade" required>
            </div>
            <div class="mb-3">
                <label for="fk_id_turma" class="form-label">ID da Turma:</label>
                <input type="number" class="form-control" id="fk_id_turma" name="fk_id_turma" required>
            </div>
        </form>
            <button type="submit" class="btn btn-primary" name="login">Cadastrar</button>
            <a href="index.php"><button type="submit" class="btn btn-primary" name="login">Voltar</button></a>
</body>

</html>