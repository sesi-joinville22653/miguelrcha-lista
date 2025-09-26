<?php
// Função para buscar os estados do Brasil via API do IBGE
include_once __DIR__ . '/../api-rest/BuscarEstadosIBGE.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estados Brasileiros - IBGE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h1 class="card-title text-center mb-0">Estados Brasileiros</h1>
                        <p class="text-center mb-0 opacity-75">Dados obtidos da API de Localidades do IBGE</p>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover mb-0">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col">Estado</th>
                                        <th scope="col">UF</th>
                                        <th scope="col">Código Oficial</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Verifica se houve erro na obtenção dos dados
                                    if ($temErro) {
                                        echo "<tr><td colspan='3' class='text-center text-danger'>{$dados['error']}</td></tr>";
                                    } else { // Se não houve erro, exibe os dados
                                        foreach ($dados as $estado) {
                                            echo "<tr>
                                                    <td>{$estado['nome']}</td>
                                                    <td>{$estado['sigla']}</td>
                                                    <td>{$estado['id']}</td>
                                                  </tr>";
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>