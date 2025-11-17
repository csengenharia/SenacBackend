<?php

// Obtém o número e a operação da URL (GET).
$numero = filter_input(INPUT_GET, "numero", FILTER_VALIDATE_FLOAT);
$operacao = filter_input(INPUT_GET, "operacao", FILTER_SANITIZE_STRING);
$resultadoOperacao = ""; // Variável para armazenar os resultados.
$simbolo = ""; // Inicializa o símbolo da operação.
$resultado = 0; // Inicializa o resultado da operação.       

// Verifica se o número e a operação são válidos.
if ($numero !== false && $numero !== null && !empty($operacao)) {

    // Exibir resultados:
 
    $resultadoOperacao .= "<p>O usuário escolheu o número a operação de " . ($operacao) . " com o número " . $numero . "</h4>";
 
    
    // Loop de 1 a 10 para realizar as operações.
    for ($i = 1; $i <= 10; $i++) {
    

        // Realiza adição ou subtração com base na escolha do usuário.
        if ($operacao == "adicao") {
            $resultado = $numero + $i;
            $simbolo = "+";
        } else if ($operacao == "subtracao") {
            $resultado = $numero - $i;
            $simbolo = "-";
        }
        
        // Adiciona cada linha de operação ao HTML de resultados.
        $resultadoOperacao .= "<p>" . $numero . " " . $simbolo . " " . $i . " = " . $resultado . "</p>";
    }
    
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado das Operações Matemáticas</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container">
        <h1>Resultado das Operações Matemáticas</h1>
        
        <?php echo $resultadoOperacao; // Exibe os resultados ?>
        
        <div class="botoes-navegacao">
            <a href="../index.html" class="btn-voltar">← Voltar ao Início</a>
            <a href="../index.html" class="btn-nova-operacao">Nova Operação</a>
    </div>
</body>
</html>
