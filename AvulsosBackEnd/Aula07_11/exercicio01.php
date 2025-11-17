<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Exercício 01</h1>
    <form action="">
    <label for="num1">Numero 1:</label>
    <input type="number" name="num1" required><br><br>

    <label for="num2">Numero 2:</label>
    <input type="number" name="num2" required><br><br>

    <input type="submit" value="Mostrar">

</form>

<input type="submit" value="Mostrar"   >
<?php 
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $num1 = $_POST["num1"]; //pegar informação do formulário
    $num2 = $_POST["num2"];
    echo "<h3>OS números digitados foram: $num1 e $num2</h3>";
    

}
</body>
</html>