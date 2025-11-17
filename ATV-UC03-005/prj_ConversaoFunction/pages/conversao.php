<?php
// Verifica se o campo 'n_valor' foi enviado pelo formulário
// Se sim, converte para float e armazena em $valor, senão $valor = 0
$valor = isset($_GET['n_valor']) ? floatval($_GET['n_valor']) : 0;

// Verifica se o campo 'n_moeda' foi enviado
// Se sim, armazena o valor em $moeda, senão $moeda = ''
$moeda = isset($_GET['n_moeda']) ? $_GET['n_moeda'] : '';

// Verifica se o campo 'n_outrasMoeda' foi enviado
// Se sim, armazena o valor em $outraMoeda, senão $outraMoeda = ''
$outraMoeda = isset($_GET['n_outrasMoeda']) ? $_GET['n_outrasMoeda'] : '';

// Decide qual moeda usar: se outraMoeda foi escolhida, usa ela, senão usa moeda
if ($outraMoeda !== "") {
    $moedaDestino = $outraMoeda;
} else {
    $moedaDestino = $moeda;
}

// Array que associa o código da moeda ao nome completo
$nomesMoedas = [
    "USD" => "Dólar",
    "EUR" => "Euro",
    "GBP" => "Libra Esterlina",
    "JPY" => "Iene Japonês",
    "AUD" => "Dólar Australiano",
    "CAD" => "Dólar Canadense",
    "CHF" => "Franco Suíço",
    "CNY" => "Yuan Chinês",
    "ARS" => "Peso Argentino",
    "MXN" => "Peso Mexicano",
    "ZAR" => "Rand Sul-Africano"
];

// Descobre o nome da moeda de destino, se não encontrar usa o código
$nomeMoedaDestino = isset($nomesMoedas[$moedaDestino]) ? $nomesMoedas[$moedaDestino] : $moedaDestino;

// Validação: verifica se o valor é maior que zero e se uma moeda foi escolhida
$erro = "";
if ($valor <= 0) {
    $erro = "Informe um valor em Real maior que zero.";
} elseif (empty($moedaDestino)) {
    $erro = "Selecione uma moeda para conversão.";
}

// Inicializa a taxa de câmbio
$taxa = 0;

// Se não houver erro, consulta a API de câmbio
if (!$erro) {
    $url = "https://open.er-api.com/v6/latest/BRL";
    // Busca os dados da API
    $json = @file_get_contents($url); 
    if ($json !== false) {
        $dados = json_decode($json, true); // Decodifica o JSON
        // Se encontrou a moeda de destino na resposta
        if (isset($dados['rates'][$moedaDestino])) {
            // Pega a taxa de câmbio
            $taxa = $dados['rates'][$moedaDestino]; 
            // Faz a conversão
            $resultado = $valor * $taxa; 
        } else {
            $erro = "Moeda não encontrada na API.";
        }
    } else {
        $erro = "Erro ao acessar a API de câmbio.";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Resultado da Conversão</title>
    <link rel="stylesheet" href="./../css/style.css">
</head>
<body>
<main class="container">
    <h2>Resultado da Conversão</h2>
    <?php if ($erro): ?>
        <p class="error-message"><?= $erro ?></p>
    <?php else: ?>
        <p>Valor em Real: <strong>R$ <?= number_format($valor, 2, ',', '.') ?></strong></p>
        <p>Moeda de destino: <strong><?= htmlspecialchars($nomeMoedaDestino) ?></strong></p>
        <p>Taxa de câmbio: <strong><?= $taxa ?></strong></p>
        <p>Valor convertido: <strong><?= $moedaDestino ?> <?= number_format($resultado, 2, ',', '.') ?></strong></p>
    <?php endif; ?>
    <a href="../index.html" class="btn-voltar">&#8592; Nova conversão</a>
</main>
</body>
</html>