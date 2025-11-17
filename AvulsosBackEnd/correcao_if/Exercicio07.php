<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Exercício 7</title>
  <link rel="stylesheet" href="estilo.css">
</head>
<body>
<form method="post">
  <h2>Calcular Imposto de Renda</h2>
  <input type="number" name="salario" step="0.01" placeholder="Digite o salário" required><br>
  <button type="submit">Calcular</button>
</form>

<?php
if ($_POST) {
  $salario = $_POST['salario'];
  if ($salario <= 2000)
    echo "<div class='caixa sucesso'>Isento de imposto</div>";
  else {
    $imposto = $salario * 0.275;
    echo "<div class='caixa erro'>Imposto devido: R$ " . number_format($imposto, 2, ',', '.') . "</div>";
  }
}
?>
</body>
</html>
