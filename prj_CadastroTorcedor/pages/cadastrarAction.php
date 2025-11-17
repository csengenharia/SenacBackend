<?php       
// echo "Hello, World!";
$user = $_POST["nome"];
$timeCoracao = $_POST["time"];
echo $user . ", " . PHP_EOL . ", obrigado por se cadastrar conosco! Você torce para o " . $timeCoracao;