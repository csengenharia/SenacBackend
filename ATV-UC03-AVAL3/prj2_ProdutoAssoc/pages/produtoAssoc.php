<?php
// Monica e Rudnei
/* Crie um array associativo para armazenar informações de um produto:
a-Nome do produto, preço, quantidade em estoque.

//Array associativo com 5 produtos */
$produto = [["produto" => "TV", "preco" => 5600.00, "quantidade" => 8],
["produto" => "Geladeira", "preco" => 3200.00, "quantidade" => 5],
["produto" => "Microondas", "preco" => 450.00, "quantidade" => 15],
["produto" => "Fogão", "preco" => 1500.00, "quantidade" => 10],
["produto" => "Máquina de Lavar", "preco" => 2500.00, "quantidade" => 7]];


?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado da Lista de Produtos</title>
    <link rel="stylesheet" href="./../css/style.css">
</head>

<body>
    <h1>Lista de Produtos</h1>

    <p>
    <h2> a/b-Nome do produto, preço, quantidade em estoque.</h2>
    <?php
   foreach ([$produto1, $produto2, $produto3, $produto4, $produto5] as $produto) {
     echo "Produto: " . $produto["nome"] . "<br>";
     echo "Preço: R$ " . number_format($produto["preco"], 2, ',', '.') . "<br>";
     echo "Qtd: " . $produto["quantidade"] . "<br><br>";}
    ?>

    </p>



    <h2> C - Atualize o preço de todos os produto e exiba todos eles novamente, simulando um desconto de 10% em todos os
        produtos. </h2>
    <?php
foreach ([$produto1, $produto2, $produto3, $produto4, $produto5] as $produtoDesconto) {
    $produtoDesconto["preco"] *= 0.9;
    echo "Produto: " . $produtoDesconto["nome"] . "<br>";
    echo "Preço com desconto: R$ " . number_format($produtoDesconto["preco"], 2, ',', '.') . "<br>";
    echo "Qtd: " . $produtoDesconto["quantidade"] . "<br><br>";
}

    ?>

    </p>


</body>

</body>