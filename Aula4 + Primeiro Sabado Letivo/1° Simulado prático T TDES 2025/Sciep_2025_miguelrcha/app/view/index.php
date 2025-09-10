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

        <h2>Turma - SAEP</h2>

        <a href="logout.php" class="btn btn-danger" style="position: relative; top:4px">Logout</a>
        <div class="container-cadastrar_turma" style="margin-left: 1080px; position: relative; left: 75px;">
            <a href="cadastrar.php"><button type="submit" class="btn btn-primary" name="cadastrar_turma">Cadastrar Turma</button></a>
        </div>
        
        <br><br>
        <!-- bootstrap tabela -->
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
            <tr>
                <th>Número</th>
                <th>Nome</th>
                <th>Ação</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $stmt = $conn->prepare("SELECT id_turma, nome_turma FROM turma WHERE fk_id_professor = (SELECT id_professor FROM professor WHERE email_professor = ?)");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $resultado = $stmt->get_result();

            while ($row = $resultado->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['id_turma']) . "</td>";
            echo "<td>" . htmlspecialchars($row['nome_turma']) . "</td>";
            echo "<td>
                <a href='visualizar.php' class='btn btn-info btn-sm'>Visualizar</a>
                <a href='excluir.php' class='btn btn-danger btn-sm'>Excluir</a>
                </td>";
            echo "</tr>";
            }
            ?>
            </tbody>
        </table>
         <!-- bootstrap tabela -->
    </div>

</body>


</html>