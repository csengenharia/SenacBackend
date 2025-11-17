<?php

// A - Criação de um array com os números de 1 a 10
$numeros = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);

///* 2 forma
//$numeros = [];
//for ($i = 0; $i < 10; $i++) {
//    $numeros2[$i] = $i;
//}

//3 ª forma
//$numeros = range(1, 10);

// B- Calcule e exiba a soma de todos os números.
function somaArray($numeros)
{
    $soma = 0;
    foreach ($numeros as $num) {
        $soma += $num;
    }
    return $soma;
}

/* 2ª forma de soma
$numeros = range(1, 10);
$soma = array_sum($numeros);   */ 

//C-Inverta a ordem dos elementos no array e exiba o resultado.
$arrayNormal= array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
$numInvertido = array_reverse($arrayNormal);


?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado - Tela 2 - Soma e Inverte</title>
    <link rel="stylesheet" href="./../css/style.css">
</head>

<body>
    <h1>Array Soma e Inverte</h1>

    <p>

       <?php echo "<ul>";
        foreach ($numeros as $n) {
            echo "<li>$n</li>";
        }
        echo "</ul>";

        echo "A soma dos números é: " . somaArray($numeros) . "<br>";

        echo "Array invertido: " . implode(", ", $numInvertido);
        ?>
    </p>
</body>

</body>

</html>