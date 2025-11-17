<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Exercício 4</title>
  <link rel="stylesheet" href="estilo.css">
</head>
<body>
<form method="post">
  <h2>Verificar Temperatura</h2>
  <input type="number" name="temp" placeholder="Temperatura em °C" required><br>
  <button type="submit">Verificar</button>
</form>

<?php
if ($_POST) {
  $temp = $_POST['temp'];
  if ($temp > 30)
    echo "<div class='caixa erro'>Está quente hoje!</div>";
  else
    echo "<div class='caixa sucesso'>Temperatura agradável.</div>";
}
?>
</body>
</html>
