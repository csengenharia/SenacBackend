<?php
$contador = 0;  //incicializando a variável
$resultadoContagem = ""; // inicializando a variável

do {
    $resultadoContagem = $resultadoContagem . "<li> $contador </li>";
    $contador += 2;
} while ($contador <= 20) ;
  


?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contagem 0 a 20</title>
</head>

<body>
   <h1>Contagem com FOR</h1>
   <ul>
        <?php echo $resultadoContagem; ?>
   </ul>
</body>

</html>