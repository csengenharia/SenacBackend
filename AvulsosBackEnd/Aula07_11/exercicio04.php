<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Exercicio 03</h1>
 
    <form action="" method="post">
    <label for="valor">Valor do produto</label>
    <input type="number" name="valor" required><br><br>
 
    <input type="submit" value="Mostrar">
    </form>
    <?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $valor = $_POST["valor"];
        $multiplicacao = $valor * 1.20;
       
       
        echo "<h3>: O valor é: $valor</h3>";
        echo "<h3>: O valor acrescido é: $multiplicacao</h3>";
    }
    ?>
 
</body>
</html>
 