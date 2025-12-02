<?php
session_start();

// 1. Verifica se o usuário está logado
if(!isset($_SESSION['usuario'])){
    header("location:../index.php");
    exit;
}

require '../conexao.php';

// 2. Verifica se o ID foi passado na URL
if(!isset($_GET['id']) || empty($_GET['id'])){
    header("location: listar.php");
    exit;
}

$id = intval($_GET['id']);

try {
    // 3. ROTINA DE LIMPEZA DE IMAGEM
    // Antes de excluir o registro, buscamos o nome da imagem
    $sqlBusca = "SELECT imagem FROM livros WHERE id = :id";
    $stmtBusca = $pdo->prepare($sqlBusca);
    $stmtBusca->execute([':id' => $id]);
    $livro = $stmtBusca->fetch(PDO::FETCH_ASSOC);

    // Se encontrou o livro E ele tem imagem E o arquivo existe na pasta
    if($livro && !empty($livro['imagem']) && file_exists($livro['imagem'])){
        // unlink() é o comando do PHP que apaga arquivos físicos
        unlink($livro['imagem']);
    }

    // 4. EXCLUIR DO BANCO DE DADOS
    $sql = "DELETE FROM livros WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);

    // Redireciona para a lista
    header("location: listar.php");
    exit;

} catch(PDOException $e) {
    // Caso dê erro (ex: livro vinculado a um aluguel e o banco bloquear)
    echo "Erro ao excluir o livro: " . $e->getMessage();
    echo "<br><br><a href='listar.php'>Voltar</a>";
}
?>