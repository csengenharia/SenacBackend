<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="estilo.css">
  <title>Verificação de Valor</title>
</head>
<body>

<form method="post">
  <h2>Verificar Valor</h2>
  <input type="number" name="valor" step="0.01" placeholder="Digite um valor" required><br>
  <button type="submit">Verificar</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $valor = $_POST["valor"];

    if ($valor > 0) {
        echo "<div class='caixa sucesso'>O valor é positivo: $valor</div>";
    } elseif ($valor < 0) {
        echo "<div class='caixa erro'>O valor é negativo: $valor</div>";
    } else {
        echo "<div class='caixa aviso'>O valor é zero.</div>";
    }
}
?>

</body>
</html>
