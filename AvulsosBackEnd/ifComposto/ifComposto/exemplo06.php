<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Exemplo com DIFERENTE (!=)</title>
<link rel="stylesheet" href="estilo.css">
</head>
<body>

<h2>Exemplo com DIFERENTE (!=)</h2>

<form method="post">
  <label>Digite uma cor:</label><br>
  <input type="text" name="cor" required placeholder="Ex: azul"><br>
  <button type="submit">Verificar</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cor = strtolower(trim($_POST["cor"]));

    if ($cor != "vermelho") {
        echo "<div class='caixa aviso'>A cor é diferente de vermelho. (condição com DIFERENTE)</div>";
    } else {
        echo "<div class='caixa sucesso'>A cor é vermelha!</div>";
    }
}
?>

</body>
</html>
