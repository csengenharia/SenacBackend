<?php

$mensagem = "";
$cep = filter_input(INPUT_GET, "cepBuscado", FILTER_VALIDATE_INT);

//Se não está setado (sinal de negação) ou se o tamanho for diferente de 8
if (!isset($cep) || strlen($cep) != 8) {
    $mensagem = "Cep inválido!";
} else {
    $url = "https://viacep.com.br/ws/{$cep}/json/";


    $configuracoes = [
        "https" => [
            "method" => "GET",
            "header" => "Content-Type: application/json"
        ]
    ];

    $context = stream_context_create($configuracoes);
    $response = file_get_contents($url, false, $context);

    if ($response == false) {
        $mensagem = "Erro ao acessar a API Via CEP.";
    } else {

        $dados = json_decode($response, true);

        if (isset($dados['erro']) == true) {
            $mensagem = "ERRO: CEP não encontrado.";
        }
        /*
 } else {

     echo "<h2>Endereço encontrado</h2>";
     echo "<input type='text' value='${dados['logradouro']}'> <br>";
     echo "<input type='text' value='${dados['complemento']}'> <br>";
     echo "<input type='text' value='${dados['bairro']}'> <br>";
     echo "<input type='text' value='${dados['localidade']}'> <br>";
     echo "<input type='text' value='${dados['estado']}'> <br>";
 }
     */
    }

    // echo "<p>{$mensagem}</p>";
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado - Busca CEP</title>
    <link rel="stylesheet" href="./../css/style.css">
</head>

<body>
    <h2>Endereço encontrado</h2>

    <div id="cep-buscado">
        <span id="error"><?= $mensagem ?></span>

        <div>
            <label>Logradouro: </label>
            <input type="text" value="<?= isset($dados['logradouro'])? $dados ['logradouro'] :'' ?>" disabled>
        </div>

        <div>
            <label>Complemento: </label>
            <input type="text" value="<?= isset($dados['complemento'])? $dados['complemento']:'' ?>" disabled>
        </div>

        <div>
            <label>Bairro: </label>
            <input type="text" value="<?=isset($dados['bairro'])? $dados['bairro']:$mensagem ?>" disabled>

        </div>

        <div>
            <label>Cidade: </label>
            <input type="text" value="<?= isset($dados['localidade'])? $dados['localidade']:'' ?>" disabled>
        </div>

        <div>
            <label>Estado: </label>
            <input type="text" value="<?= isset($dados['estado'])? $dados['estado']:'' ?>" disabled>
        </div>

    </div>
</body>

</html>