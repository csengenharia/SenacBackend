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
);

CREATE TABLE aluguel(
idAluguel INT PRIMARY KEY AUTO_INCREMENT,
idCliente INT NOT NULL,
idEquipamento INT NOT NULL,
idFuncionario INT NOT NULL,
dataHoraRetirada DATETIME NOT NULL,
dataHoraDevolucao DATETIME,
valorAPagar DECIMAL(10,2),
valorPago DECIMAL(10,2),
pago BIT,
formaPagamento VARCHAR(50),
qtVezes INT,
CONSTRAINT fk_Aluguel_Cliente FOREIGN KEY (idCliente)REFERENCES cliente (idCliente),
CONSTRAINT fk_Aluguel_Equipamento FOREIGN KEY (idEquipamento)REFERENCES Equipamento (idEquipamento),
CONSTRAINT fk_Alguel_Funcionario FOREIGN KEY (idFuncionario)REFERENCES funcionario (idFuncionario)
);

/* 
1) Utilizando o comando ALTER TABLE, adicionar à tabela cliente já criada os seguintes atributos: 
 (lembre-se que trata-se de atributo composto)*/
ALTER TABLE cliente 
ADD email VARCHAR(50),
ADD cidade VARCHAR(50),
ADD estado CHAR(2),
ADD endereco VARCHAR(50),
ADD nomeLogradouro VARCHAR(50),
ADD tipoLogradouro VARCHAR(15),
ADD numero VARCHAR(6),
ADD complemento VARCHAR(50);

/*2) Apagar da Tabela Aluguel o atributo idEquipamento, pois criaremos uma outra tabela para conter tal atributo.
 Use o comando para dropar colunas para fazer isso.*/
ALTER TABLE aluguel
DROP FOREIGN KEY fk_Aluguel_Equipamento
ALTER TABLE aluguel
DROP COLUMN idEquipamento

/*2) Criar a tabela associativa AluguelEquipamento com os seguintes atributos:*/
CREATE TABLE AluguelEquipamento(
idAluguelEquipamento INT PRIMARY KEY AUTO_INCREMENT,
idEquipamento INT NOT NULL,
idAluguel INT NOT NULL,
valorItem DECIMAL(10,2) NOT NULL,
valorUnitario DECIMAL(10,2) NOT NULL,
qtd INT,
CONSTRAINT fk_AluguelEquipamento_Equipamento FOREIGN KEY (idEquipamento)REFERENCES Equipamento(idEquipamento),
CONSTRAINT fk_AluguelEquipamento_Aluguel FOREIGN KEY (idAluguel)REFERENCES aluguel(idAluguel)
);

