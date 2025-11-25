<?php
require 'conexao.php';
//criar a sessão
session_start();
$mensagem = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //Pegar as informações do formulário
    $email = trim($_POST['email']);
    $senha= trim($_POST['senha']);

    //Busca usuarios através do email
    $sql = "SELECT * FROM usuarios WHERE email =:email";

    //prepara a query e evita sql injection
    $stmt = $conexao->prepare($sql);

    //executa o sql e substitui e-mail pelo valor digitado
    $stmt->execute(['email' => $email]);

    //pega os dados do usuário encontrado(se houver)
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    //verifica se a senha está correta igual à do banco
    if ($usuario && password_verify($senha, $usuario['senha'])) {
        //salva o nome em sessão
        $_SESSION['usuario'] = $usuario['nome'];
        $_SESSION['tipo'] = $usuario['tipo'];
        header("Location: painel.php");
        exit();
    } else {
        //Caso o email ou senha estejam incorretos , mostra mensagem de erro
        $mensagem = "<p class='erro'>Email ou senha inválidos.</p>";

    }

}

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Biblioteca</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <div class="container">
        <h1>Login</h1>
        <?php echo $mensagem ?>
        <form method="POST">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="senha" placeholder="Senha" required>
            <button type="submit">Entrar</button>
        </form>

    </div>

</body>

</html>