<?php
require_once "conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = "INSERT INTO imoveis (tipo, finalidade, localizacao, area_construida, area_terreno, quartos, banheiros, vagas, descricao)
            VALUES (:tipo, :finalidade, :localizacao, :area_construida, :area_terreno, :quartos, :banheiros, :vagas, :descricao)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute($_POST);
    $mensagem = "Imóvel cadastrado com sucesso!";
}

$imoveis = $pdo->query("SELECT * FROM imoveis ORDER BY id")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Imóvel</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="form-container">
    <h2>Cadastro de Imóveis</h2>
    <form method="POST">
        <label>Tipo:</label>
        <input type="text" name="tipo" required>
        <label>Finalidade:</label>
        <select name="finalidade">
            <option>Compra</option>
            <option>Aluguel</option>
        </select>
        <label>Localização:</label>
        <input type="text" name="localizacao">
        <label>Área Construída:</label>
        <input type="text" name="area_construida">
        <label>Área do Terreno:</label>
        <input type="text" name="area_terreno">
        <label>Quartos:</label>
        <input type="number" name="quartos">
        <label>Banheiros:</label>
        <input type="number" name="banheiros">
        <label>Vagas de Garagem:</label>
        <input type="number" name="vagas">
        <label>Descrição:</label>
        <textarea name="descricao"></textarea>
        <button type="submit">Cadastrar</button>
    </form>
    <?php if (isset($mensagem)) echo "<div class='mensagem'>$mensagem</div>"; ?>
</div>

<?php if ($imoveis) { ?>
<div class="tabela-container">
    <h3>Imóveis Cadastrados</h3>
    <table>
        <thead>
            <tr>
                <th>ID</th><th>Tipo</th><th>Finalidade</th><th>Localização</th><th>Quartos</th><th>Vagas</th><th>Descrição</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($imoveis as $i) { ?>
            <tr>
                <td><?= $i['id'] ?></td>
                <td><?= $i['tipo'] ?></td>
                <td><?= $i['finalidade'] ?></td>
                <td><?= $i['localizacao'] ?></td>
                <td><?= $i['quartos'] ?></td>
                <td><?= $i['vagas'] ?></td>
                <td><?= $i['descricao'] ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php } ?>
</body>
</html>
