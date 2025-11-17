<!-- Crie um array associativo com informações de 3 alunos (nome, idade e notaFinal). Depois:
 
a-Adicione 10 alunos e exiba as informações de cada aluno da seguinte forma:
   nome: Juca
   idade: 27 anos
   notaFinal: 8.5
b-Calcule e exiba a média das notas de todos os alunos. -->

<?php
$alunos [
    ["aluno" => "Ana", "idade" => 20, "notaFinal" => 9.0,];
    ["aluno" => "Bruno", "idade" => 22, "notaFinal" => 7.5,];
    ["aluno" => "Carla", "idade" => 21, "notaFinal" => 8.0,];]
    

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado da Lista de Alunos</title>
    <link rel="stylesheet" href="./../css/style.css">
</head>

<body>
    <h1>Lista de Alunos</h1>

    <?php 
    echo $aluno1 ["nome"] . "<br>";
    echo $aluno1 ["idade"] . " anos" . "<br>";              
    
    ?>

</body>

</body>
</html>