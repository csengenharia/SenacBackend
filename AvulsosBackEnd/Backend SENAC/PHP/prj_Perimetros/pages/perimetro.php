<!-- 
 Para rodar uma aplicação PHP:

1) Inicializar o servidor Apache (XAMPP)
2) Colocar os arquivos PHP na pasta correta dentro da pasta XAMPP/htdocs
   Exemplo: XAMPP/htdocs/perimetro.php
3) Acessar o localhost com o browser acrescido da pasta do seu projeto (ex: http://localhost/perimetro.php)


4) Para enviar dados via formulário, você pode usar o método POST ou GET.
   - POST: os dados são enviados no corpo da requisição.(Seguro para dados sensíveis)
   - GET: os dados são enviados na URL.(Visível na barra de endereços)

echo: significa imprimir algo na tela
var_dump: mostra o conteúdo de uma variável, incluindo o tipo de dado.

*/

// echo $_POST;
// echo $_GET;
// var_dump(value:$_POST);
// var_dump(value:$_GET);

/*Operadores Aritméticos PHP
adição: +
subtração: -    
multiplicação: *
divisão: /
% modulo, **potenciação
*/-->
<?php

$lado1 = filter_input( type: INPUT_GET, var_name: "lado1", filter: FILTER_VALIDATE_FLOAT);

$lado2 = filter_input(  type: INPUT_GET,var_name: "lado2", filter: FILTER_VALIDATE_FLOAT);

$lado3 = filter_input(  type: INPUT_GET, var_name: "lado3", filter: FILTER_VALIDATE_FLOAT);

if ($lado1 === false || $lado2 === false || $lado3 === false) {
    $mensagem = "ERRO: Valores inválidos!!!";

}else {
    $perimetro = $lado1 + $lado2 + $lado3;  
    $mensagem = "<p> Lado 1 =>" . $_GET["lado1"] . "</p>" .
                "<p> Lado 2 =>" . $_GET["lado2"] . "</p>" .
                "<p> Lado 3 =>" . $_GET["lado3"] . "</p>" .
                 "O valor do perímetro é: " . $perimetro;
}   
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../css/estilo.css">
    <title>Perímetro</title>
</head>

<body>
    <h1>Resultado do Perímetro do Triângulo</h1>
 <div id="resultado">
     <?= $mensagem ?>
 </div>

</body>

</html>

