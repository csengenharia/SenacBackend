<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nums = [$_POST['n1'], $_POST['n2'], $_POST['n3']];
    $pares = 0;
    $impares = 0;

    foreach ($nums as $num) {
        if ($num % 2 == 0) $pares++;
        else $impares++;
    }

    echo "Números digitados: " . implode(", ", $nums) . "<br>";
    echo "Números pares: $pares<br>";
    echo "Números ímpares: $impares<br>";
} else {
    echo "Acesso inválido.";
}
?>
