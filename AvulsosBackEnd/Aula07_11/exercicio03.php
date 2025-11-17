<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Exercício 03</h1>
    <form action="">
    <label for="valor do produto">Valor do produto:</label>
    <input type="number" name="valor" required><br><br>

    
    <input type="submit" value="Mostrar"   >
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $valor =
        $soma = $num1 + $num2 + $num3 + $num4;
        echo "<h3>O resultado dos 4 numeros digitados foi: $num1, $num2, $num3 e $num4</h3>";
       
    }
    ?>
    

</form>

<?php 
if($_SERVER["REQUEST_METHOD"] == "POST"){
  

    echo "<h3>OS números digitados foram: $num1 e $num2</h3>";
    

}
?>
</body>
</html>