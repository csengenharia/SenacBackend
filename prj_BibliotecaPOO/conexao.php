<?php
$host="localhost";
$banco="biblioteca";
$usuario="root";
$senha="";

try {
    // Mude $conexao para $pdo
    $pdo = new PDO("mysql:host=$host;dbname=$banco", $usuario, $senha);
    //DEFINE SE ACONTECER ALGUM ERRO NA CONEXÃO, MOSTRA O ERRO
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    //CAPTURA O ERRO DE CONEXÃO E MOSTRA NA TELA
    die("Erro na conexão: " . $e->getMessage());
}
?>