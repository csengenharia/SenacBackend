<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel</title>
    <link rel="stylesheet" href="./css/style.css ">
</head>

<body>

    <div class="container">
        <h1>Bem vindo, <?php echo $_SESSION['usuario']; ?>!</h1>
        <nav class="menu">
            <div class="dropdown">
                <button class="dropbtn">Usuários</button>
                <div class="dropdown-content">
                    <a href="usuarios/cadastrar.php">Cadastrar Usuários</a>
                    <a href="usuarios/listar.php">Listar Usuários</a>
                </div>
            </div>

            <div class="dropdown">
                <button class="dropbtn">Livros</button>
                <div class="dropdown-content">
                    <a href="livros/cadastrar.php">Cadastrar Livros</a>
                    <a href="livros/listar.php">Listar Livros</a>
                </div>
            </div>



            <div class="dropdown">
                <button class="dropbtn">Aluguéis</button>
                <div class="dropdown-content">
                    <a href="alugueis/cadastrar.php">Cadastrar Aluguéis</a>
                    <a href="alugueis/listar.php">Listar Aluguéis</a>
                </div>
            </div>

            <a href="logout.php" class="logout">Sair</a>

    </div>

    </nav>
</body>

</html>