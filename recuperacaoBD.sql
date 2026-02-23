-- ==========================================
-- PARTE 01: CRIANDO O BANCO E AS TABELAS: 
Criar via script SQL o banco de dados abaixo, tendo em mente as observações realizadas no quadro ao lado.
-- ==========================================

-- 1. Criação do Banco de Dados
CREATE DATABASE recuperacaobd;
GO
USE recuperacaobd;
GO

-- 2. Tabela de Pokémons (Guarda as fichas dos monstros)
CREATE TABLE Pokemons (
    idPokemon INT PRIMARY KEY IDENTITY(1,1),
    nome VARCHAR(50) UNIQUE NOT NULL, -- O nome não pode repetir!
    vida INT CHECK (vida BETWEEN 1 AND 255),
    ataque INT CHECK (ataque BETWEEN 1 AND 255),
    defesa INT CHECK (defesa BETWEEN 1 AND 255),
    velocidade INT CHECK (velocidade BETWEEN 1 AND 255)
);

-- 3. Tabela de Locais (Onde as lutas acontecem)
CREATE TABLE LocaisBatalha (
    idLocal INT PRIMARY KEY IDENTITY(1,1),
    nomeLocal VARCHAR(50) NOT NULL,
    regiao VARCHAR(50),
    ambiente VARCHAR(50),
    internoExterno BIT -- 1 para dentro, 0 para fora
);

-- 4. Tabela de Batalhas (Onde registramos o histórico das lutas)
CREATE TABLE Batalhas (
    idBatalha INT PRIMARY KEY IDENTITY(1,1),
    idLocal INT FOREIGN KEY REFERENCES LocaisBatalha(idLocal),
    idPokemonAtacante INT FOREIGN KEY REFERENCES Pokemons(idPokemon),
    idPokemonDefensor INT FOREIGN KEY REFERENCES Pokemons(idPokemon),
    idPokemonVencedor INT FOREIGN KEY REFERENCES Pokemons(idPokemon),
    dataHora DATETIME DEFAULT GETDATE(),
    climaBatalha VARCHAR(50),
    -- Regra: Um pokémon não pode lutar contra ele mesmo
    CONSTRAINT CHK_Diferentes CHECK (idPokemonAtacante <> idPokemonDefensor),
    -- Regra: O vencedor tem que ser um dos dois que lutaram
    CONSTRAINT CHK_VencedorValido CHECK (idPokemonVencedor IN (idPokemonAtacante, idPokemonDefensor))
);

-- ==========================================
-- PARTE 02: Manipulação de dados, com as pesquisas e atualizações da atividade
-- ==========================================

-- a. Insira 10 pokémons com tipos e atributos plausíveis (ex.: Pikachu, Onix, dentre outros). Um dos pokémons deve ser Pikachu.
INSERT INTO Pokemons (nome, vida, ataque, defesa, velocidade) VALUES 
('Pikachu', 40, 60, 45, 95), ('Onix', 40, 50, 160, 75), 
('Charizard', 80, 85, 80, 100), ('Squirtle', 45, 50, 65, 45),
('Bulbasaur', 45, 50, 50, 45), ('Gengar', 60, 65, 65, 110),
('Snorlax', 150, 110, 70, 35), ('Mewtwo', 100, 115, 95, 130),
('Gyarados', 95, 125, 80, 85), ('Lucario', 70, 115, 75, 95);

-- b. Insira 5 locais (ex.: Pewter City Gym, Viridian Forest, Cerulean Cave, Indigo Plateau, Mt. Moon), com região/ambiente condizentes.
INSERT INTO LocaisBatalha (nomeLocal, regiao, ambiente, internoExterno) VALUES 
('Pewter City Gym', 'Kanto', 'Ginásio', 1),
('Viridian Forest', 'Kanto', 'Floresta', 0),
('Cerulean Cave', 'Kanto', 'Caverna', 1),
('Indigo Plateau', 'Kanto', 'Planalto', 0),
('Mt. Moon', 'Kanto', 'Montanha', 1);

--c. Insira 10 batalhas com data/hora, local, participantes, vencedor, entre outros dados. No mínimo duas delas devem ser em clima ensolarado, e três em clima chuvoso.Em duas destas batalhas em chuva deve estar o Pikachu.
INSERT INTO Batalhas (idLocal, idPokemonAtacante, idPokemonDefensor, idPokemonVencedor, climaBatalha) VALUES 
(1, 1, 2, 2, 'Ensolarado'), (4, 3, 4, 3, 'Ensolarado'), -- 2 Ensolaradas
(2, 1, 5, 1, 'Chuvoso'), (2, 1, 6, 6, 'Chuvoso'),     -- 2 Chuvosas com Pikachu
(3, 7, 8, 8, 'Chuvoso'), -- 1 Chuvosa extra
(5, 9, 10, 9, 'Nublado'), (1, 2, 3, 3, 'Tempestade'),
(2, 4, 5, 4, 'Nublado'), (3, 6, 7, 7, 'Nevoeiro'),
(4, 8, 9, 8, 'Ensolarado');

