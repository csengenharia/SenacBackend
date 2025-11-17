<?php

$nome = filter_input( type: INPUT_GET, var_name: "nome", filter: FILTER_UNSAFE_RAW);

$valormercadoria = filter_input(  type: INPUT_GET,var_name: "valormercadoria", filter: FILTER_VALIDATE_FLOAT);
$tipo = filter_input(INPUT_GET, "tipo", FILTER_SANITIZE_STRING);


if ($tipo == "nao") {
   $valorapagar = $valormercadoria;
    $mensagem    = "<p> Nome do Cliente =>" . $_GET["nome"] . "</p>" .
                "<p> tipo do Cliente => Comum </p>" . $_GET["tipo"] . "</p>" .
                "<p> Valor da Mercadoria =>" . $_GET["valormercadoria"] . "</p>" .
                 "O valor a pagar é: " . $valorapagar;
}
else if ($tipo == "sim") {
    $descontovip = $valormercadoria * 0.10;
    $valorapagar = $valormercadoria - $descontovip;
    $mensagem = "<p> Nome do Cliente =>" . $_GET["nome"] . "</p>" .
                "<p> tipo do Cliente => Vip </p>" . $_GET["tipo"] . "</p>" .
                "<p> Valor da Mercadoria =>" . $_GET["valormercadoria"] . "</p>" .
                 "O valor a pagar é: " . $valorapagar;
}
   

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../css/style.css">
    <title> Compras </title>
</head>

<body>
    <h1> Valor Total das Compras </h1>
 <div id="resultado">
     <?= $mensagem ?>
 </div>

</body>

</html>

