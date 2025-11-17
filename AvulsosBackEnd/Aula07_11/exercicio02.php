<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Exercício 02</h1>
    <form action=""method="post">
    <label for="num1">Numero 1:</label>
    <input type="number" name="num1" required><br><br>

    <label for="num2">Numero 2:</label>
    <input type="number" name="num2" required><br><br>

     <label for="num3">Numero 3:</label>
    <input type="number" name="num3" required><br><br>

    <label for="num4">Numero 4:</label>
    <input type="number" name="num4" required><br><br>
    
    <input type="submit" value="Mostrar">
    </form>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $num1 = $_POST["num1"]; //pegar informação do formulário
        $num2 = $_POST["num2"];
        $num3 = $_POST["num3"];
        $num4 = $_POST["num4"];
        $soma = $num1 + $num2 + $num3 + $num4;
        echo "<h3>O resultado dos 4 numeros digitados foi: $num1, $num2, $num3 e $num4</h3>";
       echo "a soma dos numeros e: $soma";
    }
    ?>
    

</form>
</body>
</html>