<?php
require_once "Imovel.php";
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Cadastro de Imóvel</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Cadastro de Imóvel</h2>

<form method="post">
    <label>Tipo de Imóvel:</label><br>
    <select name="tipo" required>
        <option value="">Selecione</option>
        <option>Apartamento</option>
        <option>Casa</option>
        <option>Terreno</option>
    </select><br>

    <label>Endereço:</label><br>
    <input type="text" name="endereco" required><br>

    <label>Área (m²):</label><br>
    <input type="number" step="0.1" name="area" required><br>

    <label>Número de Quartos:</label><br>
    <input type="number" name="quartos" required><br>

    <button type="submit">Cadastrar</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $imovel = new Imovel($_POST["tipo"], $_POST["endereco"], $_POST["area"], $_POST["quartos"]);
    $imovel->exibirInformacoes();
}
?>

</body>
</html>
