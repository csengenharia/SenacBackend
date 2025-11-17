<!-- 
Fórmula da área do triângulo:
Área = (base * altura) / 2
-->
<?php

$base = filter_input(INPUT_GET, "base", FILTER_VALIDATE_FLOAT);
$altura = filter_input(INPUT_GET, "altura", FILTER_VALIDATE_FLOAT);

if ($base === false || $altura === false) {
    $mensagem = "ERRO: Valores inválidos!!!";
} else {
    $area = ($base * $altura) / 2;
    $mensagem = "<p> Base => " . $_GET["base"] . "</p>" .
                "<p> Altura => " . $_GET["altura"] . "</p>" .
                "O valor da área do triângulo é: " . $area . "</p";
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../css/estilo.css">
    <title>Área</title>
</head>

<body>
    <h1>Resultado da Área do Triângulo</h1>
 <div id="resultado">
     <?= $mensagem ?>
 </div>

</body>

</html>
