<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Exercício 5</title>
  <link rel="stylesheet" href="estilo.css">
</head>
<body>
<form method="post">
  <h2>Múltiplo de 3 e 5</h2>
  <input type="number" name="num" required><br>
  <button type="submit">Verificar</button>
</form>

<?php
if ($_POST) {
  $num = $_POST['num'];
  if ($num % 3 == 0 && $num % 5 == 0)
    echo "<div class='caixa sucesso'>Múltiplo de 3 e 5</div>";
  else
    echo "<div class='caixa erro'>Não é múltiplo de 3 e 5</div>";
}
?>
</body>
</html>
