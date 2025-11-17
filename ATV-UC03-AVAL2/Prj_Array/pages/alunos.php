<?php
    $aluno1 = trim( $_GET["aluno1"]);
    $aluno2 = trim( $_GET["aluno2"]);
    $aluno3 = trim( $_GET["aluno3"]);
    $mensagemAluno = "";
    $mensagemProfessor = "";


    // Validação dos campos: há algo? É nulo.
    if ($aluno1 == null || $aluno2 == null || $aluno3 == null) {
        echo "Valores vazios";
    } else if (strlen($aluno1) < 2 || strlen($aluno2) < 2 || 
    strlen($aluno3) < 2 ) {
        echo "Um nome precisa ter no mínimo 2 caracteres.";
    } else {
        //criação de array vazio
        //$alunos = []; 
        $alunos = [$aluno1, $aluno2, $aluno3];
        //criação de array com valores
        $professores = array("Pardal", "Tiburcio", "Girafales","Juquinha");
        //var_dump($alunos);
        //var_dump($professores);
        // $mensagem = $mensagem . "<li>" . $alunos[0] . "</li>";
        // $mensagem = $mensagem . "<li>" . $alunos[1] . "</li>";
        // $mensagem = $mensagem . "<li>" . $alunos[2] . "</li>";

        for ($i = 0; $i < count($alunos); $i++) {
            $mensagemAluno .= "<li>" . $alunos[$i] . "</li>";
        }   

        for ($i = 0; $i < count($professores); $i++) {
            $mensagemProfessor = $mensagemProfessor . "<li>" . $professores[$i] . "</li>";
        }  
  
    }    
    
?> 

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Escola</title>
</head>
<body>

<h1>Lista Escola</h1>

<h2>Lista Alunos</h2>

<ul>
        <?php  echo $mensagemAluno;     ?>     
</ul>   

<h2>Lista Professores</h2>

<ul>
        <?php  echo $mensagemProfessor;     ?>     
</ul>
    
</body>
</html>