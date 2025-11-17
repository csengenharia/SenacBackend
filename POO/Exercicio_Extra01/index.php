<?php
require_once 'aluno.php';

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de aluno</title>
    <link rel="stylesheet" href="style.css">
<body>
    <h1>Cadastro de Aluno</h1>
    <form action="" method="post">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" required><br><br>
        <label for="cidade">Cidade:</label>
        <input type="text" name="cidade" id="cidade" required><br><br>
        <label for="bairro">Bairro:</label>     
        <input type="text" name="bairro" id="bairro" required><br><br>  
        <label for="curso">Curso:</label>
        <select name="curso" required>
            <option value="Informatica para Internet">Informatica para Internet</option>
            <option value="Desenvolvimento para Sistema">Desenvolvimento para Sistema</option> 
            <option value="Front-end">Front-end</option>
            <option value="Back-end">Back-end</option>         
        </select>
        <input type="submit" value="Cadastrar">
    </form>

    <?php   
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST['nome'];
        $cidade = $_POST['cidade'];
        $bairro = $_POST['bairro'];
        $curso = $_POST['curso'];

        $aluno = new Aluno($nome, $cidade, $bairro, $curso);
        $aluno->exibirInformacoes();
    }

    ?>
    
</body>
</html>