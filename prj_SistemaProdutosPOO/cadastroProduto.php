<?php
// Inclui o arquivo de conexão com o banco de dados
require_once "conexao.php";

// ------------------------------------
//   PROCESSAMENTO DO FORMULÁRIO (POST)
// ------------------------------------
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = $_POST["nome"];
    $preco = $_POST["preco"];
    $quantidade = $_POST["quantidade"];
    $descricao = $_POST["descricao"];

    if (!empty($nome)) {

        $sql = "INSERT INTO produtos (nome, preco, quantidade, descricao)
                VALUES (:nome, :preco, :quantidade, :descricao)";

        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":preco", $preco);
        $stmt->bindParam(":quantidade", $quantidade);
        $stmt->bindParam(":descricao", $descricao);

        if ($stmt->execute()) {
            $mensagem = "Produto cadastrado com sucesso!";
        } else {
            $mensagem = "Erro ao cadastrar produto.";
        }

    } else {
        $mensagem = "O campo nome é obrigatório!";
    }
}

// ------------------------------------
//       BUSCA DE PRODUTOS
// ------------------------------------
$sql = "SELECT * FROM produtos ORDER BY id";
$stmt = $pdo->query($sql);
$produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Produto</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="form-container">
    <h2>Cadastro de Produtos</h2>

    <form method="POST">
        <label>Nome:</label>
        <input type="text" name="nome" required>

        <label>Preço:</label>
        <input type="text" name="preco">

        <label>Quantidade:</label>
        <input type="text" name="quantidade">

        <label>Descrição:</label>
        <input type="text" name="descricao">

        <button type="submit">Cadastrar</button>
    </form>

    <?php if (isset($mensagem)) { ?>
        <div class="mensagem"><?= $mensagem ?></div>
    <?php } ?>
</div>


<?php if (!empty($produtos)) { ?>
    <div class="tabela-container">
        <h3>Produtos Cadastrados</h3>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                    <th>Descrição</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($produtos as $produto) { ?>
                <tr>
                    <td><?= $produto['id'] ?></td>
                    <td><?= htmlspecialchars($produto['nome']) ?></td>
                    <td><?= htmlspecialchars($produto['preco']) ?></td>
                    <td><?= htmlspecialchars($produto['quantidade']) ?></td>
                    <td><?= htmlspecialchars($produto['descricao']) ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
<?php } ?>

</body>
</html>
