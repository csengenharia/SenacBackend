<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Exercício 1</title>
  <link rel="stylesheet" href="estilo.css">
</head>
<body>
<form method="post">
  <h2>Verificar número positivo</h2>
  <input type="number" name="num" placeholder="Digite um número" required><br>
  <button type="submit">Verificar</button>
</form>

<?php
if ($_POST) {
  $num = $_POST['num'];
  if ($num > 0)
    echo "<div class='caixa sucesso'>Número positivo</div>";
  else
    echo "<div class='caixa erro'>Não é positivo</div>";
}
?>
</body>
</html>
