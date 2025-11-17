<?php
$mensagem = "";

// Array de frutas
$frutas = array("maçã", "banana", "laranja", "uva");

// Mostrando o conteúdo do array para depuração
var_dump($frutas);

// Procurando a posição da "laranja"
$posicao = array_search("laranja", $frutas);

// Procurando a posição da "melancia" que não está no array
//$posicao = array_search("melancia", $frutas);

if ($posicao !== false) {
    $mensagem = "A fruta 'laranja' foi encontrada na posição: " . $posicao;
} else {
    $mensagem = "A fruta não foi encontrada.";
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array Search</title>
    <link rel="stylesheet" href="./../css/style.css">
</head>
<body>
    <h1>Array Search</h1>
    <p><?php echo $mensagem; ?></p>
</body>
</html>
