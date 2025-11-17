<?php

//array_keys — Retorna todas as chaves ou uma parte das chaves de um array

// Criando um array associativo de carros, onde a chave é a marca e o valor é o modelo
$carros = array(
    "volvo" => "XC90",
    "bmw" => "X5",
    "toyota" => "RAV4"
);

//EXEMPLO 01
// Retorna todas as chaves do array $carros, neste caso todas as marcas  ["volvo", "bmw", "toyota"]
$todas = array_keys($carros);

//EXEMPLO 02
// Retorna as chaves cujo valor (modelo do carro) seja "X5", neste caso retornará a marca do carro ["bmw"]
$soBMW = array_keys($carros, "X5");

?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Array_Keys no PHP</title>
  <link rel="stylesheet" href="./../css/style.css">
</head>
<body>
  <h1>Resultado do array_keys()</h1>

  <h2>Array original:</h2>
  <pre><?php print_r($carros); ?></pre>
 
  <h2>Todas as chaves:</h2>
  <pre><?php print_r($todas); ?></pre>


  <h2>Chaves cujo valor é "X5":</h2>
  <pre><?php print_r($soBMW); ?></pre>


  <p><a href="index.html">Voltar</a></p>
</body>
</html>
