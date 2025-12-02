<?php
session_start();

// Verifica se está logado
if(!isset($_SESSION['usuario'])){
    header("location:../index.php");
    exit;
}

require '../conexao.php';

// 1. Verifica se o ID foi passado na URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("location: listar.php");
    exit;
}

$id = intval($_GET['id']);

// 2. Busca os dados atuais do livro para preencher o formulário
$sql = "SELECT * FROM livros WHERE id = :id LIMIT 1";
$stmt = $pdo->prepare($sql); 
$stmt->execute([':id' => $id]);
$livro = $stmt->fetch(PDO::FETCH_ASSOC);

// Se não achar o livro, volta para a lista
if (!$livro) {
    header("location: listar.php");
    exit;
}

$mensagem = "";

// 3. Processa o formulário quando o usuário clica em Salvar
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = trim($_POST['titulo']);
    $autor = trim($_POST['autor']);
    $disponivel = isset($_POST['disponivel']) ? 1 : 0;
    
    // Por padrão, mantemos a imagem antiga
    $caminhoImagem = $livro['imagem'];

    // 4. Lógica para trocar a imagem (SE o usuário enviou uma nova)
    if(isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK){
        $diretorio = '../uploads/';
        if(!is_dir($diretorio)){
            mkdir($diretorio, 0755, true);
        }

        $extensao = pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION);
        $nomeArquivo = uniqid() . "." . $extensao;
        $destino = $diretorio . $nomeArquivo;

        if(move_uploaded_file($_FILES['imagem']['tmp_name'], $destino)){
            $caminhoImagem = $destino; // Atualiza para a nova imagem
        }
    }

    try {
        // Atualiza os dados no banco
        $sql = "UPDATE livros SET titulo = :titulo, autor = :autor, disponivel = :disponivel, imagem = :imagem WHERE id = :id";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':titulo' => $titulo,
            ':autor' => $autor,
            ':disponivel' => $disponivel,
            ':imagem' => $caminhoImagem,
            ':id' => $id
        ]);

        header("location: listar.php");
        exit;

    } catch (PDOException $e) {
        $mensagem = "<p class='erro'>Erro ao atualizar: " . $e->getMessage() . "</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Livro</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="card-editar">
        <h1>Editar Livro</h1>
        
        <?php echo $mensagem; ?>

        <form method="POST" enctype="multipart/form-data">
            
            <div class="input-group">
                <label for="titulo">Título</label>
                <input type="text" name="titulo" value="<?= $livro['titulo'] ?>" required>
            </div>

            <div class="input-group">
                <label for="autor">Autor</label>
                <input type="text" name="autor" value="<?= $livro['autor'] ?>" required>
            </div>

            <div class="input-group">
                <label>
                    <input type="checkbox" name="disponivel" <?= $livro['disponivel'] ? 'checked' : '' ?>> 
                    Disponível para aluguel
                </label>
            </div>

            <div class="input-group">
                <label>Imagem da Capa</label>
                
                <?php if($livro['imagem']): ?>
                    <div style="margin-bottom: 10px; text-align: center;">
                        <img src="<?= $livro['imagem'] ?>" alt="Capa Atual" style="width: 100px; border-radius: 5px; box-shadow: 0 2px 5px rgba(0,0,0,0.2);">
                        <p style="font-size: 12px; color: #666;">Capa atual</p>
                    </div>
                <?php endif; ?>

                <input type="file" name="imagem" accept="image/*">
                <small style="display:block; margin-top:5px; color:#666;">Deixe vazio para manter a imagem atual.</small>
            </div>

            <button type="submit" class="btn">Salvar Alterações</button>
            <a href="listar.php" class="btn-voltar">Voltar</a>

        </form>
    </div>
</body>
</html>