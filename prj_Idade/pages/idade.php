<?php

$nome = $_GET["nome"];
$anoNascimento = filter_input(INPUT_GET, "nascimento", FILTER_VALIDATE_INT);

$idade = 2025 - $anoNascimento;

$mensagemPrincipal = "<p> Seu nome é: " . $nome . "</p>" .  
                 "<p> Sua idade é: " . $idade . "</p>";

if ($idade >= 18) {
      $mensagem = "<p> Você é maior de idade. </p>";              
} else {
      $mensagem = "<p> Você é menor de idade. </p>"; 
}


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado da Idade</title>
    <link rel="stylesheet" href="../css/estilo.css">
</head>
<body>
    <h1>Resultado do cálculo da Maioridade</h1>

    <div id ="valor">   
        <?php
            echo $mensagemPrincipal;
            echo $mensagem;

        ?>

    </div>
    <a href="../index.html">Voltar</a>
</body>
</html>
