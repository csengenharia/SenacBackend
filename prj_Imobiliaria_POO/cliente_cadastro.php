<?php
require_once "conexao.php";

$mensagem = ''; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $cpf = preg_replace('/[^0-9]/', '', $_POST["cpf"]); 
    $endereco = $_POST["endereco"];
    $cidade = $_POST["cidade"];
    $bairro = $_POST["bairro"];

    if (!empty($nome) && !empty($cpf)) {
        try {
            $sql = "INSERT INTO clientes (nome, cpf, endereco, cidade, bairro)
                    VALUES (:nome, :cpf, :endereco, :cidade, :bairro)";
            $stmt = $pdo->prepare($sql);
            
            // Usando bindParam conforme solicitado
            $stmt->bindParam(":nome", $nome);
            $stmt->bindParam(":cpf", $cpf);
            $stmt->bindParam(":endereco", $endereco);
            $stmt->bindParam(":cidade", $cidade);
            $stmt->bindParam(":bairro", $bairro);

            if ($stmt->execute()) {
                 header("Location: " . $_SERVER['PHP_SELF'] . "?status=sucesso");
                exit();
            } else {
                $mensagem = "Erro desconhecido ao cadastrar cliente.";
            }

        } catch (PDOException $e) {
            if ($e->getCode() == '23000') {
                $mensagem = "❌ Erro: O CPF **" . htmlspecialchars($_POST["cpf"]) . "** já está cadastrado.";
            } else {
                // Para outros erros de banco de dados
                $mensagem = "Erro no banco de dados: " . $e->getMessage();
            }
        }
    } else {
        $mensagem = "Nome e CPF são obrigatórios!";
    }
} else if (isset($_GET['status']) && $_GET['status'] === 'sucesso') {

    $mensagem = "Cliente cadastrado com sucesso!";
}


$clientes = $pdo->query("SELECT * FROM clientes ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC); // Adicionado DESC para ver o último no topo
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
