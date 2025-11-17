<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Exercício 9</title>
  <link rel="stylesheet" href="estilo.css">
</head>
<body>
<form method="post">
  <h2>Calcular valor da viagem</h2>
  <input type="number" step="0.1" name="distancia" placeholder="Distância em km" required><br>
  <select name="tipo" required>
    <option value="">Tipo de viagem</option>
    <option value="curta">Curta</option>
    <option value="longa">Longa</option>
  </select><br>
  <button type="submit">Calcular</button>
</form>

<?php
if ($_POST) {
  $distancia = $_POST['distancia'];
  $tipo = $_POST['tipo'];

  if ($tipo == 'curta')
    $valor = $distancia * 0.5;
  else
    $valor = $distancia * 0.35;

  echo "<div class='caixa sucesso'>Valor da viagem: R$ " . number_format($valor, 2, ',', '.') . "</div>";
}
?>
</body>
</html>
