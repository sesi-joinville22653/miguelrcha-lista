Miguel Rocha - Análise Técnica sobre CRUD com erros

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