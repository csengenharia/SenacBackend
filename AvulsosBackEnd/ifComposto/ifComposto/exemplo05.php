<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Exemplo com OU (||)</title>
<link rel="stylesheet" href="estilo.css">
</head>
<body>

<h2>Exemplo com OU (||)</h2>

<form method="post">
  <label>Dia da semana:</label><br>
  <input type="text" name="dia" required placeholder="Ex: sábado"><br>
  <button type="submit">Verificar</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dia = strtolower(trim($_POST["dia"]));

    if ($dia == "sábado" || $dia == "sabado" || $dia == "domingo") {
        echo "<div class='caixa sucesso'>É fim de semana! (condição com OU)</div>";
    } else {
        echo "<div class='caixa aviso'>É dia útil! (condição com OU não satisfeita)</div>";
    }
}
?>

</body>
</html>
