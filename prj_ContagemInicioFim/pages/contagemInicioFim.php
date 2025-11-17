<?php
$inicio = filter_input(INPUT_GET,"inicio", FILTER_VALIDATE_INT);
$passos = filter_input(INPUT_GET,"passos", FILTER_VALIDATE_INT);
$fim = filter_input(INPUT_GET,"fim", FILTER_VALIDATE_INT);

for ($contador=0; $contador <=20 ; $contador = $contador+2) { 
    $resultadoContagem = $resultadoContagem ."<li> $contador </li>";
}
?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contagem Início e Fim </title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>

<ul>
    <h1>Contagem Início e Fim - Para(FOR)</h1>
    <p>Vamos contar de 0 até 20</p>
</ul>
    <div>
       <form action="" method="get">
       <input type="submit" value="Iniciar Contagem">
       </form>
    </div>

</form>
</body>
</html>