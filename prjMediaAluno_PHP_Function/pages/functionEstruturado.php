<?php
// Exercício:  
// não pode estar em branco - ok
// não pode ter número no nome -ok
// itens do array devem ser números - ok
// array não pode ser vazio -ok
// Função que verifica se todos os itens do array $paramNotas são numéricos.
// Retorna false se encontrar algum valor não numérico, senão retorna true.
function validarNotas($paramNotas)
{
    // Se algum item não for número, retorna false 
    foreach ($paramNotas as $nota) {
        if (!is_numeric($nota)) {
            return false; 
        }
    }
    // Se todos forem numéricos, retorna true
    return true; 
}

function validarEntradas($paramNome, $paramNotas)
{
    $nome = trim($paramNome);

    // Nome não pode estar em branco e deve ter pelo menos 2 caracteres
    if (strlen($nome) < 2) {
        return false;
    }

    // Nome não pode conter números
    if (preg_match('/\d/', $nome)) {
        return false;
    }

    // Array de notas não pode ser vazio
    if (empty($paramNotas)) {
        return false;
    }

    // Todas as notas devem ser numéricas
    if (!validarNotas($paramNotas)) {
        return false;
    }

    return true;
}
// Função que exibe uma mensagem de boas-vindas junto com a hora atual
function darBoasVindas()
{
    // Obtém o hora atual 
    $hora = time(); 
    // Define o fuso horário para São Paulo
    date_default_timezone_set("America/Sao_Paulo"); 
    // Obtém a hora atual formatada (horas:minutos:segundos)
    $hora = date("H:i:s");     
    // Exibe a mensagem com a hora
    echo "Hello World Function, {$hora}"; 
}

// Função que calcula a média dos valores do array de notas
function calcularMedia($arrayNotas)
{
    // Soma todos os valores do array e divide pela quantidade de elementos para obter a média
    $resultado = array_sum($arrayNotas) / count($arrayNotas);
    return $resultado;
}

// Função que verifica se a média é suficiente para aprovação
function verificarAprovacao($umaMedia)
{
    // Retorna true se a média for maior ou igual a 7, senão retorna false
    return $umaMedia >= 7 ? true : false;

    // Forma alternativa (comentada) usando if/else:
    // if ($umaMedia >= 7) {
    //     return true;
    // } else {
    //     return false;
    // }
}
// Função que exibe uma mensagem na tela
function mostrarMensagem($mensagem)
{// Imprime a mensagem recebida como parâmetro
    echo $mensagem; 
}

// Função que exibe o resultado final de aprovação ou reprovação
function mostrarResultadoFinal($resultado)
{
    if ($resultado == true) {
        // Exibe mensagem de aprovação
        mostrarMensagem("Parabéns, você foi aprovado!"); 
    } else {
        // Exibe mensagem de reprovação
        mostrarMensagem("Infelizmente, você foi reprovado."); 
    }
}

// Recebe o nome do aluno e remove espaços extras
$nome = trim($_GET['nome']); 
// Recebe o array de notas do aluno
$notas = $_GET['notas'];     

// Valida as entradas recebidas
if (validarEntradas($nome, $notas) === true) {
    // Calcula a média das notas
    $media = calcularMedia($notas);       
    // Verifica se o aluno foi aprovado    
    $resultado = verificarAprovacao($media);  
} else {
    // Redireciona para a página inicial se houver erro de validação
    header("Location: ../index.html");        
}

// echo "Feito com valores de entrada";
// $media = calcularMedia($notas);
// $resultado = verificarAprovacao($media);
// var_dump($media);
// var_dump($resultado);

// echo "Feito com valores fixos";
// $media = calcularMedia([10,10,10,10,10,10,10]);
// $resultado = verificarAprovacao(7);
// var_dump($media);
// var_dump($resultado);

// $mensagemBoasVindas = "Olá, {$nome}! Sua média é: {$media}";
// if ($media >= 7) {
//     $mensagemResultado = "Parabéns, você foi aprovado!";
// } else {
//     $mensagemResultado =  "Infelizmente, você foi reprovado.";
// }

// $mensagemResultado = $media>=7 ? "Parabéns, você foi aprovado!" :
// "Infelizmente, você foi reprovado.";
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Performance do Aluno</title>
    <link rel="stylesheet" href="./../css/style.css">
</head>

<body>
    <main class="container">
        <h1>Performance do Aluno</h1>
        <P> <?= darBoasVindas(); ?>
        </P>
        <p><?= mostrarMensagem("Olá, {$nome}! Sua média é: " . number_format($media, 2, ',', '.')); ?></p>
        <p id="<?= $resultado == true ? "aprovado" : "reprovado"; ?>"><?= mostrarResultadoFinal($resultado) ?></p>
    </main>
</body>

</html>