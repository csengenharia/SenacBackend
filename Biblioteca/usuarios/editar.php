<?php

require '../conexao.php';
//verificar se existe informação(se existe a variavel e se tem informação)
if(!isset($_GET['id']) || empty($_GET['id'])){
    header("location: listar.php");
    exit;

}
$id = intval($_GET['id']);
//criar um select
$sql = "SELECT *FROM usuarios WHERE id=:id LIMIT 1";
//preparando a consulta
$stmt = $pdo->prepare($sql);
//executa passando como parametro o ID
$stmt->execute([':id'=>$id]);
//salvar em um array
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);
//se não achar nada volta para a lista
if(!$usuario){
    header("location: listar.php");
    exit;
}
//criar uma variavel para inserir mensagens
$mensagens = "";
if($_SERVER['REQUEST_METHOD']==='POST'){
    $nome=trim($_POST['nome']);
    $email=trim($_POST['email']);
    $tipo=trim($_POST['tipo']);
    //verifica se a senha foi preenchida
    if(!empty($_POST['senha'])){
        $senha = password_hash($_POST['senha'],PASSWORD_DEFAULT);
        //monta o sql para atualizar todos os campos
        $sql = "UPDATE usuarios SET nome = :nome, email = :email, senha = :senha, tipo = :tipo WHERE id = :id";

        //inserir as informações
       $params=[
        ':nome' =>$nome,
        ':email' =>$email,
        ':senha' =>$senha,
        ':tipo' =>$tipo,
        ':id' =>$id
       ];
    }else{//se a senha não for preenchida
    $sql = "UPDATE usuarios SET nome = :nome, email = :email, tipo = :tipo WHERE id = :id";

        //inserir as informações
       $params=[
        ':nome' =>$nome,
        ':email' =>$email,
        ':tipo' =>$tipo,
        ':id' =>$id
       ];
}
try{
    $stmt = $pdo->prepare($sql);
    $stmt ->execute($params);
    header("location: listar.php");
    exit;
}catch(PDOException $e){
    $mensagens="<p class='erro'>Erro ao atualizar: ".$e->getMessage()."</p>";
}
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="card-editar">
        <h1>Editar Usuário</h1>
        <?= $mensagens ?>
        <form method="POST">
            <div class="input-group">
                <label for="nome"> Nome </label>
                <input type="text" name="nome" 
                value="<?=$usuario['nome']?>"required>

            </div>
            <div class="input-group">
                <label for="email"> Email </label>
                <input type="email" name="email" 
                value="<?=$usuario['email']?>"required>
            </div>
            <div class="input-group">
                <label for="senha">Nova senha<small>(opcional)</small>
                </label>
                <input type="password" name="senha" 
                placeholder="Deixe em branco para não alterar">
            </div>
            <div class="input-group">
                <label for="tipo">tipo</label>
                <select name="tipo" >
                    <option value="admin"<?=$usuario['tipo']=='admin'?
                    'selected': ''?>>Admin</option>
                    <option value="aluno"<?=$usuario['tipo']=='aluno'?
                    'selected': ''?>>Aluno</option>
                </select>
                 </div>
                <button type="submit" class="btn">Salvar as alterações</button>
                <a href="listar.php" class="btn-voltar">Voltar</a>
           

        </form>

    </div>
    
</body>
</html>