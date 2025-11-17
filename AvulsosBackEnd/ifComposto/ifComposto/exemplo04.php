<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Exemplo com E (&&)</title>
<link rel="stylesheet" href="estilo.css">
</head>
<body>

<h2>Exemplo com E (&&)</h2>

<form method="post">
  <label>Idade:</label><br>
  <input type="number" name="idade" required><br>

  <label>Tem carteira de motorista? (1 = sim, 0 = não)</label><br>
  <input type="number" name="carteira" min="0" max="1" required><br>

  <button type="submit">Verificar</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idade = $_POST["idade"];
    $temCarteira = $_POST["carteira"];

    if ($idade >= 18 && $temCarteira == 1) {
        echo "<div class='caixa sucesso'>Pode dirigir! (idade >= 18 E tem carteira)</div>";
    } else {
        echo "<div class='caixa erro'>Não pode dirigir! (condição com E não satisfeita)</div>";
    }
}
?>

</body>
</html>
