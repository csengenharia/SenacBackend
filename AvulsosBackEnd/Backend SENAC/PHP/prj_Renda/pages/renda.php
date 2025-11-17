<?php

$nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_SPECIAL_CHARS);
$renda = filter_input(INPUT_POST, "renda", FILTER_VALIDATE_FLOAT);

if ($nome === null || $nome === false || $renda === false) {
    $mensagem = "<p>ERRO: Dados inválidos ou não enviados!</p>";
} else {
    $imposto = $renda * 0.075;
    $mensagem = "<p><strong>Contribuinte:</strong> $nome</p>" .
                "<p><strong>Renda Mensal:</strong> R$ " . number_format($renda, 2, ',', '.') . "</p>" .
                "<p><strong>Imposto Devido (7,5%):</strong> R$ " . number_format($imposto, 2, ',', '.') . "</p>";
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Resultado do Imposto de Renda</title>
</head>
<body>
    <div id="resultado-container">
        <h1>Resultado Imposto de Renda</h1>
        <div id="resultado">
            <?= $mensagem ?>
        </div>
        <a href="../index.html"><button>Voltar</button></a>
    </div>
</body>
</html>
