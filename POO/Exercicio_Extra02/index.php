<?php
require_once "Livro.php";
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Cadastro de Livro</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Cadastro de Livro</h2>

<form method="post">
    <label>Título:</label><br>
    <input type="text" name="titulo" required><br>

    <label>Autor:</label><br>
    <input type="text" name="autor" required><br>

    <label>ISBN:</label><br>
    <input type="text" name="isbn" required><br>

    <label>Gênero:</label><br>
    <select name="genero" required>
        <option value="">Selecione</option>
        <option>Ficção Científica</option>
        <option>Romance</option>
        <option>Técnico</option>
        <option>Biografia</option>
    </select><br>

    <button type="submit">Cadastrar</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $livro = new Livro($_POST["titulo"], $_POST["autor"], $_POST["isbn"], $_POST["genero"]);
    $livro->exibirCatalogo();
}
?>

</body>
</html>
