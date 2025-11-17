
/*--------PARTE 01 ------DATA BASE PROGRAMA DB_PRAIA ------------------------*/

CREATE TABLE cliente (
idCliente INT PRIMARY KEY AUTO_INCREMENT,
nomeCliente VARCHAR(50) NOT NULL,
cpf CHAR(11) NOT NULL UNIQUE
);


CREATE TABLE funcionario (
idFuncionario INT PRIMARY KEY AUTO_INCREMENT,
nomeFuncionario VARCHAR(50) NOT NULL,
cpf CHAR(11) NOT NULL UNIQUE,
celular CHAR(11) NOT null
);


CREATE TABLE equipamento (
idEquipamento INT PRIMARY KEY AUTO_INCREMENT,
nomeEquipamento VARCHAR(50) NOT NULL,
qtd INT NOT NULL,
valorHora DECIMAL(5,2)
)

CREATE TABLE aluguel(
idAluguel INT PRIMARY KEY AUTO_INCREMENT,
idCliente INT NOT NULL,
idEquipamento INT NOT NULL,
idFuncionario INT NOT NULL,
dataHoraRetirada DATETIME NOT NULL,
dataHoraDevolucao DATETIME NOT NULL,
valorAPagar DECIMAL(10,2),
valorPago DECIMAL(10,2),
pago BIT,
formaPagamento VARCHAR(50) DEFAULT 1,
qtVezes INT,
CONSTRAINT fk_Aluguel_Cliente FOREIGN KEY (idCliente)
REFERENCES cliente (idCliente),
CONSTRAINT fk_Aluguel_Equipamento FOREIGN KEY (idEquipamento)
REFERENCES Equipamento (idEquipamento),
CONSTRAINT fk_Alguel_Funcionario FOREIGN KEY (idFuncionario)
REFERENCES funcionario (idFuncionario)
);

/*--------PARTE 2 -------------*/

/*1) Utilizando o comando ALTER TABLE, adicionar à tabela cliente já criada os seguintes atributos: 
email, cidade, estado, endereço (lembre-se que trata-se de atributo composto)*/


/*Tabela endereço separada*/
CREATE TABLE endereco (
id_endereco INT PRIMARY KEY AUTO_INCREMENT,
rua VARCHAR(100) NOT NULL,
numero VARCHAR(10) NOT NULL,
bairro VARCHAR(50) NOT NULL,
complemento VARCHAR(50),
cep CHAR(8) NOT NULL,
cidade VARCHAR(50) NOT NULL,
estado CHAR(2) NOT NULL
);

ALTER TABLE cliente
ADD email VARCHAR(50) NOT NULL,
ADD id_endereco INT,
ADD FOREIGN KEY (id_endereco) REFERENCES endereco(id_endereco);

SELECT * FROM cliente

/* 2) Apagar da Tabela Aluguel o atributo idEquipamento, 
pois criaremos uma outra tabela para conter tal atributo. 
Use o comando para dropar colunas para fazer isso.*/

/*Tem que apogar a constrait antes*/
ALTER TABLE aluguel 
DROP FOREIGN KEY fk_Aluguel_Equipamento;

ALTER TABLE aluguel 
DROP column idEquipamento;


/* 2) Criar a tabela associativa AluguelEquipamento com os seguintes atributos: 
idAluguemEquipamento PK
idAluguel FK
idEquipamento FK
valorUnitario 
valorItem
quantidade 
Use o novo modelo para inspecionar as propriedades!!! */

CREATE TABLE aluguelEquipamento(
idAluguelEquipamento INT PRIMARY KEY AUTO_INCREMENT,
idAluguel INT NOT NULL,
idEquipamento INT NOT NULL,
valorUnitario DECIMAL(10,2),
valorItem DECIMAL(10,2),
qtd INT default 1,
CONSTRAINT fk_AluguelEquipamento_Equipamento FOREIGN KEY (idEquipamento)
REFERENCES equipamento (idEquipamento),
CONSTRAINT fk_AluguelEquipamento_Aluguel FOREIGN KEY (idAluguel)
REFERENCES aluguel (idAluguel)
);

/*3) Inserir 20 clientes segundo o seguinte critério:
*/

SELECT * FROM cliente

