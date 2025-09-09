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



// <?php
require_once 'bd.php';
session_start();
if (!isset($_SESSION["email"])) {
    header('Location: login.php');
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["cadastrar_turma"])) {
        $nome_turma = trim($_POST["nome_turma"] ?? "");
        $email_professor = $_SESSION["email"];

        // Buscar o id do professor pelo email
        $stmt_prof = $conn->prepare("SELECT id_professor FROM professor WHERE email_professor = ?");
        $stmt_prof->bind_param("s", $email_professor);
        $stmt_prof->execute();
        $result_prof = $stmt_prof->get_result();
        $row_prof = $result_prof->fetch_assoc();
        $id_professor = $row_prof['id_professor'] ?? null;

        if ($id_professor) {
            $stmt = $conn->prepare("INSERT INTO turma (nome_turma, fk_id_professor) VALUES (?, ?)");
            $stmt->bind_param("si", $nome_turma, $id_professor);

            if ($stmt->execute()) {
                echo "<h2>Turma cadastrada com sucesso!</h2>";
                echo '<a href="index.php">Voltar para a página inicial</a>';
                exit;
            } else {
                echo "<h2>Erro ao cadastrar turma: " . $stmt->error . "</h2>";
            }
        } else {
            echo "<h2>Erro: Professor não encontrado.</h2>";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Cadastrar Turma</h2>
    <form action="cadastrar_turma.php" method="post">
        <label for="nome_turma">Nome da turma:</label>
        <input type="text" id="nome_turma" name="nome_turma" required><br><br>
        <button type="submit" name="cadastrar_turma">Cadastrar Turma</button>
    </form>
    <br>
    <a href="index.php">Voltar para a página inicial</a>    
</body>
</html>
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
