<?php
require '../conexao.php';
$mensagem = "";
if($_SERVER['REQUEST_METHOD'] === 'POST'){    
    $titulo = trim($_POST['titulo']);  
    $autor = trim($_POST['autor']);
    
    // Verifica se o checkbox foi marcado: se sim (isset), vale 1 (true), senão vale 0 (false)
    $disponivel = isset($_POST['disponivel']) ? 1 : 0;
    
    // Inicializa a variável da imagem como nula (caso o usuário não envie foto)
    $caminhoImagem = null;

    // Verifica se um arquivo foi enviado E se não houve erro técnico no upload
    if(isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK){
     
        // Define a pasta onde as imagens serão guardadas (../ volta para a raiz, depois entra em uploads)
        $diretorio = '../uploads/';
        
        // Verifica se a pasta NÃO existe (!is_dir)
        if(!is_dir($diretorio)){
            // Se não existir, cria a pasta com permissão de escrita (0755) e recursivo (true)
            mkdir($diretorio, 0755, true);
        }
        
        // Cria um nome único (uniqid) + nome original para não substituir fotos com mesmo nome
        $nomeArquivo = uniqid() . "_" . basename($_FILES['imagem']['name']);
        
        // Define o caminho completo final onde o arquivo vai morar (pasta + nome do arquivo)
        $destino = $diretorio . $nomeArquivo;

        // Tenta mover o arquivo da área temporária do PHP para a nossa pasta final
        if(move_uploaded_file($_FILES['imagem']['tmp_name'], $destino)){
            // Se moveu com sucesso, guarda esse caminho na variável para salvar no banco
            $caminhoImagem = $destino;
        }
    }

    try{
      
        $sql = "INSERT INTO livros(titulo, autor, disponivel, imagem) 
                VALUES(:titulo, :autor, :disponivel, :imagem)";
        
          $stmt = $pdo->prepare($sql);
        

        $stmt->execute([
            ':titulo' => $titulo,        
            ':autor' => $autor,            
            ':disponivel' => $disponivel,  
            ':imagem' => $caminhoImagem    
        ]);

        header("location:../painel.php");
        
        
        exit;

    }catch(PDOException $e){

        $mensagem = "<p class='erro'>Erro ao cadastrar livro: " 
        .$e->getMessage()."</p>";
    }
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Cadastrar Livro</title>
<link rel="stylesheet" href="../css/style.css">
<div class="container">
    <h1>Cadastrar Livro</h1>
    <?php echo $mensagem; ?>
    <form method="POST" enctype="multipart/form-data">
        <input type="text" name="titulo" placeholder="Título" required>
        <input type="text" name="autor" placeholder="Autor" required>
        <label><input type="checkbox" name="disponivel" checked> Disponível</label>
        <input type="file" name="imagem" accept="image/*">
        <button type="submit">Cadastrar</button>
    </form>
</div>
</body>
</html>