-- Inserindo endereços
INSERT INTO endereco (rua, numero, bairro, complemento, cep, cidade, estado)
VALUES
('Rua das Gaivotas', '101', 'Centro', 'Casa', '11000000', 'Santos', 'SP'),
('Rua das Rosas', '202', 'Boa Vista', NULL, '11300000', 'São Vicente', 'SP'),
('Rua das Palmeiras', '303', 'Centro', 'Casa', '88000000', 'Florianópolis', 'SC'),
('Rua das Conchas', '404', 'Gonzaga', NULL, '11035000', 'Santos', 'SP'),
('Rua do Sol', '505', 'Aviação', NULL, '11700000', 'Praia Grande', 'SP'),
('Rua das Flores', '606', 'Centro', 'Casa', '11320000', 'São Vicente', 'SP'),
('Rua das Andorinhas', '707', 'Boqueirão', 'Casa', '11050000', 'Santos', 'SP'),
('Rua das Palmeiras', '808', 'Copacabana', 'Casa', '22000000', 'Rio de Janeiro', 'RJ'),
('Rua das Águas', '909', 'Boa Viagem', NULL, '51000000', 'Recife', 'PE'),
('Rua do Mar', '1001', 'Boa Viagem', NULL, '51020000', 'Recife', 'PE'),
('Rua do Riso', '1102', 'Centro', NULL, '70000000', 'Brasília', 'DF'),
('Rua da Neve', '1203', 'Centro', NULL, '88600000', 'São Joaquim', 'SC'),
('Rua dos Sonhos', '1304', 'Centro', NULL, '66000000', 'Belém', 'PA'),
('Rua das Princesas', '1405', 'Setor Oeste', 'Casa', '74000000', 'Goiânia', 'GO'),
('Rua das Pérolas', '1506', 'Centro', NULL, '28890000', 'Rio das Ostras', 'RJ'),
('Rua das Ondas', '1607', 'Centro', NULL, '23970000', 'Parati', 'RJ'),
('Rua dos Mineradores', '1708', 'Savassi', NULL, '30140000', 'Belo Horizonte', 'MG'),
('Rua das Magias', '1809', 'Centro', NULL, '11500000', 'Cubatão', 'SP'),
('Rua das Nuvens', '1901', 'Centro', 'Casa', '69000000', 'Manaus', 'AM'),
('Rua dos Cofres', '2002', 'Centro', NULL, '06000000', 'Osasco', 'SP');

-- Inserindo clientes
INSERT INTO cliente (nomeCliente, cpf, email, id_endereco)
VALUES
('Donald', '11111111111', 'donald@uol.com', 1),
('Margarida', '22222222222', 'margarida@uol.com', 2),
('Patinhas', '33333333333', 'patinhas@uol.com', 3),
('Huguinho', '44444444444', 'huguinho@gmail.com', 4),
('Luizinho', '55555555555', 'luizinho@gmail.com', 5),
('Zezinho', '66666666666', 'zezinho@gmail.com', 6),
('Pardal', '77777777777', 'pardal@uol.com', 7),
('Zé Carioca', '88888888888', 'zecarioca@uol.com', 8),
('Mickey', '99999999999', 'mickey@hotmail.com', 9),
('Minie', '10101010101', 'minie@gmail.com', 10),
('Pateta', '11121212121', 'pateta@gmail.com', 11),
('Branca de Neve', '12131313131', 'branca@outlook.com', 12),
('Aladin', '13141414141', 'aladin@gmail.com', 13),
('Cinderela', '14151515151', 'cinderela@hotmail.com', 14),
('Mulan', '15161616161', 'mulan@gmail.com', 15),
('Moana', '16171717171', 'moana@gmail.com', 16),
('Asnésio', '17181818181', 'asnesio@uol.com', 17),
('Maga Patalógica', '18191919191', 'maga@gmail.com', 18),
('Capitão Boeing', '19202020202', 'capitao@uol.com', 19),
('Pão Duro Mac Money', '20212121212', 'paoduro@ig.com', 20);


/*4)Inserir 03 funcionários com dados aleatórios, mas com os seguintes nomes:
Cebolinha,Cascão, Chico Bento
*/

SELECT * FROM funcionario


INSERT INTO funcionario (nomeFuncionario, cpf, celular)
VALUES
('Cebolinha', '30303030303', '11987654321'),
('Cascão', '31313131313', '11976543210'),
('Chico Bento', '32323232323', '11965432109');


/*5)Inserir os seguintes equipamentos: 
Cadeira 02 posições - 50 unidades - R$2,00
Cadeira 04 posições - 100 unidades - R$3,50
Guarda Sol P - 40 unidades - R$2,00
Guarda Sol G - 60 unidades - R$3,00
Mesinha - 30 unidades - R$1,50 */
SELECT * FROM equipamento

