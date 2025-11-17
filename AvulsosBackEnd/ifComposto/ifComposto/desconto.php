<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="estilo.css">
  <title>Desconto de Produto</title>
</head>
<body>

<form method="post">
  <h2>Calcular Desconto</h2>
  <input type="number" name="preco" step="0.01" placeholder="Preço do produto" required><br>
  <button type="submit">Calcular</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $preco = $_POST["preco"];
    $desconto = 0;

    if ($preco >= 200) {
        $desconto = 20; // 20%
    } elseif ($preco >= 100) {
        $desconto = 10; // 10%
    } else {
        $desconto = 5;  // 5%
    }

    $valorFinal = $preco - ($preco * ($desconto / 100));

    echo "<div class='caixa sucesso'>
            Preço original: R$ " . number_format($preco, 2, ',', '.') . "<br>
            Desconto aplicado: $desconto%<br>
            Valor final: <strong>R$ " . number_format($valorFinal, 2, ',', '.') . "</strong>
          </div>";
}
?>

</body>
</html>
