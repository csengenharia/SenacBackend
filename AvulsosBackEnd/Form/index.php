<!DOCTYPE html>

<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Formulário</title>

    <link rel="stylesheet" href="./style.css">

</head>

<body>

    <div class="container">

        <h1>Formulário de Cadastro</h1>

        <p>Preencha todos os campos abaixo para se cadastrar.</p>

        <form id="cadastro" action="processa_formulario.php" method="post">
            <!-- Campo de nome -->

            <label for="nome">Nome completo:</label>
            <input type="text" id="nome" name="nome" placeholder="Digite seu nome completo" required>



            <!-- Campo de e-mail -->
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" placeholder="Digite seu e-mail" required>

            <!-- Campo de senha -->
            <label for="senha">Senha:</label>

            <input type="password" id="senha" name="senha" placeholder="Crie uma senha" minlength="6" required>

            <!-- Campo de data -->
            <label for="dataNasc">Data de nascimento:</label>
            <input type="date" id="dataNasc" name="dataNasc" required>

            <!-- Campo de telefone -->
            <label for="telefone">Telefone:</label>

            <input type="tel" id="telefone" name="telefone" placeholder="(99) 99999-9999"
                pattern="\(\d{2}\)\s\d{5}-\d{4}" required>

            <!-- Campo de gênero -->
            <label>Gênero:</label>

            <div class="radio-group">

                <label><input type="radio" name="genero" value="masculino"> Masculino</label>

                <label><input type="radio" name="genero" value="feminino"> Feminino</label>

                <label><input type="radio" name="genero" value="outro"> Outro</label>

            </div>



            <!-- Campo de curso (select) -->

            <label for="curso">Curso:</label>

            <select id="curso" name="curso" required>

                <option value="">Selecione...</option>

                <option value="ads">Análise e Desenvolvimento de Sistemas</option>

                <option value="si">Sistemas de Informação</option>

                <option value="engsoft">Engenharia de Software</option>

            </select>



            <!-- Campo de mensagem -->

            <label for="mensagem">Mensagem:</label>

            <textarea id="mensagem" name="mensagem" rows="4" placeholder="Digite aqui sua mensagem..."></textarea>



            <!-- Aceite dos termos -->

            <label class="checkbox">

                <input type="checkbox" name="termos" required> Aceito os termos de uso

            </label>

            <!-- Botão de envio -->

            <button type="submit">Enviar Cadastro</button>

        </form>

    </div>

</body>

</html>