INSERT INTO equipamento (nomeEquipamento,qtd,valorHora)
VALUES 
('Cadeira 02 posições',50,2.00),
('Cadeira 04 posições',100,3.50),
('Guarda Sol P',40,2.00),
('Guarda Sol G',60,3.00),
('Mesinha',30,1.50);

INSERT INTO equipamento(nomeEquipamento,qtd,valorHora)
VALUES ('Cadeira 02 posições',50,2.00),
		 ('Cadeira 04 posições',100,3.50),
		 ('Guarda Sol P',40,2.00),
		 ('Guarda Sol G',60,3.00),
		 ('Mesinha',30,1.50);

SELECT * FROM endereco

SELECT * FROM cliente

/*
6)Inserir o aluguel de 1 cadeiras 2 posições para o Pateta feita pelo Cebolinha, em 08/12/24. Fazer o update da quantidade retirando uma do estoque. 
7)Inserir o aluguel de 2 cadeiras 4 posições e um guarda sol G para o Mickey feita pelo Chico Bento, em dez 10/12/24.
Fazer o update da quantidade retirando do estoque. 
8)Inserir o aluguel de 1 guarda sol P para 3 pessoas quaisquer feita pelo Cebolinha, em 27/12/24.
Fazer o update da quantidade retirando do estoque. 
9)Inserir o aluguel de 2 cadeiras 4 posições e um guarda sol G para 6 pessoas aleatórias feitas pelo Chico Bento, em dez 28/12/24. Fazer o update da quantidade retirando do estoque. 
10)Listar o nome e os contatos de todos os clientes da barraca em ordem alfabética. 
11)Listar o nome e o contato telefônico de todos os funcionários da barraca em ordem alfabética. 
12)Listar todos os dados dos aluguéis realizados em ordem de data da mais antiga para a mais nova.
13)Listar nome, cidade e estado de todos os clientes da baixada santista em ordem alfabética por nome.
14)Listar todos os produtos e a quantidade de estoque do produto que tem mais itens para o que tem menos.
15)Listar o nome, a cidade e o estado de todos os clientes que moram em casa em ordem alfabética.
16)Listar o nome de todos os clientes e o estado daqueles que não vivem no estado de SP.
17)Listar o nome de todos os clientes que começam com a letra A.
18)Listar todos os dados dos clientes que começam com a letra M e vivam no estado de PE.
19)Listar apenas as cadeiras e a quantidade que possui em estoque em ordem de quantidade, da que mais possui itens para a que menos possui. 
20)Listar todos os dados dos alugueis que ocorreram entre 25/12 e 31/12 de 2024 em ordem de data da mais antiga para a mais nova. 
*/

/*SET FOREIGN_KEY_CHECKS = 0;
DROP TABLE IF EXISTS aluguelEquipamento;
DROP TABLE IF EXISTS aluguel;
DROP TABLE IF EXISTS equipamento;
SET FOREIGN_KEY_CHECKS = 1;*/


/*6)Inserir o aluguel de 1 cadeiras 2 posições 
para o Pateta feita pelo Cebolinha, em 08/12/24. Fazer o update da quantidade retirando uma do estoque. 
*/

SELECT * FROM aluguelequipamento;
SELECT * FROM aluguel;
SELECT * FROM equipamento;
SELECT * FROM funcionario;
SELECT * FROM cliente;
SELECT * FROM endereco;

-- Buscar o ID do cliente Pateta -- ID 11
SELECT idcliente FROM cliente WHERE nomeCliente LIKE 'Pateta';

-- Buscar o ID do funcionário Cebolinha -- ID 1
SELECT idfuncionario FROM funcionario WHERE nomeFuncionario LIKE 'Cebolinha';

-- Buscar o ID do equipamento 'cadeira 2 posicoes' - ID 1
SELECT idequipamento FROM equipamento WHERE nomeEquipamento LIKE 'Cadeira 02 posições';


-- Inserir o aluguel (ligando cliente e funcionário)
INSERT INTO aluguel (idCliente, idFuncionario, dataHoraRetirada, valorAPagar,ValorPago,pago,formaPagamento,qtVezes)
VALUES (11,1,'24-12-08',NULL,NULL,NULL,NULL,NULL);

DELETE from aluguel WHERE idAluguel = 7;


INSERT INTO aluguelEquipamento (idAluguel, idEquipamento, valorUnitario, valorItem, qtd)
VALUES (8,1,2.00,2.00,1)

DELETE from aluguelEquipamento WHERE idEquipamento = 1;



UPDATE equipamento
SET qtd = qtd - 1
WHERE nomeEquipamento = 'Cadeira 02 posições';


