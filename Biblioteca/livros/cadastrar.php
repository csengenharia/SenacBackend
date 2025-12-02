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