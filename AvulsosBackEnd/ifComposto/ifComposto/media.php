<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="estilo.css">
  <title>Média do Aluno</title>
</head>
<body>

<form method="post">
  <h2>Calcular Média</h2>
  <input type="number" name="n1" step="0.1" placeholder="Nota 1" required><br>
  <input type="number" name="n2" step="0.1" placeholder="Nota 2" required><br>
  <input type="number" name="n3" step="0.1" placeholder="Nota 3" required><br>
  <button type="submit">Calcular</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $n1 = $_POST["n1"];
    $n2 = $_POST["n2"];
    $n3 = $_POST["n3"];

    $media = ($n1 + $n2 + $n3) / 3;

    if ($media >= 7) {
        echo "<div class='caixa sucesso'>Aprovado! Média: " . number_format($media, 1) . "</div>";
    } elseif ($media >= 5) {
        echo "<div class='caixa aviso'>Recuperação! Média: " . number_format($media, 1) . "</div>";
    } else {
        echo "<div class='caixa erro'>Reprovado! Média: " . number_format($media, 1) . "</div>";
    }
}
?>

</body>
</html>
