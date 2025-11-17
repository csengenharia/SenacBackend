<?php
$contador = 0; // no While precisa iniciar a variavel
$resultadoContagem = "";

while ($contador<= 20) {
    // $resultadoContagem = $resultadoContagem ."<li> $contador </li>"; 
    $resultadoContagem .= "<li> $contador </li>";
    // $contador = $contador +2;
    $contador += 2;
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contagem de 0 a 20</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>Contagem com WHILE</h1>
    <ul>
      <?php echo $resultadoContagem; ?>
    </ul>

    <a href="../index.html">Voltar</a>
</body>
</html>
