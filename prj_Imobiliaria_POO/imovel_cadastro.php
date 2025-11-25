<?php
require_once "conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tipo = $_POST["tipo"];
    $finalidade = $_POST["finalidade"];
    $localizacao = $_POST["localizacao"];
    $area_construida = $_POST["area_construida"];
    $area_terreno = $_POST["area_terreno"];
    $quartos = $_POST["quartos"];
    $banheiros = $_POST["banheiros"];
    $vagas = $_POST["vagas"];
    $descricao = $_POST["descricao"];

    if (!empty($tipo) && !empty($finalidade)) {
        $sql = "INSERT INTO imoveis (tipo, finalidade, localizacao, area_construida, area_terreno, quartos, banheiros, vagas, descricao)
             VALUES (:tipo, :finalidade, :localizacao, :area_construida, :area_terreno, :quartos, :banheiros, :vagas, :descricao)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":tipo", $tipo);
        $stmt->bindParam(":finalidade", $finalidade);
        $stmt->bindParam(":localizacao", $localizacao);
        $stmt->bindParam(":area_construida", $area_construida);
        $stmt->bindParam(":area_terreno", $area_terreno);
        $stmt->bindParam(":quartos", $quartos);
        $stmt->bindParam(":banheiros", $banheiros);
        $stmt->bindParam(":vagas", $vagas);
        $stmt->bindParam(":descricao", $descricao);

   
        if ($stmt->execute()) {
            header("Location: " . $_SERVER['PHP_SELF'] . "?status=sucesso");
            exit(); 
        } else {
            $mensagem = "Erro ao cadastrar imóvel.";
        }
    } else {
        $mensagem = "Tipo e finalidade são obrigatórios!";
    }
} else if (isset($_GET['status']) && $_GET['status'] === 'sucesso') {

    $mensagem = "Imóvel cadastrado com sucesso!";
}


$imoveis = $pdo->query("SELECT * FROM imoveis ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
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
            <select name="tipo">
                <option>Casa terrea</option>
                <option>Apartamento</option>
                <option>Terreno</option>
                <option>KitNet</option>
                <option>Studio</option>
                <option>Loft</option>
                <option>Casa Germinada</option>
                <option>Sobrado</option>
                <option>Flat</option>
                <option>Escritório</option>
                <option>Loja</option>
                <option>Galpão</option>
                <option>Sítio</option>
                <option>Chácara</option>
                <option>Fazenda</option>
                <option>Casa germinada</option>
                <option>Sobrado</option>
                <option>Flat</option>
            </select>
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
        <?php if (isset($mensagem))
            echo "<div class='mensagem'>$mensagem</div>"; ?>
    </div>

    <?php if ($imoveis) { ?>
        <div class="tabela-container">
            <h3>Imóveis Cadastrados</h3>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tipo</th>
                        <th>Finalidade</th>
                        <th>Localização</th>
                        <th>Quartos</th>
                        <th>Vagas</th>
                        <th>Descrição</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($imoveis as $i) { ?>
                        <tr>
                            <td>
                                <?= htmlspecialchars($i['id']) ?>
                            <td>

                            </td>
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