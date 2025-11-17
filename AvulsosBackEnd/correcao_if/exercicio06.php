<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Exercício 6</title>
  <link rel="stylesheet" href="estilo.css">
</head>
<body>
<form method="post">
  <h2>Maior número</h2>
  <input type="number" name="a" placeholder="Número 1" required><br>
  <input type="number" name="b" placeholder="Número 2" required><br>
  <input type="number" name="c" placeholder="Número 3" required><br>
  <button type="submit">Comparar</button>
</form>

<?php
if ($_POST) {
  $a = $_POST['a'];
  $b = $_POST['b'];
  $c = $_POST['c'];

  $maior = max($a, $b, $c);
  echo "<div class='caixa sucesso'>O maior número é $maior</div>";
}
?>
</body>
</html>
