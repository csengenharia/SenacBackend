<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Exercício 8</title>
  <link rel="stylesheet" href="estilo.css">
</head>
<body>
<form method="post">
  <h2>Último dígito é zero?</h2>
  <input type="number" name="num" required><br>
  <button type="submit">Verificar</button>
</form>

<?php
if ($_POST) {
  $num = $_POST['num'];
  if ($num % 10 == 0)
    echo "<div class='caixa sucesso'>O último dígito é 0</div>";
  else
    echo "<div class='caixa erro'>O último dígito NÃO é 0</div>";
}
?>
</body>
</html>
