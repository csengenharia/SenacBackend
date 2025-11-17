<?php
// $contador = 0;  //incicializando a variável
$resultadoContagem = "";

for ($contador=0; $contador <= 20; $contador += 2) { 
    $resultadoContagem = $resultadoContagem . "<li> $contador </li>";
}



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