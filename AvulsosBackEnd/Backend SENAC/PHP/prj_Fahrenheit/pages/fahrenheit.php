<?php

$celsius = filter_input(INPUT_POST, "celsius", FILTER_VALIDATE_FLOAT);

if ($celsius === null || $celsius === false) {
    $mensagem = "<p>ERRO: Temperatura inválida ou não enviada!</p>";
} else {
    $fahrenheit = ($celsius * 9/5) + 32;
    $mensagem = "<p><strong>Celsius:</strong> $celsius °C</p>" .
                "<p><strong>Fahrenheit:</strong> " . number_format($fahrenheit, 2, ',', '.') . " °F</p>";
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Resultado da Conversão</title>
</head>
<body>
    <div id="resultado-container">
        <h1>Resultado da Conversão</h1>
        <div id="resultado">
            <?= $mensagem ?>
        </div>
        <a href="../index.html"><button>Voltar</button></a>
    </div>
</body>
</html>
