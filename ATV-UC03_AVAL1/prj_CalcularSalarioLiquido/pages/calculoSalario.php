<?php

$valorHora = filter_input(INPUT_GET,"valorHora", FILTER_VALIDATE_FLOAT);
$qtdeHora = filter_input(INPUT_GET,"qtdeHora", FILTER_VALIDATE_FLOAT);
$salarioLiquido = 0;
$totalImposto = 0;

$salarioLiquido = $valorHora * $qtdeHora;

if ($salarioLiquido >= 2000) {
    $totalImposto = $salarioLiquido * 0.05;
    $salarioLiquido = $salarioLiquido - $totalImposto;
    $resultadoSalario = " <p> Salário Líquido:  R$ ". number_format($salarioLiquido, 2, ",", ".") . "</p>".
      "<p> Valor do Imposto:  R$ " . number_format($totalImposto, 2, ",", ".")."</p>";

} else {
    $resultadoSalario = "<p> O salário líquido sem imposto: R$ ". 
    number_format($salarioLiquido, 2, ",", ".") . "</p>" ;
}

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado do Cálculo do Salário Líquido </title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

    <h1>Resultado do Cálculo do Salário Total </h1>

    <?php echo $resultadoSalario; ?>


</form>
</body>
</html>