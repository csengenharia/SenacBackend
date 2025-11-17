<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Exercício 2</title>
  <link rel="stylesheet" href="estilo.css">
</head>
<body>
<form method="post">
  <h2>Par ou Ímpar</h2>
  <input type="number" name="num" required><br>
  <button type="submit">Verificar</button>
</form>

<?php
if ($_POST) {
  $num = $_POST['num'];
  if ($num % 2 == 0)
    echo "<div class='caixa sucesso'>Número Par</div>";
  else
    echo "<div class='caixa aviso'>Número Ímpar</div>";
}
?>
</body>
</html>

