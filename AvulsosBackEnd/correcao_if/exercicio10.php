<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Exercício 10</title>
  <link rel="stylesheet" href="estilo.css">
</head>
<body>
<form method="post">
  <h2>Crédito Aprovado?</h2>
  <input type="number" step="0.01" name="salario" placeholder="Salário" required><br>
  <input type="number" step="0.01" name="compra" placeholder="Valor da compra" required><br>
  <button type="submit">Verificar</button>
</form>

<?php
if ($_POST) {
  $salario = $_POST['salario'];
  $compra = $_POST['compra'];

  if ($compra <= $salario * 0.4)
    echo "<div class='caixa sucesso'>Crédito aprovado!</div>";
  else
    echo "<div class='caixa erro'>Crédito reprovado.</div>";
}
?>
</body>
</html>
