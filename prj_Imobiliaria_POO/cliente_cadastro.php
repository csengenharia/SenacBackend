<?php
require_once "conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $endereco = $_POST["endereco"];
    $cidade = $_POST["cidade"];
    $bairro = $_POST["bairro"];

    if (!empty($nome) && !empty($cpf)) {
        $sql = "INSERT INTO clientes (nome, cpf, endereco, cidade, bairro)
                VALUES (:nome, :cpf, :endereco, :cidade, :bairro)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":cpf", $cpf);
        $stmt->bindParam(":endereco", $endereco);
        $stmt->bindParam(":cidade", $cidade);
        $stmt->bindParam(":bairro", $bairro);

        $mensagem = $stmt->execute() ? "Cliente cadastrado com sucesso!" : "Erro ao cadastrar cliente.";
    } else {
        $mensagem = "Nome e CPF são obrigatórios!";
    }
}

$clientes = $pdo->query("SELECT * FROM clientes ORDER BY id")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Cliente</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="form-container">
    <h2>Cadastro de Clientes</h2>
    <form method="POST">
        <label>Nome:</label>
        <input type="text" name="nome" required>
        <label>CPF:</label>
        <input type="text" name="cpf" required>
        <label>Endereço:</label>
        <input type="text" name="endereco">
        <label>Cidade:</label>
        <input type="text" name="cidade">
        <label>Bairro:</label>
        <input type="text" name="bairro">
        <button type="submit">Cadastrar</button>
    </form>
    <?php if (isset($mensagem)) echo "<div class='mensagem'>$mensagem</div>"; ?>
</div>

<?php if (!empty($clientes)) { ?>
<div class="tabela-container">
    <h3>Clientes Cadastrados</h3>
    <table>
        <thead>
            <tr>
                <th>ID</th><th>Nome</th><th>CPF</th><th>Endereço</th><th>Cidade</th><th>Bairro</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clientes as $c) { ?>
            <tr>
                <td><?= $c['id'] ?></td>
                <td><?= $c['nome'] ?></td>
                <td><?= $c['cpf'] ?></td>
                <td><?= $c['endereco'] ?></td>
                <td><?= $c['cidade'] ?></td>
                <td><?= $c['bairro'] ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php } ?>
</body>
</html>
