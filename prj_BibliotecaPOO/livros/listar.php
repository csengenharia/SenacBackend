<?php
session_start();
if(!isset($_SESSION['usuario'])){
    header("location:../index.php");
    exit;
}

require '../conexao.php';

// Comando para buscar informações do banco (Tabela Livros)
$sql = "SELECT * FROM livros";
$stmt = $pdo->query($sql);
$livros = $stmt->fetchAll(PDO::FETCH_ASSOC); 
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Livros</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="lista-container">
        <h1>Lista de Livros</h1>
        
        <div style="margin-bottom: 20px; text-align: right;">
            <a href="../painel.php" class="btn-voltar" style="display:inline-block; width:auto; padding: 10px 20px;">Voltar ao Painel</a>
        </div>

        <table class="tabela-usuarios">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Capa</th> <th>Título</th>
                    <th>Autor</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($livros as $l): ?>
                <tr>
                    <td><?= $l['id'] ?></td>
                    
                    <td>
                        <?php if($l['imagem']): ?>
                            <img src="<?= $l['imagem'] ?>" alt="Capa" style="width: 50px; height: auto; border-radius: 4px;">
                        <?php else: ?>
                            Sem foto
                        <?php endif; ?>
                    </td>

                    <td><?= $l['titulo'] ?></td>
                    <td><?= $l['autor'] ?></td>
                    
                    <td style="font-weight: bold; color: <?= $l['disponivel'] ? 'green' : 'red' ?>;">
                        <?= $l['disponivel'] ? 'Disponível' : 'Indisponível' ?>
                    </td>

                    <td>
                        <a class="btn-editar" href="editar.php?id=<?= $l['id'] ?>">Editar</a>
                        
                        <a class="btn-excluir" 
                           href="excluir.php?id=<?= $l['id'] ?>" 
                           onclick="return confirm('Deseja realmente excluir este livro?')">Excluir</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>