<?php
$mensagem = "";
$frutas = array("maçã", "banana", "laranja", "uva");

// Mostrando o conteúdo do array
var_dump($frutas);

// Todas as chaves do array de frutas
$todasAsChaves = array_keys($frutas);

// Chaves onde o valor é "laranja"
$chavesLaranja = array_keys($frutas, "laranja");

//Se $chavesLaranja NÃO está vazio (ou seja, se a 'laranja' foi encontrada em alguma posição)
if (!empty($chavesLaranja)) {

    //implode - Transforma o array de posições em uma string separada por vírgula.
    $mensagem = "A fruta 'laranja' foi encontrada na(s) posição(ões): " . implode(", ", $chavesLaranja);
    
} else {
    $mensagem = "A fruta 'laranja' não foi encontrada.";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array Keys</title>
    <link rel="stylesheet" href="./../css/style.css">
</head>
<body>
    <h1>Exemplos: array_keys()</h1>

    <h2>Chave(s) onde o valor é "laranja" </h2>
    <p><?php echo $mensagem; ?></p>

    <h2>Todas as chaves do array</h2>
    <p><?php echo implode(", ", $todasAsChaves); ?></p>

</body>
</html>
