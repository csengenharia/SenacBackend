<?php
$remetente = $_POST['remetente'];
$instituicao = $_POST['instituicao'];
$destinatario = $_POST['destinatario'];
$mensagem = $_POST['mensagem'];

$data = date("d/m/Y H:i");
$conteudo = "De: $remetente\nPara: $destinatario\nInstituição: $instituicao\nData: $data\n\n$mensagem\n\n-------------------------\n";

file_put_contents("cartas/$destinatario.txt", $conteudo, FILE_APPEND);

echo "<script>alert('Carta enviada com sucesso!'); window.location.href='cartas.html';</script>";
?>
