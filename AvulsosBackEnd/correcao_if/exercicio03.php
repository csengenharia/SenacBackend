<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Exercício 3</title>
  <link rel="stylesheet" href="estilo.css">
</head>
<body>
<form method="post">
  <h2>Verificar Desconto</h2>
  <input type="number" step="0.01" name="valor" placeholder="Valor da compra" required><br>
  <button type="submit">Verificar</button>
</form>

<?php
if ($_POST) {
  $valor = $_POST['valor'];
  if ($valor > 100)
    echo "<div class='caixa sucesso'>Você ganhou um desconto!</div>";
  else
    echo "<div class='caixa aviso'>Sem desconto.</div>";
}
?>
</body>
</html>
