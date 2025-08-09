<?php

$mensagem = 'Hello, world!';
echo ("<p align='center'> $mensagem </p>");

// Tipos de váriaveis
$primeiro_nome = 'Miguel Rocha'; // Tipo String
$idade = '18'; // Tipo inteiro
$estado = true; // Tipo booleano
$altura = '1.81'; // Tipo float


$frutas = array('banana', 'melancia', 'acerola');
$idades = array(3, 6, 9, 2, 21);
$idades_frutados = array(3, 'morango', 1.82);

// Tipo de váriavel constante
define('PI', 3.14159);
const SITE_NOME = 'Document'; // Meu site

// Tipo de váriavel null
$null = null; // Váriavel nula

// Estrutura do if e else
$resultado = ($idade - 18);

if ($resultado == 0) {
    echo ('Você foi alistado');
} else {
    echo ('Volte daqui alguns anos');
}

// Convertendo tipos de váriaveis
$numerozinho = 13.4;
$numero_convertido = (int) $numerozinho;
echo ('<br></br>');
echo ($numerozinho);
echo ('<br></br>');
echo ($numero_convertido);


// Estrutura do if e else [2]
$nota = 6;

if ($nota >= 7) {
    echo ('<br></br>');
    echo ('Passou!');
} else if ($nota <= 6) {
    echo ('<br></br>');
    echo ('Deu ruim!');
} else {
    echo ('<br></br>');
    echo ('pr pr patapim');
}

// Estrutura for

for ($i = 1; $i < 5; $i++) {
    echo ('<p> Contagem:' . $i . '</p>');
}

// Funcção

function saudacao($nome)
{
    return 'Olá $nome';
}

echo "<p align='center'>" . saudacao($primeiro_nome) . "</p>";


// Basic validation for idade
//if ($idade < 18) {
//    $validacao = false;
//    echo "<div class='alert alert-danger m-3' role='alert'>Idade must be 18 or older.</div>";
//} else if ($idade >= 18) {
//    echo "<div class='alert alert-success m-3' role='alert'>Form submitted successfully!</div>";
//} else {
//    echo "";
//}
