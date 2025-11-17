<?php
$dorama1 = trim($_GET["ndorama1"]);
$dorama2 = trim($_GET["ndorama2"]);
$dorama3 = trim($_GET["ndorama3"]);
$dorama4 = trim($_GET["ndorama4"]);
$dorama5 = trim($_GET["ndorama5"]);
$listagemDoramasComNovo = "";
$listagemDoramas = "";
$excluirUltimoDorama = "";
$exibePesquisa = "";


// Validação dos campos nulos.
if ($dorama1 == null || $dorama2 == null || $dorama3 == null || $dorama4 == null || $dorama5 == null) {
    echo "Valores vazios";
} else if (
    strlen($dorama1) < 2 || strlen($dorama2) < 2 ||
    strlen($dorama3) < 2 || strlen($dorama4) < 2 ||
    strlen($dorama5) < 2
) {
    echo "Um nome precisa ter no mínimo 2 caracteres.";
} else {

    // 1) Criar um array contendo cinco elementos. 
    // Mostrar os cinco elementos do array usando estruturas de repetição. 
    $doramas = array($dorama1, $dorama2, $dorama3, $dorama4, $dorama5);


    for ($i = 0; $i < count($doramas); $i++) {
        $listagemDoramas .= "<li>" . ($doramas[$i]) . "</li>";
    }
}
// 2) Adicionar um elemento ao array na terceira posição. 
// "array_splice" insere sem apagar nada (o 2º parâmetro é o índice onde será inserido).

array_splice($doramas, 2, 0, "Quando o telefone toca");

// Agora, mostrar os elementos novamente:

//1ª forma - usando for
// for ($i = 0; $i < count($doramas); $i++) {
//     $listagemDoramasComNovo .= "<li>" . ($doramas[$i]) . "</li>";
// }

//2ª forma - usando foreach
foreach ($doramas as $valor) {
    $listagemDoramasComNovo .= "<li>" . $valor . "</li>";
}

// 3) Excluir um elemento do array na última posição. 
// Mostrar os elementos do array usando estruturas de repetição.
// array_pop($doramas) remove o último elemento do array

array_pop($doramas);
foreach ($doramas as $valor) {
    $excluirUltimoDorama .= "<li>" . $valor . "</li>";
}

//4) Criar um código que utilize o array filter ou array search ou array map.

$filtraDorama = array_search('Quando o telefone toca', $doramas);

if ($filtraDorama !== false) { 
    // Se encontrou, mostra só esse
    $exibePesquisa .= "<li>" . $doramas[$filtraDorama] . "</li>";
} else {
    // Caso não encontre
    $exibePesquisa .= "<li>Dorama não encontrado</li>";
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Doramas</title>
    <link rel="stylesheet" href="./../css/style.css">
</head>

<body>

    <h1> Resultado da Listagem de Doramas</h1>


    <h2>Assistidos em 2025:</h2>
    <ul>
        <?php echo $listagemDoramas; ?>
    </ul>

    <h2>Com o novo dorama na terceira posição:</h2>
    <ul>
        <?php echo $listagemDoramasComNovo; ?>
    </ul>

    <h2>Excluir ultimo dorama da lista:</h2>
    <ul>
        <?php echo $excluirUltimoDorama; ?>
    </ul>

    <h2>Filtra dorama específico:</h2>
    <ul>
        <?php echo $exibePesquisa; ?>
    </ul>



</body>

</html>