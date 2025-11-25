<?php
$host="localhost";
$banco="biblioteca";
$usuario="root";
$senha="";

try {
    $conexao = new PDO("mysql:host=$host;dbname=$banco", $usuario, $senha);
    //DEFINE SE ACONTECER ALGUM ERRO NA CONEXÃO, MOSTRA O ERRO
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    //CAPTURA O ERRO DE CONEXÃO E MOSTRA NA TELA
    die("Erro na conexão: " . $e->getMessage());
}
?>