/*3) Inserir 20 clientes segundo o seguinte critério:*/
INSERT INTO cliente (nomeCliente, cpf, email, cidade, estado, tipoLogradouro, nomeLogradouro, numero, endereco) 
VALUES
('Donald','11211211233','Donald@uol.com','Santos','SP','Rua','Principal','123','casa'),
('Margarida','22322322344','Margarida@uol.com','São Vicente','SP',NULL,NULL,NULL,NULL),
('Patinhas','33433433455','Patinhas@uol.com','Florianópolis','SC','Rua','Central','45','casa'),
('Huguinho','44544544566','Huguinho@gmail.com','Santos','SP',NULL,NULL,NULL,NULL),
('Luizinho','55655655677','Luizinho@gmail.com','Praia Grande','SP',NULL,NULL,NULL,NULL),
('Zezinho','66766766788','Zezinho@gmail.com','São Vicente','SP','Rua','Das Flores','78','casa'),
('Pardal','77877877899','Pardal@uol.com','Santos','SP','Rua','Dos Pássaros','12','casa'),
('Zé Carioca','88988988900',NULL,'Rio de Janeiro','RJ','Rua','Do Samba','99','casa'),
('Mickey','99099099011','Mickey@hotmail.com','Recife','PE',NULL,NULL,NULL,NULL),
('Minie','10110110122','Minie@gmail.com','Recife','PE',NULL,NULL,NULL,NULL),
('Pateta','21221221233','Pateta@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL),
('Branca de Neve','32332332344','BrancaDeNeve@hotmail.com','São Joaquim','SC',NULL,NULL,NULL,NULL),
('Aladin','43443443455','Aladin@gmail.com','Belém','PA',NULL,NULL,NULL,NULL),
('Cinderela','54554554566','Cinderela@hotmail.com','Goiania','GO','Rua','Encantada','7','casa'),
('Mulan','65665665677','Mulan@gmail.com','Rio das Ostras','RJ',NULL,NULL,NULL,NULL),
('Moana','76776776788','Moana@gmail.com','Parati','RJ',NULL,NULL,NULL,NULL),
('Asnésio','87887887899','Asnesio@uol.com','Belo Horizonte','MG',NULL,NULL,NULL,NULL),
('Maga Patalógica','98998998900','MagaPatalogica@gmail.com','Cubatão','SP',NULL,NULL,NULL,NULL),
('Capitão Boeing','10101010111','CapitaoBoeing@uol.com','Manaus','AM','Avenida','Dos Ares','500','casa'),
('Pão Duro Mac Money','20220220222','PaoDuroMacMoney@ig.com','Osasco','SP',NULL,NULL,NULL,NULL);


/*4)Inserir 03 funcionários com dados aleatórios, mas com os seguintes nomes:*/
INSERT INTO funcionario(nomeFuncionario, cpf,celular)
VALUES ('Cebolinha','11111111111','11912345678'),
		('Cascão','22222222222','11923456789'),
		('Chico Bento','33333333333','31934567890');
		
/*5)Inserir os seguintes equipamentos:*/
INSERT INTO equipamento(nomeEquipamento,qtd,valorHora)
VALUES ('Cadeira 02 posições', 50, 2.00),
		 ('Cadeira 04 posições', 100, 3.50),
		 ('Guarda Sol P', 40, 2.00),
		 ('Guarda Sol G', 60, 3.00),
		 ('Mesinha', 30, 1.50);
		 
/*6)Inserir o aluguel de 1 cadeiras 2 posições para o Pateta feita pelo Cebolinha, em 08/12/24.
 Fazer o update da quantidade retirando uma do estoque.*/

INSERT INTO Aluguel(idCliente,idFuncionario,dataHoraRetirada,dataHoraDevolucao,valorAPagar,valorPago,pago,formaPagamento,qtVezes)
VALUES (11, 1, '2024-12-08', NULL, NULL, NULL, NULL, NULL, NULL);

INSERT INTO AluguelEquipamento(idEquipamento, idAluguel, valorItem, valorUnitario, qtd)
VALUE (1, 2, 2.00, 2.00, 1);

UPDATE equipamento
SET qtd = qtd - 1
WHERE idEquipamento = 1
SELECT*FROM Equipamento


/*7)Inserir o aluguel de 2 cadeiras 4 posições e um guarda sol G para o Mickey feita pelo Chico Bento, em dez 10/12/24.
Fazer o update da quantidade retirando do estoque.*/
SELECT idEquipamento, nomeEquipamento, valorHora FROM equipamento
WHERE nomeEquipamento IN ('Cadeira 04 posições','Guarda Sol G')
 
INSERT INTO Aluguel(idCliente,idFuncionario,dataHoraRetirada,dataHoraDevolucao,valorAPagar,valorPago,pago,formaPagamento,qtVezes)
VALUES (9, 3, '2024-12-10', NULL, 10.00, NULL, NULL, NULL, NULL);

SELECT idAluguel FROM aluguel 
WHERE idCliente = 9

INSERT INTO AluguelEquipamento(idEquipamento, idAluguel, valorItem, valorUnitario, qtd)
VALUE (2, 3, 3.50, 3.50, 2),
		(4, 3, 3.00, 3.00, 1);

UPDATE equipamento
SET qtd = qtd - 2
WHERE idEquipamento = 2

UPDATE equipamento
SET qtd = qtd - 1
WHERE idEquipamento = 4

SELECT*FROM Equipamento

/*8)Inserir o aluguel de 1 guarda sol P para 3 pessoas quaisquer feita pelo Cebolinha, em 27/12/24.
Fazer o update da quantidade retirando do estoque.*/

SELECT nomeCliente, idCliente FROM cliente

SELECT*FROM Equipamento
WHERE nomeEquipamento = 'Guarda sol P' 

INSERT INTO Aluguel(idCliente,idFuncionario,dataHoraRetirada,dataHoraDevolucao,valorAPagar,valorPago,pago,formaPagamento,qtVezes)
VALUES (8, 1, '2024-12-27 12:00:00', NULL, 2.00, NULL, NULL, NULL, NULL),
		(12, 1, '2024-12-27 02:50:00', NULL, 2.00, NULL, NULL, NULL, NULL),
		(17, 1, '2024-12-27 10:30:00', '2024-12-27 12:00:00', 2.00, NULL, NULL, NULL, NULL);

INSERT INTO AluguelEquipamento(idEquipamento, idAluguel, valorItem, valorUnitario, qtd)
VALUE (3, 4, 2.00, 2.00, 1),
		(3, 5, 2.00, 2.00, 1),
		(3, 6, 2.00, 2.00, 1);
		
UPDATE equipamento
SET qtd = qtd - 3
WHERE idEquipamento = 3

/*9)Inserir o aluguel de 2 cadeiras 4 posições e um guarda sol G para 6 pessoas aleatórias feitas pelo Chico Bento,
 em dez 28/12/24. Fazer o update da quantidade retirando do estoque.*/
SELECT idEquipamento, nomeEquipamento, valorHora FROM equipamento
WHERE nomeEquipamento IN ('Cadeira 04 posições','Guarda Sol G')

SELECT nomeFuncionario, idFuncionario FROM Funcionario 
WHERE nomeFuncionario = 'Chico Bento'

INSERT INTO Aluguel(idCliente,idFuncionario,dataHoraRetirada,dataHoraDevolucao,valorAPagar,valorPago,pago,formaPagamento,qtVezes)
VALUES (20, 3, '2024-12-28 12:00:00', NULL, 10.00, NULL, NULL, 'Crédito', 1),
 		 (1, 3, '2024-12-28 09:00:00', NULL, 10.00, NULL, NULL, NULL, NULL),
		 (9, 3, '2024-12-28 11:20:00', NULL, 10.00, NULL, NULL, NULL, NULL),
		 (18, 3, '2024-12-28 6:30:10', NULL, 10.00, NULL, NULL, 'Dinheiro', NULL),
		 (10, 3, '2024-12-28 11:32:05', NULL, 10.00, NULL, NULL, NULL, NULL),
		 (6, 3, '2024-12-28 08:24:00', NULL, 10.00, NULL, NULL, 'Debito', NULL);
SELECT*FROM Aluguel
INSERT INTO AluguelEquipamento(idEquipamento, idAluguel, valorItem, valorUnitario, qtd)
VALUE (2, 7, 3.50, 3.50, 2),
		(4, 7, 3.00, 3.00, 1),
		(2, 8, 3.50, 3.50, 2),
		(4, 8, 3.00, 3.00, 1),
		(2, 9, 3.50, 3.50, 2),
		(4, 9, 3.00, 3.00, 1),
		(2, 10, 3.50, 3.50, 2),
		(4, 10, 3.00, 3.00, 1),
		(2, 11, 3.50, 3.50, 2),
		(4, 11, 3.00, 3.00, 1),
		(2, 12, 3.50, 3.50, 2),
		(4, 12, 3.00, 3.00, 1);

UPDATE equipamento
SET qtd = qtd - 12
WHERE idEquipamento = 2

UPDATE equipamento
SET qtd = qtd - 6
WHERE idEquipamento = 4

SELECT*FROM Equipamento

/*10)Listar o nome e os contatos de todos os clientes da barraca em ordem alfabética.*/
SELECT nomeCliente, email FROM cliente
ORDER by nomeCliente 
 
/*11)Listar o nome e o contato telefônico de todos os funcionários da barraca em ordem alfabética.*/
SELECT nomeFuncionario, celular FROM Funcionario
ORDER by nomeFuncionario
 
/*12)Listar todos os dados dos aluguéis realizados em ordem de data da mais antiga para a mais nova.*/
SELECT*FROM aluguel
ORDER BY dataHoraRetirada DESC

/*13)Listar nome, cidade e estado de todos os clientes da baixada santista em ordem alfabética por nome.*/
SELECT nomeCliente, cidade, estado FROM cliente 
WHERE cidade IN ('Santos', 'São Vicente', 'Praia Grande','Cubatão', 'Guarujá', 'Bertioga', 'Mongaguá', 'Itanhaém', 'Peruíbe')
ORDER BY nomeCliente 

/*14)Listar todos os produtos e a quantidade de estoque do produto que tem mais itens para o que tem menos.*/
SELECT nomeEquipamento, qtd FROM equipamento 
ORDER BY qtd DESC

/*15)Listar o nome, a cidade e o estado de todos os clientes que moram em casa em ordem alfabética.*/
SELECT nomeCliente, cidade, estado FROM cliente 
WHERE endereco = 'casa'
ORDER BY nomeCliente 

/*16)Listar o nome de todos os clientes e o estado daqueles que não vivem no estado de SP.*/
SELECT nomeCliente, cidade, estado FROM cliente 
WHERE estado <> 'SP'

/*17)Listar o nome de todos os clientes que começam com a letra A.*/
SELECT nomeCliente FROM cliente 
WHERE nomeCliente LIKE 'A%'

/*18)Listar todos os dados dos clientes que começam com a letra M e vivam no estado de PE.*/
SELECT * FROM cliente 
WHERE nomeCliente LIKE 'M%' AND estado = 'PE'

/*19)Listar apenas as cadeiras e a quantidade que possui em estoque em ordem de quantidade,
 da que mais possui itens para a que menos possui.*/
SELECT nomeEquipamento, qtd FROM equipamento 
WHERE nomeEquipamento LIKE 'Cadeira%'
ORDER BY qtd DESC

/*20)Listar todos os dados dos alugueis que ocorreram entre 25/12 e 31/12 de 2024 em ordem de data da mais antiga para a mais nova. */	
SELECT*FROM aluguel
WHERE dataHoraRetirada BETWEEN '2024-12-25' AND '2024-12-31'
ORDER BY dataHoraRetirada
