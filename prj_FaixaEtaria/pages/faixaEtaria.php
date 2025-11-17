<?php

$nome = $_GET["nome"];
$idade = filter_input(INPUT_GET, "idade", FILTER_VALIDATE_INT);


$mensagemPrincipal = "<p> Seu nome é: " . $nome . "</p>" .  
                 "<p> Sua idade é: " . $idade . "</p>";

if ($idade <= 12) {
    $faixa = "<p> Você é criança. </p>";              
} elseif ($idade > 12 && $idade < 18) {
    $faixa = "<p> Você é adolescente. </p>"; 
} elseif ($idade >= 18 && $idade <= 25) {
    $faixa = "<p> Você é jovem. </p>"; 
}elseif ($idade >= 26 && $idade <= 60) {
    $faixa = "<p> Você é adulto. </p>"; 
}elseif ($idade > 60) {
    $faixa = "<p> Você é melhor idade. </p>"; 
}

if ($idade >= 18) {
        $mensagemSistema = "<p>Bem-vindo, " . $nome . "! </p>";
}else { 
        $mensagemSistema = "<p> Acesso Negado! Apenas maiores de 18 podem ingressar! </p>";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acesso ao Sistema</title>
    <link rel="stylesheet" href="../css/estilo.css">
</head>
<body>
    <h1>Resultado Faixa Etária - Acesso no Sistema</h1>

    <div id ="valor">   
        <?php
            echo $mensagemPrincipal;
            echo $faixa;
            echo $mensagemSistema;

        ?>

    </div>
    <a href="../index.html">Voltar</a>
</body>
</html>
