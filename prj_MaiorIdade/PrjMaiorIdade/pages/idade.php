<?php
$nome = $_GET["nome"];
$anoNascimento = filter_input(INPUT_GET, "nascimento", FILTER_VALIDATE_INT);

$idade = 2025 - $anoNascimento;

$mensagemPrincipal = "<p> Seu nome é: " . $nome . "</p>" .
                   "<p> Sua idade é: " . $idade . "</p>";

if ($idade >= 18) {
    $mensagemMaioridade = "<p> Você é maior de idade! </p>";
} else {
    $mensagemMaioridade = "<p> Você é menor de idade! </p>";
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maioridade</title>
</head>
<body>
    <h1>Maioridade</h1>
    <?php echo $mensagemPrincipal . " " . $mensagemMaioridade; ?>
</body>
</html>