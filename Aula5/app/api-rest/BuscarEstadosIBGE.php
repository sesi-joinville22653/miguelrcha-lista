<?php
// Função para buscar os estados do Brasil via API do IBGE
function buscarEstadosIBGE()
{
    $url = "https://servicodados.ibge.gov.br/api/v1/localidades/estados?orderBy=nome"; // URL da API do IBGE
    $resposta = file_get_contents($url); // Faz a requisição GET
    $error = '';

    if ($resposta === FALSE) {
        die("Erro ao buscar dados da API do IBGE.");
    }

    $estados = json_decode($resposta, true); // Decodifica o JSON para um array associativo

    if (json_last_error() !== JSON_ERROR_NONE) {
        return ["error" => "Erro ao processar os dados da API: "]; // Retorna array vazio em caso de erro na decodificação
    }

    return $estados;
}

$dados = buscarEstadosIBGE();
$temErro = isset($dados['error']);
?>