<h1>Miguel Rocha - Análise Técnica sobre CRUD com erros</h1>

--- 

Correção na página conexao.php

    <?php
        $host = "localhost"; 
        $username = "root"; 
        $password = "root"; // Adição da senha root para utilizar o banco de dados corretamente
        $dbname = "crud_exemplo"; // Criação do banco de dados no phpmyadmin para conseguir acessar o banco de dados na web

        $conn = new mysqli($host, $username, $password, $dbname);

        if ($conn->connect_error) { 
            die("Error! Connection failed: " . $conn->connect_error);
        }

        $conn->set_charset("utf8"); 

    ?>
  
---

Correção na página index.php

    $sql = "SELECT * FROM usuarios"; // Alterando o "FROM" ao invés de "FORM"

---

Correção na página cadastrar.php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];

    $sql = "INSERT INTO usuarios (nome, email) VALUES ('$nome', '$email')"; // Correção na adição das aspas nos VALUES '$nome' e '$email'
    $res = mysqli_query($conn, $sql);
    if ($res) {
        echo "Usuário cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar!";
    }
}

Resultado obtido:

    Usuário cadastrado com sucesso!
    Nome: miguel
    Email: miguel@gmail.com

---

Correção na página editar.php

    $id = isset($_GET["id"]) ? $_GET["id"] : null; // Correção na sintaxe da váriavel $id

    if ($id === null) { // Se $id for igual á nada, gerar um erro de ID não especificado
        die("ID não especificado.");
    }

---

Correção na página excluir.php

    <?php
        // Exclusão com risco de SQL Injection e sem confirmação
        include("conexao.php");


        $id = isset($_GET["id"]) ? $_GET["id"] : null;

        if ($id === null) {
            die("ID não especificado.");
        }

        $sql = "DELETE FROM usuarios WHERE id = $id";
        mysqli_query($conn, $sql);

        header("Location: index.php");
    ?>