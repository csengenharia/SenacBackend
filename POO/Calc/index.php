<?php
include 'Calculadora.php';
$numero1 = $numero2 = $resultado = $operacao = '';
 
if($_SERVER['REQUEST_METHOD']=='POST'){
    $numero1 = $_POST['numero1'];
    $numero2 = $_POST['numero2'];
    $operacao = $_POST['operacao'];
 
    //criação do objeto
    $calculadora = new Calculadora($numero1,$numero2);
 
    switch($operacao){
        case 'somar':
            $resultado = $calculadora->somar();
            break;
        case 'subtrair':
            $resultado = $calculadora->subtrair();
            break;
            case 'multiplicar':
            $resultado = $calculadora->multiplicar();
            break;
            case 'dividir':
            $resultado = $calculadora->dividir();
            break;
    }
   
}
 
 
?>
 
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
</head>
<body>
   <h1>Calculadora</h1>
   <form action="" method="POST">
 
    <label for="numero1">Número 1: </label>
    <input type="number" id="numero1" name="numero1"
     value="<?php echo $numero1;?>" required>
     <br>
     <label for="numero2">Número 2: </label>
    <input type="number" id="numero2" name="numero2"
     value="<?php echo $numero2;?>" required>
     <br>
 
     <label for="operacao"> Operação:</label>
     <select name="operacao" id="operacao">
        <option value="somar"<?php echo($operacao =='somar')?
        'selected' : '';?>>Soma</option>
        <option value="subtrair"<?php echo($operacao =='subtrair')?
        'selected' : '';?>>Subtrair</option>
        <option value="multiplicar"<?php echo($operacao =='multiplicar')?
        'selected' : '';?>>Multiplicar</option>
        <option value="dividir"<?php echo($operacao =='dividir')?
        'selected' : '';?>>Dividir</option>
     </select>
     <br>
     <button type="submit">Calcular</button>
 
   </form>
 
   <?php
   if($resultado!==''){
    echo "<h2> Resultado: $resultado</h2>";
   }
 
   ?>
</body>
</html>