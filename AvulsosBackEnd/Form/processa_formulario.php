<?php
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$dataNasc = $_POST['dataNasc'];
$telefone = $_POST['telefone'];
$genero = $_POST['genero'];
$curso = $_POST['curso'];
$mensagem = $_POST['mensagem'];
$termos = isset($_POST['termos'])? 'Aceito' : 'Nao aceito';

//exibir 
echo "<h1>Dados Recebidos</h1>";
echo "Nome: $nome <br>";
echo "Email: $email <br>";
echo "Senha: $senha <br>";
echo "DataNascimento: $dataNasc <br>";
echo "Telefone: $telefone <br>";
echo "Genero: $genero <br>";
echo "Curso: $curso <br>";
echo "Mensagem: $mensagem <br>";
echo "Termos: $termos <br>";
?>
