<?php
$mensagem = ""; // Mensagem de erro
$dados = [];    // Array com dados do país

// Captura e sanitiza o país vindo do GET
$pais = filter_input(INPUT_GET, "paisBuscado", FILTER_SANITIZE_SPECIAL_CHARS);

if ($pais) {
    // Codifica para URL
    // rota translacion
    $url = "https://restcountries.com/v3.1/name/" . urlencode($pais);

    // Contexto HTTP
    $configuracoes = [
        "https" => [
            "method" => "GET",
            "header" => "Content-Type: application/json"
        ]
    ];

    $context = stream_context_create($configuracoes);
    $response = @file_get_contents($url, false, $context);

    if ($response === FALSE) {
        $mensagem = "País não encontrado ou erro na API.";
    } else {
        $resultado = json_decode($response, true);

        // Verifica se o resultado é vazio
        if (empty($resultado)) {
            $mensagem = "País não encontrado.";
        } else {
            // Pega o primeiro país retornado
            $paisInfo = $resultado[0];

            $dados['nomeOficial'] = $paisInfo['translations']['por']['official'] ?? $paisInfo['name']['official'];
            //$dados['nomeOficial'] = $paisInfo['translations']['por']['common'] ?? $paisInfo['name']['common'];
            $dados['capital']     = $paisInfo['capital'][0] ?? 'N/A';
            $dados['regiao']      = $paisInfo['region'] ?? 'N/A';
            $dados['populacao']   = $paisInfo['population'] ?? 'N/A';
            $dados['bandeira']    = $paisInfo['flags']['png'] ?? '';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado - Consulta de País</title>
    <link rel="stylesheet" href="./../css/style.css">
</head>
<body>
    <h2>Informações sobre o país</h2>

    <div id="pais-buscado">
        <span id="error"><?= $mensagem ?></span>

        <div>
            <label>Nome Oficial: </label>
            <input type="text" value="<?= $dados['nomeOficial'] ?? '' ?>" disabled>
        </div>

        <div>
            <label>Capital: </label>
            <input type="text" value="<?= $dados['capital'] ?? '' ?>" disabled>
        </div>

        <div>
            <label>Região: </label>
            <input type="text" value="<?= $dados['regiao'] ?? '' ?>" disabled>
        </div>

        <div>
            <label>População: </label>
            <input type="text" value="<?= isset($dados['populacao']) ? number_format($dados['populacao'], 0, ',', '.') : '' ?>" disabled>
        </div>

        <div>
            <label>Bandeira: </label>
            <?php if(!empty($dados['bandeira'])): ?>
                <img src="<?= $dados['bandeira'] ?>" alt="Bandeira de <?= $dados['nomeOficial'] ?>" style="width:200px;">
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
