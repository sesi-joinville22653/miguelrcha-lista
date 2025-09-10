<?php
require_once '../model/bd.php';

// Pegar o nome de quem acesosu o login com Ola, nome_professor
session_start();

if (!isset($_SESSION["email"])) {
    header('Location: login.php');
    exit;
}

// quero excluir na minha linha pelo id_turma 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["confirmar_exclusao"])) {
        $id_turma = $_POST["id_turma"] ?? "";

        // Verificar se existem atividades relacionadas à turma
        $checkStmt = $conn->prepare("SELECT COUNT(*) FROM atividade WHERE fk_id_turma = ?");
        $checkStmt->bind_param("i", $id_turma);
        $checkStmt->execute();
        $checkStmt->bind_result($count);
        $checkStmt->fetch();
        $checkStmt->close();

        if ($count > 0) {
            echo "<h2>Não é possível excluir a turma porque existem atividades relacionadas a ela.</h2>";
            echo '<a href="index.php">Voltar para a página inicial</a>';
            exit;
        }

        // Preparar e executar a consulta para excluir a turma
        $stmt = $conn->prepare("DELETE FROM turma WHERE id_turma = ?");
        $stmt->bind_param("i", $id_turma);

        if ($stmt->execute()) {
            echo "<h2>Turma excluída com sucesso!</h2>";
            echo '<a href="index.php">Voltar para a página inicial</a>';
            exit;
        } else {
            echo "<h2>Erro ao excluir turma: " . $stmt->error . "</h2>";
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <title>Excluir - SAEP</title>
</head>
<body>
    <br>
    <div class="container">
        <h2>Você realmente deseja excluir esta turma?</h2>
        <form action="excluir.php" method="post">
            <input type="hidden" name="id_turma" value="<?php echo htmlspecialchars($_GET['id_turma'] ?? ''); ?>">
            <button type="submit" class="btn btn-danger" name="confirmar_exclusao">Sim, excluir</button>
            <a href="index.php" class="btn btn-secondary">Não, voltar</a>
        </form>
    </div>
</body>
</html>