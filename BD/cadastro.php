<?php
// Inclui o arquivo de conexão com o banco de dados (conexao.php)
// Isso torna a variável $pdo disponível aqui
require_once "conexao.php";
 
// -----------------------------
// Verifica se o formulário foi enviado
// A variável superglobal $_SERVER["REQUEST_METHOD"] indica o método de envio da requisição HTTP
// Se for "POST", significa que o usuário clicou em "Cadastrar"
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    // Captura os dados enviados pelo formulário através do método POST
    $nome = $_POST["nome"];
    $endereco = $_POST["endereco"];
    $cidade = $_POST["cidade"];
    $bairro = $_POST["bairro"];
 
    // Verifica se o campo nome foi preenchido (é obrigatório)
    if (!empty($nome)) {
 
        // Cria o comando SQL de inserção com parâmetros nomeados (:nome, :endereco, etc.)
        // Isso evita SQL Injection e é mais seguro
        $sql = "INSERT INTO clientes (nome, endereco, cidade, bairro)
                VALUES (:nome, :endereco, :cidade, :bairro)";
 
        // Prepara o comando SQL antes da execução
        $stmt = $pdo->prepare($sql);
 
        // Faz a ligação (bind) dos valores do formulário com os parâmetros da query
        $stmt->bindParam(":nome", $nome);//serve para pegar as informações da variavel e inserir no comando SQL
        $stmt->bindParam(":endereco", $endereco);
        $stmt->bindParam(":cidade", $cidade);
        $stmt->bindParam(":bairro", $bairro);
 
        // Executa o comando SQL preparado
        if ($stmt->execute()) {
            // Se deu certo, cria uma mensagem de sucesso
            $mensagem = "Cliente cadastrado com sucesso!";
        } else {
            // Caso ocorra algum erro na execução da query
            $mensagem = "Erro ao cadastrar cliente.";
        }
    } else {
        // Caso o campo "nome" esteja vazio, mostra uma mensagem de aviso
        $mensagem = "O campo nome é obrigatório!";
    }
}
 
$sql = "SELECT *FROM clientes ORDER BY ID";
 
$stmt = $pdo->query($sql);      
 
$clientes = $stmt->fetchAll(PDO::FETCH_ASSOC); // salva todos os registros  me array associativo
 
?>
 
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Cliente</title>
    <!-- Importa o arquivo CSS externo com o estilo da página -->
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
 
<!-- Container principal do formulário -->
<div class="form-container">
    <h2>Cadastro de Cliente</h2>
 
    <!-- Formulário de envio de dados (método POST) -->
    <form method="POST">
        <label>Nome:</label>
        <!-- Campo obrigatório (required) -->
        <input type="text" name="nome" required>
 
        <label>Endereço:</label>
        <input type="text" name="endereco">
 
        <label>Cidade:</label>
        <input type="text" name="cidade">
 
        <label>Bairro:</label>
        <input type="text" name="bairro">
 
        <button type="submit">Cadastrar</button>
    </form>
 
    <!-- Se existir uma mensagem (erro ou sucesso), ela será exibida aqui -->
    <?php if (isset($mensagem)) { ?>
        <div class="mensagem"><?= $mensagem ?></div>
    <?php } ?>
 
<?php
if(!empty($clientes)){?>
    <div class = "tabela-container">
        <h3>Clientes Cadastrados</h3>
        <table>
            <thead>
                <tr>
                    <th> ID</th>
                    <th> nome</th>
                    <th> Endereço</th>
                    <th> Cidade</th>
                    <th> Bairro</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($clientes as $cliente){?>
                    <tr>
                        <td>
                            <?= $cliente['id']?>
                        </td>
                        <td>
                            <?= htmlspecialchars($cliente['nome'])?>
                        </td>

                           <td>
                            <?= htmlspecialchars($cliente['endereco'])?>
                        </td>
                        <td>
                            <?= htmlspecialchars($cliente['cidade'])?>
                        </td>
                        <td>
                            <?= htmlspecialchars($cliente['bairro'])?>
                        </td>
                    </tr>
                    <?php } ?>
               
            </tbody>
        </table>
    </div>
 
<?php } ?>
 
 
</body>
</html>
 