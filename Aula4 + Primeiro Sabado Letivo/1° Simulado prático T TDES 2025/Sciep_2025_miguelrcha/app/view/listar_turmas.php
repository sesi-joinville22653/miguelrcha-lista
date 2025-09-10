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
                <a href='excluir.php?id_turma=" . htmlspecialchars($row['id_turma']) . "' class='btn btn-danger btn-sm'>Excluir</a>
                <a href='listar_atividades.php?id_turma=" . htmlspecialchars($row['id_turma']) . "' class='btn btn-danger btn-sm'>Listar atividades</a>
                </td>";
        echo "</tr>";
    }
    ?>