--d. Atualize o atributo de Pikachu aumentando a velocidade em +10 em relação ao que havia sido atribuído.
UPDATE Pokemons SET velocidade = velocidade + 10 WHERE nome = 'Pikachu';

--e. Atualize ou diminua os índices de ataque ou defesa de TODOS os pokémons em 20 unidades.
UPDATE Pokemons SET ataque = ataque - 20;

-- f. Selecione as batalhas em que o clima era Ensolarado.
SELECT * FROM Batalhas WHERE climaBatalha = 'Ensolarado';

-- g. Selecione as batalhas em que o clima era Chuvoso e um dos lutadores o Pikachu.
SELECT B.* FROM Batalhas B
INNER JOIN Pokemons P1 ON B.idPokemonAtacante = P1.idPokemon
INNER JOIN Pokemons P2 ON B.idPokemonDefensor = P2.idPokemon
WHERE B.climaBatalha = 'Chuvoso' AND (P1.nome = 'Pikachu' OR P2.nome = 'Pikachu');

-- ==========================================
-- PARTE 03: Pesquisa dos dados solicitados na atividade
-- ==========================================

-- h. Liste todas as batalhas com nomes dos pokémons (atacante, defensor, vencedor) e nome do local.
SELECT B.idBatalha, Atk.nome AS Atacante, Def.nome AS Defensor, Ven.nome AS Vencedor, L.nomeLocal
FROM Batalhas B
JOIN Pokemons Atk ON B.idPokemonAtacante = Atk.idPokemon
JOIN Pokemons Def ON B.idPokemonDefensor = Def.idPokemon
JOIN Pokemons Ven ON B.idPokemonVencedor = Ven.idPokemon
JOIN LocaisBatalha L ON B.idLocal = L.idLocal;

-- i. Mostre as batalhas com clima chuvoso, bem como a data/hora em que ocorreu, local e nomes dos participantes.
SELECT 
    B.dataHora AS 'Data e Hora', 
    L.nomeLocal AS 'Local da Batalha', 
    P1.nome AS 'Pokémon Atacante', 
    P2.nome AS 'Pokémon Defensor'
FROM Batalhas B
-- "Grudamos" a tabela de locais para saber o nome do lugar pelo ID
JOIN LocaisBatalha L ON B.idLocal = L.idLocal
-- "Grudamos" a tabela de Pokemons duas vezes: uma para o atacante e outra para o defensor
JOIN Pokemons P1 ON B.idPokemonAtacante = P1.idPokemon
JOIN Pokemons P2 ON B.idPokemonDefensor = P2.idPokemon
-- Filtramos apenas onde o clima está registrado como 'Chuvoso'
WHERE B.climaBatalha = 'Chuvoso';

--j. Calcule o total de batalhas por local (nome do local + contagem), ordenando do maior número para o menor.
SELECT L.nomeLocal, COUNT(B.idBatalha) AS Total
FROM LocaisBatalha L
LEFT JOIN Batalhas B ON L.idLocal = B.idLocal
GROUP BY L.nomeLocal
ORDER BY Total DESC;

-- k. Mostre os pokémons que mais perderam (nome do pokémon + derrotas) em ordem alfabética por nome do pokémon. 
SELECT P.nome, COUNT(B.idBatalha) AS Derrotas
FROM Pokemons P
JOIN Batalhas B ON (P.idPokemon = B.idPokemonAtacante OR P.idPokemon = B.idPokemonDefensor)
WHERE B.idPokemonVencedor <> P.idPokemon
GROUP BY P.nome
ORDER BY P.nome ASC;

-- l. Para cada pokémons, mostre a quantidade de batalhas disputadas, o número de vitórias, incluindo também os que nunca lutaram.
SELECT P.nome, 
       COUNT(B.idBatalha) AS Disputadas,
       SUM(CASE WHEN B.idPokemonVencedor = P.idPokemon THEN 1 ELSE 0 END) AS Vitorias
FROM Pokemons P
LEFT JOIN Batalhas B ON P.idPokemon = B.idPokemonAtacante OR P.idPokemon = B.idPokemonDefensor
GROUP BY P.nome;

-- m. Mostre quantas batalhas ocorreram em cada tipo de clima, ordenando do maior para o menor número. 
SELECT climaBatalha, COUNT(*) AS TotalPorClima
FROM Batalhas
GROUP BY climaBatalha
ORDER BY TotalPorClima DESC;

-- n. Mostre a média do nível de ataque de todos os pokémons. Deverá ser exibido um único valor, que será a média de todos os valores cadastrados. 
SELECT AVG(CAST(ataque AS FLOAT)) AS MediaAtaqueGlobal FROM Pokemons;

-- o. Mostre o APENAS os TOP 3 pokémons por número de vitórias (nome do pokémon + vitórias), em ordem decrescente. (DESAFIO) corrija este código para atender o exercicio
SELECT TOP 3 P.nome, COUNT(B.idBatalha) AS Vitorias
FROM Pokemons P
JOIN Batalhas B ON P.idPokemon = B.idPokemonVencedor
GROUP BY P.nome
ORDER BY Vitorias DESC;