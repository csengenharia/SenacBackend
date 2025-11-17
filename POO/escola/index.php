<?php
// Importa as classes necessárias.
require_once 'Aluno.php';
require_once 'Professor.php';

// Instancia objetos Aluno e Professor em um array.
$pessoas = [
    new Aluno("João Silva", 17, "Informática", 8.5),
    new Aluno("Maria Souza", 16, "Administração", 5.8),
    // Certifique-se de que a classe Professor existe e o construtor aceita estes parâmetros.
    new Professor("Carlos Pereira", 42, "Matemática", 4200.00),
    new Professor("Ana Lima", 35, "Português", 3900.00)
];
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Escolar</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Sistema Escolar</h1>
        <table>
            <thead>
                <tr>
                    <th>Tipo</th>
                    <th>Nome</th>
                    <th>Idade</th>
                    <th>Descrição Completa</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pessoas as $p): ?>
                    <tr>
                        <td><?php echo $p->getTipo(); ?></td>
                        <td><?php echo $p->getNome(); ?></td>
                        <td><?php echo $p->getIdade(); ?></td>
                        <td><?php echo $p->getDescricao(); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <footer>
            <p>Desenvolvido em PHP Orientado a Objetos POO - Exemplo de Herança e Polimorfismo &copy; 2025</p>
        </footer>
    </div>
</body>
</html>