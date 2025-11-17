<?php

$inicio = filter_input(INPUT_GET, "inicio", FILTER_VALIDATE_FLOAT);
$valorFinal = filter_input(INPUT_GET, "valorFinal", FILTER_VALIDATE_FLOAT);
$passo = filter_input(INPUT_GET, "passo", FILTER_VALIDATE_FLOAT);

$resultadoContagem = "";
$resultadoContagem .= "<li>$inicio - INÍCIO</li>";
$contador = $inicio + $passo;

while ($contador + $passo <= $valorFinal) {
    $resultadoContagem .= "<li>$contador</li>";
    $contador += $passo;
}

$resultadoContagem .= "<li>$contador - FIM</li>";



?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Contagem</title>
</head>
<body>
    <h1>Contagem</h1>

    <ul>
        <?= $resultadoContagem ?>
    </ul>
</body>
</html>
