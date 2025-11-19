<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Ler Cartas</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
<header>
    <h1>Cartas Recebidas</h1>
    <nav>
        <a href="index.html">Início</a>
        <a href="cartas.html">Cartas</a>
    </nav>
</header>
<main>
<?php
$arquivos = glob("cartas/*.txt");

if (!$arquivos) {
    echo "<p>Nenhuma carta encontrada.</p>";
} else {
    foreach ($arquivos as $arquivo) {
        $conteudo = nl2br(file_get_contents($arquivo));
        echo "<div class='carta'>$conteudo</div>";
    }
}
?>
</main>
</body>
</html>
