<?php

header(header: 'Content-Type: text/html; charset=utf-8');


$temperatura = 15;

if ($temperatura > 25) {
    $clima = 'Catabimbas, está calor';
} else {
    $clima = 'Catabimbas, está frio';
}

echo '<p> Temperatura : ' . $temperatura . ' °C -> ' . $clima . '</p>';


// Outra maneira (if, else)

$clima = ($temperatura > 25) ? 'Catabimbas, está calor' : 'Catabimbas, está frio';

echo '<p> Temperatura : ' . $temperatura . ' °C -> ' . $clima . '</p>';

// Do while

$contador = 5;

while ($contador > 0) {
    echo '<p> Contagem regressiva: ' . $contador;
    $contador--;
}

$valor = 10;

do {
    echo '<p> Este texto sempre estará aqui, mesmo que a condição seja falsiane. </p>';
    $valor++;
} while ($valor < 5);

// Array

$tarefas = [
    ['descricao' => 'Estudar PHP', 'concluida' => true],
    ['descricao' => 'Fazer meu papá', 'concluida' => false],
    ['descricao' => 'Pagar conta de luz', 'concluida' => true]
];

echo '<ul>';

// Criação de uma tabela => foreach == laço de looping
// $tarefas(principal) salvar para $tarefa para impressão em formato de uma tabela(<ul>)

foreach($tarefas as $tarefa) {
    $classe_css = $tarefa['concluida'] ? 'color: green, text-decoration: line-through;' : 'color: red'; // CSS in PHP 
    $status_texto = $tarefa['concluida'] ? '[Concluida]' : '[Pendente]';

    echo "<li style='$classe_css'>" . $tarefa['descricao'] . "" . $status_texto . "</li>";
}

echo '</ul>';
?>